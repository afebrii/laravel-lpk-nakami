<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::active()
            ->ordered()
            ->paginate(12);

        $categories = Gallery::active()
            ->select('category')
            ->distinct()
            ->pluck('category')
            ->filter();

        return view('pages.galeri.index', compact('galleries', 'categories'));
    }
}
