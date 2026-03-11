<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgramCategoryController extends Controller
{
    public function index()
    {
        $categories = ProgramCategory::withCount('programs')->get();
        return view('admin.program-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.program-categories.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:program_categories,name',
            'type' => 'required|in:reguler,khusus',
            'description' => 'nullable|max:500',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        ProgramCategory::create($validated);

        return redirect()->route('admin.program-categories.index')
            ->with('success', 'Kategori program berhasil ditambahkan.');
    }

    public function edit(ProgramCategory $programCategory)
    {
        return view('admin.program-categories.form', ['category' => $programCategory]);
    }

    public function update(Request $request, ProgramCategory $programCategory)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:program_categories,name,' . $programCategory->id,
            'type' => 'required|in:reguler,khusus',
            'description' => 'nullable|max:500',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $programCategory->update($validated);

        return redirect()->route('admin.program-categories.index')
            ->with('success', 'Kategori program berhasil diperbarui.');
    }

    public function destroy(ProgramCategory $programCategory)
    {
        if ($programCategory->programs()->exists()) {
            return back()->with('error', 'Kategori tidak bisa dihapus karena masih ada program terhubung.');
        }

        $programCategory->delete();

        return back()->with('success', 'Kategori program berhasil dihapus.');
    }
}
