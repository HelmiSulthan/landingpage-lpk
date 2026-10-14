<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\GraduateController;
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
        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::patch('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');

        Route::delete('/profile', [ProfileController::class, 'destroy'])
            ->name('profile.destroy');
    });

require __DIR__ . '/auth.php';
