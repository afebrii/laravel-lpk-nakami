@extends('layouts.app')

@section('title', 'FAQ — ' . setting('site_name', 'LKP Yuwita'))
@section('meta_description', 'Pertanyaan yang sering diajukan tentang program pelatihan, pendaftaran, biaya, dan layanan di LKP/LPK Yuwita.')

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
            ['label' => 'FAQ']
        ]])
        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4">
            Pertanyaan Umum (FAQ)
        </h1>
        <p class="text-lg text-white/75 max-w-2xl mb-8">
            Temukan jawaban untuk pertanyaan yang paling sering diajukan tentang program dan layanan kami.
        </p>

        {{-- Search --}}
        <div class="max-w-lg" x-data>
            <div class="relative">
                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-dark-gray/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text"
                       x-model="$store.faqSearch.query"
                       placeholder="Cari pertanyaan..."
                       class="w-full pl-12 pr-4 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full text-white placeholder-white/50 text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/50 focus:border-transparent transition-all">
            </div>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- FAQ LIST --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24"
         x-data="{ activeTab: 'semua', openFaq: -1 }"
         x-init="Alpine.store('faqSearch', { query: '' })">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Category Filter --}}
        @if($categories->count() > 0)
        <div class="flex justify-center mb-10">
            <div class="inline-flex flex-wrap justify-center bg-light-gray rounded-full p-1 gap-1">
                <button @click="activeTab = 'semua'"
                        :class="activeTab === 'semua' ? 'bg-rose-gold text-white shadow-md' : 'text-dark-gray hover:text-charcoal'"
                        class="px-4 py-2 text-sm font-medium rounded-full transition-all duration-300">
                    Semua
                </button>
                @foreach($categories as $cat)
                <button @click="activeTab = '{{ $cat }}'"
                        :class="activeTab === '{{ $cat }}' ? 'bg-rose-gold text-white shadow-md' : 'text-dark-gray hover:text-charcoal'"
                        class="px-4 py-2 text-sm font-medium rounded-full transition-all duration-300">
                    {{ $cat }}
                </button>
                @endforeach
            </div>
        </div>
        @endif

        {{-- FAQ Accordions --}}
        <div class="space-y-3">
            @foreach($faqs as $index => $faq)
            <div x-show="(activeTab === 'semua' || activeTab === '{{ $faq->category }}') && ($store.faqSearch.query === '' || '{{ strtolower(addslashes($faq->question)) }}'.includes($store.faqSearch.query.toLowerCase()))"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="bg-white border border-light-gray rounded-2xl overflow-hidden hover:shadow-md transition-shadow duration-300">
                <button @click="openFaq = openFaq === {{ $index }} ? -1 : {{ $index }}"
                        class="w-full flex items-center justify-between px-6 py-5 text-left">
                    <div class="flex items-center gap-3 pr-4">
                        @if($faq->category)
                        <span class="shrink-0 px-2.5 py-0.5 text-xs font-medium rounded-full bg-rose-gold/10 text-rose-gold">{{ $faq->category }}</span>
                        @endif
                        <span class="text-sm font-semibold text-charcoal">{{ $faq->question }}</span>
                    </div>
                    <svg class="w-5 h-5 text-rose-gold transition-transform duration-300 shrink-0"
                         :class="openFaq === {{ $index }} ? 'rotate-180' : ''"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openFaq === {{ $index }}"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 -translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     x-cloak
                     class="px-6 pb-5 border-t border-light-gray">
                    <p class="text-sm text-dark-gray leading-relaxed pt-4">{{ $faq->answer }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- CTA — BELUM TERJAWAB --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative bg-gradient-to-r from-rose-gold to-rose-gold-dark rounded-3xl overflow-hidden px-6 sm:px-12 py-12 lg:py-16 text-center">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/2"></div>

            <div class="relative z-10">
                <h2 class="font-heading text-3xl lg:text-4xl font-bold text-white mb-4">
                    Pertanyaanmu Belum Terjawab?
                </h2>
                <p class="text-white/80 text-lg mb-8 max-w-xl mx-auto">
                    Hubungi kami langsung melalui WhatsApp atau kirim pesan melalui halaman kontak.
                </p>
                <div class="flex flex-wrap items-center justify-center gap-4">
                    <a href="https://wa.me/{{ setting('contact_wa_admin') }}?text={{ urlencode('Halo, saya ingin bertanya mengenai LKP Yuwita.') }}"
                       target="_blank"
                       class="inline-flex items-center gap-2 px-7 py-3.5 bg-white text-rose-gold font-semibold rounded-full hover:bg-soft-cream transition-all duration-300 hover:shadow-lg active:scale-95">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                        Tanya via WhatsApp
                    </a>
                    <a href="{{ url('/kontak') }}"
                       class="inline-flex items-center gap-2 px-7 py-3.5 bg-transparent text-white font-semibold rounded-full border-2 border-white/40 hover:bg-white/10 transition-all duration-300 active:scale-95">
                        Halaman Kontak
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
