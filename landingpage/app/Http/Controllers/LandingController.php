<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Graduate;
use App\Models\Program;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class LandingController extends Controller
{
    public function index()
    {
        // Cache selama 1 jam — data hanya berubah saat admin menyimpan perubahan.
        // Cache di-clear otomatis dari SettingController, FacilityController, dll. (lihat update/store/destroy)
        $setting = Cache::remember('landing.setting', 3600, function () {
            return Setting::firstOrCreate(
                [],
                [
                    'site_name'        => 'SAKURA INDONESIA',
                    'tagline'          => 'Pelatihan Kerja ke Jepang',
                    'hero_title'       => 'Wujudkan Impianmu Bekerja di Jepang',
                    'hero_description' => 'Program pelatihan dan persiapan kerja ke Jepang.',
                    'profile'          => 'Profil lembaga belum diisi.',
                    'vision'           => 'Visi lembaga belum diisi.',
                    'mission'          => 'Misi lembaga belum diisi.',
                    'address'          => '',
                    'phone'            => '',
                    'email'            => '',
                    'whatsapp'         => '',
                    'students_count'   => 0,
                    'graduates_count'  => 0,
                    'japan_count'      => 0,
                    'experience_years' => 0,
                ]
            );
        });

        $facilities = Cache::remember('landing.facilities', 3600, function () {
            return Facility::latest()->get();
        });

        $programs = Cache::remember('landing.programs', 3600, function () {
            return Program::latest()->get();
        });

        $graduates = Cache::remember('landing.graduates', 3600, function () {
            return Graduate::latest()->get();
        });

        return view('welcome', compact(
            'setting',
            'facilities',
            'programs',
            'graduates'
        ));
    }
}
