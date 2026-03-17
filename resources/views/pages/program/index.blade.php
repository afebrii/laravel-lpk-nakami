@extends('layouts.app')

@section('title', 'Program LPK Nakami — Japanese Learning Center')
@section('meta_description', 'Pilih program pelatihan LPK Nakami Indonesia: Ginou Jisshusei, Tokutei Ginou, Engineering, dan Sekolah Bahasa Jepang.')

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
            ['label' => 'Program Pelatihan']
        ]])
        <div class="flex items-center gap-3 mb-4 mt-4">
            <span class="w-12 h-px bg-[#C0001E]"></span>
            <span class="text-[#C0001E] text-xs font-bold uppercase tracking-widest">Nakami Indonesia</span>
        </div>
        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4 mt-4">
            Pilih Program Anda
        </h1>
        <p class="text-lg text-white/70 max-w-2xl">
            Tentukan jalur karir atau pendidikan Anda di Jepang bersama LPK Nakami Indonesia.
        </p>
    </div>
</section>

{{-- ============================================= --}}
{{-- FILTER & PROGRAM GRID --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24 bg-[#F9F5F2]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"
         x-data="{
             activeTab: '{{ request('kategori', 'semua') }}',
             search: '',
         }">

        {{-- Filter Bar --}}
        <div class="flex flex-col md:flex-row items-center justify-between gap-6 mb-12">
            {{-- Tabs --}}
            <div class="flex flex-wrap gap-2 w-full md:w-auto overflow-x-auto pb-2 md:pb-0 scrollbar-hide">
                <button @click="activeTab = 'semua'"
                        :class="activeTab === 'semua' ? 'bg-[#111111] text-white' : 'bg-white text-[#6B7280] hover:text-[#111111] border border-[#E5E7EB]'"
                        class="px-5 py-2.5 text-sm font-semibold rounded-full transition-all duration-300 whitespace-nowrap whitespace-nowrap">
                    Semua Program
                </button>
                @foreach($categories as $cat)
                <button @click="activeTab = '{{ $cat->type }}'"
                        :class="activeTab === '{{ $cat->type }}' ? 'bg-[#111111] text-white' : 'bg-white text-[#6B7280] hover:text-[#111111] border border-[#E5E7EB]'"
                        class="px-5 py-2.5 text-sm font-semibold rounded-full transition-all duration-300 flex items-center gap-2 whitespace-nowrap">
                    <span class="font-jp text-lg leading-none mt-0.5" :class="activeTab === '{{ $cat->type }}' ? 'text-[#C0001E]' : 'text-[#C0001E]'">
                        @if($cat->type === 'ginou-jisshusei') 技
                        @elseif($cat->type === 'tokutei-ginou') 特
                        @elseif($cat->type === 'engineering') エ
                        @else 日 @endif
                    </span>
                    {{ $cat->name }}
                </button>
                @endforeach
            </div>

            {{-- Search --}}
            <div class="relative w-full md:w-80 shrink-0">
                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-[#6B7280] pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" x-model="search" placeholder="Cari program..."
                       class="w-full pl-11 pr-5 py-3 bg-white border border-[#E5E7EB] rounded-full text-sm leading-none focus:outline-none focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#C0001E] transition-all shadow-sm">
            </div>
        </div>

        {{-- Program Grid (Sama seperti Home) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($programs as $program)
            <div x-show="(activeTab === 'semua' || activeTab === '{{ $program->category->type }}') && (search === '' || '{{ strtolower($program->name) }}'.includes(search.toLowerCase()))"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="group bg-white border border-[#E5E7EB] rounded-2xl overflow-hidden hover:shadow-2xl hover:border-[#C0001E]/30 transition-all duration-300 card-hover flex flex-col h-full">
                
                {{-- Thumbnail --}}
                <div class="aspect-[16/10] bg-[#1E1E1E] relative overflow-hidden">
                    @if($program->thumbnail)
                        <img src="{{ asset('media/' . $program->thumbnail) }}" alt="{{ $program->name }}" class="w-full h-full object-cover group-hover:scale-105 group-hover:opacity-90 transition-all duration-500" loading="lazy">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[#1E1E1E] to-[#111111]">
                            @php
                                $kanji = '日';
                                if($program->category->type === 'ginou-jisshusei') $kanji = '技';
                                if($program->category->type === 'tokutei-ginou') $kanji = '特';
                                if($program->category->type === 'engineering') $kanji = '工';
                                if($program->category->type === 'nihongo-gakkou') $kanji = '学';
                            @endphp
                            <span class="font-jp text-6xl text-[#C0001E]/30">{{ $kanji }}</span>
                        </div>
                    @endif
                    
                    {{-- Status Badge --}}
                    @if($program->status === 'coming_soon')
                    <span class="absolute top-4 right-4 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider rounded-lg bg-[#111111] text-white shadow-md border border-white/10">
                        Pendaftaran Ditutup
                    </span>
                    @endif

                    {{-- Category Badge --}}
                    <div class="absolute top-4 left-4 bg-white/95 backdrop-blur-sm px-3 py-1.5 rounded-lg border border-white/20 shadow-md flex items-center gap-2">
                        <span class="font-jp text-[#C0001E] font-bold text-sm leading-none">
                            @if($program->category->type === 'ginou-jisshusei') 技
                            @elseif($program->category->type === 'tokutei-ginou') 特
                            @elseif($program->category->type === 'engineering') エ
                            @else 日 @endif
                        </span>
                        <span class="text-[10px] font-bold text-[#111111] uppercase tracking-wider">{{ $program->category->name }}</span>
                    </div>
                </div>

                {{-- Content --}}
                <div class="p-6 flex flex-col flex-1">
                    <h3 class="font-heading text-xl font-bold text-[#111111] mb-3 group-hover:text-[#C0001E] transition-colors leading-tight">
                        {{ $program->name }}
                    </h3>
                    <p class="text-sm text-[#6B7280] mb-6 line-clamp-3 flex-1 flex-grow">
                        {{ $program->short_description }}
                    </p>

                    {{-- Meta Info --}}
                    <div class="grid grid-cols-2 gap-3 mb-6 pt-4 border-t border-[#F3F4F6]">
                        @if($program->duration)
                        <div class="flex flex-col">
                            <span class="text-[10px] uppercase font-bold text-[#6B7280] mb-0.5">Durasi Program</span>
                            <span class="text-sm font-semibold justify-center text-[#111111]">{{ $program->duration }}</span>
                        </div>
                        @else
                            <div></div>
                        @endif
                        <div class="flex flex-col text-right">
                            <span class="text-[10px] uppercase font-bold text-[#6B7280] mb-0.5">Biaya / Status</span>
                            <span class="text-sm font-bold {{ $program->is_free ? 'text-[#10B981]' : 'text-[#C0001E]' }}">
                                {{ $program->formatted_price }}
                            </span>
                        </div>
                    </div>

                    <a href="{{ route('program.show', $program->slug) }}" class="btn-nakami-primary w-full justify-center">
                        Lihat Silabus & Detail
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Empty State --}}
        <div x-show="document.querySelectorAll('[x-show]:not([style*=\'display: none\'])').length === 0" class="text-center py-20" x-cloak>
            <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center mx-auto mb-4 shadow-sm">
                <svg class="w-6 h-6 text-[#6B7280]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <p class="font-heading font-bold text-[#111111] text-lg mb-1">Tidak Ditemukan</p>
            <p class="text-[#6B7280] text-sm">Program pelatihan dengan kata kunci tersebut tidak tersedia.</p>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- CTA KONSULTASI BANNER --}}
{{-- ============================================= --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-[#111111] rounded-3xl overflow-hidden px-6 lg:px-12 py-16 text-center border border-white/5 shadow-2xl relative">
            <div class="absolute inset-0 opacity-20 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-[#C0001E] via-[#111111] to-[#111111]"></div>
            
            <div class="relative z-10 max-w-2xl mx-auto">
                <span class="font-jp text-5xl text-[#C0001E] mb-4 block">問</span>
                <h2 class="font-heading text-3xl font-bold text-white mb-4">
                    Belum Yakin Program Mana?
                </h2>
                <p class="text-white/60 text-lg mb-8">
                    Silakan konsultasi gratis dengan sensei kami untuk mengetahui program apa yang paling cocok dengan background dan tujuan Anda.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="https://wa.me/{{ setting('contact_wa_admin') }}?text={{ urlencode('Halo, saya ingin konsultasi memilih program di LPK Nakami.') }}"
                       target="_blank"
                       class="btn-nakami-primary flex-1 justify-center w-full sm:w-auto">
                        <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                        Hubungi via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
