<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\ServiceCategory;

class ServiceController extends Controller
{
    public function index()
    {
        $serviceCategories = ServiceCategory::with(['services' => function ($q) {
            $q->active()->ordered();
        }])->ordered()->get();

        $galleries = Gallery::active()
            ->where('category', 'salon')
            ->ordered()
            ->take(6)
            ->get();

        return view('pages.layanan.index', compact('serviceCategories', 'galleries'));
    }
}
