@extends('layouts.app')

@section('title', 'Tanya Jawab & Informasi FAQ — LPK Nakami Indonesia')
@section('meta_description', 'Kumpulan pertanyaan yang sering diajukan seputar program pelatihan bahasa Jepang, Ginou Jisshusei, Tokutei Ginou, biaya, dan persyaratan di LPK Nakami.')

@section('content')

{{-- ============================================= --}}
{{-- HERO SECTION NAKAMI --}}
{{-- ============================================= --}}
<section class="relative bg-[#111111] overflow-hidden">
     <div class="absolute inset-0 bg-gradient-to-t from-[#111111] via-[#111111]/90 to-[#111111]/50 mix-blend-multiply z-0"></div>
    <div class="absolute right-[-5%] top-[5%] text-[300px] leading-none font-jp text-white/5 select-none pointer-events-none z-0 hidden md:block">
        答
    </div>
    <div class="nakami-divider absolute bottom-0 left-0 right-0 z-10"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 z-10">
        @include('components.breadcrumb', ['items' => [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'FAQ Umum']
        ]])
        
        <div class="flex items-center gap-3 mb-4 mt-4">
            <span class="w-12 h-px bg-[#C0001E]"></span>
            <span class="text-[#C0001E] text-xs font-bold uppercase tracking-widest">Pusat Informasi</span>
        </div>

        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4">
            FAQ Seputar Program Jepang
        </h1>
        <p class="text-lg text-white/70 max-w-2xl mb-8">
            Temukan jawaban komprehensif atas pertanyaan umum seputar biaya, persyaratan, dan alur pemberangkatan ke Jepang melalui LPK Nakami.
        </p>

        {{-- Search Nakami Style --}}
        <div class="max-w-xl" x-data>
            <div class="relative group">
                <div class="absolute -inset-1 bg-gradient-to-r from-[#C0001E]/0 via-[#C0001E]/20 to-[#C0001E]/0 rounded-full blur opacity-50 group-hover:opacity-100 transition duration-1000"></div>
                <div class="relative flex items-center bg-[#1E1E1E] border border-white/10 rounded-full overflow-hidden focus-within:border-[#C0001E]/50 transition-colors">
                    <svg class="w-5 h-5 text-white/40 ml-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input type="text"
                           x-model="$store.faqSearch.query"
                           placeholder="Cari kata kunci (contoh: tinggi badan, biaya, n4)..."
                           class="w-full bg-transparent border-none py-4 px-4 text-white placeholder-white/30 text-sm focus:outline-none focus:ring-0">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- FAQ LIST NAKAMI EDITION --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24 bg-[#F9F5F2]"
         x-data="{ activeTab: 'semua', openFaq: -1 }"
         x-init="Alpine.store('faqSearch', { query: '' })">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Category Filter --}}
        @if($categories->count() > 0)
        <div class="flex justify-center mb-12">
            <div class="inline-flex flex-wrap justify-center gap-2">
                <button @click="activeTab = 'semua'; openFaq = -1;"
                        :class="activeTab === 'semua' ? 'bg-[#111111] text-white shadow-lg border-transparent' : 'bg-white text-[#6B7280] border-[#E5E7EB] hover:border-[#111111] hover:text-[#111111]'"
                        class="px-5 py-2.5 text-sm font-bold rounded-full transition-all duration-300 border">
                    Semua Kategori (全)
                </button>
                @foreach($categories as $cat)
                <button @click="activeTab = '{{ $cat }}'; openFaq = -1;"
                        :class="activeTab === '{{ $cat }}' ? 'bg-[#111111] text-white shadow-lg border-transparent' : 'bg-white text-[#6B7280] border-[#E5E7EB] hover:border-[#111111] hover:text-[#111111]'"
                        class="px-5 py-2.5 text-sm font-bold rounded-full transition-all duration-300 border uppercase tracking-wider">
                    {{ $cat }}
                </button>
                @endforeach
            </div>
        </div>
        @endif

        {{-- FAQ Accordions --}}
        <div class="space-y-4">
            @forelse($faqs as $index => $faq)
            <div x-show="(activeTab === 'semua' || activeTab === '{{ $faq->category }}') && ($store.faqSearch.query === '' || '{{ strtolower(addslashes($faq->question ?? '')) }}'.includes($store.faqSearch.query.toLowerCase()) || '{{ strtolower(addslashes($faq->answer ?? '')) }}'.includes($store.faqSearch.query.toLowerCase()))"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="bg-white border border-[#E5E7EB] rounded-2xl overflow-hidden hover:shadow-xl hover:border-[#C0001E]/30 transition-all duration-300 relative group">
                
                {{-- Decorative Line --}}
                <div class="absolute left-0 top-0 bottom-0 w-1 bg-[#C0001E] opacity-0 group-hover:opacity-100 transition-opacity" :class="openFaq === {{ $index }} ? 'opacity-100' : ''"></div>

                <button @click="openFaq = openFaq === {{ $index }} ? -1 : {{ $index }}"
                        class="w-full flex items-center justify-between px-6 py-5 text-left bg-white z-10 relative">
                    <div class="flex items-center gap-4 pr-6">
                        @if($faq->category)
                        <span class="shrink-0 px-3 py-1 text-[10px] font-bold uppercase tracking-widest rounded-md bg-[#F9F5F2] border border-[#E5E7EB] text-[#111111]">{{ $faq->category }}</span>
                        @endif
                        <span class="text-base font-bold text-[#111111] group-hover:text-[#C0001E] transition-colors leading-snug" :class="openFaq === {{ $index }} ? 'text-[#C0001E]' : ''">
                            {{ $faq->question }}
                        </span>
                    </div>
                    <div class="shrink-0 w-8 h-8 rounded-full border border-[#E5E7EB] flex items-center justify-center bg-[#F9F5F2] group-hover:bg-[#111111] group-hover:border-[#111111] transition-colors">
                        <svg class="w-4 h-4 text-[#111111] group-hover:text-white transition-transform duration-300"
                            :class="openFaq === {{ $index }} ? '-rotate-180 text-white' : ''"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </button>
                <div x-show="openFaq === {{ $index }}"
                     x-collapse
                     x-cloak
                     class="px-6 pb-6 pt-2 bg-gradient-to-b from-white to-[#F9F5F2]/30 border-t border-[#F3F4F6] relative z-0">
                    <div class="prose prose-sm max-w-none text-[#6B7280] leading-relaxed">
                        {!! nl2br(e($faq->answer)) !!}
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-12 bg-white rounded-3xl border border-[#E5E7EB] border-dashed">
                <div class="text-[80px] font-jp text-[#E5E7EB] mb-4">空</div>
                <h3 class="text-lg font-bold text-[#111111] mb-2">Belum Ada Pertanyaan</h3>
                <p class="text-[#6B7280]">FAQ untuk kategori ini sedang dalam tahap penyusunan oleh Admin LPK Nakami.</p>
            </div>
            @endforelse
            
            {{-- Empty State for Search --}}
            <div x-show="$store.faqSearch.query !== '' && document.querySelectorAll('[x-show*=\'store.faqSearch.query === \\\'\\\' ||\']').length > 0 && Array.from(document.querySelectorAll('[x-show*=\'store.faqSearch.query === \\\'\\\' ||\']')).every(el => el.style.display === 'none')" 
                 x-cloak
                 class="text-center py-12 bg-white rounded-3xl border border-[#E5E7EB] border-dashed">
                <svg class="w-12 h-12 text-[#E5E7EB] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <h3 class="text-lg font-bold text-[#111111] mb-2">Tidak Ditemukan</h3>
                <p class="text-[#6B7280]">Maaf, kami tidak dapat menemukan jawaban untuk: <strong x-text="`&quot;${$store.faqSearch.query}&quot;`" class="text-[#111111]"></strong></p>
            </div>
        </div>

    </div>
</section>

{{-- ============================================= --}}
{{-- NAKAMI CTA — BELUM TERJAWAB --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24 bg-white border-t border-[#E5E7EB]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative bg-gradient-to-br from-[#111111] to-[#1E1E1E] rounded-3xl overflow-hidden px-6 sm:px-12 py-16 lg:py-20 text-center shadow-2xl border border-white/10 group">
            
            {{-- Decorative Background --}}
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMjAiIGN5PSIyMCIgcj0iMSIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjA1KSIvPjwvc3ZnPg==')] opacity-50"></div>
            <div class="absolute right-[-10%] bottom-[-20%] text-[200px] font-jp text-white/5 pointer-events-none group-hover:scale-110 transition-transform duration-1000">問</div>

            <div class="relative z-10 flex flex-col items-center">
                <div class="w-16 h-16 bg-[#C0001E]/20 rounded-full flex items-center justify-center mb-6">
                    <div class="w-12 h-12 bg-[#C0001E] rounded-full flex items-center justify-center shadow-lg shadow-[#C0001E]/40 animate-bounce">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    </div>
                </div>

                <h2 class="font-heading text-3xl lg:text-4xl font-bold text-white mb-4">
                    Pertanyaan Anda Belum Terjawab?
                </h2>
                <p class="text-white/70 text-lg mb-10 max-w-2xl mx-auto">
                    Kirimkan langsung kasus atau persyaratan khusus Anda (mata minus, tato, batasan umur) ke tim admin Sensei kami untuk diberikan konsultasi personal secara gratis.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 w-full sm:w-auto">
                    <a href="https://wa.me/{{ setting('contact_wa_admin') }}?text={{ urlencode('Konnichiwa, saya sudah membaca FAQ LPK Nakami namun masih ada hal spesifik yang ingin saya tanyakan.') }}"
                       target="_blank"
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 bg-[#25D366] text-white font-bold rounded-xl hover:bg-[#1da851] transition-all duration-300 hover:shadow-lg hover:shadow-[#25D366]/30 active:scale-95 text-base">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                        Tanya via WhatsApp
                    </a>
                    <a href="{{ url('/kontak') }}"
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 bg-transparent text-white font-bold rounded-xl border-2 border-white/20 hover:bg-white/10 transition-all duration-300 active:scale-95 text-base">
                        Isi Formulir Kontak
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
