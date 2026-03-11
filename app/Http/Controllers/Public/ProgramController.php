<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\ProgramCategory;

class ProgramController extends Controller
{
    public function index()
    {
        $categories = ProgramCategory::withCount(['programs' => function ($q) {
            $q->active();
        }])->get();

        $programs = Program::with('category')
            ->active()
            ->ordered()
            ->get();

        return view('pages.program.index', compact('programs', 'categories'));
    }

    public function show(string $slug)
    {
        $program = Program::with(['category', 'testimonials' => function ($q) {
            $q->active()->ordered()->take(3);
        }])->where('slug', $slug)->firstOrFail();

        return view('pages.program.show', [
            'program' => $program,
            'hide_whatsapp' => true
        ]);
    }
}
