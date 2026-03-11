@extends('layouts.app')

@section('title', 'Galeri — ' . setting('site_name', 'LKP Yuwita'))
@section('meta_description', 'Galeri kegiatan pelatihan, hasil karya, dan dokumentasi LKP/LPK Yuwita Tasikmalaya.')

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
            ['label' => 'Galeri']
        ]])
        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4">
            Galeri Kegiatan
        </h1>
        <p class="text-lg text-white/75 max-w-2xl">
            Dokumentasi kegiatan pelatihan, hasil karya peserta, dan berbagai momen berharga di LKP Yuwita.
        </p>
    </div>
</section>

{{-- ============================================= --}}
{{-- FILTER & GALLERY GRID --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24"
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
            <div class="inline-flex flex-wrap justify-center bg-light-gray rounded-full p-1 gap-1">
                <button @click="activeFilter = 'semua'"
                        :class="activeFilter === 'semua' ? 'bg-rose-gold text-white shadow-md' : 'text-dark-gray hover:text-charcoal'"
                        class="px-5 py-2 text-sm font-medium rounded-full transition-all duration-300">
                    Semua
                </button>
                @foreach($categories as $cat)
                <button @click="activeFilter = '{{ $cat }}'"
                        :class="activeFilter === '{{ $cat }}' ? 'bg-rose-gold text-white shadow-md' : 'text-dark-gray hover:text-charcoal'"
                        class="px-5 py-2 text-sm font-medium rounded-full transition-all duration-300">
                    {{ $cat }}
                </button>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Gallery Grid --}}
        @if($galleries->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($galleries as $gallery)
            <div x-show="activeFilter === 'semua' || activeFilter === '{{ $gallery->category }}'"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="group relative aspect-square rounded-xl overflow-hidden cursor-pointer"
                 @click="lightbox = true; lightboxSrc = '{{ asset('storage/' . $gallery->image) }}'; lightboxTitle = '{{ addslashes($gallery->title) }}'">
                <img src="{{ asset('storage/' . $gallery->image) }}"
                     alt="{{ $gallery->title }}"
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                     loading="lazy">
                <div class="absolute inset-0 bg-charcoal/0 group-hover:bg-charcoal/50 transition-all duration-300 flex items-center justify-center">
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-center px-3">
                        <svg class="w-8 h-8 text-white mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                        <p class="text-white text-sm font-medium line-clamp-2">{{ $gallery->title }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-10">
            {{ $galleries->links() }}
        </div>
        @else
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @for($i = 0; $i < 8; $i++)
            <div class="aspect-square rounded-xl bg-gradient-to-br from-dusty-pink/20 to-rose-gold/10 flex items-center justify-center">
                <svg class="w-12 h-12 text-rose-gold/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            @endfor
        </div>
        <p class="text-center text-dark-gray mt-8">Galeri foto akan segera ditambahkan.</p>
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
         class="fixed inset-0 z-50 flex items-center justify-center bg-charcoal/90 backdrop-blur-sm p-4"
         @click.self="lightbox = false"
         @keydown.escape.window="lightbox = false"
         x-cloak>
        <button @click="lightbox = false" class="absolute top-4 right-4 text-white/70 hover:text-white transition-colors">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <div class="max-w-4xl w-full" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="scale-95" x-transition:enter-end="scale-100">
            <img :src="lightboxSrc" :alt="lightboxTitle" class="w-full max-h-[80vh] object-contain rounded-lg">
            <p class="text-center text-white/80 mt-3 text-sm" x-text="lightboxTitle"></p>
        </div>
    </div>
</section>

@endsection
