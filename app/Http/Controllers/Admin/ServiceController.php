<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::with('category:id,name');

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $services = $query->orderBy('order')->paginate(15)->appends($request->query());
        $categories = ServiceCategory::ordered()->get(['id', 'name']);

        return view('admin.services.index', compact('services', 'categories'));
    }

    public function create()
    {
        $categories = ServiceCategory::ordered()->get(['id', 'name']);
        return view('admin.services.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|exists:service_categories,id',
            'short_description' => 'nullable|max:500',
            'price_start' => 'required|numeric|min:0',
            'price_end' => 'nullable|numeric|min:0',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['order'] = $validated['order'] ?? 0;

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Service $service)
    {
        $categories = ServiceCategory::ordered()->get(['id', 'name']);
        return view('admin.services.form', compact('service', 'categories'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|exists:service_categories,id',
            'short_description' => 'nullable|max:500',
            'price_start' => 'required|numeric|min:0',
            'price_end' => 'nullable|numeric|min:0',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return back()->with('success', 'Layanan berhasil dihapus.');
    }
}
