<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\HandlesImageUpload;
use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\HeroImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class HeroImageController extends Controller
{
    use HandlesImageUpload;

    public function index(): View
    {
        $heroImages = HeroImage::latest()->get();

        return view('admin.hero-images.index', compact('heroImages'));
    }

    public function store(Request $request): RedirectResponse
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
            ->route('admin.hero-images.index')
            ->with('success', 'Foto berhasil diunggah.');
    }

    public function destroy(HeroImage $heroImage): RedirectResponse
    {
        $this->deleteImage($heroImage->image);

        $heroImage->delete();

        Cache::forget('landing.hero_images');

        ActivityLog::record('delete', 'Hero', 'Menghapus foto latar hero');

        return redirect()
            ->route('admin.hero-images.index')
            ->with('success', 'Foto berhasil dihapus.');
    }
}
