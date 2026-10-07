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
        $setting = Setting::first();

        $facilities = Facility::latest()->get();

        $programs = Program::latest()->get();

        $graduates = Graduate::latest()->get();

        return view('landing', compact(
            'setting',
            'facilities',
            'programs',
            'graduates'
        ));
    }
}