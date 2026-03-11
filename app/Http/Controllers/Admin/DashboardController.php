<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Program;
use App\Models\Registration;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_registrations' => Registration::count(),
            'monthly_registrations' => Registration::whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)->count(),
            'pending_registrations' => Registration::where('status', 'pending')->count(),
            'active_programs' => Program::where('status', 'active')->count(),
            'total_posts' => Post::published()->count(),
            'total_galleries' => Gallery::count(),
        ];

        // Line chart — pendaftaran 6 bulan terakhir
        $chartMonths = [];
        $chartData = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $chartMonths[] = $date->translatedFormat('M Y');
            $chartData[] = Registration::whereMonth('created_at', $date->month)
                ->whereYear('created_at', $date->year)->count();
        }

        // Doughnut chart — distribusi per program
        $programDistribution = Registration::selectRaw('program_id, COUNT(*) as total')
            ->groupBy('program_id')
            ->with('program:id,name')
            ->get()
            ->map(fn ($r) => [
                'label' => $r->program?->name ?? 'Tidak Diketahui',
                'total' => $r->total,
            ]);

        // 5 pendaftaran terbaru
        $recentRegistrations = Registration::with('program:id,name')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'chartMonths',
            'chartData',
            'programDistribution',
            'recentRegistrations'
        ));
    }
}
