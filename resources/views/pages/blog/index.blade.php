@extends('layouts.app')

@section('title', 'Blog & Artikel — LPK Nakami Indonesia')
@section('meta_description', 'Baca artikel terbaru, panduan belajar bahasa Jepang, info program magang, berita, dan tips sukses dari LPK Nakami Indonesia.')

@section('content')

{{-- ============================================= --}}
{{-- HERO SECTION NAKAMI --}}
{{-- ============================================= --}}
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

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 z-10">
        @include('components.breadcrumb', ['items' => [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Blog']
        ]])
        
        <div class="flex items-center gap-3 mb-4 mt-4">
            <span class="w-12 h-px bg-[#C0001E]"></span>
            <span class="text-[#C0001E] text-xs font-bold uppercase tracking-widest">Nakami Indonesia • Blog</span>
        </div>

        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4">
            Blog & Artikel Terkini
        </h1>
        <p class="text-lg text-white/70 max-w-2xl">
            Tips sukses interview, panduan belajar JLPT, info update regulasi ke Jepang, dan kabar terbaru dari LPK Nakami.
        </p>
    </div>
</section>

{{-- ============================================= --}}
{{-- FEATURED POST --}}
{{-- ============================================= --}}
@if($featured)
<section class="relative -mt-8 z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('blog.show', $featured->slug) }}" class="group block bg-white border border-[#E5E7EB] rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl hover:border-[#C0001E]/30 transition-all duration-300">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                
                {{-- Featured Image --}}
                <div class="aspect-[16/10] lg:aspect-auto bg-[#1E1E1E] relative overflow-hidden">
                    @if($featured->thumbnail)
                        <img src="{{ asset('media/' . $featured->thumbnail) }}" alt="{{ $featured->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-[#1E1E1E] to-[#111111] min-h-[240px]">
                            <span class="font-jp text-6xl text-[#C0001E]/30 mb-2">特</span>
                            <span class="text-xs uppercase tracking-widest text-[#6B7280]">Featured Post</span>
                        </div>
                    @endif
                    
                    {{-- Badge --}}
                    <div class="absolute top-4 left-4 bg-white/95 backdrop-blur-sm px-3 py-1.5 rounded-lg border border-white/20 shadow-md flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#C0001E] animate-pulse"></span>
                        <span class="text-[10px] font-bold text-[#111111] uppercase tracking-wider">Pilihan Utama</span>
                    </div>
                </div>

                {{-- Featured Content --}}
                <div class="p-6 lg:p-10 flex flex-col justify-center bg-white relative overflow-hidden">
                    {{-- Decor --}}
                    <div class="absolute right-[-5%] bottom-[-10%] text-[150px] font-jp text-[#F9F5F2] pointer-events-none select-none z-0">注</div>
                    
                    <div class="relative z-10">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="px-3 py-1 text-[10px] font-bold uppercase tracking-wider rounded border border-[#E5E7EB] bg-[#F9F5F2] text-[#C0001E]">{{ $featured->category }}</span>
                            <span class="flex items-center gap-1.5 text-xs font-semibold text-[#6B7280]">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                {{ $featured->published_at->translatedFormat('d F Y') }}
                            </span>
                        </div>
                        <h2 class="font-heading text-2xl lg:text-3xl font-bold text-[#111111] mb-4 group-hover:text-[#C0001E] transition-colors leading-tight">
                            {{ $featured->title }}
                        </h2>
                        <p class="text-[#6B7280] leading-relaxed mb-6 line-clamp-3">
                            {{ $featured->excerpt }}
                        </p>
                        
                        <div class="flex items-center justify-between pt-6 border-t border-[#F3F4F6]">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-[#111111] flex items-center justify-center text-white">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                <span class="text-xs font-bold text-[#111111] uppercase tracking-wider">{{ $featured->author->name ?? 'Sensei Nakami' }}</span>
                            </div>
                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-[#C0001E]">
                                Baca Artikel
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</section>
@endif

{{-- ============================================= --}}
{{-- FILTER & GRID --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24 bg-[#F9F5F2]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"
         x-data="{ activeTab: 'semua', search: '' }">

        {{-- Filter Bar --}}
        <div class="flex flex-col md:flex-row items-center justify-between gap-6 mb-12">
            <div class="flex flex-wrap gap-2 w-full md:w-auto overflow-x-auto pb-2 md:pb-0 scrollbar-hide">
                <button @click="activeTab = 'semua'"
                        :class="activeTab === 'semua' ? 'bg-[#111111] text-white shadow-md' : 'bg-white text-[#6B7280] hover:text-[#111111] border border-[#E5E7EB]'"
                        class="px-5 py-2.5 text-sm font-semibold rounded-full transition-all duration-300 whitespace-nowrap">Semua Artikel</button>
                @foreach($categories as $cat)
                <button @click="activeTab = '{{ $cat }}'"
                        :class="activeTab === '{{ $cat }}' ? 'bg-[#111111] text-white shadow-md' : 'bg-white text-[#6B7280] hover:text-[#111111] border border-[#E5E7EB]'"
                        class="px-5 py-2.5 text-sm font-semibold rounded-full transition-all duration-300 whitespace-nowrap">{{ $cat }}</button>
                @endforeach
            </div>
            
            <div class="relative w-full md:w-80 shrink-0">
                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-[#6B7280] pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" x-model="search" placeholder="Cari artikel..."
                       class="w-full pl-11 pr-5 py-3 bg-white border border-[#E5E7EB] rounded-full text-sm leading-none focus:outline-none focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#C0001E] transition-all shadow-sm">
            </div>
        </div>

        {{-- Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
            <article x-show="(activeTab === 'semua' || activeTab === '{{ $post->category }}') && (search === '' || '{{ strtolower($post->title) }}'.includes(search.toLowerCase()))"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     class="group bg-white border border-[#E5E7EB] rounded-2xl overflow-hidden hover:shadow-xl hover:border-[#C0001E]/30 transition-all duration-300 card-hover flex flex-col h-full">
                     
                <a href="{{ route('blog.show', $post->slug) }}" class="flex flex-col h-full">
                    {{-- Thumbnail --}}
                    <div class="aspect-[16/10] bg-[#1E1E1E] relative overflow-hidden shrink-0">
                        @if($post->thumbnail)
                            <img src="{{ asset('media/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 group-hover:opacity-90 transition-all duration-500" loading="lazy">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-[#1E1E1E] to-[#111111]">
                                <span class="font-jp text-4xl text-[#C0001E]/30 mb-2">文</span>
                            </div>
                        @endif
                        <span class="absolute top-4 left-4 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider rounded-lg bg-white/95 backdrop-blur-sm text-[#C0001E] shadow-sm border border-white/20">
                            {{ $post->category }}
                        </span>
                    </div>
                    
                    {{-- Content --}}
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex items-center gap-4 text-xs font-semibold text-[#6B7280] mb-3">
                            <span class="flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                {{ $post->published_at->translatedFormat('d M Y') }}
                            </span>
                            <span class="w-1 h-1 rounded-full bg-[#E5E7EB]"></span>
                            <span class="flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                {{ $post->reading_time }} min
                            </span>
                        </div>
                        
                        <h3 class="font-heading text-xl font-bold text-[#111111] mb-3 group-hover:text-[#C0001E] transition-colors line-clamp-2 leading-tight">
                            {{ $post->title }}
                        </h3>
                        
                        <p class="text-sm text-[#6B7280] line-clamp-3 flex-1 flex-grow mb-6">
                            {{ $post->excerpt }}
                        </p>
                        
                        <div class="mt-auto border-t border-[#F3F4F6] pt-4 flex items-center justify-between">
                            <span class="text-[11px] font-bold text-[#111111] uppercase tracking-wider">{{ $post->author->name ?? 'Tim Nakami' }}</span>
                            <div class="w-8 h-8 rounded-full bg-[#F9F5F2] flex items-center justify-center group-hover:bg-[#C0001E] group-hover:text-white text-[#111111] transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </div>
                        </div>
                    </div>
                </a>
            </article>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if($posts->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $posts->links() }}
        </div>
        @endif

        {{-- Empty State --}}
        @if($posts->isEmpty())
        <div class="text-center py-20 bg-white rounded-2xl border border-[#E5E7EB] shadow-sm">
             <div class="w-16 h-16 rounded-full bg-[#F9F5F2] flex items-center justify-center mx-auto mb-4 border border-[#E5E7EB]">
                <svg class="w-6 h-6 text-[#6B7280]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            </div>
            <p class="font-heading text-lg font-bold text-[#111111] mb-1">Belum Ada Artikel</p>
            <p class="text-sm text-[#6B7280]">Kami sedang menyiapkan artikel dan berita terbaru untuk Anda.</p>
        </div>
        @endif
        
    </div>
</section>

@endsection
