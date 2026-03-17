@extends('layouts.app')

@section('title', $program->meta_title ?: $program->name . ' — LPK Nakami Indonesia')
@section('meta_description', $program->meta_description ?: $program->short_description)

@section('content')

{{-- ============================================= --}}
{{-- HEADER / BANNER NAKAMI --}}
{{-- ============================================= --}}
<section class="relative bg-[#111111] overflow-hidden">
    {{-- Background & Overlay --}}
    <div class="absolute inset-0">
        @if($program->thumbnail)
            <img src="{{ asset('media/' . $program->thumbnail) }}" alt="{{ $program->name }}" class="w-full h-full object-cover opacity-20 mix-blend-luminosity">
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-[#111111] via-[#111111]/90 to-[#111111]/50 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#111111] via-[#111111]/80 to-transparent"></div>
    </div>
    
    {{-- Kanji Watermark --}}
    <div class="absolute right-[5%] top-[10%] text-[250px] leading-none font-jp text-white/5 select-none pointer-events-none hidden md:block">
        @if($program->category->type === 'ginou-jisshusei') 技能
        @elseif($program->category->type === 'tokutei-ginou') 特定
        @elseif($program->category->type === 'engineering') 技術
        @else 日本 @endif
    </div>

    <div class="nakami-divider absolute bottom-0 left-0 right-0 z-10"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 z-10">
        @include('components.breadcrumb', ['items' => [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Program Pelatihan', 'url' => '/program'],
            ['label' => $program->name]
        ]])
        
        <div class="flex items-center gap-3 mb-2 mt-4">
            <span class="w-8 h-px bg-[#C0001E]"></span>
            <span class="text-[#C0001E] text-[10px] font-bold uppercase tracking-widest">Nakami Indonesia</span>
        </div>
        <div class="flex flex-wrap items-center gap-3 mb-6 mt-2">
            <span class="px-3 py-1 text-[11px] font-bold uppercase tracking-wider rounded-lg bg-[#C0001E] text-white flex items-center gap-2">
                <span class="font-jp text-sm">
                    @if($program->category->type === 'ginou-jisshusei') 技
                    @elseif($program->category->type === 'tokutei-ginou') 特
                    @elseif($program->category->type === 'engineering') エ
                    @else 日 @endif
                </span>
                {{ $program->category->name }}
            </span>
            @if($program->status === 'coming_soon')
            <span class="px-3 py-1 text-[11px] font-bold uppercase tracking-wider rounded-lg bg-[#111111] border border-white/20 text-white">
                Pendaftaran Ditutup
            </span>
            @endif
        </div>
        
        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-6 max-w-4xl">
            {{ $program->name }}
        </h1>
        
        <p class="text-lg text-white/70 max-w-2xl mb-8 leading-relaxed">
            {{ $program->short_description }}
        </p>
        
        <div class="flex flex-wrap items-center gap-x-8 gap-y-4 text-white/80 text-sm">
            @if($program->duration)
            <div class="flex flex-col">
                <span class="text-[10px] uppercase font-bold text-white/40 mb-1">Durasi</span>
                <span class="inline-flex items-center gap-2 font-semibold text-white">
                    <svg class="w-4 h-4 text-[#C0001E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ $program->duration }}
                </span>
            </div>
            @endif
            
            @if($program->quota)
            <div class="flex flex-col">
                <span class="text-[10px] uppercase font-bold text-white/40 mb-1">Kuota</span>
                <span class="inline-flex items-center gap-2 font-semibold text-white">
                    <svg class="w-4 h-4 text-[#C0001E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    {{ $program->quota }} Siswa
                </span>
            </div>
            @endif
            
            <div class="flex flex-col">
                <span class="text-[10px] uppercase font-bold text-white/40 mb-1">Biaya Pendidikan</span>
                <span class="inline-flex items-center gap-2 font-bold text-lg {{ $program->is_free ? 'text-[#10B981]' : 'text-[#C0001E]' }}">
                    {{ $program->formatted_price }}
                </span>
            </div>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- MAIN CONTENT --}}
{{-- ============================================= --}}
<section class="py-12 lg:py-24 bg-[#F9F5F2]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
            
            {{-- Left: Main Content --}}
            <div class="lg:col-span-2 space-y-12">

                {{-- Thumbnail Content --}}
                @if($program->thumbnail)
                <div class="aspect-[16/9] rounded-2xl overflow-hidden shadow-xl border-2 border-white relative group">
                    <div class="absolute inset-0 bg-[#C0001E]/0 group-hover:bg-[#C0001E]/10 transition-colors duration-500 z-10 pointer-events-none"></div>
                    <img src="{{ asset('media/' . $program->thumbnail) }}" alt="{{ $program->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                </div>
                @endif

                {{-- Deskripsi Program --}}
                <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-sm border border-[#E5E7EB]">
                    <div class="flex items-center gap-4 mb-6 pb-4 border-b border-[#F3F4F6]">
                        <div class="w-12 h-12 bg-[#111111] rounded-xl flex items-center justify-center shrink-0">
                            <span class="font-jp text-xl text-[#C0001E]">詳</span>
                        </div>
                        <h2 class="font-heading text-2xl font-bold text-[#111111]">Deskripsi Program</h2>
                    </div>
                    <div class="prose prose-sm sm:prose-base max-w-none text-[#6B7280] leading-relaxed prose-headings:font-heading prose-headings:text-[#111111] prose-a:text-[#C0001E] prose-li:marker:text-[#C0001E]">
                        {!! $program->description !!}
                    </div>
                </div>

                {{-- Kurikulum / Silabus --}}
                @if($program->curriculum)
                <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-sm border border-[#E5E7EB]">
                    <div class="flex items-center gap-4 mb-6 pb-4 border-b border-[#F3F4F6]">
                        <div class="w-12 h-12 bg-[#111111] rounded-xl flex items-center justify-center shrink-0">
                            <span class="font-jp text-xl text-[#C0001E]">学</span>
                        </div>
                        <h2 class="font-heading text-2xl font-bold text-[#111111]">Kurikulum & Materi</h2>
                    </div>
                    <div class="prose prose-sm sm:prose-base max-w-none text-[#6B7280] leading-relaxed prose-headings:font-heading prose-headings:text-[#111111] prose-a:text-[#C0001E] prose-li:marker:text-[#C0001E]">
                        {!! $program->curriculum !!}
                    </div>
                </div>
                @endif

                {{-- Fasilitas --}}
                @if($program->facilities)
                <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-sm border border-[#E5E7EB]">
                    <div class="flex items-center gap-4 mb-6 pb-4 border-b border-[#F3F4F6]">
                         <div class="w-12 h-12 bg-[#111111] rounded-xl flex items-center justify-center shrink-0">
                            <span class="font-jp text-xl text-[#C0001E]">設</span>
                        </div>
                        <h2 class="font-heading text-2xl font-bold text-[#111111]">Fasilitas Pelatihan</h2>
                    </div>
                    <div class="prose prose-sm sm:prose-base max-w-none text-[#6B7280] leading-relaxed prose-headings:font-heading prose-headings:text-[#111111] prose-a:text-[#C0001E] prose-li:marker:text-[#C0001E]">
                        {!! $program->facilities !!}
                    </div>
                </div>
                @endif

                {{-- Persyaratan --}}
                @if($program->requirements)
                <div class="bg-[#111111] p-6 sm:p-8 rounded-2xl shadow-xl border border-white/5 text-white relative overflow-hidden">
                    <div class="absolute right-[-10%] top-[-20%] text-[200px] leading-none font-jp text-white/5 select-none pointer-events-none z-0">格</div>
                    <div class="relative z-10">
                        <div class="flex items-center gap-4 mb-6 pb-4 border-b border-white/10">
                            <div class="w-12 h-12 bg-[#C0001E] rounded-xl flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <h2 class="font-heading text-2xl font-bold text-white">Persyaratan Pendaftaran</h2>
                        </div>
                        <div class="prose prose-sm sm:prose-base max-w-none text-white/80 leading-relaxed prose-headings:font-heading prose-headings:text-white prose-strong:text-white prose-li:marker:text-[#C0001E]">
                            {!! $program->requirements !!}
                        </div>
                    </div>
                </div>
                @endif

                {{-- Testimoni Alumni Program Ini --}}
                @if($program->testimonials->count() > 0)
                <div>
                    <div class="flex items-center gap-4 mb-8">
                        <span class="font-jp text-3xl text-[#C0001E]">声</span>
                        <h2 class="font-heading text-2xl font-bold text-[#111111]">Suara Senpai (Alumni)</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($program->testimonials as $testimonial)
                        <div class="bg-white rounded-2xl p-6 border border-[#E5E7EB] shadow-sm relative">
                            <div class="absolute top-6 right-6 text-6xl text-[#F9F5F2] font-serif leading-none italic pointer-events-none">"</div>
                            <div class="flex items-center gap-1 mb-4 relative z-10">
                                @for($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 {{ $i <= $testimonial->rating ? 'text-[#FFD700]' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>
                                @endfor
                            </div>
                            <p class="text-sm text-[#111111] italic mb-6 leading-relaxed relative z-10">"{{ $testimonial->content }}"</p>
                            <div class="flex items-center gap-3 pt-4 border-t border-[#F3F4F6] relative z-10">
                                @if($testimonial->photo)
                                <img src="{{ asset('media/' . $testimonial->photo) }}" alt="{{ $testimonial->name }}" class="w-10 h-10 rounded-full object-cover border border-[#E5E7EB]">
                                @else
                                <div class="w-10 h-10 rounded-full bg-[#111111] flex items-center justify-center text-white font-bold text-sm">
                                    {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                                </div>
                                @endif
                                <div>
                                    <p class="text-sm font-bold text-[#111111]">{{ $testimonial->name }}</p>
                                    <p class="text-[11px] font-bold uppercase tracking-wider text-[#C0001E]">Kenshusei / Alumni</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            {{-- Right: Sidebar (Sticky) --}}
            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">
                    
                    {{-- Info Card --}}
                    <div class="bg-white border-t-4 border-t-[#C0001E] rounded-b-2xl p-6 sm:p-8 shadow-xl">
                        <h3 class="font-heading text-lg font-bold text-[#111111] mb-6 flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#C0001E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Ringkasan Program
                        </h3>
                        
                        <div class="space-y-4">
                            @if($program->duration)
                            <div class="flex flex-col py-3 border-b border-[#F3F4F6]">
                                <span class="text-[11px] font-bold text-[#6B7280] uppercase tracking-wider mb-1">Durasi Pelatihan</span>
                                <span class="text-sm font-semibold text-[#111111]">{{ $program->duration }}</span>
                            </div>
                            @endif
                            @if($program->schedule)
                            <div class="flex flex-col py-3 border-b border-[#F3F4F6]">
                                <span class="text-[11px] font-bold text-[#6B7280] uppercase tracking-wider mb-1">Jadwal Masuk</span>
                                <span class="text-sm font-semibold text-[#111111]">{{ $program->schedule }}</span>
                            </div>
                            @endif
                            @if($program->quota)
                            <div class="flex flex-col py-3 border-b border-[#F3F4F6]">
                                <span class="text-[11px] font-bold text-[#6B7280] uppercase tracking-wider mb-1">Kuota Kelas</span>
                                <span class="text-sm font-semibold text-[#111111]">{{ $program->quota }} Siswa / Gelombang</span>
                            </div>
                            @endif
                            <div class="flex flex-col py-3 border-b border-[#F3F4F6]">
                                <span class="text-[11px] font-bold text-[#6B7280] uppercase tracking-wider mb-1">Kategori Utama</span>
                                <span class="text-sm font-semibold text-[#111111]">{{ $program->category->name }}</span>
                            </div>
                            <div class="flex flex-col pt-3 pb-2">
                                <span class="text-[11px] font-bold text-[#6B7280] uppercase tracking-wider mb-1">Total Biaya Pendidikan</span>
                                <span class="text-xl font-bold {{ $program->is_free ? 'text-[#10B981]' : 'text-[#C0001E]' }}">
                                    {{ $program->formatted_price }}
                                </span>
                            </div>
                        </div>

                        {{-- CTA Buttons --}}
                        <div class="mt-8 space-y-3">
                            <a href="{{ url('/daftar?type=pelatihan&program_id=' . $program->id) }}"
                               class="btn-nakami-primary w-full justify-center py-4">
                                Daftar Kelas Sekarang
                            </a>
                            <a href="https://wa.me/{{ setting('contact_wa_admin') }}?text={{ urlencode('Konnichiwa minna, saya tertarik dengan program ' . $program->name . ' di LPK Nakami. Boleh minta informasi alurnya Sensei?') }}"
                               target="_blank"
                               class="btn-nakami-outline w-full justify-center py-4 border-[#111111] text-[#111111] hover:bg-[#111111] hover:text-white flex items-center gap-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                                Konsultasi Admin
                            </a>
                        </div>
                    </div>

                    {{-- Share --}}
                    <div class="bg-transparent border border-[#E5E7EB] rounded-2xl p-6">
                        <h4 class="text-[11px] font-bold text-[#6B7280] uppercase tracking-wider mb-4">Bagikan Info Program Ini</h4>
                        <div class="flex items-center gap-3">
                            <a href="https://wa.me/?text={{ urlencode($program->name . ' - ' . url()->current()) }}"
                               target="_blank"
                               class="w-10 h-10 bg-[#25D366] rounded-full flex items-center justify-center text-white hover:scale-110 transition-transform shadow-sm">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                               target="_blank"
                               class="w-10 h-10 bg-[#1877F2] rounded-full flex items-center justify-center text-white hover:scale-110 transition-transform shadow-sm">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                            <button onclick="navigator.clipboard.writeText('{{ url()->current() }}'); this.querySelector('span').textContent = 'Tersalin!'; setTimeout(() => this.querySelector('span').textContent = 'Salin Link', 2000)"
                                    class="flex-1 inline-flex justify-center items-center gap-2 h-10 bg-white border border-[#E5E7EB] rounded-full text-xs font-bold text-[#111111] hover:bg-[#F9F5F2] transition-colors shadow-sm uppercase tracking-wider">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                                <span>Salin Link</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- STICKY MOBILE CTA --}}
{{-- ============================================= --}}
<div class="fixed bottom-0 left-0 right-0 z-40 lg:hidden bg-white border-t border-[#E5E7EB] shadow-[0_-10px_30px_rgba(0,0,0,0.1)] px-4 py-4 safe-area-bottom pb-6">
    <div class="flex items-center gap-4">
        <div class="flex-1">
            <p class="text-[10px] font-bold text-[#6B7280] uppercase tracking-wider mb-0.5">Biaya Program</p>
            <p class="text-[15px] font-bold {{ $program->is_free ? 'text-[#10B981]' : 'text-[#C0001E]' }}">{{ $program->formatted_price }}</p>
        </div>
        <a href="{{ url('/daftar?type=pelatihan&program_id=' . $program->id) }}"
           class="btn-nakami-primary px-6 shrink-0">
            Daftar Sekarang
        </a>
    </div>
</div>

{{-- Bottom padding for sticky CTA on mobile --}}
<div class="h-24 lg:h-0"></div>

@endsection
