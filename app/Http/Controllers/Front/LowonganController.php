<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    public function index(Request $request)
    {
        $query = Lowongan::where('status', 'Buka');

        if ($request->filled('program')) {
            $query->where('program', $request->program);
        }
        if ($request->filled('lokasi')) {
            $query->where('lokasi', 'like', '%' . $request->lokasi . '%');
        }

        $lowongans = $query->latest()->paginate(9)->appends($request->query());

        return view('pages.lowongan.index', compact('lowongans'));
    }

    public function show($slug)
    {
        $lowongan = Lowongan::where('slug', $slug)->firstOrFail();
        return view('pages.lowongan.show', compact('lowongan'));
    }
}
