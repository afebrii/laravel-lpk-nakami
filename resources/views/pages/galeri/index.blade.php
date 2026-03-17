@extends('layouts.app')

@section('title', 'Galeri Kegiatan — LPK Nakami Indonesia')
@section('meta_description', 'Dokumentasi kegiatan pelatihan bahasa Jepang, tes wawancara, dan momen keberangkatan siswa LPK Nakami Indonesia.')

@section('content')

{{-- ============================================= --}}
{{-- HERO SECTION GALERI --}}
{{-- ============================================= --}}
<section class="relative bg-[#111111] overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-t from-[#111111] via-[#111111]/90 to-[#111111]/50 mix-blend-multiply z-0"></div>
    <div class="absolute right-[-5%] top-[5%] text-[300px] leading-none font-jp text-white/5 select-none pointer-events-none z-0 hidden md:block">
        思
    </div>
    <div class="nakami-divider absolute bottom-0 left-0 right-0 z-10"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 z-10">
        @include('components.breadcrumb', ['items' => [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Galeri']
        ]])
        
        <div class="flex items-center gap-3 mb-4 mt-4">
            <span class="w-12 h-px bg-[#C0001E]"></span>
            <span class="text-[#C0001E] text-xs font-bold uppercase tracking-widest">Nakami Indonesia • Galeri</span>
        </div>

        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4">
            Galeri Kegiatan
        </h1>
        <p class="text-lg text-white/70 max-w-2xl">
            Kumpulan momen berharga, mulai dari proses pelatihan bahasa, seleksi wawancara (mensetsu), hingga pelepasan keberangkatan ke Jepang.
        </p>
    </div>
</section>

{{-- ============================================= --}}
{{-- FILTER & GALLERY GRID --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24 bg-[#F9F5F2]"
         x-data="{
             activeFilter: 'semua',
             lightbox: false,
             lightboxSrc: '',
             lightboxTitle: ''
         }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Category Filter --}}
        @if($categories->count() > 0)
        <div class="flex justify-center mb-12">
            <div class="flex flex-wrap justify-center gap-2">
                <button @click="activeFilter = 'semua'"
                        :class="activeFilter === 'semua' ? 'bg-[#111111] text-white shadow-md' : 'bg-white text-[#6B7280] hover:text-[#111111] border border-[#E5E7EB]'"
                        class="px-5 py-2 text-sm font-semibold rounded-full transition-all duration-300">
                    Semua Foto
                </button>
                @foreach($categories as $cat)
                <button @click="activeFilter = '{{ $cat }}'"
                        :class="activeFilter === '{{ $cat }}' ? 'bg-[#111111] text-white shadow-md' : 'bg-white text-[#6B7280] hover:text-[#111111] border border-[#E5E7EB]'"
                        class="px-5 py-2 text-sm font-semibold rounded-full transition-all duration-300">
                    {{ $cat }}
                </button>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Gallery Grid --}}
        @if($galleries->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
            @foreach($galleries as $gallery)
            <div x-show="activeFilter === 'semua' || activeFilter === '{{ $gallery->category }}'"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="group relative aspect-square bg-[#1E1E1E] rounded-xl overflow-hidden cursor-pointer shadow-sm hover:shadow-xl hover:shadow-red-900/10 transition-shadow duration-300"
                 @click="lightbox = true; lightboxSrc = '{{ asset('media/' . $gallery->image) }}'; lightboxTitle = '{{ addslashes($gallery->title) }}'">
                 
                {{-- Decorative frame line --}}
                <div class="absolute inset-2 border border-white/0 group-hover:border-white/20 z-10 pointer-events-none transition-colors duration-500"></div>

                <img src="{{ asset('media/' . $gallery->image) }}"
                     alt="{{ $gallery->title }}"
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                     loading="lazy">
                     
                <div class="absolute inset-0 bg-gradient-to-t from-[#111111]/90 via-[#111111]/40 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex flex-col justify-end p-4">
                    <div class="translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                        <span class="inline-block px-2 py-0.5 bg-[#C0001E] text-white text-[10px] font-bold uppercase tracking-wider rounded mb-2">
                            {{ $gallery->category }}
                        </span>
                        <p class="text-white text-sm font-bold line-clamp-2 leading-tight">{{ $gallery->title }}</p>
                    </div>
                </div>
                
                {{-- Expand Icon --}}
                <div class="absolute top-4 right-4 w-8 h-8 rounded-full bg-[#111111]/50 backdrop-blur-sm flex items-center justify-center text-white opacity-0 group-hover:opacity-100 scale-50 group-hover:scale-100 transition-all duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-12 flex justify-center">
            {{ $galleries->links() }}
        </div>
        
        @else
        <div class="py-20 text-center">
             <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center mx-auto mb-4 shadow-sm border border-[#E5E7EB]">
                <svg class="w-6 h-6 text-[#6B7280]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <p class="font-heading font-bold text-[#111111] text-lg mb-1">Belum Ada Foto</p>
            <p class="text-[#6B7280] text-sm">Galeri foto kegiatan akan segera diperbarui.</p>
        </div>
        @endif
    </div>

    {{-- Lightbox Modal --}}
    <div x-show="lightbox"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex flex-col items-center justify-center bg-[#111111]/95 backdrop-blur-sm p-4 sm:p-8"
         @click.self="lightbox = false"
         @keydown.escape.window="lightbox = false"
         x-cloak>
         
        <button @click="lightbox = false" class="absolute top-6 right-6 w-12 h-12 bg-white/10 hover:bg-[#C0001E] text-white rounded-full flex items-center justify-center transition-colors duration-300 z-10">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        
        <div class="max-w-5xl w-full relative flex flex-col items-center" x-transition:enter="transition ease-out duration-300 delay-100" x-transition:enter-start="scale-95 opacity-0 translate-y-4" x-transition:enter-end="scale-100 opacity-100 translate-y-0">
            <div class="relative bg-[#1E1E1E] p-2 rounded-xl shadow-2xl">
                <img :src="lightboxSrc" :alt="lightboxTitle" class="w-full max-h-[75vh] object-contain rounded-lg border border-white/5">
            </div>
            <div class="mt-6 text-center max-w-2xl bg-black/50 px-6 py-3 rounded-full backdrop-blur-md border border-white/10">
                <p class="text-white font-medium text-sm md:text-base" x-text="lightboxTitle"></p>
            </div>
        </div>
    </div>
</section>

@endsection
