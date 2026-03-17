@extends('layouts.app')

@section('title', setting('seo_meta_title', 'LPK Nakami Indonesia — Japanese Learning Center'))

@section('content')

{{-- ============================================= --}}
{{-- SECTION 1: HERO NAKAMI --}}
{{-- ============================================= --}}
<section class="relative bg-[#111111] overflow-hidden">
    {{-- Background Image & Overlay --}}
    <div class="absolute inset-0">
        @if(setting('home_hero_image'))
            <img src="{{ asset('media/' . setting('home_hero_image')) }}" alt="Hero Background" class="w-full h-full object-cover opacity-30 mix-blend-luminosity">
        @else
            {{-- Fallback pattern --}}
            <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2240%22%20height%3D%2240%22%20viewBox%3D%220%200%2040%2040%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20d%3D%22M20%2020.5V18H0v-2h20v-2H0v-2h20v-2H0V8h20V6H0V4h20V2H0V0h22v20h2V0h2v20h2V0h2v20h2V0h2v20h2V0h2v20h2v2H20v-1.5zM0%2020h2v20H0V20zm4%200h2v20H4V20zm4%200h2v20H8V20zm4%200h2v20h-2V20zm4%200h2v20h-2V20zm4%204h20v2H20v-2zm0%204h20v2H20v-2zm0%204h20v2H20v-2zm0%204h20v2H20v-2z%22%20fill%3D%22%23C0001E%22%20fill-opacity%3D%220.05%22%20fill-rule%3D%22evenodd%22%2F%3E%3C%2Fsvg%3E')] opacity-30"></div>
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-[#111111] via-[#111111]/80 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#111111] via-[#111111]/80 to-transparent"></div>
    </div>

    {{-- Decor: Big Kanji Silhouette --}}
    <div class="absolute right-[-5%] top-[10%] text-[400px] leading-none font-jp text-white/5 select-none pointer-events-none hidden md:block">
        夢
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32 xl:py-40">
        <div class="max-w-3xl">
            {{-- Trust Badges --}}
            <div class="flex flex-wrap items-center gap-3 mb-8">
                <span class="badge-nakami bg-white/10 text-white border-white/20">
                    <svg class="w-3.5 h-3.5 text-[#C0001E]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>
                    Resmi & Terdaftar
                </span>
                <span class="badge-nakami bg-white/10 text-white border-white/20">
                    <svg class="w-3.5 h-3.5 text-[#C0001E]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                    Kerjasama Langsung Jepang
                </span>
            </div>

            {{-- Branding --}}
            <div class="flex items-center gap-3 mb-4">
                <span class="w-12 h-px bg-[#C0001E]"></span>
                <span class="text-[#C0001E] text-xs font-bold uppercase tracking-widest">Nakami Indonesia</span>
            </div>

            {{-- Headline --}}
            <h1 class="font-heading text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-[1.15] mb-6">
                {{ setting('home_hero_headline', 'Wujudkan Mimpimu Bekerja & Belajar di Jepang') }}
            </h1>

            {{-- Subheadline --}}
            <p class="text-lg sm:text-xl text-white/70 leading-relaxed mb-10 max-w-2xl">
                {{ setting('home_hero_subheadline', 'LPK Nakami Indonesia mempersiapkan Anda dengan pelatihan bahasa dan skill profesional untuk meraih karir cemerlang di Jepang.') }}
            </p>

            {{-- CTA Buttons --}}
            <div class="flex flex-wrap items-center gap-4">
                <a href="{{ url('/program') }}" class="btn-nakami-primary px-8 py-4 text-base">
                    Pilih Program Anda
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="https://wa.me/{{ setting('contact_wa_admin') }}" target="_blank" class="btn-nakami-outline-white px-8 py-4 text-base">
                    Konsultasi Gratis
                </a>
            </div>
        </div>
    </div>
    
    {{-- Gradient Bottom Line --}}
    <div class="absolute bottom-0 left-0 right-0 h-2 bg-gradient-to-r from-[#111111] via-[#C0001E] to-[#111111]"></div>
</section>

{{-- ============================================= --}}
{{-- SECTION 2: STATISTIK / ANGKA --}}
{{-- ============================================= --}}
<section class="relative bg-white pt-16 pb-12 lg:pt-20 lg:pb-16 -mt-6 z-10 rounded-t-3xl border-t-4 border-[#C0001E]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 lg:gap-12" x-data="{ shown: false }" x-intersect.once="shown = true">
            <div class="text-center group" x-data="{ count: 0, target: {{ setting('home_stat_alumni', '500') }} }" x-init="$watch('shown', val => { if(val) { let c=0; let step=Math.max(1, Math.ceil(target/40)); let i=setInterval(()=>{ c+=step; if(c>=target){count=target; clearInterval(i);}else{count=c;} }, 50); } })">
                <div class="text-4xl lg:text-5xl font-heading font-black text-[#111111] mb-2 counter-animate" x-show="shown">
                    <span x-text="count">0</span><span class="text-[#C0001E]">+</span>
                </div>
                <p class="text-sm font-semibold text-[#6B7280] uppercase tracking-wider">Siswa Berangkat</p>
                <div class="h-1 w-12 bg-[#C0001E] mx-auto mt-4 rounded-full scale-0 group-hover:scale-100 transition-transform"></div>
            </div>
            
            <div class="text-center group" x-data="{ count: 0, target: {{ setting('home_stat_years', '5') }} }" x-init="$watch('shown', val => { if(val) { setTimeout(() => { let c=0; let step=Math.max(1, Math.ceil(target/40)); let i=setInterval(()=>{ c+=step; if(c>=target){count=target; clearInterval(i);}else{count=c;} }, 50); }, 200); } })">
                <div class="text-4xl lg:text-5xl font-heading font-black text-[#111111] mb-2 counter-animate" x-show="shown" style="animation-delay: 100ms">
                    <span x-text="count">0</span><span class="text-[#C0001E]">+</span>
                </div>
                <p class="text-sm font-semibold text-[#6B7280] uppercase tracking-wider">Tahun Pengalaman</p>
                <div class="h-1 w-12 bg-[#C0001E] mx-auto mt-4 rounded-full scale-0 group-hover:scale-100 transition-transform"></div>
            </div>
            
            <div class="text-center group" x-data="{ count: 0, target: {{ setting('home_stat_programs', '4') }} }" x-init="$watch('shown', val => { if(val) { setTimeout(() => { let c=0; let step=Math.max(1, Math.ceil(target/40)); let i=setInterval(()=>{ c+=step; if(c>=target){count=target; clearInterval(i);}else{count=c;} }, 50); }, 400); } })">
                <div class="text-4xl lg:text-5xl font-heading font-black text-[#111111] mb-2 counter-animate" x-show="shown" style="animation-delay: 200ms">
                    <span x-text="count">0</span>
                </div>
                <p class="text-sm font-semibold text-[#6B7280] uppercase tracking-wider">Pilihan Program</p>
                <div class="h-1 w-12 bg-[#C0001E] mx-auto mt-4 rounded-full scale-0 group-hover:scale-100 transition-transform"></div>
            </div>
            
            <div class="text-center group" x-data="{ count: 0, target: {{ setting('home_stat_partners', '50') }} }" x-init="$watch('shown', val => { if(val) { setTimeout(() => { let c=0; let step=Math.max(1, Math.ceil(target/40)); let i=setInterval(()=>{ c+=step; if(c>=target){count=target; clearInterval(i);}else{count=c;} }, 50); }, 600); } })">
                <div class="text-4xl lg:text-5xl font-heading font-black text-[#111111] mb-2 counter-animate" x-show="shown" style="animation-delay: 300ms">
                    <span x-text="count">0</span><span class="text-[#C0001E]">+</span>
                </div>
                <p class="text-sm font-semibold text-[#6B7280] uppercase tracking-wider">Mitra Perusahaan (JP)</p>
                <div class="h-1 w-12 bg-[#C0001E] mx-auto mt-4 rounded-full scale-0 group-hover:scale-100 transition-transform"></div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- SECTION 3: TENTANG SINGKAT --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24 bg-[#F9F5F2] relative overflow-hidden">
    {{-- Kanji Accent --}}
    <div class="absolute left-[-5%] top-[10%] text-[300px] leading-none font-jp text-white select-none pointer-events-none -z-0">
        誠
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            
            {{-- Content --}}
            <div class="order-2 lg:order-1">
                <div class="flex items-center gap-3 mb-4">
                    <span class="h-px w-12 bg-[#C0001E]"></span>
                    <span class="text-[#C0001E] text-sm font-bold uppercase tracking-widest">Tentang Kami</span>
                </div>
                <h2 class="font-heading text-3xl lg:text-4xl font-bold text-[#111111] mb-6 leading-tight">
                    Jembatan Menuju Masa Depan Anda di Jepang
                </h2>
                <p class="text-[#6B7280] leading-relaxed mb-8">
                    {{ setting('site_description', 'LPK Nakami Indonesia adalah Lembaga Pelatihan Kerja terpercaya yang fokus pada program pemagangan, keahlian spesifik (Tokutei Ginou), engineering, serta sekolah bahasa di Jepang.') }}
                </p>

                {{-- Highlights --}}
                <div class="space-y-5 mb-8">
                    <div class="flex items-start gap-4 p-4 bg-white rounded-xl shadow-sm border border-[#E5E7EB]">
                        <div class="w-12 h-12 bg-[#C0001E]/10 rounded-full flex items-center justify-center shrink-0">
                            <span class="font-jp text-xl text-[#C0001E]">学</span>
                        </div>
                        <div>
                            <h4 class="text-base font-bold text-[#111111]">Metode Pembelajaran Efektif</h4>
                            <p class="text-sm text-[#6B7280] leading-relaxed mt-1">Kurikulum terstruktur untuk mencapai N4/N3 dalam waktu singkat didampingi sensei berpengalaman.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-4 bg-white rounded-xl shadow-sm border border-[#E5E7EB]">
                        <div class="w-12 h-12 bg-[#C0001E]/10 rounded-full flex items-center justify-center shrink-0">
                            <span class="font-jp text-xl text-[#C0001E]">職</span>
                        </div>
                        <div>
                            <h4 class="text-base font-bold text-[#111111]">Jaminan Penempatan Kerja</h4>
                            <p class="text-sm text-[#6B7280] leading-relaxed mt-1">Bekerjasama langsung dengan Sending Organization (SO) & penerima kerja (TSK/Kumiai) di Jepang.</p>
                        </div>
                    </div>
                </div>

                <a href="{{ url('/tentang') }}" class="btn-nakami-primary">
                    Profil Lengkap Nakami
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

            {{-- Image --}}
            <div class="order-1 lg:order-2 relative">
                <div class="absolute inset-0 translate-x-4 translate-y-4 rounded-2xl border-2 border-[#C0001E] -z-10 bg-[#F9F5F2]"></div>
                <div class="aspect-[4/5] sm:aspect-square rounded-2xl bg-white overflow-hidden shadow-2xl relative z-10">
                    @if(setting('site_about_image'))
                        <img src="{{ asset('media/' . setting('site_about_image')) }}" alt="Tentang LPK Nakami" class="w-full h-full object-cover">
                    @else
                        {{-- Fallback --}}
                        <div class="w-full h-full bg-[#1E1E1E] flex flex-col items-center justify-center p-8 text-center">
                            <span class="font-jp text-8xl text-[#C0001E]/20 mb-4">日本</span>
                            <p class="text-white/30 text-sm">Masukan foto LPK Nakami di Pengaturan</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- SECTION 4: PROGRAM UNGGULAN --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24 bg-white relative overflow-hidden">
    {{-- Kanji Accent Decor --}}
    <div class="absolute left-[-5%] top-[20%] text-[300px] leading-none font-jp text-[#F9F5F2] select-none pointer-events-none -z-10">
        道
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
            <div class="max-w-2xl">
                <div class="flex items-center gap-3 mb-4">
                    <span class="h-px w-12 bg-[#C0001E]"></span>
                    <span class="text-[#C0001E] text-sm font-bold uppercase tracking-widest">Program Pelatihan</span>
                </div>
                <h2 class="font-heading text-3xl lg:text-4xl font-bold text-[#111111] leading-tight">
                    Pilih Jalur Karir Anda ke Jepang
                </h2>
            </div>
            <a href="{{ url('/program') }}" class="btn-nakami-outline shrink-0 hidden md:inline-flex">
                Lihat Semua Program
            </a>
        </div>

        {{-- Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($programs->take(4) as $program)
            <div class="group bg-white border border-[#E5E7EB] rounded-2xl overflow-hidden hover:shadow-2xl hover:border-[#C0001E]/30 transition-all duration-300 card-hover flex flex-col h-full">
                {{-- Thumbnail --}}
                <div class="aspect-[4/3] bg-[#1E1E1E] relative overflow-hidden">
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
                    
                    <p class="text-sm text-[#6B7280] mb-6 line-clamp-3 flex-1">
                        {{ $program->short_description }}
                    </p>

                    <div class="border-t border-[#F3F4F6] pt-4 mt-auto">
                        <a href="{{ url('/program/' . $program->slug) }}" class="flex items-center justify-between group/link">
                            <span class="text-sm font-bold text-[#111111] group-hover/link:text-[#C0001E] transition-colors">Lihat Detail</span>
                            <div class="w-8 h-8 rounded-full bg-[#F9F5F2] flex items-center justify-center group-hover/link:bg-[#C0001E] group-hover/link:text-white text-[#111111] transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-10 md:hidden">
            <a href="{{ url('/program') }}" class="btn-nakami-outline w-full justify-center">
                Lihat Semua Program
            </a>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- SECTION 5: LOWONGAN TERBARU --}}
{{-- ============================================= --}}
@if($lowongans->count() > 0)
<section class="py-16 lg:py-24 bg-[#F9F5F2] relative overflow-hidden">
    {{-- Kanji Accent --}}
    <div class="absolute right-[-5%] bottom-[10%] text-[250px] leading-none font-jp text-white select-none pointer-events-none -z-0">
        職
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
            <div class="max-w-2xl">
                <div class="flex items-center gap-3 mb-4">
                    <span class="h-px w-12 bg-[#C0001E]"></span>
                    <span class="text-[#C0001E] text-sm font-bold uppercase tracking-widest">Peluang Karir</span>
                </div>
                <h2 class="font-heading text-3xl lg:text-4xl font-bold text-[#111111] leading-tight">
                    Lowongan Kerja Terbaru di Jepang
                </h2>
                <p class="text-[#6B7280] mt-4">Ambil langkah pertama menuju karir impian Anda dengan berbagai lowongan pekerjaan menarik dari mitra perusahaan kami di Jepang.</p>
            </div>
            <a href="{{ url('/lowongan') }}" class="btn-nakami-outline shrink-0 hidden md:inline-flex">
                Lihat Semua Lowongan
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($lowongans as $job)
            <div class="group bg-white rounded-2xl p-6 border border-[#E5E7EB] hover:border-[#C0001E]/30 hover:shadow-xl transition-all duration-300 flex flex-col h-full">
                <div class="mb-5 flex items-center justify-between">
                    <span class="px-2.5 py-1 rounded-lg bg-[#C0001E]/10 text-[#C0001E] text-[10px] font-bold uppercase tracking-wider">
                        {{ $job->program }}
                    </span>
                    <div class="flex items-center gap-1 text-[#6B7280]">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                        <span class="text-xs font-medium">{{ $job->lokasi }}</span>
                    </div>
                </div>

                <h3 class="font-heading text-lg font-bold text-[#111111] mb-4 group-hover:text-[#C0001E] transition-colors leading-tight min-h-[44px]">
                    {{ $job->judul }}
                </h3>

                <div class="space-y-3 mb-6 flex-1">
                    <div class="text-xs text-[#6B7280] flex items-start gap-2">
                        <span class="text-[#C0001E]">•</span>
                        <span class="line-clamp-3">{{ Str::limit(strip_tags($job->persyaratan), 100) }}</span>
                    </div>
                </div>

                <div class="pt-5 border-t border-[#F3F4F6]">
                    <a href="https://wa.me/{{ setting('contact_wa_admin') }}?text=Halo%20Admin%20LPK%20Nakami%2C%20saya%20tertarik%20dengan%20lowongan%20{{ urlencode($job->judul) }}" 
                       target="_blank"
                       class="flex items-center justify-center gap-2 w-full py-2.5 bg-[#111111] text-white text-xs font-bold rounded-xl hover:bg-[#C0001E] transition-colors">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                        Lamar via WA
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-10 md:hidden">
            <a href="{{ url('/lowongan') }}" class="btn-nakami-outline w-full justify-center">
                Lihat Semua Lowongan
            </a>
        </div>
    </div>
</section>
@endif

{{-- ============================================= --}}
{{-- SECTION 6: MENGAPA MEMILIH NAKAMI --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24 bg-[#111111] text-white relative">
    {{-- Decor --}}
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-[#C0001E] via-[#111111] to-[#111111]"></div>
    <div class="nakami-divider absolute top-0 left-0 right-0"></div>
    
    {{-- Kanji Decor --}}
    <div class="absolute left-[2%] bottom-[5%] text-[200px] leading-none font-jp text-white/5 select-none pointer-events-none -z-0">
        心
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <span class="badge-nakami bg-white/10 text-white border-white/20 mb-4">Keunggulan LPK</span>
            <h2 class="font-heading text-3xl lg:text-4xl font-bold leading-tight">Mengapa Memilih Nakami?</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @php
            $features = [
                ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>', 'title' => 'Kurikulum Terpadu', 'desc' => 'Materi disesuaikan dengan standar ujian JLPT, JFT-Basic, dan SSW untuk ke Jepang.'],
                ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>', 'title' => 'Koneksi TSK & Kumiai', 'desc' => 'Kerjasama langsung dengan receiving organization (TSK) di Jepang, tanpa perantara.'],
                ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>', 'title' => 'Legalitas Resmi', 'desc' => 'Izin lembaga pelatihan kerja resmi dari Disnaker dan kementerian terkait.'],
                ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>', 'title' => 'Asrama / Mess', 'desc' => 'Tersedia fasilitas mess/asrama gratis untuk siswa dari luar kota selama masa pendidikan.'],
                ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>', 'title' => 'Sensei Native & N2', 'desc' => 'Pengajar bersertifikat JLPT N2 & native speaker yang pernah bekerja di Jepang.'],
                ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>', 'title' => 'Wawancara Cepat', 'desc' => 'Proses seleksi dan mensetsu (wawancara) rutin diadakan setiap bulan dengan user Jepang.'],
            ];
            @endphp
            @foreach($features as $feature)
            <div class="bg-[#1E1E1E] rounded-2xl p-6 border border-white/5 hover:border-[#C0001E]/50 transition-colors group">
                <div class="w-12 h-12 bg-[#C0001E]/20 rounded-xl flex items-center justify-center mb-5 group-hover:bg-[#C0001E] transition-colors">
                    <svg class="w-6 h-6 text-[#C0001E] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $feature['icon'] !!}</svg>
                </div>
                <h3 class="font-heading text-lg font-bold text-white mb-2">{{ $feature['title'] }}</h3>
                <p class="text-sm text-white/60 leading-relaxed">{{ $feature['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- SECTION 8: TESTIMONI --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24 bg-[#F9F5F2] relative overflow-hidden">
    {{-- Kanji Decor --}}
    <div class="absolute right-[-5%] top-[15%] text-[280px] leading-none font-jp text-white select-none pointer-events-none -z-0">
        絆
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="badge-nakami mb-4">Ulasan Siswa</span>
            <h2 class="font-heading text-3xl lg:text-4xl font-bold text-[#111111] min-h-[48px]">Suara Senpai dari Jepang</h2>
        </div>

        @if($testimonials->count() > 0)
        <div class="relative overflow-hidden marquee-container py-4"
             style="mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent); -webkit-mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);">
            <div class="flex gap-6 animate-marquee">
                {{-- Loop testimoni 2x untuk ilusi endless scroll --}}
                @foreach($testimonials as $testimonial)
                <div class="bg-white rounded-2xl p-6 shrink-0 w-[340px] shadow-sm border border-[#E5E7EB]">
                    <div class="flex items-center gap-1 mb-4">
                        @for($i = 1; $i <= 5; $i++)
                        <svg class="w-4 h-4 {{ $i <= $testimonial->rating ? 'text-[#FFD700]' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>
                        @endfor
                    </div>
                    <p class="text-sm text-[#111111] leading-relaxed italic mb-6 line-clamp-4">"{{ $testimonial->content }}"</p>
                    <div class="flex items-center gap-3 pt-4 border-t border-[#F3F4F6]">
                        @if($testimonial->photo)
                        <img src="{{ asset('media/' . $testimonial->photo) }}" alt="{{ $testimonial->name }}" class="w-12 h-12 rounded-full object-cover border-2 border-[#C0001E]">
                        @else
                        <div class="w-12 h-12 rounded-full bg-[#111111] flex items-center justify-center text-white font-bold text-lg shrink-0 border-2 border-[#C0001E]">{{ strtoupper(substr($testimonial->name, 0, 1)) }}</div>
                        @endif
                        <div>
                            <p class="text-sm font-bold text-[#111111]">{{ $testimonial->name }}</p>
                            <p class="text-[11px] text-[#6B7280] font-medium uppercase mt-0.5">
                                {{ $testimonial->type === 'alumni' ? 'Alumni' : 'Siswa' }}
                                @if($testimonial->program) • {{ $testimonial->program->category->name }} @endif
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                
                {{-- Duplicated cards --}}
                @foreach($testimonials as $testimonial)
                <div class="bg-white rounded-2xl p-6 shrink-0 w-[340px] shadow-sm border border-[#E5E7EB]">
                    <div class="flex items-center gap-1 mb-4">
                        @for($i = 1; $i <= 5; $i++)
                        <svg class="w-4 h-4 {{ $i <= $testimonial->rating ? 'text-[#FFD700]' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>
                        @endfor
                    </div>
                    <p class="text-sm text-[#111111] leading-relaxed italic mb-6 line-clamp-4">"{{ $testimonial->content }}"</p>
                    <div class="flex items-center gap-3 pt-4 border-t border-[#F3F4F6]">
                        @if($testimonial->photo)
                        <img src="{{ asset('media/' . $testimonial->photo) }}" alt="{{ $testimonial->name }}" class="w-12 h-12 rounded-full object-cover border-2 border-[#C0001E]">
                        @else
                        <div class="w-12 h-12 rounded-full bg-[#111111] flex items-center justify-center text-white font-bold text-lg shrink-0 border-2 border-[#C0001E]">{{ strtoupper(substr($testimonial->name, 0, 1)) }}</div>
                        @endif
                        <div>
                            <p class="text-sm font-bold text-[#111111]">{{ $testimonial->name }}</p>
                            <p class="text-[11px] text-[#6B7280] font-medium uppercase mt-0.5">
                                {{ $testimonial->type === 'alumni' ? 'Alumni' : 'Siswa' }}
                                @if($testimonial->program) • {{ $testimonial->program->category->name }} @endif
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
    </div>
</section>

{{-- ============================================= --}}
{{-- SECTION 10: CTA BANNER --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative bg-[#C0001E] rounded-3xl overflow-hidden px-6 sm:px-12 py-16 text-center shadow-2xl shadow-red-900/20">
            {{-- Decorative Pattern --}}
            <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2240%22%20height%3D%2240%22%20viewBox%3D%220%200%2040%2040%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20d%3D%22M20%2020.5V18H0v-2h20v-2H0v-2h20v-2H0V8h20V6H0V4h20V2H0V0h22v20h2V0h2v20h2V0h2v20h2V0h2v20h2V0h2v20h2v2H20v-1.5zM0%2020h2v20H0V20zm4%200h2v20H4V20zm4%200h2v20H8V20zm4%200h2v20h-2V20zm4%200h2v20h-2V20zm4%204h20v2H20v-2zm0%204h20v2H20v-2zm0%204h20v2H20v-2zm0%204h20v2H20v-2z%22%20fill%3D%22%23000000%22%20fill-opacity%3D%220.1%22%20fill-rule%3D%22evenodd%22%2F%3E%3C%2Fsvg%3E')] opacity-20 mix-blend-multiply"></div>
            
            {{-- Kanji Decor --}}
            <div class="absolute right-[-2%] top-[-10%] text-[250px] leading-none font-jp text-white/10 select-none pointer-events-none -z-0">
                栄
            </div>

            <div class="relative z-10">
                <h2 class="font-heading text-3xl lg:text-5xl font-bold text-white mb-6 leading-tight">
                    {{ setting('home_cta_text', 'Mulai Perjalanan Anda ke Jepang Hari Ini!') }}
                </h2>
                <p class="text-white/90 text-lg mb-10 max-w-2xl mx-auto">
                    {{ setting('home_cta_subtext', 'Pendaftaran kelas bahasa dan pembekalan skill baru telah dibuka. Jangan lewatkan kesempatan khusus ini.') }}
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ url('/daftar?type=pelatihan') }}" class="btn-nakami-primary bg-[#111111] hover:bg-black w-full sm:w-auto text-center justify-center">
                        Daftar Kelas Sekarang
                    </a>
                    <a href="https://wa.me/{{ setting('contact_wa_admin') }}" target="_blank" class="btn-nakami-outline-white w-full sm:w-auto text-center justify-center">
                        Butuh Bantuan? Tanya Admin
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
