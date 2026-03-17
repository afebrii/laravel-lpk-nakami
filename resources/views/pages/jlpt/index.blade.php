@extends('layouts.app')

@section('title', 'Materi & Info Ujian JLPT — LPK Nakami')
@section('meta_description', 'Pelajari tingkatan JLPT (N5 - N1), materi yang diujikan, jadwal ujian, serta tips lulus dari LPK Nakami Indonesia.')

@section('content')

{{-- HERO SECTION --}}
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

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-16 lg:pt-40 lg:pb-24 z-10">
        @include('components.breadcrumb', ['items' => [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Materi JLPT']
        ]])
        <div class="flex items-center gap-3 mb-4 mt-4">
            <span class="w-12 h-px bg-[#C0001E]"></span>
            <span class="text-[#C0001E] text-xs font-bold uppercase tracking-widest">Nakami Indonesia</span>
        </div>
        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4 mt-4">
            Ujian Kemampuan Bahasa Jepang (JLPT)
        </h1>
        <p class="text-lg text-white/70 max-w-2xl">
            Japanese-Language Proficiency Test (JLPT) adalah ujian kemampuan bahasa Jepang terbesar di dunia. Ketahui info selengkapnya.
        </p>
    </div>
</section>

{{-- CONTENT --}}
<section class="py-16 lg:py-24 bg-[#F9F5F2]">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 prose prose-lg prose-[#111111] max-w-none bg-white p-8 md:p-10 rounded-2xl border border-[#E5E7EB] shadow-sm">
                
                <h2 class="font-heading text-2xl font-bold text-[#C0001E]">Apa itu JLPT?</h2>
                <p>
                    <strong>JLPT</strong> (日本語能力試験, <em>Nihongo Nōryoku Shiken</em>) diadakan untuk mengevaluasi dan mensertifikasi kemampuan bahasa Jepang peserta non-native. Di Indonesia, ujian ini diadakan 2 kali setahun (Juli dan Desember).
                </p>
                <p>
                    Sebagai kriteria magang Jepang (Ginou Jisshusei) atau kerja (Tokutei Ginou), sertifikat JLPT (atau setaranya seperti JFT-Basic) adalah tiket wajib untuk bisa direkrut.
                </p>

                <hr class="my-8 border-[#E5E7EB]">

                <h2 class="font-heading text-2xl font-bold text-[#111111] mb-6">Tingkatan JLPT (N5 - N1)</h2>
                
                <div class="space-y-6">
                    {{-- N5 --}}
                    <div class="p-6 border border-[#E5E7EB] rounded-xl relative overflow-hidden group hover:border-[#C0001E] transition-colors">
                        <div class="absolute right-[-10px] top-[-10px] text-8xl font-black text-[#F3F4F6] select-none z-0 group-hover:text-[#C0001E]/5 transition-colors">N5</div>
                        <div class="relative z-10">
                            <h3 class="text-xl font-bold text-[#111111] m-0 mb-2">Level N5 (Paling Dasar)</h3>
                            <p class="text-sm m-0">Menguasai hiragana, katakana, dan sekitar 100 kanji dasar serta 800 kosakata. Memahami kalimat sederhana pada percakapan pelan di kehidupan sehari-hari.</p>
                        </div>
                    </div>

                    {{-- N4 --}}
                    <div class="p-6 border border-[#E5E7EB] rounded-xl relative overflow-hidden group hover:border-[#C0001E] transition-colors">
                        <div class="absolute right-[-10px] top-[-10px] text-8xl font-black text-[#F3F4F6] select-none z-0 group-hover:text-[#C0001E]/5 transition-colors">N4</div>
                        <div class="relative z-10">
                            <h3 class="text-xl font-bold text-[#111111] m-0 mb-2">Level N4 (Dasar Lanjutan)</h3>
                            <p class="text-sm m-0">Menguasai sekitar 300 kanji dan 1.500 kosakata. Dapat berkomunikasi tentang topik yang tak asing dengan kecepatan percakapan normal. <em>(Target rata-rata peserta magang)</em></p>
                        </div>
                    </div>

                    {{-- N3 --}}
                    <div class="p-6 border border-[#E5E7EB] rounded-xl relative overflow-hidden group hover:border-[#C0001E] transition-colors">
                        <div class="absolute right-[-10px] top-[-10px] text-8xl font-black text-[#F3F4F6] select-none z-0 group-hover:text-[#C0001E]/5 transition-colors">N3</div>
                        <div class="relative z-10">
                            <h3 class="text-xl font-bold text-[#111111] m-0 mb-2">Level N3 (Menengah)</h3>
                            <p class="text-sm m-0">Menguasai sekitar 650 kanji dan 3.750 kosakata. Dapat membaca berita surat kabar umum dan memahami intisari percakapan dengan kecepatan mendekati normal.</p>
                        </div>
                    </div>

                    {{-- N2 & N1 --}}
                    <div class="p-6 border border-[#E5E7EB] rounded-xl bg-[#F9F5F2]">
                        <h3 class="text-lg font-bold text-[#111111] m-0 mb-2">Level N2 & N1 (Mahir)</h3>
                        <p class="text-sm m-0">Dapat memahami materi yang kompleks, membaca teks abstrak/filosofis, serta memahami percakapan natural. Banyak digunakan untuk persyaratan masuk Universitas Jepang atau posisi Profesional.</p>
                    </div>
                </div>

            </div>

            {{-- Sidebar --}}
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-[#111111] rounded-2xl p-6 text-white overflow-hidden relative">
                    <div class="absolute -right-6 -top-6 text-[#C0001E]/20">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8zm4.128-11.458a2.652 2.652 0 00-3.616-.547l-1.554 1.134-1.554-1.134a2.65 2.65 0 00-2.5.2c-.414.288-.748.694-.963 1.171-.214.477-.291 1.006-.222 1.527.068.522.302.998.675 1.371l4.564 4.564 4.564-4.564c.373-.373.607-.849.675-1.371a2.66 2.66 0 00-1.185-2.698z"/></svg>
                    </div>
                    <div class="relative z-10">
                        <h3 class="font-heading text-xl font-bold mb-3">Persiapkan JLPT Bersama Nakami</h3>
                        <p class="text-sm text-white/70 mb-6">Kami kelas Nihongo Gakkou intensif yang dirancang siap lulus ujian JFT-Basic & JLPT. Fasilitas buku dan try-out lengkap.</p>
                        <a href="{{ route('program.index') }}" class="block w-full px-6 py-3 bg-[#C0001E] hover:bg-[#E8001F] text-center text-white font-bold rounded-lg transition-colors text-sm">
                            Lihat Program Bahasa
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-[#E5E7EB] p-6">
                    <h3 class="font-heading text-lg font-bold text-[#111111] mb-4 border-b pb-3">Tips Lulus Mudah</h3>
                    <ul class="space-y-3 text-sm text-[#4B5563]">
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-[#C0001E] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Hafal pola kalimat (Grammar) secara terstruktur</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-[#C0001E] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Latihan Choukai (Mendengar) tiap hari via Anime/Podcast</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-[#C0001E] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Perbanyak Try-Out durasi asli</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
