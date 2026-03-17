<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use App\Http\Requests\LowonganRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class LowonganController extends Controller
{
    public function index(Request $request)
    {
        $query = Lowongan::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('lokasi', 'like', '%' . $request->search . '%');
        }

        $lowongans = $query->latest()->paginate(10)->appends($request->query());

        return view('admin.lowongan.index', compact('lowongans'));
    }

    public function create()
    {
        return view('admin.lowongan.form');
    }

    public function store(LowonganRequest $request)
    {
        $validated = $request->validated();
        
        $baseSlug = Str::slug($validated['judul']);
        $validated['slug'] = $baseSlug . '-' . substr(uniqid(), -5);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('lowongan', 'public');
        }

        Lowongan::create($validated);

        return redirect()->route('admin.lowongan.index')
            ->with('success', 'Lowongan berhasil ditambahkan.');
    }

    public function edit(Lowongan $lowongan)
    {
        return view('admin.lowongan.form', compact('lowongan'));
    }

    public function update(LowonganRequest $request, Lowongan $lowongan)
    {
        $validated = $request->validated();

        $baseSlug = Str::slug($validated['judul']);
        $validated['slug'] = $baseSlug . '-' . substr(uniqid(), -5);

        if ($request->hasFile('gambar')) {
            if ($lowongan->gambar) {
                Storage::disk('public')->delete($lowongan->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('lowongan', 'public');
        }

        $lowongan->update($validated);

        return redirect()->route('admin.lowongan.index')
            ->with('success', 'Lowongan berhasil diperbarui.');
    }

    public function destroy(Lowongan $lowongan)
    {
        if ($lowongan->gambar) {
            Storage::disk('public')->delete($lowongan->gambar);
        }

        $lowongan->delete();

        return back()->with('success', 'Lowongan berhasil dihapus.');
    }
}
