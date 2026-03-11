<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $featured = Post::published()
            ->latest()
            ->first();

        $posts = Post::published()
            ->latest()
            ->paginate(10);

        $categories = Post::published()
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category');

        return view('pages.blog.index', compact('featured', 'posts', 'categories'));
    }

    public function show(string $slug)
    {
        $post = Post::published()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.blog.show', compact('post'));
    }
}
