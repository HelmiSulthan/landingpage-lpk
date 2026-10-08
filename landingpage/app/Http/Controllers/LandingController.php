<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Facility;
use App\Models\Program;
use App\Models\Graduate;

class LandingController extends Controller
{
    public function index()
    {
        // Ambil data setting.
        // Jika belum ada, otomatis buat data kosong/default.
        $setting = Setting::firstOrCreate(
            [],
            [
                'site_name' => 'SAKURA INDONESIA',
                'tagline' => 'Pelatihan Kerja ke Jepang',
                'hero_title' => 'Wujudkan Impianmu Bekerja di Jepang',
                'hero_description' => 'Program pelatihan dan persiapan kerja ke Jepang.',
                'profile' => 'Profil lembaga belum diisi.',
                'vision' => 'Visi lembaga belum diisi.',
                'mission' => 'Misi lembaga belum diisi.',
                'address' => '',
                'phone' => '',
                'email' => '',
                'whatsapp' => '',
                'students_count' => 0,
                'graduates_count' => 0,
                'japan_count' => 0,
                'experience_years' => 0,
            ]
        );

        $facilities = Facility::latest()->get();
        $programs = Program::latest()->get();
        $graduates = Graduate::latest()->get();

        return view('welcome', compact(
            'setting',
            'facilities',
            'programs',
            'graduates'
        ));
    }
}