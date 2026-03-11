@extends('layouts.app')

@section('title', setting('seo_meta_title', 'LKP/LPK Yuwita - Lembaga Kursus & Pelatihan Kecantikan'))

@section('content')

{{-- ============================================= --}}
{{-- SECTION 1: HERO --}}
{{-- ============================================= --}}
<section class="relative bg-gradient-to-br from-charcoal via-charcoal to-rose-gold-dark overflow-hidden">
    {{-- Decorative Elements --}}
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-72 h-72 bg-rose-gold rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-dusty-pink rounded-full blur-3xl"></div>
    </div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E')] opacity-50"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
        <div class="max-w-3xl">
            {{-- Trust Badges --}}
            <div class="flex flex-wrap items-center gap-3 mb-8">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-white/10 backdrop-blur-sm rounded-full text-xs font-medium text-white/90 border border-white/10">
                    <svg class="w-3.5 h-3.5 text-dusty-pink" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>
                    Berdiri sejak 2006
                </span>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-white/10 backdrop-blur-sm rounded-full text-xs font-medium text-white/90 border border-white/10">
                    <svg class="w-3.5 h-3.5 text-dusty-pink" fill="currentColor" viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                    Ribuan Alumni
                </span>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-white/10 backdrop-blur-sm rounded-full text-xs font-medium text-white/90 border border-white/10">
                    <svg class="w-3.5 h-3.5 text-dusty-pink" fill="currentColor" viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
                    Bersertifikat Resmi
                </span>
            </div>

            {{-- Headline --}}
            <h1 class="font-heading text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                {{ setting('home_hero_headline', 'Asah Keahlian Kecantikan & Nikmati Layanan Salon Profesional') }}
            </h1>

            {{-- Subheadline --}}
            <p class="text-lg sm:text-xl text-white/75 leading-relaxed mb-10 max-w-2xl">
                {{ setting('home_hero_subheadline', 'Lembaga kursus dan pelatihan kecantikan terpercaya di Tasikmalaya sejak 2006.') }}
            </p>

            {{-- CTA Buttons --}}
            <div class="flex flex-wrap items-center gap-4">
                <a href="{{ url('/program') }}"
                   class="inline-flex items-center gap-2 px-7 py-3.5 bg-rose-gold text-white font-semibold rounded-full hover:bg-rose-gold-dark transition-all duration-300 hover:shadow-lg hover:shadow-rose-gold/30 active:scale-95">
                    Lihat Program Pelatihan
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="https://wa.me/{{ setting('contact_wa_admin') }}?text={{ urlencode('Halo, saya ingin konsultasi gratis mengenai program pelatihan di LKP Yuwita.') }}"
                   target="_blank"
                   class="inline-flex items-center gap-2 px-7 py-3.5 bg-transparent text-white font-semibold rounded-full border-2 border-white/30 hover:bg-white/10 transition-all duration-300 active:scale-95">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    Konsultasi Gratis
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- SECTION 2: STATISTIK / ANGKA --}}
{{-- ============================================= --}}
<section class="relative -mt-8 z-10">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-xl shadow-charcoal/5 p-6 lg:p-8 grid grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8"
             x-data="{ shown: false }"
             x-intersect.once="shown = true">
            {{-- Alumni --}}
            <div class="text-center">
                <div class="text-3xl lg:text-4xl font-heading font-bold text-rose-gold" x-data="{ count: 0 }" x-init="$watch('shown', val => { if (val) { let target = {{ (int) setting('home_stat_alumni', 5000) }}; let step = Math.ceil(target / 60); let interval = setInterval(() => { count += step; if (count >= target) { count = target; clearInterval(interval); } }, 30); } })" x-text="count.toLocaleString('id-ID') + '+'">0+</div>
                <p class="text-sm text-dark-gray mt-1">Alumni</p>
            </div>
            {{-- Tahun --}}
            <div class="text-center">
                <div class="text-3xl lg:text-4xl font-heading font-bold text-rose-gold" x-data="{ count: 0 }" x-init="$watch('shown', val => { if (val) { let target = {{ (int) setting('home_stat_years', 18) }}; let step = 1; let interval = setInterval(() => { count += step; if (count >= target) { count = target; clearInterval(interval); } }, 100); } })" x-text="count + '+'">0+</div>
                <p class="text-sm text-dark-gray mt-1">Tahun Berdiri</p>
            </div>
            {{-- Program --}}
            <div class="text-center">
                <div class="text-3xl lg:text-4xl font-heading font-bold text-rose-gold" x-data="{ count: 0 }" x-init="$watch('shown', val => { if (val) { let target = {{ (int) setting('home_stat_programs', 8) }}; let step = 1; let interval = setInterval(() => { count += step; if (count >= target) { count = target; clearInterval(interval); } }, 150); } })" x-text="count">0</div>
                <p class="text-sm text-dark-gray mt-1">Program Pelatihan</p>
            </div>
            {{-- Mitra --}}
            <div class="text-center">
                <div class="text-3xl lg:text-4xl font-heading font-bold text-rose-gold" x-data="{ count: 0 }" x-init="$watch('shown', val => { if (val) { let target = {{ (int) setting('home_stat_partners', 20) }}; let step = 1; let interval = setInterval(() => { count += step; if (count >= target) { count = target; clearInterval(interval); } }, 80); } })" x-text="count + '+'">0+</div>
                <p class="text-sm text-dark-gray mt-1">Mitra Perusahaan</p>
            </div>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- SECTION 3: TENTANG SINGKAT --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            {{-- Image --}}
            <div class="relative">
                <div class="aspect-[4/3] rounded-2xl bg-gradient-to-br from-dusty-pink/30 to-rose-gold/20 overflow-hidden">
                    <div class="w-full h-full flex items-center justify-center text-rose-gold/40">
                        <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                </div>
                {{-- Floating Card --}}
                <div class="absolute -bottom-4 -right-4 lg:-right-8 bg-white rounded-xl shadow-lg p-4 max-w-[200px]">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-rose-gold/10 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-rose-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-charcoal">Terakreditasi</p>
                            <p class="text-xs text-dark-gray">Resmi & Terpercaya</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Content --}}
            <div>
                <span class="inline-block px-4 py-1.5 bg-rose-gold/10 text-rose-gold text-xs font-semibold rounded-full mb-4 uppercase tracking-wider">Tentang Kami</span>
                <h2 class="font-heading text-3xl lg:text-4xl font-bold text-charcoal mb-6">
                    Lembaga Kursus & Pelatihan Kecantikan Terpercaya
                </h2>
                <p class="text-dark-gray leading-relaxed mb-8">
                    {{ setting('site_description', 'LKP/LPK Yuwita adalah lembaga kursus dan pelatihan kecantikan yang berdiri sejak 2006 di Tasikmalaya. Menyediakan pelatihan tata kecantikan dan layanan salon profesional.') }}
                </p>

                {{-- Highlights --}}
                <div class="space-y-4 mb-8">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-soft-cream rounded-lg flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-rose-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-charcoal">Tenaga Pengajar Berpengalaman</h4>
                            <p class="text-sm text-dark-gray">Dosen & praktisi profesional di bidang kecantikan</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-soft-cream rounded-lg flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-rose-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-charcoal">Fasilitas Modern</h4>
                            <p class="text-sm text-dark-gray">Alat praktek lengkap & up to date</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-soft-cream rounded-lg flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-rose-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-charcoal">Bersertifikat Nasional</h4>
                            <p class="text-sm text-dark-gray">Sertifikat resmi yang diakui secara nasional</p>
                        </div>
                    </div>
                </div>

                <a href="{{ url('/tentang') }}" class="inline-flex items-center gap-2 text-rose-gold font-semibold hover:gap-3 transition-all duration-300">
                    Selengkapnya
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- SECTION 4: PROGRAM UNGGULAN --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-rose-gold/10 text-rose-gold text-xs font-semibold rounded-full mb-4 uppercase tracking-wider">Program Kami</span>
            <h2 class="font-heading text-3xl lg:text-4xl font-bold text-charcoal">Program Pelatihan Kami</h2>
        </div>

        {{-- Tab Filter --}}
        <div x-data="{ activeTab: 'semua' }" class="space-y-8">
            <div class="flex justify-center">
                <div class="inline-flex bg-light-gray rounded-full p-1 gap-1">
                    <button @click="activeTab = 'semua'"
                            :class="activeTab === 'semua' ? 'bg-rose-gold text-white shadow-md' : 'text-dark-gray hover:text-charcoal'"
                            class="px-5 py-2 text-sm font-medium rounded-full transition-all duration-300">
                        Semua
                    </button>
                    <button @click="activeTab = 'reguler'"
                            :class="activeTab === 'reguler' ? 'bg-rose-gold text-white shadow-md' : 'text-dark-gray hover:text-charcoal'"
                            class="px-5 py-2 text-sm font-medium rounded-full transition-all duration-300">
                        Kelas Reguler
                    </button>
                    <button @click="activeTab = 'khusus'"
                            :class="activeTab === 'khusus' ? 'bg-rose-gold text-white shadow-md' : 'text-dark-gray hover:text-charcoal'"
                            class="px-5 py-2 text-sm font-medium rounded-full transition-all duration-300">
                        Kelas Khusus
                    </button>
                </div>
            </div>

            {{-- Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($programs as $program)
                <div x-show="activeTab === 'semua' || activeTab === '{{ $program->category->type }}'"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     class="group bg-white border border-light-gray rounded-2xl overflow-hidden hover:shadow-xl hover:shadow-rose-gold/5 hover:-translate-y-1 transition-all duration-300">
                    {{-- Thumbnail --}}
                    <div class="aspect-[16/10] bg-gradient-to-br from-dusty-pink/20 to-rose-gold/10 relative overflow-hidden">
                        @if($program->thumbnail)
                            <img src="{{ asset('storage/' . $program->thumbnail) }}" alt="{{ $program->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-16 h-16 text-rose-gold/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                        @endif
                        {{-- Badge --}}
                        <span class="absolute top-3 left-3 px-3 py-1 text-xs font-semibold rounded-full {{ $program->category->type === 'reguler' ? 'bg-emerald-500 text-white' : 'bg-rose-gold text-white' }}">
                            {{ $program->category->name }}
                        </span>
                    </div>
                    {{-- Content --}}
                    <div class="p-5">
                        <h3 class="font-heading text-lg font-bold text-charcoal mb-2 group-hover:text-rose-gold transition-colors">
                            {{ $program->name }}
                        </h3>
                        <p class="text-sm text-dark-gray mb-4 line-clamp-2">{{ $program->short_description }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold {{ $program->is_free ? 'text-emerald-600' : 'text-rose-gold' }}">
                                {{ $program->is_free ? 'GRATIS' : 'Rp ' . number_format((float)$program->price, 0, ',', '.') }}
                            </span>
                            <a href="{{ url('/program/' . $program->slug) }}" class="inline-flex items-center gap-1 text-sm font-medium text-rose-gold hover:gap-2 transition-all duration-200">
                                Detail
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- View All --}}
            <div class="text-center pt-4">
                <a href="{{ url('/program') }}" class="inline-flex items-center gap-2 px-6 py-3 border-2 border-rose-gold text-rose-gold font-semibold rounded-full hover:bg-rose-gold hover:text-white transition-all duration-300">
                    Lihat Semua Program
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- SECTION 5: LAYANAN SALON --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-rose-gold/10 text-rose-gold text-xs font-semibold rounded-full mb-4 uppercase tracking-wider">Layanan Salon</span>
            <h2 class="font-heading text-3xl lg:text-4xl font-bold text-charcoal">Layanan Salon Kami</h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @foreach($serviceCategories as $category)
            <div class="bg-white rounded-2xl border border-light-gray p-6 lg:p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-rose-gold/10 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-rose-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @if($category->slug === 'rambut')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z"/>
                            @else
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                            @endif
                        </svg>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-charcoal">{{ $category->name }}</h3>
                </div>
                <div class="space-y-3">
                    @foreach($category->services as $service)
                    <div class="flex items-center justify-between py-2.5 border-b border-light-gray last:border-0">
                        <span class="text-sm text-charcoal">{{ $service->name }}</span>
                        <span class="text-sm font-semibold text-rose-gold whitespace-nowrap ml-4">{{ $service->formatted_price }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-8">
            <a href="https://wa.me/{{ setting('contact_wa_admin') }}?text={{ urlencode('Halo, saya ingin reservasi layanan salon di LKP Yuwita.') }}"
               target="_blank"
               class="inline-flex items-center gap-2 px-6 py-3 bg-[#25D366] text-white font-semibold rounded-full hover:bg-[#1da851] transition-all duration-300 hover:shadow-lg">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                Reservasi via WhatsApp
            </a>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- SECTION 6: MENGAPA MEMILIH KAMI --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-rose-gold/10 text-rose-gold text-xs font-semibold rounded-full mb-4 uppercase tracking-wider">Keunggulan</span>
            <h2 class="font-heading text-3xl lg:text-4xl font-bold text-charcoal">Mengapa Memilih Kami?</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $features = [
                ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>', 'title' => 'Pengajar Profesional', 'desc' => 'Pengajar dari kalangan dosen & praktisi berpengalaman di industri kecantikan.'],
                ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>', 'title' => 'Fasilitas Lengkap', 'desc' => 'Fasilitas praktek lengkap & up to date sesuai standar industri kecantikan.'],
                ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>', 'title' => 'Sertifikat Resmi', 'desc' => 'Sertifikat resmi & diakui nasional sebagai bukti kompetensi Anda.'],
                ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>', 'title' => 'Tersalurkan Kerja', 'desc' => 'Tersalurkan ke perusahaan lokal & nasional melalui jaringan mitra kami.'],
                ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>', 'title' => 'Kelas Beragam', 'desc' => 'Tersedia kelas reguler & khusus sesuai kebutuhan dan budget Anda.'],
                ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>', 'title' => 'Bimbingan Karir', 'desc' => 'Bimbingan hingga siap kerja atau memulai wirausaha di dunia kecantikan.'],
            ];
            @endphp
            @foreach($features as $feature)
            <div class="group bg-soft-cream rounded-2xl p-6 hover:bg-rose-gold hover:shadow-xl hover:shadow-rose-gold/20 transition-all duration-300">
                <div class="w-12 h-12 bg-rose-gold/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-white/20 transition-colors">
                    <svg class="w-6 h-6 text-rose-gold group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $feature['icon'] !!}</svg>
                </div>
                <h3 class="font-heading text-lg font-bold text-charcoal mb-2 group-hover:text-white transition-colors">{{ $feature['title'] }}</h3>
                <p class="text-sm text-dark-gray group-hover:text-white/80 transition-colors">{{ $feature['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- SECTION 7: GALERI PREVIEW --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-rose-gold/10 text-rose-gold text-xs font-semibold rounded-full mb-4 uppercase tracking-wider">Galeri</span>
            <h2 class="font-heading text-3xl lg:text-4xl font-bold text-charcoal">Galeri Kegiatan</h2>
        </div>

        @if($galleries->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach($galleries as $gallery)
            <div class="group relative aspect-square rounded-xl overflow-hidden cursor-pointer">
                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy">
                <div class="absolute inset-0 bg-charcoal/0 group-hover:bg-charcoal/50 transition-all duration-300 flex items-center justify-center">
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-center">
                        <svg class="w-8 h-8 text-white mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                        <p class="text-white text-sm font-medium">{{ $gallery->title }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @for($i = 0; $i < 6; $i++)
            <div class="aspect-square rounded-xl bg-gradient-to-br from-dusty-pink/20 to-rose-gold/10 flex items-center justify-center">
                <svg class="w-12 h-12 text-rose-gold/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            @endfor
        </div>
        @endif

        <div class="text-center mt-8">
            <a href="{{ url('/galeri') }}" class="inline-flex items-center gap-2 px-6 py-3 border-2 border-rose-gold text-rose-gold font-semibold rounded-full hover:bg-rose-gold hover:text-white transition-all duration-300">
                Lihat Semua Galeri
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- SECTION 8: TESTIMONI --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-rose-gold/10 text-rose-gold text-xs font-semibold rounded-full mb-4 uppercase tracking-wider">Testimoni</span>
            <h2 class="font-heading text-3xl lg:text-4xl font-bold text-charcoal">Kata Alumni & Pelanggan Kami</h2>
        </div>

        @if($testimonials->count() > 0)
        <div x-data="{ active: 0 }" class="relative">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($testimonials as $index => $testimonial)
                <div class="bg-soft-cream rounded-2xl p-6">
                    {{-- Stars --}}
                    <div class="flex items-center gap-1 mb-3">
                        @for($i = 1; $i <= 5; $i++)
                        <svg class="w-4 h-4 {{ $i <= $testimonial->rating ? 'text-amber-400' : 'text-medium-gray' }}" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>
                        @endfor
                    </div>
                    {{-- Quote --}}
                    <p class="text-sm text-dark-gray italic mb-4 line-clamp-4">"{{ $testimonial->content }}"</p>
                    {{-- Profile --}}
                    <div class="flex items-center gap-3">
                        @if($testimonial->photo)
                        <img src="{{ asset('storage/' . $testimonial->photo) }}" alt="{{ $testimonial->name }}" class="w-10 h-10 rounded-full object-cover" loading="lazy">
                        @else
                        <div class="w-10 h-10 rounded-full bg-rose-gold/20 flex items-center justify-center text-rose-gold font-bold text-sm">
                            {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                        </div>
                        @endif
                        <div>
                            <p class="text-sm font-semibold text-charcoal">{{ $testimonial->name }}</p>
                            <p class="text-xs text-dark-gray">
                                {{ $testimonial->type === 'alumni' ? 'Alumni' : 'Pelanggan' }}
                                @if($testimonial->program) — {{ $testimonial->program->name }} @endif
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        {{-- Placeholder --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @for($i = 0; $i < 3; $i++)
            <div class="bg-soft-cream rounded-2xl p-6">
                <div class="flex gap-1 mb-3">@for($j=0;$j<5;$j++)<svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>@endfor</div>
                <p class="text-sm text-dark-gray italic mb-4">"Testimoni dari alumni dan pelanggan akan tampil di sini."</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-rose-gold/20 flex items-center justify-center text-rose-gold font-bold text-sm">Y</div>
                    <div><p class="text-sm font-semibold text-charcoal">Alumni Yuwita</p><p class="text-xs text-dark-gray">Alumni Kelas Khusus</p></div>
                </div>
            </div>
            @endfor
        </div>
        @endif

        <div class="text-center mt-8">
            <a href="{{ url('/testimoni') }}" class="inline-flex items-center gap-2 text-rose-gold font-semibold hover:gap-3 transition-all duration-300">
                Lihat Semua Testimoni
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- SECTION 9: BLOG / ARTIKEL TERBARU --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-rose-gold/10 text-rose-gold text-xs font-semibold rounded-full mb-4 uppercase tracking-wider">Blog</span>
            <h2 class="font-heading text-3xl lg:text-4xl font-bold text-charcoal">Tips & Informasi Terbaru</h2>
        </div>

        @if($posts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
            <article class="group bg-white border border-light-gray rounded-2xl overflow-hidden hover:shadow-xl hover:shadow-charcoal/5 hover:-translate-y-1 transition-all duration-300">
                <div class="aspect-[16/10] bg-gradient-to-br from-dusty-pink/20 to-rose-gold/10 overflow-hidden">
                    @if($post->thumbnail)
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                    @else
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-rose-gold/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    </div>
                    @endif
                </div>
                <div class="p-5">
                    @if($post->category)
                    <span class="inline-block px-2.5 py-0.5 bg-rose-gold/10 text-rose-gold text-xs font-medium rounded-full mb-2">{{ $post->category }}</span>
                    @endif
                    <h3 class="font-heading text-lg font-bold text-charcoal mb-2 group-hover:text-rose-gold transition-colors line-clamp-2">{{ $post->title }}</h3>
                    <p class="text-sm text-dark-gray mb-4 line-clamp-2">{{ $post->excerpt }}</p>
                    <div class="flex items-center justify-between text-xs text-dark-gray">
                        <span>{{ $post->published_at?->format('d M Y') }}</span>
                        <a href="{{ url('/blog/' . $post->slug) }}" class="text-rose-gold font-medium hover:underline">Baca Selengkapnya</a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
        @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @for($i = 0; $i < 3; $i++)
            <div class="bg-white border border-light-gray rounded-2xl overflow-hidden">
                <div class="aspect-[16/10] bg-gradient-to-br from-dusty-pink/20 to-rose-gold/10 flex items-center justify-center">
                    <svg class="w-12 h-12 text-rose-gold/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </div>
                <div class="p-5">
                    <span class="inline-block px-2.5 py-0.5 bg-rose-gold/10 text-rose-gold text-xs font-medium rounded-full mb-2">Tips Kecantikan</span>
                    <h3 class="font-heading text-lg font-bold text-charcoal mb-2">Artikel akan segera hadir</h3>
                    <p class="text-sm text-dark-gray">Nantikan tips dan informasi menarik dari LKP Yuwita.</p>
                </div>
            </div>
            @endfor
        </div>
        @endif

        <div class="text-center mt-8">
            <a href="{{ url('/blog') }}" class="inline-flex items-center gap-2 px-6 py-3 border-2 border-rose-gold text-rose-gold font-semibold rounded-full hover:bg-rose-gold hover:text-white transition-all duration-300">
                Lihat Semua Artikel
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- SECTION 10: CTA BANNER --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative bg-gradient-to-r from-rose-gold to-rose-gold-dark rounded-3xl overflow-hidden px-6 sm:px-12 py-12 lg:py-16 text-center">
            {{-- Decorative --}}
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/2"></div>

            <div class="relative z-10">
                <h2 class="font-heading text-3xl lg:text-4xl font-bold text-white mb-4">
                    {{ setting('home_cta_text', 'Siap Memulai Karir di Dunia Kecantikan?') }}
                </h2>
                <p class="text-white/80 text-lg mb-8 max-w-xl mx-auto">
                    {{ setting('home_cta_subtext', 'Daftar sekarang dan dapatkan pelatihan kecantikan profesional bersertifikat resmi.') }}
                </p>
                <div class="flex flex-wrap items-center justify-center gap-4">
                    <a href="{{ url('/daftar') }}" class="inline-flex items-center gap-2 px-7 py-3.5 bg-white text-rose-gold font-semibold rounded-full hover:bg-soft-cream transition-all duration-300 hover:shadow-lg active:scale-95">
                        Daftar Sekarang
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="{{ url('/kontak') }}" class="inline-flex items-center gap-2 px-7 py-3.5 bg-transparent text-white font-semibold rounded-full border-2 border-white/40 hover:bg-white/10 transition-all duration-300 active:scale-95">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- SECTION 11: MITRA / LOGO PARTNER --}}
{{-- ============================================= --}}
<section class="py-12 lg:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <p class="text-sm font-medium text-dark-gray uppercase tracking-wider">Telah Bekerja Sama Dengan</p>
        </div>
        <div class="flex flex-wrap items-center justify-center gap-8 lg:gap-12">
            {{-- Placeholder mitra logos --}}
            @for($i = 0; $i < 5; $i++)
            <div class="w-24 h-12 bg-light-gray rounded-lg flex items-center justify-center opacity-50 hover:opacity-100 transition-opacity duration-300">
                <span class="text-xs text-dark-gray font-medium">Mitra {{ $i + 1 }}</span>
            </div>
            @endfor
        </div>
    </div>
</section>

@endsection
