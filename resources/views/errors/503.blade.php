@extends('layouts.app')

@section('title', '503 — Layanan Tidak Tersedia — ' . setting('site_name', 'LPK Nakami Indonesia'))

@section('content')

<section class="py-20 lg:py-32">
    <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

        {{-- 503 visual --}}
        <div class="relative mb-8">
            <h1 class="text-[10rem] sm:text-[14rem] font-bold text-#C0001E/10 leading-none select-none">503</h1>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="w-24 h-24 bg-#C0001E/10 rounded-full flex items-center justify-center">
                    <svg class="w-12 h-12 text-#C0001E" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
            </div>
        </div>

        <h2 class="font-heading text-2xl sm:text-3xl font-bold text-charcoal mb-3">Layanan Tidak Tersedia</h2>
        <p class="text-dark-gray mb-8 max-w-sm mx-auto">Kami sedang melakukan pemeliharaan rutin untuk meningkatkan layanan kami. Kami akan segera kembali.</p>

        <div class="flex items-center justify-center">
            <button onclick="window.location.reload()"
               class="inline-flex items-center gap-2 px-6 py-3 bg-#C0001E text-white font-semibold rounded-full hover:bg-#C0001E-dark transition-all duration-300 active:scale-95">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                Coba Lagi
            </button>
        </div>
    </div>
</section>

@endsection
