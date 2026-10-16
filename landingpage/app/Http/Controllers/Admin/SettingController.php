<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\HandlesImageUpload;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::firstOrNew([]);

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'site_name' => 'nullable|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'hero_title' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',
            'profile' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:30',
            'email' => 'nullable|email',
            'whatsapp' => 'nullable|string|max:30',
            'students_count' => 'nullable|integer',
            'graduates_count' => 'nullable|integer',
            'japan_count' => 'nullable|integer',
            'experience_years' => 'nullable|integer',
        ]);

        Setting::updateOrCreate([], $data);

        Cache::forget('landing.setting');

        return redirect()
            ->route('admin.settings.edit')
            ->with('success', 'Pengaturan berhasil diperbarui.');
    }
}