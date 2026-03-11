@extends('layouts.app')

@section('title', 'Program Pelatihan — ' . setting('site_name', 'LKP Yuwita'))
@section('meta_description', 'Daftar program pelatihan kecantikan di LKP/LPK Yuwita. Tersedia kelas reguler dan khusus dengan sertifikat resmi.')

@section('content')

{{-- ============================================= --}}
{{-- HERO SECTION --}}
{{-- ============================================= --}}
<section class="relative bg-gradient-to-br from-charcoal via-charcoal to-rose-gold-dark overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-72 h-72 bg-rose-gold rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-dusty-pink rounded-full blur-3xl"></div>
    </div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E')] opacity-50"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        @include('components.breadcrumb', ['items' => [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Program Pelatihan']
        ]])
        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4">
            Program Pelatihan Kami
        </h1>
        <p class="text-lg text-white/75 max-w-2xl">
            Pilih program pelatihan kecantikan terbaik sesuai kebutuhan Anda. Semua program dilengkapi sertifikat resmi yang diakui secara nasional.
        </p>
    </div>
</section>

{{-- ============================================= --}}
{{-- CATEGORY EXPLANATION --}}
{{-- ============================================= --}}
<section class="relative -mt-8 z-10">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-white rounded-2xl shadow-xl shadow-charcoal/5 p-6">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <h3 class="font-heading text-lg font-bold text-charcoal">Kelas Reguler</h3>
                </div>
                <p class="text-sm text-dark-gray leading-relaxed">Program pelatihan dasar dengan durasi lebih singkat dan biaya terjangkau. Cocok untuk pemula yang ingin mempelajari dasar-dasar kecantikan.</p>
            </div>
            <div class="bg-white rounded-2xl shadow-xl shadow-charcoal/5 p-6">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 bg-rose-gold/10 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-rose-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                    </div>
                    <h3 class="font-heading text-lg font-bold text-charcoal">Kelas Khusus</h3>
                </div>
                <p class="text-sm text-dark-gray leading-relaxed">Program pelatihan intensif dan komprehensif bersertifikat resmi. Dirancang untuk menghasilkan tenaga profesional siap kerja di industri kecantikan.</p>
            </div>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- FILTER & PROGRAM GRID --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"
         x-data="{
             activeTab: '{{ request('kategori', 'semua') }}',
             search: '',
             get filteredPrograms() { return true; }
         }">

        {{-- Filter Bar --}}
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-10">
            {{-- Tabs --}}
            <div class="inline-flex bg-light-gray rounded-full p-1 gap-1">
                <button @click="activeTab = 'semua'"
                        :class="activeTab === 'semua' ? 'bg-rose-gold text-white shadow-md' : 'text-dark-gray hover:text-charcoal'"
                        class="px-5 py-2 text-sm font-medium rounded-full transition-all duration-300">
                    Semua
                </button>
                @foreach($categories as $cat)
                <button @click="activeTab = '{{ $cat->type }}'"
                        :class="activeTab === '{{ $cat->type }}' ? 'bg-rose-gold text-white shadow-md' : 'text-dark-gray hover:text-charcoal'"
                        class="px-5 py-2 text-sm font-medium rounded-full transition-all duration-300">
                    {{ $cat->name }}
                </button>
                @endforeach
            </div>

            {{-- Search --}}
            <div class="relative w-full sm:w-72">
                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-dark-gray/50 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" x-model="search" placeholder="Cari program..."
                       class="w-full pl-11 pr-5 py-3 bg-white border border-medium-gray rounded-full text-sm leading-none focus:outline-none focus:ring-2 focus:ring-rose-gold/30 focus:border-rose-gold transition-all">
            </div>
        </div>

        {{-- Program Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($programs as $program)
            <div x-show="(activeTab === 'semua' || activeTab === '{{ $program->category->type }}') && (search === '' || '{{ strtolower($program->name) }}'.includes(search.toLowerCase()))"
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
                    {{-- Status Badge --}}
                    @if($program->status === 'coming_soon')
                    <span class="absolute top-3 right-3 px-3 py-1 text-xs font-semibold rounded-full bg-amber-500 text-white">
                        Segera Hadir
                    </span>
                    @endif
                </div>
                {{-- Content --}}
                <div class="p-5">
                    <h3 class="font-heading text-lg font-bold text-charcoal mb-2 group-hover:text-rose-gold transition-colors">
                        {{ $program->name }}
                    </h3>
                    <p class="text-sm text-dark-gray mb-4 line-clamp-2">{{ $program->short_description }}</p>

                    {{-- Meta Info --}}
                    <div class="flex items-center gap-4 text-xs text-dark-gray mb-4">
                        @if($program->duration)
                        <span class="inline-flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ $program->duration }}
                        </span>
                        @endif
                        @if($program->quota)
                        <span class="inline-flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            Kuota {{ $program->quota }} orang
                        </span>
                        @endif
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-lg font-bold {{ $program->is_free ? 'text-emerald-600' : 'text-rose-gold' }}">
                            {{ $program->formatted_price }}
                        </span>
                        <a href="{{ route('program.show', $program->slug) }}" class="inline-flex items-center gap-1 text-sm font-medium text-rose-gold hover:gap-2 transition-all duration-200">
                            Detail
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Empty State --}}
        <div x-show="document.querySelectorAll('[x-show]:not([style*=\'display: none\'])').length === 0" class="text-center py-12" x-cloak>
            <svg class="w-16 h-16 text-rose-gold/30 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <p class="text-dark-gray">Program tidak ditemukan.</p>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- CTA KONSULTASI BANNER --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative bg-gradient-to-r from-rose-gold to-rose-gold-dark rounded-3xl overflow-hidden px-6 sm:px-12 py-12 lg:py-16 text-center">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/2"></div>

            <div class="relative z-10">
                <h2 class="font-heading text-3xl lg:text-4xl font-bold text-white mb-4">
                    Bingung Memilih Program?
                </h2>
                <p class="text-white/80 text-lg mb-8 max-w-xl mx-auto">
                    Konsultasikan kebutuhan pelatihan Anda secara gratis bersama tim kami melalui WhatsApp.
                </p>
                <a href="https://wa.me/{{ setting('contact_wa_admin') }}?text={{ urlencode('Halo, saya ingin konsultasi mengenai program pelatihan di LKP Yuwita.') }}"
                   target="_blank"
                   class="inline-flex items-center gap-2 px-7 py-3.5 bg-white text-rose-gold font-semibold rounded-full hover:bg-soft-cream transition-all duration-300 hover:shadow-lg active:scale-95">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                    Konsultasi Gratis via WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
