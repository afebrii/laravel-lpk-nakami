@extends('layouts.app')

@section('title', ($post->meta_title ?: $post->title) . ' — LPK Nakami Indonesia')
@section('meta_description', $post->meta_description ?: $post->excerpt)

@section('content')

{{-- ============================================= --}}
{{-- HEADER / BANNER NAKAMI --}}
{{-- ============================================= --}}
<section class="relative bg-[#111111] overflow-hidden">
    {{-- Background & Overlay --}}
    <div class="absolute inset-0">
        @if($post->thumbnail)
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-full object-cover opacity-20 mix-blend-luminosity">
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-[#111111] via-[#111111]/90 to-[#111111]/50 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#111111] via-[#111111]/80 to-transparent"></div>
    </div>
    
    {{-- Kanji Watermark --}}
    <div class="absolute right-[5%] top-[10%] text-[250px] leading-none font-jp text-white/5 select-none pointer-events-none hidden md:block">
        文
    </div>

    <div class="nakami-divider absolute bottom-0 left-0 right-0 z-10"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 z-10">
        @include('components.breadcrumb', ['items' => [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Blog', 'url' => '/blog'],
            ['label' => Str::limit($post->title, 40)]
        ]])
        
        <div class="flex flex-wrap items-center gap-3 mb-6 mt-4">
            <span class="px-3 py-1 text-[11px] font-bold uppercase tracking-wider rounded border border-white/20 bg-white/10 backdrop-blur-sm text-white flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-[#C0001E]"></span>
                {{ $post->category }}
            </span>
        </div>
        
        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-6 max-w-4xl">
            {{ $post->title }}
        </h1>
        
        <div class="flex flex-wrap items-center gap-x-6 gap-y-3 text-white/70 text-sm">
            <span class="inline-flex items-center gap-2 font-semibold">
                <svg class="w-4 h-4 text-[#C0001E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                {{ $post->published_at->translatedFormat('d F Y') }}
            </span>
            <span class="inline-flex items-center gap-2 font-semibold">
                <div class="w-5 h-5 rounded-full bg-[#C0001E] flex items-center justify-center text-white text-[10px]">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
                {{ $post->author->name ?? 'Sensei Nakami' }}
            </span>
            <span class="inline-flex items-center gap-2 font-semibold">
                <svg class="w-4 h-4 text-[#C0001E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ $post->reading_time }} menit baca
            </span>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- CONTENT --}}
{{-- ============================================= --}}
<section class="py-12 lg:py-20 bg-[#F9F5F2]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Thumbnail --}}
        @if($post->thumbnail)
        <div class="aspect-[16/9] rounded-2xl overflow-hidden mb-12 -mt-10 lg:-mt-16 relative z-10 shadow-2xl border-4 border-white">
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
        </div>
        @endif

        {{-- Article Content --}}
        <div class="bg-white rounded-3xl p-6 sm:p-10 shadow-sm border border-[#E5E7EB]">
            <article class="prose prose-sm sm:prose-base lg:prose-lg max-w-none text-[#6B7280] leading-relaxed
                            prose-headings:font-heading prose-headings:text-[#111111] prose-headings:font-bold
                            prose-h2:text-2xl prose-h2:mt-10 prose-h2:mb-5 prose-h2:pb-2 prose-h2:border-b prose-h2:border-[#F3F4F6]
                            prose-h3:text-xl prose-h3:mt-8 prose-h3:mb-4
                            prose-p:mb-5
                            prose-ul:my-5 prose-li:my-2 prose-li:marker:text-[#C0001E]
                            prose-ol:my-5 prose-li:my-2 prose-li:marker:text-[#111111] prose-li:marker:font-bold
                            prose-blockquote:border-[#C0001E] prose-blockquote:bg-[#F9F5F2] prose-blockquote:rounded-r-xl prose-blockquote:py-3 prose-blockquote:px-5 prose-blockquote:italic prose-blockquote:text-[#111111]
                            prose-strong:text-[#111111]
                            prose-img:rounded-xl prose-img:shadow-md
                            prose-a:text-[#C0001E] prose-a:font-semibold prose-a:no-underline hover:prose-a:underline">
                {!! $post->content !!}
            </article>

            {{-- Share --}}
            <div class="border-t border-[#E5E7EB] pt-8 mt-12">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
                    <div>
                        <h4 class="text-sm font-bold text-[#111111] mb-2 text-center sm:text-left">Semoga Bermanfaat!</h4>
                        <p class="text-xs text-[#6B7280] text-center sm:text-left">Bagikan artikel ini ke teman atau kerabat Anda.</p>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . url()->current()) }}" target="_blank"
                           class="w-10 h-10 bg-[#25D366] rounded-full flex items-center justify-center text-white hover:scale-110 transition-transform shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank"
                           class="w-10 h-10 bg-[#1877F2] rounded-full flex items-center justify-center text-white hover:scale-110 transition-transform shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <button onclick="navigator.clipboard.writeText('{{ url()->current() }}'); this.querySelector('span').textContent = 'Tersalin!'; setTimeout(() => this.querySelector('span').textContent = 'Salin Link', 2000)"
                                class="inline-flex items-center gap-1.5 px-4 py-2.5 bg-[#F9F5F2] rounded-full text-xs font-bold text-[#111111] hover:bg-[#E5E7EB] transition-colors border border-[#E5E7EB]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            <span>Salin Link</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
