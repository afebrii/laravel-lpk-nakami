@extends('layouts.app')

@section('title', 'Tentang Kami — LPK Nakami Indonesia')
@section('meta_description', 'Profil, sejarah, visi misi, dan legalitas LPK Nakami Indonesia — Lembaga Pelatihan Kerja untuk karir di Jepang.')

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

    {{-- Kanji Watermark --}}
    <div class="absolute right-[5%] top-[10%] text-[250px] leading-none font-jp text-white/5 select-none pointer-events-none hidden md:block">
        中身
    </div>
    
    <div class="nakami-divider absolute bottom-0 left-0 right-0 z-10"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 z-10">
        @include('components.breadcrumb', ['items' => [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Tentang Kami']
        ]])
        
        <div class="flex items-center gap-3 mb-4 mt-4">
            <span class="w-12 h-px bg-[#C0001E]"></span>
            <span class="text-[#C0001E] text-xs font-bold uppercase tracking-widest">Nakami Indonesia • Profil</span>
        </div>

        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4">
            Membangun Jembatan<br>Menuju <span class="text-[#C0001E]">Masa Depan</span>
        </h1>
        <p class="text-lg text-white/70 max-w-2xl">
            Mengenal lebih dekat LPK Nakami Indonesia — mitra terpercaya Anda untuk meraih mimpi karir di Jepang.
        </p>
    </div>
</section>

