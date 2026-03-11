@extends('layouts.app')

@section('title', ($post->meta_title ?: $post->title) . ' — ' . setting('site_name', 'LKP Yuwita'))
@section('meta_description', $post->meta_description ?: $post->excerpt)

@section('content')

{{-- HEADER --}}
<section class="relative bg-gradient-to-br from-charcoal via-charcoal to-rose-gold-dark overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-72 h-72 bg-rose-gold rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-dusty-pink rounded-full blur-3xl"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
        @include('components.breadcrumb', ['items' => [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Blog', 'url' => '/blog'],
            ['label' => $post->title]
        ]])
        <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-rose-gold/20 text-dusty-pink mb-4">{{ $post->category }}</span>
        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4">{{ $post->title }}</h1>
        <div class="flex flex-wrap items-center gap-4 text-sm text-white/70">
            <span class="inline-flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                {{ $post->published_at->translatedFormat('d F Y') }}
            </span>
            <span class="inline-flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                {{ $post->author->name ?? 'Admin' }}
            </span>
            <span class="inline-flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ $post->reading_time }} menit baca
            </span>
        </div>
    </div>
</section>

{{-- CONTENT --}}
<section class="py-12 lg:py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Thumbnail --}}
        @if($post->thumbnail)
        <div class="aspect-[16/9] rounded-2xl overflow-hidden mb-10 -mt-8 relative z-10 shadow-xl">
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-full object-cover" loading="lazy">
        </div>
        @endif

        {{-- Article Content --}}
        <article class="prose prose-lg max-w-none text-dark-gray leading-relaxed
                        prose-headings:font-heading prose-headings:text-charcoal prose-headings:font-bold
                        prose-h2:text-2xl prose-h2:mt-8 prose-h2:mb-4
                        prose-h3:text-xl prose-h3:mt-6 prose-h3:mb-3
                        prose-p:mb-4
                        prose-ul:my-4 prose-li:my-1
                        prose-blockquote:border-rose-gold prose-blockquote:bg-soft-cream/50 prose-blockquote:rounded-r-xl prose-blockquote:py-2 prose-blockquote:italic
                        prose-strong:text-charcoal
                        prose-a:text-rose-gold prose-a:no-underline hover:prose-a:underline">
            {!! $post->content !!}
        </article>

        {{-- Share --}}
        <div class="border-t border-light-gray pt-8 mt-12">
            <h4 class="text-sm font-semibold text-charcoal mb-4">Bagikan Artikel</h4>
            <div class="flex items-center gap-3">
                <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . url()->current()) }}" target="_blank"
                   class="w-10 h-10 bg-[#25D366] rounded-full flex items-center justify-center text-white hover:opacity-80 transition-opacity">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank"
                   class="w-10 h-10 bg-[#1877F2] rounded-full flex items-center justify-center text-white hover:opacity-80 transition-opacity">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </a>
                <button onclick="navigator.clipboard.writeText('{{ url()->current() }}'); this.querySelector('span').textContent = 'Tersalin!'; setTimeout(() => this.querySelector('span').textContent = 'Salin Link', 2000)"
                        class="inline-flex items-center gap-1.5 px-4 py-2.5 bg-light-gray rounded-full text-xs font-medium text-charcoal hover:bg-medium-gray transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                    <span>Salin Link</span>
                </button>
            </div>
        </div>
    </div>
</section>

{{-- RELATED POSTS --}}
@if($relatedPosts->count() > 0)
<section class="py-16 lg:py-20 bg-soft-cream/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="font-heading text-2xl lg:text-3xl font-bold text-charcoal mb-8">Artikel Terkait</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($relatedPosts as $related)
            <a href="{{ route('blog.show', $related->slug) }}" class="group bg-white border border-light-gray rounded-2xl overflow-hidden hover:shadow-xl hover:shadow-rose-gold/5 hover:-translate-y-1 transition-all duration-300">
                <div class="aspect-[16/10] bg-gradient-to-br from-dusty-pink/20 to-rose-gold/10 relative overflow-hidden">
                    @if($related->thumbnail)
                        <img src="{{ asset('storage/' . $related->thumbnail) }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <svg class="w-16 h-16 text-rose-gold/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                        </div>
                    @endif
                    <span class="absolute top-3 left-3 px-3 py-1 text-xs font-semibold rounded-full bg-white/90 text-rose-gold">{{ $related->category }}</span>
                </div>
                <div class="p-5">
                    <div class="flex items-center gap-2 text-xs text-dark-gray mb-2">
                        <span>{{ $related->published_at->translatedFormat('d M Y') }}</span>
                        <span>·</span>
                        <span>{{ $related->reading_time }} min</span>
                    </div>
                    <h3 class="font-heading text-lg font-bold text-charcoal group-hover:text-rose-gold transition-colors line-clamp-2">{{ $related->title }}</h3>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
