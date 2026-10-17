<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Faq;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function index(): View
    {
        $faqs = Faq::latest()->paginate(10);

        return view('admin.faqs.index', compact('faqs'));
    }

    public function create(): View
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
        ]);

        $faq = Faq::create($data);

        Cache::forget('landing.faqs');

        ActivityLog::record('create', 'QnA', "Menambahkan pertanyaan: {$faq->question}");

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'Pertanyaan berhasil ditambahkan.');
    }

    public function edit(Faq $faq): View
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq): RedirectResponse
    {
        $data = $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
        ]);

        $faq->update($data);

        Cache::forget('landing.faqs');

        ActivityLog::record('update', 'QnA', "Memperbarui pertanyaan: {$faq->question}");

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'Pertanyaan berhasil diperbarui.');
    }

    public function destroy(Faq $faq): RedirectResponse
    {
        $faq->delete();

        Cache::forget('landing.faqs');

        ActivityLog::record('delete', 'QnA', "Menghapus pertanyaan: {$faq->question}");

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'Pertanyaan berhasil dihapus.');
    }
}
