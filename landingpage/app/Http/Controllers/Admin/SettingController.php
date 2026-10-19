<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\HandlesImageUpload;
use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\HeroImage;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    use HandlesImageUpload;

    public function edit()
    {
        $setting    = Setting::firstOrNew([]);
        $heroImages = HeroImage::latest()->get();

        return view('admin.settings.edit', compact('setting', 'heroImages'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'site_name'        => 'nullable|string|max:255',
            'tagline'          => 'nullable|string|max:255',
            'hero_title'       => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',
            'profile'          => 'nullable|string',
            'vision'           => 'nullable|string',
            'mission'          => 'nullable|string',
            'leader_name'      => 'nullable|string|max:255',
            'leader_position'  => 'nullable|string|max:255',
            'leader_photo'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'address'          => 'nullable|string|max:255',
            'phone'            => 'nullable|string|max:30',
            'email'            => 'nullable|email',
            'whatsapp'              => 'nullable|string|max:30',
            'instagram'             => 'nullable|url|max:255',
            'tiktok'                => 'nullable|url|max:255',
            'students_count'        => 'nullable|integer',
            'graduates_count'       => 'nullable|integer',
            'japan_count'           => 'nullable|integer',
            'experience_years'      => 'nullable|integer',
            'graduates_gdrive_link' => 'nullable|url|max:500',
        ]);

        $setting = Setting::firstOrNew([]);

        // Upload foto atasan jika ada
        if ($request->hasFile('leader_photo')) {
            $this->deleteImage($setting->leader_photo);
            $data['leader_photo'] = $request->file('leader_photo')->store('leaders', 'public');
        } else {
            unset($data['leader_photo']);
        }

        // Hapus foto atasan jika diminta
        if ($request->boolean('remove_leader_photo')) {
            $this->deleteImage($setting->leader_photo);
            $data['leader_photo'] = null;
        }

        Setting::updateOrCreate([], $data);

        Cache::forget('landing.setting');

        ActivityLog::record('update', 'Pengaturan', 'Memperbarui pengaturan website');

        return redirect()
            ->route('admin.settings.edit')
            ->with('success', 'Pengaturan berhasil diperbarui.');
    }

    public function storeHeroImage(Request $request): RedirectResponse
    {
        $request->validate([
            'images'   => 'required|array|min:1',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        foreach ($request->file('images') as $file) {
            HeroImage::create([
                'image' => $file->store('hero', 'public'),
            ]);
        }

        Cache::forget('landing.hero_images');

        ActivityLog::record('create', 'Hero', 'Menambahkan foto latar hero');

        return redirect()
            ->route('admin.settings.edit')
            ->with('success', 'Foto hero berhasil diunggah.')
            ->withFragment('hero-images');
    }

    public function destroyHeroImage(HeroImage $heroImage): RedirectResponse
    {
        $this->deleteImage($heroImage->image);

        $heroImage->delete();

        Cache::forget('landing.hero_images');

        ActivityLog::record('delete', 'Hero', 'Menghapus foto latar hero');

        return redirect()
            ->route('admin.settings.edit')
            ->with('success', 'Foto hero berhasil dihapus.')
            ->withFragment('hero-images');
    }
}
