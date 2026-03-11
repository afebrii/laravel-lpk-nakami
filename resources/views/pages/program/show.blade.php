@extends('layouts.app')

@section('title', $program->meta_title ?: $program->name . ' — ' . setting('site_name', 'LKP Yuwita'))
@section('meta_description', $program->meta_description ?: $program->short_description)

@section('content')

{{-- ============================================= --}}
{{-- HEADER / BANNER --}}
{{-- ============================================= --}}
<section class="relative bg-gradient-to-br from-charcoal via-charcoal to-rose-gold-dark overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-72 h-72 bg-rose-gold rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-dusty-pink rounded-full blur-3xl"></div>
    </div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E')] opacity-50"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
        @include('components.breadcrumb', ['items' => [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Program Pelatihan', 'url' => '/program'],
            ['label' => $program->name]
        ]])
        <div class="flex flex-wrap items-center gap-3 mb-4">
            <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $program->category->type === 'reguler' ? 'bg-emerald-500 text-white' : 'bg-rose-gold-light text-white' }}">
                {{ $program->category->name }}
            </span>
            @if($program->status === 'coming_soon')
            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-amber-500 text-white">Segera Hadir</span>
            @endif
        </div>
        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4">
            {{ $program->name }}
        </h1>
        <p class="text-lg text-white/75 max-w-2xl mb-6">{{ $program->short_description }}</p>
        <div class="flex flex-wrap items-center gap-6 text-white/80 text-sm">
            @if($program->duration)
            <span class="inline-flex items-center gap-2">
                <svg class="w-5 h-5 text-dusty-pink" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ $program->duration }}
            </span>
            @endif
            @if($program->quota)
            <span class="inline-flex items-center gap-2">
                <svg class="w-5 h-5 text-dusty-pink" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Kuota {{ $program->quota }} orang
            </span>
            @endif
            <span class="inline-flex items-center gap-2 text-lg font-bold {{ $program->is_free ? 'text-emerald-400' : 'text-dusty-pink' }}">
                {{ $program->formatted_price }}
            </span>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- MAIN CONTENT --}}
{{-- ============================================= --}}
<section class="py-12 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
            {{-- Left: Main Content --}}
            <div class="lg:col-span-2 space-y-12">

                {{-- Thumbnail --}}
                @if($program->thumbnail)
                <div class="aspect-[16/9] rounded-2xl overflow-hidden">
                    <img src="{{ asset('storage/' . $program->thumbnail) }}" alt="{{ $program->name }}" class="w-full h-full object-cover">
                </div>
                @endif

                {{-- Deskripsi Program --}}
                <div>
                    <h2 class="font-heading text-2xl font-bold text-charcoal mb-4 flex items-center gap-3">
                        <span class="w-8 h-8 bg-rose-gold/10 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-rose-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </span>
                        Deskripsi Program
                    </h2>
                    <div class="prose prose-sm max-w-none text-dark-gray leading-relaxed">
                        {!! $program->description !!}
                    </div>
                </div>

                {{-- Kurikulum / Silabus --}}
                @if($program->curriculum)
                <div>
                    <h2 class="font-heading text-2xl font-bold text-charcoal mb-4 flex items-center gap-3">
                        <span class="w-8 h-8 bg-rose-gold/10 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-rose-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </span>
                        Kurikulum & Silabus
                    </h2>
                    <div x-data="{ openModule: 0 }" class="space-y-3">
                        @php
                            $modules = array_filter(array_map('trim', preg_split('/\n(?=\d+\.|Modul|BAB|Bab)/i', strip_tags($program->curriculum))));
                            if (count($modules) <= 1) $modules = array_filter(array_map('trim', explode("\n", strip_tags($program->curriculum))));
                        @endphp
                        @foreach($modules as $index => $module)
                        <div class="bg-white border border-light-gray rounded-xl overflow-hidden">
                            <button @click="openModule = openModule === {{ $index }} ? -1 : {{ $index }}"
                                    class="w-full flex items-center justify-between px-5 py-4 text-left hover:bg-soft-cream transition-colors">
                                <span class="text-sm font-semibold text-charcoal">{{ $module }}</span>
                                <svg class="w-5 h-5 text-rose-gold transition-transform duration-300"
                                     :class="openModule === {{ $index }} ? 'rotate-180' : ''"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div x-show="openModule === {{ $index }}"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 -translate-y-2"
                                 x-transition:enter-end="opacity-100 translate-y-0"
                                 x-cloak
                                 class="px-5 pb-4 text-sm text-dark-gray leading-relaxed border-t border-light-gray pt-3">
                                Materi pembelajaran untuk {{ $module }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Fasilitas --}}
                @if($program->facilities)
                <div>
                    <h2 class="font-heading text-2xl font-bold text-charcoal mb-4 flex items-center gap-3">
                        <span class="w-8 h-8 bg-rose-gold/10 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-rose-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        </span>
                        Fasilitas
                    </h2>
                    <div class="prose prose-sm max-w-none text-dark-gray leading-relaxed">
                        {!! $program->facilities !!}
                    </div>
                </div>
                @endif

                {{-- Persyaratan --}}
                @if($program->requirements)
                <div>
                    <h2 class="font-heading text-2xl font-bold text-charcoal mb-4 flex items-center gap-3">
                        <span class="w-8 h-8 bg-rose-gold/10 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-rose-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                        </span>
                        Persyaratan Pendaftaran
                    </h2>
                    <div class="prose prose-sm max-w-none text-dark-gray leading-relaxed">
                        {!! $program->requirements !!}
                    </div>
                </div>
                @endif

                {{-- Testimoni Alumni --}}
                @if($program->testimonials->count() > 0)
                <div>
                    <h2 class="font-heading text-2xl font-bold text-charcoal mb-6 flex items-center gap-3">
                        <span class="w-8 h-8 bg-rose-gold/10 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-rose-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        </span>
                        Kata Alumni
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($program->testimonials as $testimonial)
                        <div class="bg-soft-cream rounded-2xl p-5">
                            <div class="flex items-center gap-1 mb-3">
                                @for($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 {{ $i <= $testimonial->rating ? 'text-amber-400' : 'text-medium-gray' }}" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>
                                @endfor
                            </div>
                            <p class="text-sm text-dark-gray italic mb-4 line-clamp-4">"{{ $testimonial->content }}"</p>
                            <div class="flex items-center gap-3">
                                @if($testimonial->photo)
                                <img src="{{ asset('storage/' . $testimonial->photo) }}" alt="{{ $testimonial->name }}" class="w-10 h-10 rounded-full object-cover">
                                @else
                                <div class="w-10 h-10 rounded-full bg-rose-gold/20 flex items-center justify-center text-rose-gold font-bold text-sm">
                                    {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                                </div>
                                @endif
                                <div>
                                    <p class="text-sm font-semibold text-charcoal">{{ $testimonial->name }}</p>
                                    <p class="text-xs text-dark-gray">Alumni</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            {{-- Right: Sidebar --}}
            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">
                    {{-- Info Card --}}
                    <div class="bg-white border border-light-gray rounded-2xl p-6 shadow-sm">
                        <h3 class="font-heading text-lg font-bold text-charcoal mb-4">Informasi Program</h3>
                        <div class="space-y-3">
                            @if($program->duration)
                            <div class="flex items-center justify-between py-2 border-b border-light-gray">
                                <span class="text-sm text-dark-gray">Durasi</span>
                                <span class="text-sm font-semibold text-charcoal">{{ $program->duration }}</span>
                            </div>
                            @endif
                            @if($program->schedule)
                            <div class="flex items-center justify-between py-2 border-b border-light-gray">
                                <span class="text-sm text-dark-gray">Jadwal</span>
                                <span class="text-sm font-semibold text-charcoal">{{ $program->schedule }}</span>
                            </div>
                            @endif
                            @if($program->quota)
                            <div class="flex items-center justify-between py-2 border-b border-light-gray">
                                <span class="text-sm text-dark-gray">Kuota</span>
                                <span class="text-sm font-semibold text-charcoal">{{ $program->quota }} orang</span>
                            </div>
                            @endif
                            <div class="flex items-center justify-between py-2 border-b border-light-gray">
                                <span class="text-sm text-dark-gray">Kategori</span>
                                <span class="text-sm font-semibold text-charcoal">{{ $program->category->name }}</span>
                            </div>
                            <div class="flex items-center justify-between py-2">
                                <span class="text-sm text-dark-gray">Biaya</span>
                                <span class="text-lg font-bold {{ $program->is_free ? 'text-emerald-600' : 'text-rose-gold' }}">
                                    {{ $program->formatted_price }}
                                </span>
                            </div>
                        </div>

                        {{-- CTA Buttons --}}
                        <div class="mt-6 space-y-3">
                            <a href="{{ url('/daftar') }}"
                               class="flex items-center justify-center gap-2 w-full px-5 py-3 bg-rose-gold text-white font-semibold rounded-full hover:bg-rose-gold-dark transition-all duration-300 hover:shadow-lg hover:shadow-rose-gold/25 active:scale-95">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                Daftar Sekarang
                            </a>
                            <a href="https://wa.me/{{ setting('contact_wa_admin') }}?text={{ urlencode('Halo, saya tertarik dengan program ' . $program->name . ' di LKP Yuwita. Bisa minta info lebih lanjut?') }}"
                               target="_blank"
                               class="flex items-center justify-center gap-2 w-full px-5 py-3 bg-[#25D366] text-white font-semibold rounded-full hover:bg-[#1da851] transition-all duration-300 hover:shadow-lg active:scale-95">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                                Tanya via WhatsApp
                            </a>
                        </div>
                    </div>

                    {{-- Share --}}
                    <div class="bg-white border border-light-gray rounded-2xl p-6 shadow-sm">
                        <h4 class="text-sm font-semibold text-charcoal mb-3">Bagikan Program</h4>
                        <div class="flex items-center gap-2">
                            <a href="https://wa.me/?text={{ urlencode($program->name . ' - ' . url()->current()) }}"
                               target="_blank"
                               class="w-9 h-9 bg-[#25D366] rounded-full flex items-center justify-center text-white hover:opacity-80 transition-opacity">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                               target="_blank"
                               class="w-9 h-9 bg-[#1877F2] rounded-full flex items-center justify-center text-white hover:opacity-80 transition-opacity">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                            <button onclick="navigator.clipboard.writeText('{{ url()->current() }}'); this.querySelector('span').textContent = 'Tersalin!'; setTimeout(() => this.querySelector('span').textContent = 'Salin', 2000)"
                                    class="inline-flex items-center gap-1.5 px-3 py-2 bg-light-gray rounded-full text-xs font-medium text-charcoal hover:bg-medium-gray transition-colors">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                                <span>Salin</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ============================================= --}}
{{-- STICKY MOBILE CTA --}}
{{-- ============================================= --}}
<div class="fixed bottom-0 left-0 right-0 z-40 lg:hidden bg-white border-t border-light-gray shadow-[0_-4px_12px_rgba(0,0,0,0.05)] px-4 py-3 safe-area-bottom">
    <div class="flex items-center gap-3">
        <div class="flex-1">
            <p class="text-xs text-dark-gray">Biaya Program</p>
            <p class="text-lg font-bold {{ $program->is_free ? 'text-emerald-600' : 'text-rose-gold' }}">{{ $program->formatted_price }}</p>
        </div>
        <a href="{{ url('/daftar') }}"
           class="inline-flex items-center gap-2 px-6 py-3 bg-rose-gold text-white font-semibold rounded-full hover:bg-rose-gold-dark transition-all active:scale-95">
            Daftar Sekarang
        </a>
    </div>
</div>

{{-- Bottom padding for sticky CTA on mobile --}}
<div class="h-20 lg:h-0"></div>

@endsection
