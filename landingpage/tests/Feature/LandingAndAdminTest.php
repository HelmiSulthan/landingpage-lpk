<?php

use App\Models\Program;
use App\Models\Setting;
use App\Models\User;

test('landing page renders dynamic site name and ordered programs', function () {
    Setting::create([
        'site_name' => 'LPK Sakura Nusantara',
        'tagline' => 'Resmi & Terpercaya',
        'whatsapp' => '0812-3456-7890',
    ]);

    $step1 = Program::create(['name' => 'Langkah 1: Pendaftaran', 'description' => '<p>Isi formulir</p>']);
    $step2 = Program::create(['name' => 'Langkah 2: Pelatihan', 'description' => '<p>Belajar bahasa</p>']);

    $response = $this->get('/');

    $response->assertOk()
        ->assertSee('LPK Sakura Nusantara | Resmi &amp; Terpercaya', false)
        ->assertSeeInOrder(['Langkah 1: Pendaftaran', 'Langkah 2: Pelatihan'])
        ->assertSee('https://wa.me/6281234567890');
});

test('admin routes block non-admin users and allow admins', function () {
    $nonAdmin = User::factory()->nonAdmin()->create();
    $admin = User::factory()->create();

    $this->actingAs($nonAdmin)->get('/admin/dashboard')->assertForbidden();
    $this->actingAs($admin)->get('/admin/dashboard')->assertOk();
});

test('user management only allows super admins and prevents self role demotion', function () {
    $admin = User::factory()->create();
    $superAdmin = User::factory()->superAdmin()->create();

    $this->actingAs($admin)->get('/admin/users')->assertForbidden();
    $this->actingAs($superAdmin)->get('/admin/users')->assertOk();

    // Super admin tidak bisa menurunkan role dirinya sendiri menjadi admin biasa
    $response = $this->actingAs($superAdmin)->put("/admin/users/{$superAdmin->id}", [
        'name' => $superAdmin->name,
        'email' => $superAdmin->email,
        'role' => 'admin',
    ]);

    $response->assertRedirect(route('admin.users.index'));
    $this->assertSame('super_admin', $superAdmin->fresh()->role);
});

test('settings update extracts google maps iframe src and rejects untrusted urls', function () {
    $admin = User::factory()->create();

    // Valid iframe embed code -> src diekstrak otomatis
    $this->actingAs($admin)->put('/admin/settings', [
        'site_name' => 'LPK Test',
        'maps_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12" width="600" height="450"></iframe>',
    ])->assertRedirect(route('admin.settings.edit'));

    $this->assertSame('https://www.google.com/maps/embed?pb=!1m18!1m12', Setting::first()->maps_embed);

    // Invalid URL ditolak
    $this->actingAs($admin)->from('/admin/settings')->put('/admin/settings', [
        'site_name' => 'LPK Test',
        'maps_embed' => 'javascript:alert(1)',
    ])->assertSessionHasErrors('maps_embed');
});

test('facility controller rejects invalid characters in icon field', function () {
    $admin = User::factory()->create();

    $this->actingAs($admin)->post('/admin/facilities', [
        'name' => 'Asrama',
        'icon' => 'bi bi-house"><script>alert(1)</script>',
    ])->assertSessionHasErrors('icon');

    $this->actingAs($admin)->post('/admin/facilities', [
        'name' => 'Asrama',
        'icon' => 'bi bi-house-door',
    ])->assertRedirect(route('admin.facilities.index'));
});

test('facility card displays uploaded image when present and falls back to icon otherwise', function () {
    \App\Models\Facility::create([
        'name' => 'Ruang Kelas Multimedia',
        'icon' => 'bi bi-laptop',
        'image' => 'facilities/kelas-multimedia.jpg',
    ]);

    \App\Models\Facility::create([
        'name' => 'WiFi Cepat',
        'icon' => 'bi bi-wifi',
        'image' => null,
    ]);

    $response = $this->get('/');

    $response->assertOk()
        ->assertSee('facility-card-img', false)
        ->assertSee('storage/facilities/kelas-multimedia.jpg', false)
        ->assertSee('bi bi-wifi', false);
});

test('storage fallback route serves files from public disk without 403 error', function () {
    $testDir = storage_path('app/public/test-fallback');
    if (! is_dir($testDir)) {
        mkdir($testDir, 0755, true);
    }
    $testFile = $testDir . '/sample.txt';
    file_put_contents($testFile, 'hello-storage');

    try {
        $this->get('/storage/test-fallback/sample.txt')
            ->assertOk();
    } finally {
        @unlink($testFile);
        @rmdir($testDir);
    }
});
