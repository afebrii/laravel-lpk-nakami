@extends('layouts.app')

@section('title', 'Tentang Kami — ' . setting('site_name', 'LKP Yuwita'))
@section('meta_description', 'Profil, sejarah, visi misi, dan legalitas LKP/LPK Yuwita — Lembaga Kursus & Pelatihan Kecantikan terpercaya di Tasikmalaya sejak 2006.')

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
            ['label' => 'Tentang Kami']
        ]])
        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4">
            Tentang Kami
        </h1>
        <p class="text-lg text-white/75 max-w-2xl">
            Mengenal lebih dekat LKP/LPK Yuwita — lembaga kursus dan pelatihan kecantikan terpercaya di Tasikmalaya.
        </p>
    </div>
</section>

{{-- ============================================= --}}
{{-- LATAR BELAKANG & SEJARAH --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            {{-- Image --}}
            <div class="relative">
                <div class="aspect-[4/3] rounded-2xl bg-gradient-to-br from-dusty-pink/30 to-rose-gold/20 overflow-hidden">
                    <div class="w-full h-full flex items-center justify-center text-rose-gold/40">
                        <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                </div>
                <div class="absolute -bottom-4 -right-4 lg:-right-8 bg-white rounded-xl shadow-lg p-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-rose-gold/10 rounded-full flex items-center justify-center">
                            <span class="font-heading text-xl font-bold text-rose-gold">18+</span>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-charcoal">Tahun Berdiri</p>
                            <p class="text-xs text-dark-gray">Sejak 2006</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Content --}}
            <div>
                <span class="inline-block px-4 py-1.5 bg-rose-gold/10 text-rose-gold text-xs font-semibold rounded-full mb-4 uppercase tracking-wider">Latar Belakang</span>
                <h2 class="font-heading text-3xl lg:text-4xl font-bold text-charcoal mb-6">
                    Sejarah & Profil Lembaga
                </h2>
                <div class="space-y-4 text-dark-gray leading-relaxed">
                    <p>{{ setting('site_description', 'LKP/LPK Yuwita adalah lembaga kursus dan pelatihan kecantikan yang berdiri sejak 2006 di Tasikmalaya. Menyediakan pelatihan tata kecantikan dan layanan salon profesional.') }}</p>
                    <p>Didirikan oleh praktisi kecantikan berpengalaman, LKP Yuwita telah meluluskan ribuan alumni yang tersebar di berbagai perusahaan dan salon kecantikan di seluruh Indonesia.</p>
                    <p>Dengan komitmen untuk terus meningkatkan kualitas pendidikan dan pelayanan, kami menyediakan program pelatihan yang sesuai dengan standar industri kecantikan terkini.</p>
                </div>

                {{-- Timeline --}}
                <div class="mt-8 space-y-4">
                    @php
                    $timeline = [
                        ['year' => '2006', 'event' => 'LKP Yuwita didirikan di Tasikmalaya'],
                        ['year' => '2010', 'event' => 'Mendapat akreditasi resmi dari Dinas Pendidikan'],
                        ['year' => '2015', 'event' => 'Memperluas program pelatihan dengan kelas khusus'],
                        ['year' => '2020', 'event' => 'Meluluskan lebih dari 3.000 alumni'],
                        ['year' => '2024', 'event' => 'Meluncurkan website resmi dan pendaftaran online'],
                    ];
                    @endphp
                    @foreach($timeline as $item)
                    <div class="flex items-start gap-4">
                        <span class="shrink-0 w-16 text-sm font-bold text-rose-gold">{{ $item['year'] }}</span>
                        <div class="relative pl-4 border-l-2 border-dusty-pink-light pb-3">
                            <div class="absolute -left-[5px] top-1.5 w-2 h-2 bg-rose-gold rounded-full"></div>
                            <p class="text-sm text-dark-gray">{{ $item['event'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- VISI & MISI --}}
{{-- ============================================= --}}
<section id="visi-misi" class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-rose-gold/10 text-rose-gold text-xs font-semibold rounded-full mb-4 uppercase tracking-wider">Visi & Misi</span>
            <h2 class="font-heading text-3xl lg:text-4xl font-bold text-charcoal">Visi & Misi Kami</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            {{-- Visi --}}
            <div class="bg-gradient-to-br from-rose-gold to-rose-gold-dark rounded-2xl p-8 text-white">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <h3 class="font-heading text-2xl font-bold mb-4">Visi</h3>
                <p class="text-white/90 leading-relaxed">
                    Menjadi lembaga kursus dan pelatihan kecantikan terdepan di Jawa Barat yang menghasilkan tenaga profesional berkompeten, berdaya saing, dan berkarakter.
                </p>
            </div>

            {{-- Misi --}}
            <div class="bg-soft-cream rounded-2xl p-8">
                <div class="w-12 h-12 bg-rose-gold/10 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-rose-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                </div>
                <h3 class="font-heading text-2xl font-bold text-charcoal mb-4">Misi</h3>
                <ul class="space-y-3">
                    @php
                    $misi = [
                        'Menyelenggarakan pelatihan kecantikan sesuai standar industri',
                        'Mengembangkan kurikulum yang relevan dengan kebutuhan pasar',
                        'Menyediakan fasilitas dan peralatan praktik modern',
                        'Membangun kemitraan dengan industri kecantikan',
                        'Membentuk lulusan yang profesional, terampil, dan berjiwa wirausaha',
                    ];
                    @endphp
                    @foreach($misi as $item)
                    <li class="flex items-start gap-2 text-sm text-dark-gray">
                        <svg class="w-5 h-5 text-rose-gold shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- KEUNGGULAN LEMBAGA --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-rose-gold/10 text-rose-gold text-xs font-semibold rounded-full mb-4 uppercase tracking-wider">Keunggulan</span>
            <h2 class="font-heading text-3xl lg:text-4xl font-bold text-charcoal">Keunggulan Lembaga Kami</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $keunggulan = [
                ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>', 'title' => 'Pengajar Profesional', 'desc' => 'Tenaga pengajar dari kalangan dosen dan praktisi berpengalaman di industri kecantikan.'],
                ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>', 'title' => 'Fasilitas Lengkap', 'desc' => 'Peralatan praktik modern dan lengkap sesuai standar industri kecantikan terkini.'],
                ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>', 'title' => 'Sertifikat Resmi', 'desc' => 'Sertifikat resmi diakui secara nasional sebagai bukti kompetensi profesional.'],
                ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>', 'title' => 'Tersalurkan Kerja', 'desc' => 'Jaringan mitra perusahaan lokal dan nasional untuk penyerapan lulusan.'],
                ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>', 'title' => 'Ribuan Alumni', 'desc' => 'Lebih dari 5.000 alumni tersebar di berbagai salon dan perusahaan kecantikan.'],
                ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>', 'title' => 'Bimbingan Karir', 'desc' => 'Bimbingan karir dan kewirausahaan untuk memulai usaha mandiri di dunia kecantikan.'],
            ];
            @endphp
            @foreach($keunggulan as $item)
            <div class="group bg-white border border-light-gray rounded-2xl p-6 hover:shadow-xl hover:shadow-rose-gold/5 hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 bg-rose-gold/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-rose-gold group-hover:text-white transition-colors">
                    <svg class="w-6 h-6 text-rose-gold group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $item['icon'] !!}</svg>
                </div>
                <h3 class="font-heading text-lg font-bold text-charcoal mb-2">{{ $item['title'] }}</h3>
                <p class="text-sm text-dark-gray">{{ $item['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- STRUKTUR ORGANISASI --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-rose-gold/10 text-rose-gold text-xs font-semibold rounded-full mb-4 uppercase tracking-wider">Organisasi</span>
            <h2 class="font-heading text-3xl lg:text-4xl font-bold text-charcoal">Struktur Organisasi</h2>
        </div>

        <div class="max-w-4xl mx-auto">
            {{-- Pimpinan --}}
            <div class="text-center mb-8">
                <div class="inline-block">
                    <div class="w-24 h-24 bg-gradient-to-br from-dusty-pink/30 to-rose-gold/20 rounded-full mx-auto mb-3 flex items-center justify-center">
                        <svg class="w-10 h-10 text-rose-gold/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <h4 class="font-heading text-lg font-bold text-charcoal">Hj. Yuyun Yunengsih</h4>
                    <p class="text-sm text-rose-gold font-medium">Pimpinan / Direktur</p>
                </div>
            </div>

            {{-- Divisi --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                @php
                $team = [
                    ['name' => 'Instruktur MUA', 'role' => 'Kepala Instruktur Make Up'],
                    ['name' => 'Instruktur Rambut', 'role' => 'Kepala Instruktur Hair Styling'],
                    ['name' => 'Admin & Keuangan', 'role' => 'Kepala Administrasi'],
                ];
                @endphp
                @foreach($team as $member)
                <div class="text-center bg-soft-cream rounded-2xl p-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-dusty-pink/30 to-rose-gold/20 rounded-full mx-auto mb-3 flex items-center justify-center">
                        <svg class="w-8 h-8 text-rose-gold/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <h4 class="font-semibold text-charcoal">{{ $member['name'] }}</h4>
                    <p class="text-xs text-dark-gray">{{ $member['role'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- LEGALITAS --}}
{{-- ============================================= --}}
<section id="legalitas" class="py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-rose-gold/10 text-rose-gold text-xs font-semibold rounded-full mb-4 uppercase tracking-wider">Legalitas</span>
            <h2 class="font-heading text-3xl lg:text-4xl font-bold text-charcoal">Legalitas & Izin Operasional</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-4xl mx-auto">
            @php
            $legalitas = [
                ['title' => 'Izin Operasional Lembaga', 'issuer' => 'Dinas Pendidikan Kota Tasikmalaya', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>'],
                ['title' => 'NPSN (Nomor Pokok Sekolah Nasional)', 'issuer' => 'Kementerian Pendidikan', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0"/>'],
                ['title' => 'Akta Notaris Pendirian', 'issuer' => 'Notaris Resmi', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>'],
            ];
            @endphp
            @foreach($legalitas as $item)
            <div class="bg-white border border-light-gray rounded-2xl p-6 text-center hover:shadow-lg transition-shadow duration-300">
                <div class="w-14 h-14 bg-rose-gold/10 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-7 h-7 text-rose-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $item['icon'] !!}</svg>
                </div>
                <h4 class="font-semibold text-charcoal mb-1">{{ $item['title'] }}</h4>
                <p class="text-xs text-dark-gray">{{ $item['issuer'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- CTA --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative bg-gradient-to-r from-rose-gold to-rose-gold-dark rounded-3xl overflow-hidden px-6 sm:px-12 py-12 lg:py-16 text-center">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/2"></div>
            <div class="relative z-10">
                <h2 class="font-heading text-3xl lg:text-4xl font-bold text-white mb-4">Bergabung Bersama Kami</h2>
                <p class="text-white/80 text-lg mb-8 max-w-xl mx-auto">Jadilah bagian dari ribuan alumni sukses LKP Yuwita di dunia kecantikan.</p>
                <div class="flex flex-wrap items-center justify-center gap-4">
                    <a href="{{ url('/daftar') }}" class="inline-flex items-center gap-2 px-7 py-3.5 bg-white text-rose-gold font-semibold rounded-full hover:bg-soft-cream transition-all duration-300 hover:shadow-lg active:scale-95">
                        Daftar Sekarang
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="{{ url('/kebijakan-privasi') }}" class="text-white/80 text-sm hover:text-white underline transition-colors">Kebijakan Privasi</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
