@extends('layouts.app')

@section('title', 'Lowongan Kerja Jepang — LPK Nakami')
@section('meta_description', 'Informasi lowongan kerja terbaru di Jepang program Ginou Jisshusei, Tokutei Ginou, dan Engineering dari LPK Nakami Indonesia.')

@section('content')

{{-- HERO SECTION --}}
<section class="relative bg-[#111111] overflow-hidden">
    {{-- Background & Overlay --}}
    <div class="absolute inset-0">
        @if(setting('site_about_image'))
            <img src="{{ asset('media/' . setting('site_about_image')) }}" alt="Hero Background" class="w-full h-full object-cover opacity-30 mix-blend-luminosity">
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-[#111111] via-[#111111]/90 to-[#111111]/50 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#111111] via-[#111111]/80 to-transparent"></div>
    </div>
    <div class="nakami-divider absolute bottom-0 left-0 right-0 z-10"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-16 lg:pt-40 lg:pb-24 z-10">
        @include('components.breadcrumb', ['items' => [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Lowongan Kerja']
        ]])
        <div class="flex items-center gap-3 mb-4 mt-4">
            <span class="w-12 h-px bg-[#C0001E]"></span>
            <span class="text-[#C0001E] text-xs font-bold uppercase tracking-widest">Nakami Indonesia</span>
        </div>
        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4 mt-4">
            Lowongan Kerja Jepang
        </h1>
        <p class="text-lg text-white/70 max-w-2xl">
            Raih kesempatan bekerja di Jepang melalui program resmi dan terpercaya bersama LPK Nakami.
        </p>
    </div>
</section>

{{-- LOWONGAN LISTING --}}
<section class="py-16 lg:py-24 bg-[#F9F5F2]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Filter Bar --}}
        <div class="bg-white p-4 rounded-xl border border-[#E5E7EB] shadow-sm mb-12">
            <form action="{{ route('lowongan.index') }}" method="GET" class="flex flex-col md:flex-row gap-4 items-end">
                <div class="flex-1 w-full">
                    <label class="block text-xs font-bold text-[#111111] uppercase tracking-wider mb-2">Program</label>
                    <select name="program" class="w-full px-4 py-3 bg-[#F9F5F2] border border-[#E5E7EB] rounded-lg text-sm focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#C0001E]">
                        <option value="">Semua Program</option>
                        <option value="Ginou Jisshusei" {{ request('program') == 'Ginou Jisshusei' ? 'selected' : '' }}>Ginou Jisshusei</option>
                        <option value="Tokutei Ginou" {{ request('program') == 'Tokutei Ginou' ? 'selected' : '' }}>Tokutei Ginou</option>
                        <option value="Engineering" {{ request('program') == 'Engineering' ? 'selected' : '' }}>Engineering</option>
                    </select>
                </div>
                <div class="flex-1 w-full">
                    <label class="block text-xs font-bold text-[#111111] uppercase tracking-wider mb-2">Lokasi (Prefektur)</label>
                    <input type="text" name="lokasi" value="{{ request('lokasi') }}" placeholder="Contoh: Aichi..." 
                           class="w-full px-4 py-3 bg-[#F9F5F2] border border-[#E5E7EB] rounded-lg text-sm focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#C0001E]">
                </div>
                <div class="w-full md:w-auto">
                    <button type="submit" class="w-full md:w-auto px-8 py-3 bg-[#111111] hover:bg-[#C0001E] text-white font-semibold rounded-lg transition-colors text-sm">
                        Cari Lowongan
                    </button>
                </div>
                @if(request()->hasAny(['program', 'lokasi']))
                <div class="w-full md:w-auto">
                    <a href="{{ route('lowongan.index') }}" class="block text-center w-full md:w-auto px-6 py-3 bg-[#E5E7EB] hover:bg-gray-300 text-[#111111] font-semibold rounded-lg transition-colors text-sm">
                        Reset
                    </a>
                </div>
                @endif
            </form>
        </div>

        {{-- Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($lowongans as $lowongan)
            <div class="group bg-white border border-[#E5E7EB] rounded-2xl overflow-hidden hover:border-[#C0001E]/30 hover:shadow-xl transition-all duration-300 flex flex-col">
                {{-- Banner/Images --}}
                <div class="aspect-[16/10] bg-[#1E1E1E] relative overflow-hidden">
                    @if($lowongan->gambar)
                        <img src="{{ asset('media/' . $lowongan->gambar) }}" alt="{{ $lowongan->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <span class="font-jp text-[80px] text-[#C0001E]/20 select-none">働</span>
                        </div>
                    @endif
                    
                    {{-- Badges --}}
                    <div class="absolute top-4 left-4 flex flex-col gap-2">
                        <span class="bg-[#C0001E] text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1.5 rounded-lg shadow-md">
                            {{ $lowongan->program }}
                        </span>
                    </div>
                </div>

                {{-- Card Content --}}
                <div class="p-6 flex flex-col flex-1">
                    <div class="flex items-center gap-2 mb-3 text-xs font-semibold text-[#6B7280] uppercase tracking-wider">
                        <svg class="w-4 h-4 text-[#C0001E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        {{ $lowongan->lokasi }}
                    </div>

                    <h3 class="font-heading text-xl font-bold text-[#111111] mb-4 group-hover:text-[#C0001E] transition-colors leading-tight">
                        <a href="{{ route('lowongan.show', $lowongan->slug) }}" class="focus:outline-none">
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            {{ $lowongan->judul }}
                        </a>
                    </h3>

                    <p class="text-sm text-[#6B7280] line-clamp-2 mb-6 flex-1">
                        {{ $lowongan->deskripsi_pekerjaan }}
                    </p>

                    <div class="mt-auto pt-4 border-t border-[#F3F4F6] flex items-center justify-between">
                        <span class="text-xs text-[#6B7280] font-medium">Diposting: {{ $lowongan->created_at->diffForHumans() }}</span>
                        <span class="text-sm font-bold text-[#C0001E] flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                            Detail <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-16 text-center bg-white rounded-2xl border border-[#E5E7EB]">
                <div class="inline-flex w-16 h-16 bg-[#F9F5F2] text-[#C0001E] rounded-full justify-center items-center mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="font-heading text-xl font-bold text-[#111111] mb-2">Belum Ada Lowongan</h3>
                <p class="text-[#6B7280]">Maaf, saat ini belum ada lowongan kerja yang tersedia. Silakan cek kembali nanti.</p>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if($lowongans->hasPages())
        <div class="mt-12">
            {{ $lowongans->links('vendor.pagination.tailwind') }}
        </div>
        @endif
    </div>
</section>

@endsection
