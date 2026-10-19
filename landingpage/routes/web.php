<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\GraduateController;
use App\Http\Controllers\Admin\GraduateStatController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\ProfileController;

// Landing page publik
Route::get('/', [LandingController::class, 'index']);

// Semua halaman di bawah ini khusus admin yang sudah login
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard', [
            DashboardController::class,
            'index'
        ])->name('admin.dashboard');

        Route::get('/settings', [
            SettingController::class,
            'edit'
        ])->name('admin.settings.edit');

        Route::put('/settings', [
            SettingController::class,
            'update'
        ])->name('admin.settings.update');

        Route::resource('facilities', FacilityController::class)
            ->except('show')
            ->names('admin.facilities');

        Route::resource('programs', ProgramController::class)
            ->except('show')
            ->names('admin.programs');

        Route::resource('graduates', GraduateController::class)
            ->except('show')
            ->names('admin.graduates');

        Route::post('/graduates/gdrive', [GraduateController::class, 'updateGdrive'])
            ->name('admin.graduates.gdrive');

        // Statistik lulusan dari Excel
        Route::get('/graduate-stats', [GraduateStatController::class, 'index'])->name('admin.graduate-stats.index');
        Route::post('/graduate-stats/upload', [GraduateStatController::class, 'upload'])->name('admin.graduate-stats.upload');
        Route::delete('/graduate-stats', [GraduateStatController::class, 'destroy'])->name('admin.graduate-stats.destroy');
        Route::get('/graduate-stats/template', [GraduateStatController::class, 'template'])->name('admin.graduate-stats.template');

        Route::resource('faqs', FaqController::class)
            ->except('show')
            ->names('admin.faqs');

        Route::resource('galleries', GalleryController::class)
            ->except('show')
            ->names('admin.galleries');

        Route::get('/hero-images', [SettingController::class, 'edit'])->name('admin.hero-images.index');
        Route::post('/hero-images', [SettingController::class, 'storeHeroImage'])->name('admin.hero-images.store');
        Route::delete('/hero-images/{heroImage}', [SettingController::class, 'destroyHeroImage'])->name('admin.hero-images.destroy');

        Route::get('/activity-logs', [ActivityLogController::class, 'index'])
            ->name('admin.activity-logs.index');

        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::patch('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');

        Route::delete('/profile', [ProfileController::class, 'destroy'])
            ->name('profile.destroy');
    });

require __DIR__ . '/auth.php';
