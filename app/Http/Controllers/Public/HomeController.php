<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Program;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $programs = Program::with('category')
            ->active()
            ->ordered()
            ->take(6)
            ->get();

        $serviceCategories = ServiceCategory::with(['services' => function ($q) {
            $q->active()->ordered();
        }])->ordered()->get();

        $galleries = Gallery::active()
            ->ordered()
            ->take(9)
            ->get();

        $testimonials = Testimonial::with('program')
            ->active()
            ->ordered()
            ->take(6)
            ->get();

        $posts = Post::published()
            ->latest()
            ->take(3)
            ->get();

        return view('pages.home', compact(
            'programs',
            'serviceCategories',
            'galleries',
            'testimonials',
            'posts'
        ));
    }
}
