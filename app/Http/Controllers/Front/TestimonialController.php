<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('program')
            ->active()
            ->ordered()
            ->paginate(12);

        $programs = Program::active()->ordered()->get(['id', 'name']);

        $avgRating = Testimonial::active()->avg('rating');

        return view('pages.testimoni.index', compact('testimonials', 'programs', 'avgRating'));
    }
}
