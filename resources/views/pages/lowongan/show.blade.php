@extends('layouts.app')

@section('title', $lowongan->judul . ' — Lowongan Kerja Jepang')
@section('meta_description', Str::limit(strip_tags($lowongan->deskripsi_pekerjaan), 150))

@section('content')

{{-- BREADCRUMB HEADER --}}
<div class="bg-[#111111] pt-24 pb-12 overflow-hidden relative">
    {{-- Background & Overlay --}}
    <div class="absolute inset-0">
        @if(setting('site_about_image'))
            <img src="{{ asset('media/' . setting('site_about_image')) }}" alt="Hero Background" class="w-full h-full object-cover opacity-20 mix-blend-luminosity">
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-[#111111] via-[#111111]/90 to-[#111111]/50 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#111111] via-[#111111]/80 to-transparent"></div>
    </div>
    {{-- Kanji Watermark --}}
    <div class="absolute right-[5%] top-[10%] text-[150px] leading-none font-jp text-white/5 select-none pointer-events-none z-0 hidden md:block">
        働
    </div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex items-center gap-3 mb-4">
            <span class="w-12 h-px bg-[#C0001E]"></span>
            <span class="text-[#C0001E] text-xs font-bold uppercase tracking-widest">Nakami Indonesia</span>
        </div>
        @include('components.breadcrumb', ['items' => [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Lowongan', 'url' => route('lowongan.index')],
            ['label' => Str::limit($lowongan->judul, 30)]
        ]])
    </div>
</div>

{{-- DETAIL KONTEN --}}
<section class="py-12 bg-[#F9F5F2] min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-2xl border border-[#E5E7EB] overflow-hidden shadow-sm">
            @if($lowongan->gambar)
            <div class="w-full aspect-[21/9] md:aspect-[3/1] bg-[#1E1E1E]">
                <img src="{{ asset('media/' . $lowongan->gambar) }}" alt="{{ $lowongan->judul }}" class="w-full h-full object-cover">
            </div>
            @endif

            <div class="p-6 md:p-10">
                <div class="flex flex-wrap gap-2 mb-6">
                    <span class="bg-[#C0001E] text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1.5 rounded-lg">
                        {{ $lowongan->program }}
                    </span>
                    <span class="bg-[#F3F4F6] text-[#6B7280] flex items-center gap-1 text-[10px] font-bold uppercase tracking-wider px-3 py-1.5 rounded-lg border border-[#E5E7EB]">
                        <svg class="w-3 h-3 text-[#C0001E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg> 
                        {{ $lowongan->lokasi }}
                    </span>
                    <span class="bg-[#F3F4F6] text-[#111111] text-[10px] font-bold uppercase tracking-wider px-3 py-1.5 rounded-lg border border-[#E5E7EB]">
                        Diposting: {{ $lowongan->created_at->format('d M Y') }}
                    </span>
                </div>

                <h1 class="font-heading text-3xl md:text-4xl font-bold text-[#111111] leading-tight mb-8">
                    {{ $lowongan->judul }}
                </h1>

                <div class="prose prose-lg prose-[#111111] max-w-none mb-10">
                    <h3 class="font-heading text-xl font-bold text-[#C0001E]">Deskripsi Pekerjaan</h3>
                    <div class="text-[#4B5563] whitespace-pre-line text-base mb-8">{!! nl2br(e($lowongan->deskripsi_pekerjaan)) !!}</div>

                    @if($lowongan->persyaratan)
                    <h3 class="font-heading text-xl font-bold text-[#C0001E]">Kualifikasi / Persyaratan</h3>
                    <div class="text-[#4B5563] whitespace-pre-line text-base">{!! nl2br(e($lowongan->persyaratan)) !!}</div>
                    @endif
                </div>

                <div class="pt-8 border-t border-[#E5E7EB] flex flex-col sm:flex-row items-center gap-4">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('contact_phone', '6281931646314')) }}?text=Halo%20LPK%20Nakami,%20saya%20tertarik%20dengan%20Lowongan%20Kerja%20Jepang%20untuk%20{{ urlencode($lowongan->judul) }}" 
                       target="_blank" rel="noopener"
                       class="w-full sm:w-auto px-8 py-3.5 bg-[#25D366] hover:bg-[#1DA851] text-white font-bold rounded-lg transition-all duration-300 flex items-center justify-center gap-2 shadow-lg shadow-[#25D366]/30">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.66 1.438 5.168L2 22l4.832-1.438A9.955 9.955 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2zm0 18a8 8 0 01-4.27-1.23l-.27-.16-2.87.85.85-2.87-.16-.27A8 8 0 1112 20z"/></svg>
                        Hubungi via WhatsApp
                    </a>
                    <a href="{{ route('lowongan.index') }}" class="w-full sm:w-auto px-8 py-3.5 bg-white border border-[#E5E7EB] hover:bg-[#F9F5F2] text-[#111111] font-bold rounded-lg transition-colors text-center">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
