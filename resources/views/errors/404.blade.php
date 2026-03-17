@extends('layouts.app')

@section('title', '404 — Halaman Tidak Ditemukan — ' . setting('site_name', 'LPK Nakami Indonesia'))

@section('content')

<section class="py-20 lg:py-32">
    <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

        {{-- 404 visual --}}
        <div class="relative mb-8">
            <h1 class="text-[10rem] sm:text-[14rem] font-bold text-rose-gold/10 leading-none select-none">404</h1>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="w-24 h-24 bg-rose-gold/10 rounded-full flex items-center justify-center">
                    <svg class="w-12 h-12 text-rose-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <h2 class="font-heading text-2xl sm:text-3xl font-bold text-charcoal mb-3">Halaman Tidak Ditemukan</h2>
        <p class="text-dark-gray mb-8 max-w-sm mx-auto">Maaf, halaman yang Anda cari tidak ditemukan atau sudah dipindahkan. Silakan kembali ke beranda.</p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="{{ url('/') }}"
               class="inline-flex items-center gap-2 px-6 py-3 bg-rose-gold text-white font-semibold rounded-full hover:bg-rose-gold-dark transition-all duration-300 active:scale-95">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Kembali ke Beranda
            </a>
            <a href="{{ route('kontak') }}"
               class="inline-flex items-center gap-2 px-6 py-3 bg-light-gray text-charcoal font-semibold rounded-full hover:bg-medium-gray transition-all duration-300 active:scale-95">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

@endsection
