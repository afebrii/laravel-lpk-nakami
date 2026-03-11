<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\ProgramCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function index(Request $request)
    {
        $query = Program::with('category')->withCount('registrations');

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $programs = $query->orderBy('order')->paginate(10)->appends($request->query());
        $categories = ProgramCategory::all();

        return view('admin.programs.index', compact('programs', 'categories'));
    }

    public function create()
    {
        $categories = ProgramCategory::all();
        return view('admin.programs.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|exists:program_categories,id',
            'short_description' => 'required|max:500',
            'description' => 'nullable',
            'curriculum' => 'nullable',
            'duration' => 'nullable|max:100',
            'schedule' => 'nullable|max:255',
            'quota' => 'nullable|integer|min:0',
            'price' => 'nullable|numeric|min:0',
            'is_free' => 'boolean',
            'thumbnail' => 'nullable|image|max:2048',
            'facilities' => 'nullable',
            'requirements' => 'nullable',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:500',
            'status' => 'required|in:active,inactive,coming_soon',
            'order' => 'nullable|integer',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_free'] = $request->boolean('is_free');

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('programs', 'public');
        }

        Program::create($validated);

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program berhasil ditambahkan.');
    }

    public function edit(Program $program)
    {
        $categories = ProgramCategory::all();
        return view('admin.programs.form', compact('program', 'categories'));
    }

    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|exists:program_categories,id',
            'short_description' => 'required|max:500',
            'description' => 'nullable',
            'curriculum' => 'nullable',
            'duration' => 'nullable|max:100',
            'schedule' => 'nullable|max:255',
            'quota' => 'nullable|integer|min:0',
            'price' => 'nullable|numeric|min:0',
            'is_free' => 'boolean',
            'thumbnail' => 'nullable|image|max:2048',
            'facilities' => 'nullable',
            'requirements' => 'nullable',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:500',
            'status' => 'required|in:active,inactive,coming_soon',
            'order' => 'nullable|integer',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_free'] = $request->boolean('is_free');

        if ($request->hasFile('thumbnail')) {
            if ($program->thumbnail) {
                Storage::disk('public')->delete($program->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('programs', 'public');
        }

        $program->update($validated);

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program berhasil diperbarui.');
    }

    public function destroy(Program $program)
    {
        if ($program->registrations()->exists()) {
            return back()->with('error', 'Program tidak bisa dihapus karena sudah ada pendaftar.');
        }

        if ($program->thumbnail) {
            Storage::disk('public')->delete($program->thumbnail);
        }

        $program->delete();

        return back()->with('success', 'Program berhasil dihapus.');
    }
}
