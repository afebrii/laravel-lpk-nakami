<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::withCount('services')->ordered()->get();

        return view('admin.service-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.service-categories.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'icon' => 'nullable|max:100',
            'order' => 'nullable|integer',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['order'] = $validated['order'] ?? 0;

        ServiceCategory::create($validated);

        return redirect()->route('admin.service-categories.index')
            ->with('success', 'Kategori layanan berhasil ditambahkan.');
    }

    public function edit(ServiceCategory $serviceCategory)
    {
        return view('admin.service-categories.form', ['category' => $serviceCategory]);
    }

    public function update(Request $request, ServiceCategory $serviceCategory)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'icon' => 'nullable|max:100',
            'order' => 'nullable|integer',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $serviceCategory->update($validated);

        return redirect()->route('admin.service-categories.index')
            ->with('success', 'Kategori layanan berhasil diperbarui.');
    }

    public function destroy(ServiceCategory $serviceCategory)
    {
        if ($serviceCategory->services()->count() > 0) {
            return back()->with('error', 'Tidak dapat menghapus kategori yang masih memiliki layanan.');
        }

        $serviceCategory->delete();

        return back()->with('success', 'Kategori layanan berhasil dihapus.');
    }
}