{{-- ============================================= --}}
{{-- LATAR BELAKANG & SEJARAH --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24 bg-[#F9F5F2]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            
            {{-- Image --}}
            <div class="relative order-2 lg:order-1">
                <div class="absolute inset-0 translate-x-[-16px] translate-y-[16px] rounded-2xl border-2 border-[#C0001E] -z-10 bg-[#F9F5F2]"></div>
                <div class="aspect-[4/3] rounded-2xl bg-[#1E1E1E] overflow-hidden shadow-2xl relative z-10">
                    @if(setting('site_about_image'))
                        <img src="{{ asset('media/' . setting('site_about_image')) }}" alt="Tentang LPK Nakami" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700">
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-[#C0001E]/40">
                            <span class="font-jp text-8xl mb-4">歴史</span>
                            <span class="text-xs uppercase tracking-widest font-bold">Image Placeholder</span>
                        </div>
                    @endif
                </div>
                {{-- Badge Info --}}
                <div class="absolute -bottom-6 -right-6 lg:-right-8 bg-white border border-[#E5E7EB] rounded-2xl shadow-xl p-5 z-20 flex items-center gap-4">
                     <div class="w-14 h-14 bg-[#111111] rounded-xl flex items-center justify-center text-white shrink-0">
                        <span class="font-jp text-3xl text-[#C0001E]">進</span>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-[#6B7280] uppercase tracking-wider mb-0.5">Berdiri Sejak</p>
                        <p class="text-xl font-bold text-[#111111]">Tahun 2020</p>
                    </div>
                </div>
            </div>

            {{-- Content --}}
            <div class="order-1 lg:order-2">
                <div class="flex items-center gap-3 mb-4">
                    <span class="font-jp text-4xl text-[#C0001E]/20 absolute -z-10 -ml-4 -mt-2">歩み</span>
                    <span class="text-[#C0001E] text-sm font-bold uppercase tracking-widest">Latar Belakang</span>
                </div>
                <h2 class="font-heading text-3xl lg:text-4xl font-bold text-[#111111] mb-6 leading-tight">
                    Dedikasi untuk <br>Bakat Muda Indonesia
                </h2>
                <div class="space-y-4 text-[#6B7280] leading-relaxed prose prose-sm prose-p:text-[#6B7280]">
                    <p>{{ setting('site_description', 'LPK Nakami Indonesia adalah Lembaga Pelatihan Kerja yang berfokus pada pelatihan bahasa Jepang, pengembangan skill (Ginou Jisshusei/Tokutei Ginou), serta penyaluran siswa/i terbaik untuk bekerja dan belajar di Jepang.') }}</p>
                    <p>Didirikan atas dasar tingginya minat pemuda-pemudi Indonesia untuk berkarir di Jepang, Nakami hadir untuk memberikan pendampingan yang tidak sekadar teknis bahasa, tetapi juga etos kerja, budaya, dan kedisiplinan (Shitsuke) khas Jepang.</p>
                    <p>Hingga saat ini, kami telah bekerjasama dengan puluhan Sending Organization (SO), Tsukuba, serta institusi penerima di Jepang, menjadikan Nakami sebagai jembatan yang aman dan terpercaya bagi masa depan peserta didik.</p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- VISI & MISI --}}
{{-- ============================================= --}}
<section id="visi-misi" class="py-16 lg:py-24 bg-[#111111] relative border-y border-white/10">
     {{-- Decor --}}
     <div class="absolute inset-0 opacity-10 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-[#C0001E] via-[#111111] to-[#111111]"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <span class="badge-nakami bg-white/10 text-white border-white/20 mb-4">Visi & Misi</span>
            <h2 class="font-heading text-3xl lg:text-4xl font-bold text-white">Panduan Langkah Kami</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            {{-- Visi --}}
            <div class="bg-gradient-to-br from-[#1E1E1E] to-[#111111] border border-white/10 rounded-3xl p-8 sm:p-10 relative overflow-hidden group">
                <div class="absolute right-[-5%] top-[-5%] text-9xl font-jp text-white/5 group-hover:text-white/10 transition-colors pointer-events-none">志</div>
                <div class="relative z-10">
                    <div class="w-14 h-14 bg-[#C0001E] rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-red-900/50">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <h3 class="font-heading text-2xl font-bold text-white mb-4">Visi</h3>
                    <p class="text-white/70 leading-relaxed text-lg">
                        Menjadi Lembaga Pelatihan Kerja (LPK) unggulan bertaraf internasional yang mencetak SDM Indonesia yang kompeten, beretika, tangguh, dan siap bersaing di dunia industri Jepang secara global.
                    </p>
                </div>
            </div>

            {{-- Misi --}}
            <div class="bg-white rounded-3xl p-8 sm:p-10 relative overflow-hidden group shadow-xl">
                 <div class="absolute right-[-5%] bottom-[-5%] text-9xl font-jp text-[#F9F5F2] group-hover:text-[#F3F4F6] transition-colors pointer-events-none">道</div>
                 <div class="relative z-10">
                    <div class="w-14 h-14 bg-[#111111] rounded-2xl flex items-center justify-center mb-6 text-white drop-shadow-md">
                        <svg class="w-7 h-7 text-[#C0001E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                    </div>
                    <h3 class="font-heading text-2xl font-bold text-[#111111] mb-6">Misi</h3>
                    <ul class="space-y-4">
                        @php
                        $misi = [
                            'Menyelenggarakan pelatihan bahasa dan budaya Jepang secara progresif dan efektif.',
                            'Membentuk mental, kedisiplinan, dan etos kerja standar Jepang melalui pendidikan karakter (Shitsuke).',
                            'Menjalin kerja sama yang kuat dengan Accepting Organization (TSK/Kumiai) di Jepang.',
                            'Memastikan transparansi dan keamanan legalitas proses bagi seluruh siswa didik.',
                        ];
                        @endphp
                        @foreach($misi as $item)
                        <li class="flex items-start gap-3">
                            <div class="w-6 h-6 rounded-full bg-[#111111] flex items-center justify-center shrink-0 mt-0.5">
                                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span class="text-sm text-[#6B7280] leading-relaxed">{{ $item }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- NILAI INTI (CORE VALUES/KEUNGGULAN) --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="badge-nakami mb-4">Nilai Inti</span>
            <h2 class="font-heading text-3xl lg:text-4xl font-bold text-[#111111] min-h-[48px]">Prinsip Pelatihan Nakami</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @php
            $coreValues = [
                ['jp' => '熱意', 'title' => 'Dedikasi Tinggi (Netsui)', 'desc' => 'Komitmen tak kenal lelah sensei kami untuk memastikan seluruh peserta didik lulus tes N4/JFT dan wawancara.'],
                ['jp' => '誠実', 'title' => 'Integritas (Seijitsu)', 'desc' => 'Proses seleksi, pemberkasan, dan pembiayaan yang transparan tanpa biaya siluman atau pungutan liar.'],
                ['jp' => '規律', 'title' => 'Kedisiplinan (Kiritsu)', 'desc' => 'Membiasakan siswa/i dengan budaya kerja Jepang sejak hari pertama asrama dan pelatihan.'],
                ['jp' => '絆', 'title' => 'Kekeluargaan (Kizuna)', 'desc' => 'Ikatan solidaritas antara sensei, pengelola, siswa, hingga senpai (alumni) di Jepang yang saling mendukung.'],
                ['jp' => '向上心', 'title' => 'Pengembangan Diri (Kojoshin)', 'desc' => 'Mendorong siswa untuk terus belajar bahasa, skill teknis baru, dan etika, bahkan setelah tiba di Jepang.'],
                ['jp' => '安心', 'title' => 'Keamanan (Anshin)', 'desc' => 'Legalitas lembaga yang terjamin dengan izin Disnaker dan pengawasan dari instansi pemerintah terkait.'],
            ];
            @endphp
            @foreach($coreValues as $item)
            <div class="group bg-white border border-[#E5E7EB] rounded-[2rem] p-8 lg:p-10 hover:shadow-2xl hover:shadow-[#C0001E]/10 hover:border-[#C0001E]/30 transition-all duration-500 relative overflow-hidden flex flex-col items-center">
                {{-- Decorative Kanji bg --}}
                <div class="absolute -right-4 -bottom-4 text-9xl font-jp text-[#F9F5F2] group-hover:text-[#C0001E]/5 transition-colors duration-700 -z-0 select-none pointer-events-none">{{ $item['jp'] }}</div>
                
                <div class="relative z-10 w-full flex flex-col items-center">
                    <div class="w-20 h-20 bg-[#F9F5F2] group-hover:bg-[#C0001E] rounded-2xl flex items-center justify-center mb-8 transition-all duration-500 shadow-sm group-hover:shadow-lg group-hover:shadow-red-500/30 group-hover:-translate-y-1">
                        <span class="font-jp text-3xl text-[#C0001E] group-hover:text-white transition-colors duration-500">{{ $item['jp'] }}</span>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-[#111111] mb-4 group-hover:text-[#C0001E] transition-colors duration-300">{{ $item['title'] }}</h3>
                    <p class="text-[15px] text-[#6B7280] leading-relaxed group-hover:text-[#4B5563] transition-colors">{{ $item['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- LEGALITAS --}}
{{-- ============================================= --}}
<section id="legalitas" class="py-16 lg:py-24 bg-[#F9F5F2]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
            
            <div class="max-w-xl">
                 <div class="flex items-center gap-3 mb-4">
                    <span class="w-12 h-px bg-[#C0001E]"></span>
                    <span class="text-[#C0001E] text-xs font-bold uppercase tracking-widest">Legalitas</span>
                </div>
                <h2 class="font-heading text-3xl lg:text-4xl font-bold text-[#111111] mb-6">Keamanan Izin Operasional</h2>
                <p class="text-[#6B7280] mb-8 leading-relaxed">
                    Kami memastikan setiap siswa, orang tua, dan mitra di Jepang memiliki ketenangan batin. LPK Nakami Indonesia beroperasi di bawah payung hukum dan perizinan resmi dari instansi pemerintah Republik Indonesia.
                </p>

                <div class="space-y-4">
                    <div class="bg-white p-4 rounded-xl border border-[#E5E7EB] flex items-center gap-4">
                         <div class="w-12 h-12 bg-[#C0001E]/10 flex items-center justify-center rounded-lg text-[#C0001E] shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-[#111111] text-sm md:text-base">Izin Penyelenggaraan Pelatihan Kerja</h4>
                            <p class="text-[11px] md:text-sm text-[#6B7280] uppercase tracking-wider mt-1">Dinas Tenaga Kerja</p>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-xl border border-[#E5E7EB] flex items-center gap-4">
                         <div class="w-12 h-12 bg-[#111111]/10 flex items-center justify-center rounded-lg text-[#111111] shrink-0">
                           <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-[#111111] text-sm md:text-base">Akta Pendirian Akta Notaris</h4>
                            <p class="text-[11px] md:text-sm text-[#6B7280] uppercase tracking-wider mt-1">Badan Hukum / Yayasan</p>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-xl border border-[#E5E7EB] flex items-center gap-4">
                         <div class="w-12 h-12 bg-white flex items-center justify-center rounded-lg text-[#111111] border border-[#E5E7EB] shrink-0">
                            <span class="font-bold text-xs uppercase">NIB</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-[#111111] text-sm md:text-base">Nomor Induk Berusaha</h4>
                            <p class="text-[11px] md:text-sm text-[#6B7280] uppercase tracking-wider mt-1">Kementerian Investasi / BKPM</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex-1 w-full max-w-lg">
                <div class="aspect-square bg-white border border-[#E5E7EB] rounded-2xl p-8 flex flex-col items-center justify-center text-center shadow-lg relative overflow-hidden">
                     <svg class="absolute top-0 right-0 w-32 h-32 text-[#F9F5F2] -translate-y-1/4 translate-x-1/4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                    </svg>
                    <div class="w-20 h-20 bg-[#111111] rounded-full flex items-center justify-center mb-6 shadow-md z-10">
                        <svg class="w-10 h-10 text-[#C0001E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"/></svg>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-[#111111] mb-2 z-10">Verifikasi Langsung</h3>
                    <p class="text-sm text-[#6B7280] mb-8 z-10">
                        Peserta didik/orang tua dapat mengunjungi kantor kami untuk melihat secara langsung berkas perizinan asli.
                    </p>
                    <a href="{{ url('/kontak') }}" class="btn-nakami-outline w-full justify-center z-10">
                        Kunjungi Kantor Nakami
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- CTA --}}
{{-- ============================================= --}}
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-[#C0001E] rounded-3xl overflow-hidden px-6 lg:px-12 py-16 text-center border border-red-800 shadow-2xl relative">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2240%22%20height%3D%2240%22%20viewBox%3D%220%200%2040%2040%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20d%3D%22M20%2020.5V18H0v-2h20v-2H0v-2h20v-2H0V8h20V6H0V4h20V2H0V0h22v20h2V0h2v20h2V0h2v20h2V0h2v20h2V0h2v20h2v2H20v-1.5zM0%2020h2v20H0V20zm4%200h2v20H4V20zm4%200h2v20H8V20zm4%200h2v20h-2V20zm4%200h2v20h-2V20zm4%204h20v2H20v-2zm0%204h20v2H20v-2zm0%204h20v2H20v-2zm0%204h20v2H20v-2z%22%20fill%3D%22%23000000%22%20fill-opacity%3D%220.1%22%20fill-rule%3D%22evenodd%22%2F%3E%3C%2Fsvg%3E')] opacity-30 mix-blend-multiply"></div>
            
            <div class="relative z-10 max-w-3xl mx-auto flex flex-col items-center">
                 <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-6 shadow-xl -rotate-6">
                    <span class="font-jp text-3xl font-bold text-[#C0001E] rotate-6">進</span>
                </div>
                <h2 class="font-heading text-3xl lg:text-4xl font-bold text-white mb-6">Mulai Kisah Suksesmu di Jepang</h2>
                <p class="text-white/90 text-lg mb-10 max-w-xl mx-auto">Mari bergabung dan tempa diri Anda di LPK Nakami Indonesia. Ke Jepang bukan sekadar mimpi.</p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 w-full sm:w-auto">
                    <a href="{{ url('/daftar?type=pelatihan') }}" class="btn-nakami-primary bg-[#111111] hover:bg-black text-white w-full sm:w-auto justify-center">
                        Daftar Angkatan Baru
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
