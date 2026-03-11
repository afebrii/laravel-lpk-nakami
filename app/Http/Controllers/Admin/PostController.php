<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('author:id,name');

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        if ($request->filled('status')) {
            if ($request->status === 'published') {
                $query->where('is_published', true);
            } else {
                $query->where('is_published', false);
            }
        }
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $posts = $query->orderByDesc('created_at')->paginate(10)->appends($request->query());

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required|max:500',
            'content' => 'required',
            'category' => 'required|max:100',
            'thumbnail' => 'nullable|image|max:2048',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:500',
            'is_published' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['user_id'] = auth()->id();
        $validated['is_published'] = $request->boolean('is_published');
        $validated['published_at'] = $validated['is_published'] ? now() : null;

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('posts', 'public');
        }

        Post::create($validated);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.form', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required|max:500',
            'content' => 'required',
            'category' => 'required|max:100',
            'thumbnail' => 'nullable|image|max:2048',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:500',
            'is_published' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_published'] = $request->boolean('is_published');

        if ($validated['is_published'] && !$post->published_at) {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('posts', 'public');
        }

        $post->update($validated);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        if ($post->thumbnail) {
            Storage::disk('public')->delete($post->thumbnail);
        }

        $post->delete();

        return back()->with('success', 'Artikel berhasil dihapus.');
    }
}
