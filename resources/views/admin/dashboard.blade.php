@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')

{{-- Welcome --}}
<div class="mb-6">
    <p class="text-dark-gray">Selamat datang kembali, <span class="font-semibold text-charcoal">{{ auth()->user()->name }}</span> 👋</p>
</div>

{{-- Stat Widgets --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    {{-- Total Pendaftar --}}
    <div class="bg-white rounded-xl border border-gray-200 p-5 hover:shadow-md transition-shadow group">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-gray-50 rounded-xl flex items-center justify-center shrink-0 group-hover:bg-[#C0001E]/10 transition-colors">
                <svg class="w-6 h-6 text-[#111111] group-hover:text-[#C0001E] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <div>
                <p class="text-2xl font-bold text-charcoal">{{ $stats['total_registrations'] }}</p>
                <p class="text-xs text-dark-gray">Total Pendaftar</p>
            </div>
        </div>
    </div>

    {{-- Lowongan Aktif --}}
    <div class="bg-white rounded-xl border border-gray-200 p-5 hover:shadow-md transition-shadow group">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-gray-50 rounded-xl flex items-center justify-center shrink-0 group-hover:bg-[#C0001E]/10 transition-colors">
                <svg class="w-6 h-6 text-[#111111] group-hover:text-[#C0001E] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <p class="text-2xl font-bold text-charcoal">{{ $stats['total_lowongan'] }}</p>
                <p class="text-xs text-dark-gray">Lowongan Aktif</p>
            </div>
        </div>
    </div>

    {{-- Pending --}}
    <div class="bg-white rounded-xl border border-gray-200 p-5 hover:shadow-md transition-shadow group">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-gray-50 rounded-xl flex items-center justify-center shrink-0 group-hover:bg-amber-50 transition-colors">
                <svg class="w-6 h-6 text-[#111111] group-hover:text-amber-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <p class="text-2xl font-bold text-charcoal">{{ $stats['pending_registrations'] }}</p>
                <p class="text-xs text-dark-gray">Menunggu Konfirmasi</p>
            </div>
        </div>
    </div>

    {{-- Program Aktif --}}
    <div class="bg-white rounded-xl border border-gray-200 p-5 hover:shadow-md transition-shadow group">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-gray-50 rounded-xl flex items-center justify-center shrink-0 group-hover:bg-[#C0001E]/10 transition-colors">
                <svg class="w-6 h-6 text-[#111111] group-hover:text-[#C0001E] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <div>
                <p class="text-2xl font-bold text-charcoal">{{ $stats['active_programs'] }}</p>
                <p class="text-xs text-dark-gray">Program Utama</p>
            </div>
        </div>
    </div>
</div>

{{-- Charts --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    {{-- Line Chart --}}
    <div class="lg:col-span-2 bg-white rounded-xl border border-gray-200 p-5">
        <h3 class="font-heading text-sm font-bold text-charcoal mb-4">Pendaftaran 6 Bulan Terakhir</h3>
        <div class="relative h-64">
            <canvas id="registrationChart"></canvas>
        </div>
    </div>

    {{-- Doughnut Chart --}}
    <div class="bg-white rounded-xl border border-gray-200 p-5">
        <h3 class="font-heading text-sm font-bold text-charcoal mb-4">Distribusi per Program</h3>
        <div class="relative h-64 flex items-center justify-center">
            @if($programDistribution->count() > 0)
                <canvas id="programChart"></canvas>
            @else
                <p class="text-sm text-dark-gray/50">Belum ada data</p>
            @endif
        </div>
    </div>
</div>

{{-- Recent Registrations --}}
<div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
    <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
        <h3 class="font-heading text-sm font-bold text-charcoal">Pendaftaran Terbaru</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 text-left">
                    <th class="px-5 py-3 text-xs font-semibold text-dark-gray/70 uppercase">Nama</th>
                    <th class="px-5 py-3 text-xs font-semibold text-dark-gray/70 uppercase">Ref Code</th>
                    <th class="px-5 py-3 text-xs font-semibold text-dark-gray/70 uppercase">Program</th>
                    <th class="px-5 py-3 text-xs font-semibold text-dark-gray/70 uppercase">Tipe</th>
                    <th class="px-5 py-3 text-xs font-semibold text-dark-gray/70 uppercase">Tanggal</th>
                    <th class="px-5 py-3 text-xs font-semibold text-dark-gray/70 uppercase">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($recentRegistrations as $reg)
                <tr class="hover:bg-gray-50/50">
                    <td class="px-5 py-3 font-medium text-charcoal">{{ $reg->name }}</td>
                    <td class="px-5 py-3 text-xs font-mono text-dark-gray">{{ $reg->ref_code }}</td>
                    <td class="px-5 py-3 text-dark-gray">{{ $reg->program?->name ?? '-' }}</td>
                    <td class="px-5 py-3">
                        <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $reg->type === 'konsultasi' ? 'bg-sky-50 text-sky-600' : 'bg-purple-50 text-purple-600' }}">
                            {{ ucfirst($reg->type) }}
                        </span>
                    </td>
                    <td class="px-5 py-3 text-dark-gray">{{ $reg->created_at->format('d/m/Y') }}</td>
                    <td class="px-5 py-3">
                        @php
                            $statusColors = [
                                'pending' => 'bg-amber-50 text-amber-600',
                                'confirmed' => 'bg-green-50 text-green-600',
                                'rejected' => 'bg-red-50 text-red-600',
                            ];
                        @endphp
                        <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$reg->status] ?? 'bg-gray-50 text-gray-600' }}">
                            {{ ucfirst($reg->status) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-8 text-center text-dark-gray/50">Belum ada data pendaftaran.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Line Chart
    const regCtx = document.getElementById('registrationChart');
    if (regCtx) {
        new Chart(regCtx, {
            type: 'line',
            data: {
                labels: @json($chartMonths),
                datasets: [{
                    label: 'Pendaftaran',
                    data: @json($chartData),
                    borderColor: '#C0001E',
                    backgroundColor: 'rgba(192, 0, 30, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#C0001E',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1, font: { size: 11 } },
                        grid: { color: 'rgba(0,0,0,0.05)' }
                    },
                    x: {
                        ticks: { font: { size: 11 } },
                        grid: { display: false }
                    }
                }
            }
        });
    }

    // Doughnut Chart
    const progCtx = document.getElementById('programChart');
    if (progCtx) {
        const distribution = @json($programDistribution);
        const colors = ['#C0001E', '#111111', '#1E1E1E', '#6B7280', '#F9F5F2', '#E8001F'];
        new Chart(progCtx, {
            type: 'doughnut',
            data: {
                labels: distribution.map(d => d.label),
                datasets: [{
                    data: distribution.map(d => d.total),
                    backgroundColor: colors.slice(0, distribution.length),
                    borderWidth: 2,
                    borderColor: '#fff',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { font: { size: 11 }, padding: 12, usePointStyle: true }
                    }
                }
            }
        });
    }
});
</script>
@endpush
