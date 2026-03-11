<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;

class ServiceController extends Controller
{
    public function index()
    {
        $serviceCategories = ServiceCategory::with(['services' => function ($q) {
            $q->active()->ordered();
        }])->ordered()->get();

        return view('pages.layanan.index', compact('serviceCategories'));
    }
}
