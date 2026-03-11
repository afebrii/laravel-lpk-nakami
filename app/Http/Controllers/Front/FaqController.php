<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::active()
            ->ordered()
            ->get();

        $categories = $faqs->pluck('category')->unique()->filter()->values();

        return view('pages.faq.index', compact('faqs', 'categories'));
    }
}
