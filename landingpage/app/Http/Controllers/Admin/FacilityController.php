<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\HandlesImageUpload;
use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class FacilityController extends Controller
{
    use HandlesImageUpload;

    public function index(): View
    {
        $facilities = Facility::latest()->paginate(10);

        return view('admin.facilities.index', compact('facilities'));
    }

    public function create(): View
    {
        return view('admin.facilities.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('facilities', 'public');
        }

        Facility::create($data);

        Cache::forget('landing.facilities');

        return redirect()
            ->route('admin.facilities.index')
            ->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function edit(Facility $facility): View
    {
        return view('admin.facilities.edit', compact('facility'));
    }

    public function update(Request $request, Facility $facility): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $this->deleteImage($facility->image);
            $data['image'] = $request->file('image')->store('facilities', 'public');
        }

        $facility->update($data);

        Cache::forget('landing.facilities');

        return redirect()
            ->route('admin.facilities.index')
            ->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy(Facility $facility): RedirectResponse
    {
        $this->deleteImage($facility->image);

        $facility->delete();

        Cache::forget('landing.facilities');

        return redirect()
            ->route('admin.facilities.index')
            ->with('success', 'Fasilitas berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // File diproses terpisah di store()/update()
        unset($data['image']);

        return $data;
    }
}
