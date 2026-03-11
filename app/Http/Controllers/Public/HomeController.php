<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Program;
use App\Models\ServiceCategory;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $programs = Cache::remember('home_programs', 600, function () {
            return Program::with('category')
                ->active()
                ->ordered()
                ->take(6)
                ->get();
        });

        $serviceCategories = Cache::remember('home_services', 600, function () {
            return ServiceCategory::with(['services' => function ($q) {
                $q->active()->ordered();
            }])->ordered()->get();
        });

        $galleries = Cache::remember('home_galleries', 600, function () {
            return Gallery::active()
                ->ordered()
                ->take(9)
                ->get();
        });

        $testimonials = Cache::remember('home_testimonials', 600, function () {
            return Testimonial::with('program')
                ->active()
                ->ordered()
                ->take(6)
                ->get();
        });

        $posts = Cache::remember('home_posts', 600, function () {
            return Post::published()
                ->latest()
                ->take(3)
                ->get();
        });

        return view('pages.home', compact(
            'programs',
            'serviceCategories',
            'galleries',
            'testimonials',
            'posts'
        ));
    }
}

