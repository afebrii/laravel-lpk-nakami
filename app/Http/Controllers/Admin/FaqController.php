<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $query = Faq::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }
        if ($request->filled('search')) {
            $query->where('question', 'like', '%' . $request->search . '%');
        }

        $faqs = $query->orderBy('order')->paginate(15)->appends($request->query());
        $categories = Faq::distinct()->pluck('category')->filter();

        return view('admin.faqs.index', compact('faqs', 'categories'));
    }

    public function create()
    {
        return view('admin.faqs.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|max:500',
            'answer' => 'required',
            'category' => 'required|max:100',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['order'] = $validated['order'] ?? 0;

        Faq::create($validated);

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.form', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'question' => 'required|max:500',
            'answer' => 'required',
            'category' => 'required|max:100',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        $faq->update($validated);

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return back()->with('success', 'FAQ berhasil dihapus.');
    }
}
