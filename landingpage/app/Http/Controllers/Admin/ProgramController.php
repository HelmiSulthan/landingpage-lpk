<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\HandlesImageUpload;
use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ProgramController extends Controller
{
    use HandlesImageUpload;

    public function index(): View
    {
        $programs = Program::latest()->paginate(10);

        return view('admin.programs.index', compact('programs'));
    }

    public function create(): View
    {
        return view('admin.programs.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('programs', 'public');
        }

        Program::create($data);

        Cache::forget('landing.programs');

        return redirect()
            ->route('admin.programs.index')
            ->with('success', 'Program berhasil ditambahkan.');
    }

    public function edit(Program $program): View
    {
        return view('admin.programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $this->deleteImage($program->image);
            $data['image'] = $request->file('image')->store('programs', 'public');
        }

        $program->update($data);

        Cache::forget('landing.programs');

        return redirect()
            ->route('admin.programs.index')
            ->with('success', 'Program berhasil diperbarui.');
    }

    public function destroy(Program $program): RedirectResponse
    {
        $this->deleteImage($program->image);

        $program->delete();

        Cache::forget('landing.programs');

        return redirect()
            ->route('admin.programs.index')
            ->with('success', 'Program berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // File diproses terpisah di store()/update()
        unset($data['image']);

        return $data;
    }
}
