<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Graduate;
use App\Models\GraduateStat;
use App\Models\HeroImage;
use App\Models\Program;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class LandingController extends Controller
{
    public function index()
    {
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
            return Facility::latest()->limit(24)->get();
        });

        $programs = Cache::remember('landing.programs', 3600, function () {
            return Program::oldest()->get();
        });

        $graduates = Cache::remember('landing.graduates', 3600, function () {
            return Graduate::latest()->limit(30)->get();
        });

        $faqs = Cache::remember('landing.faqs', 3600, function () {
            return Faq::oldest()->get();
        });

        $galleries = Cache::remember('landing.galleries', 3600, function () {
            return Gallery::latest()->limit(24)->get();
        });

        $heroImages = Cache::remember('landing.hero_images', 3600, function () {
            return HeroImage::latest()->get();
        });

        $graduateStats = Cache::remember('landing.graduate_stats', 3600, function () {
            return GraduateStat::orderBy('category')->orderBy('total', 'desc')->get()
                ->groupBy('category');
        });

        return view('welcome', compact(
            'setting',
            'facilities',
            'programs',
            'graduates',
            'faqs',
            'galleries',
            'heroImages',
            'graduateStats'
        ));
    }
}
