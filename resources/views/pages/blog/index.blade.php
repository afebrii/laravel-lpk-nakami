@extends('layouts.app')

@section('title', 'Blog — ' . setting('site_name', 'LKP Yuwita'))
@section('meta_description', 'Baca artikel terbaru seputar tips kecantikan, info program, berita, dan tutorial dari LKP/LPK Yuwita.')

@section('content')

{{-- HERO --}}
<section class="relative bg-gradient-to-br from-charcoal via-charcoal to-rose-gold-dark overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-72 h-72 bg-rose-gold rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-dusty-pink rounded-full blur-3xl"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        @include('components.breadcrumb', ['items' => [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Blog']
        ]])
        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4">Blog & Artikel</h1>
        <p class="text-lg text-white/75 max-w-2xl">Tips kecantikan, info program, berita terbaru, dan tutorial dari instruktur profesional kami.</p>
    </div>
</section>

{{-- FEATURED POST --}}
@if($featured)
<section class="relative -mt-8 z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('blog.show', $featured->slug) }}" class="group block bg-white rounded-2xl shadow-xl shadow-charcoal/5 overflow-hidden hover:shadow-2xl transition-shadow duration-300">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="aspect-[16/10] lg:aspect-auto bg-gradient-to-br from-dusty-pink/20 to-rose-gold/10 relative overflow-hidden">
                    @if($featured->thumbnail)
                        <img src="{{ asset('storage/' . $featured->thumbnail) }}" alt="{{ $featured->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                    @else
                        <div class="w-full h-full flex items-center justify-center min-h-[240px]">
                            <svg class="w-20 h-20 text-rose-gold/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                        </div>
                    @endif
                </div>
                <div class="p-6 lg:p-8 flex flex-col justify-center">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-rose-gold/10 text-rose-gold">{{ $featured->category }}</span>
                        <span class="text-xs text-dark-gray">{{ $featured->published_at->translatedFormat('d F Y') }}</span>
                    </div>
                    <h2 class="font-heading text-2xl lg:text-3xl font-bold text-charcoal mb-3 group-hover:text-rose-gold transition-colors">{{ $featured->title }}</h2>
                    <p class="text-dark-gray leading-relaxed mb-4 line-clamp-3">{{ $featured->excerpt }}</p>
                    <div class="flex items-center gap-4 text-xs text-dark-gray">
                        <span class="inline-flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            {{ $featured->author->name ?? 'Admin' }}
                        </span>
                        <span class="inline-flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ $featured->reading_time }} menit baca
                        </span>
                    </div>
                </div>
            </div>
        </a>
    </div>
</section>
@endif

{{-- FILTER & GRID --}}
<section class="py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"
         x-data="{ activeTab: 'semua', search: '' }">

        {{-- Filter Bar --}}
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-10">
            <div class="inline-flex bg-light-gray rounded-full p-1 gap-1 flex-wrap">
                <button @click="activeTab = 'semua'"
                        :class="activeTab === 'semua' ? 'bg-rose-gold text-white shadow-md' : 'text-dark-gray hover:text-charcoal'"
                        class="px-5 py-2 text-sm font-medium rounded-full transition-all duration-300">Semua</button>
                @foreach($categories as $cat)
                <button @click="activeTab = '{{ $cat }}'"
                        :class="activeTab === '{{ $cat }}' ? 'bg-rose-gold text-white shadow-md' : 'text-dark-gray hover:text-charcoal'"
                        class="px-5 py-2 text-sm font-medium rounded-full transition-all duration-300">{{ $cat }}</button>
                @endforeach
            </div>
            <div class="relative w-full sm:w-72">
                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-dark-gray/50 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" x-model="search" placeholder="Cari artikel..."
                       class="w-full pl-11 pr-5 py-3 bg-white border border-medium-gray rounded-full text-sm leading-none focus:outline-none focus:ring-2 focus:ring-rose-gold/30 focus:border-rose-gold transition-all">
            </div>
        </div>

        {{-- Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
            <article x-show="(activeTab === 'semua' || activeTab === '{{ $post->category }}') && (search === '' || '{{ strtolower($post->title) }}'.includes(search.toLowerCase()))"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     class="group bg-white border border-light-gray rounded-2xl overflow-hidden hover:shadow-xl hover:shadow-rose-gold/5 hover:-translate-y-1 transition-all duration-300">
                <a href="{{ route('blog.show', $post->slug) }}">
                    <div class="aspect-[16/10] bg-gradient-to-br from-dusty-pink/20 to-rose-gold/10 relative overflow-hidden">
                        @if($post->thumbnail)
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-16 h-16 text-rose-gold/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                            </div>
                        @endif
                        <span class="absolute top-3 left-3 px-3 py-1 text-xs font-semibold rounded-full bg-white/90 text-rose-gold backdrop-blur-sm">{{ $post->category }}</span>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-3 text-xs text-dark-gray mb-3">
                            <span>{{ $post->published_at->translatedFormat('d M Y') }}</span>
                            <span>·</span>
                            <span>{{ $post->reading_time }} min baca</span>
                        </div>
                        <h3 class="font-heading text-lg font-bold text-charcoal mb-2 group-hover:text-rose-gold transition-colors line-clamp-2">{{ $post->title }}</h3>
                        <p class="text-sm text-dark-gray line-clamp-2">{{ $post->excerpt }}</p>
                    </div>
                </a>
            </article>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if($posts->hasPages())
        <div class="mt-12">
            {{ $posts->links() }}
        </div>
        @endif

        {{-- Empty --}}
        @if($posts->isEmpty())
        <div class="text-center py-16">
            <svg class="w-16 h-16 text-rose-gold/20 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            <p class="text-dark-gray">Belum ada artikel. Nantikan konten menarik dari kami!</p>
        </div>
        @endif
    </div>
</section>

@endsection
