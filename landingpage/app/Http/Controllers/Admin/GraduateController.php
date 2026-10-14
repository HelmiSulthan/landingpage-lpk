<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Graduate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GraduateController extends Controller
{
    public function index(): View
    {
        $graduates = Graduate::latest()->paginate(10);

        return view('admin.graduates.index', compact('graduates'));
    }

    public function create(): View
    {
        return view('admin.graduates.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('graduates', 'public');
        }

        Graduate::create($data);

        return redirect()
            ->route('admin.graduates.index')
            ->with('success', 'Lulusan berhasil ditambahkan.');
    }

    public function edit(Graduate $graduate): View
    {
        return view('admin.graduates.edit', compact('graduate'));
    }

    public function update(Request $request, Graduate $graduate): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('photo')) {
            $this->deleteImage($graduate->photo);
            $data['photo'] = $request->file('photo')->store('graduates', 'public');
        }

        $graduate->update($data);

        return redirect()
            ->route('admin.graduates.index')
            ->with('success', 'Lulusan berhasil diperbarui.');
    }

    public function destroy(Graduate $graduate): RedirectResponse
    {
        $this->deleteImage($graduate->photo);

        $graduate->delete();

        return redirect()
            ->route('admin.graduates.index')
            ->with('success', 'Lulusan berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // File diproses terpisah di store()/update()
        unset($data['photo']);

        return $data;
    }

    private function deleteImage(?string $path): void
    {
        if ($path) {
            Storage::disk('public')->delete($path);
        }
    }
}