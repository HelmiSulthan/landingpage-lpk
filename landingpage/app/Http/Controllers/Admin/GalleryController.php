<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\HandlesImageUpload;
use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Gallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class GalleryController extends Controller
{
    use HandlesImageUpload;

    public function index(): View
    {
        $galleries = Gallery::latest()->paginate(12);

        return view('admin.galleries.index', compact('galleries'));
    }

    public function create(): View
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        $data['image'] = $request->file('image')->store('galleries', 'public');

        $gallery = Gallery::create($data);

        Cache::forget('landing.galleries');

        ActivityLog::record('create', 'Galeri', "Menambahkan dokumentasi: {$gallery->title}");

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Dokumentasi berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery): View
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery): RedirectResponse
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $this->deleteImage($gallery->image);
            $data['image'] = $request->file('image')->store('galleries', 'public');
        } else {
            unset($data['image']);
        }

        $gallery->update($data);

        Cache::forget('landing.galleries');

        ActivityLog::record('update', 'Galeri', "Memperbarui dokumentasi: {$gallery->title}");

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Dokumentasi berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery): RedirectResponse
    {
        $this->deleteImage($gallery->image);

        $gallery->delete();

        Cache::forget('landing.galleries');

        ActivityLog::record('delete', 'Galeri', "Menghapus dokumentasi: {$gallery->title}");

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Dokumentasi berhasil dihapus.');
    }
}
