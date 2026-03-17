@extends('layouts.app')

@section('title', 'Panduan & Info Hidup di Jepang — LPK Nakami')
@section('meta_description', 'Informasi lengkap seputar kehidupan di Jepang, biaya hidup, budaya kerja, hingga persiapan pendaftaran program magang.')

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
            ['label' => 'Info Jepang']
        ]])
        <div class="flex items-center gap-3 mb-4 mt-4">
            <span class="w-12 h-px bg-[#C0001E]"></span>
            <span class="text-[#C0001E] text-xs font-bold uppercase tracking-widest">Nakami Indonesia</span>
        </div>
        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4 mt-4">
            Panduan Hidup di Jepang
        </h1>
        <p class="text-lg text-white/70 max-w-2xl">
            Ketahui lebih dekat bagaimana kehidupan, budaya, aturan kerja, dan rincian biaya hidup di Jepang sebelum Anda berangkat.
        </p>
    </div>
</section>

{{-- CONTENT --}}
<section class="py-16 lg:py-24 bg-[#F9F5F2]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="prose prose-lg prose-[#111111] max-w-none bg-white p-8 md:p-12 rounded-2xl border border-[#E5E7EB] shadow-sm relative overflow-hidden">
            {{-- Aksen --}}
            <div class="absolute top-0 right-0 w-32 h-32 bg-[#C0001E]/5 rounded-bl-[100px] pointer-events-none"></div>

            <h2 class="font-heading text-2xl md:text-3xl font-bold text-[#111111] mb-6 inline-block border-b-4 border-[#C0001E] pb-2">
                Budaya & Etika Kerja (Senpai - Kohai)
            </h2>
            <p>
                Di Jepang, budaya kerja sangat menjunjung tinggi kedisiplinan, ketepatan waktu, dan rasa hormat. Konsep <strong>Senpai (Senior)</strong> dan <strong>Kohai (Junior)</strong> sangat kental, di mana junior diharapkan menghormati dan belajar dari seniornya. 
            </p>
            <ul>
                <li><strong>Hou-Ren-So:</strong> Singkatan dari Hokoku (Melapor), Renraku (Menginformasikan), dan Soudan (Berkonsultasi). Komunikasi ini adalah kunci kelancaran bekerja di perusahaan Jepang.</li>
                <li><strong>Ketepatan Waktu:</strong> Datang 10-15 menit sebelum jam kerja dimulai adalah kewajiban.</li>
                <li><strong>5S (Seiri, Seiton, Seiso, Seiketsu, Shitsuke):</strong> Prinsip kebersihan dan keteraturan di tempat kerja.</li>
            </ul>

            <h2 class="font-heading text-2xl md:text-3xl font-bold text-[#111111] mb-6 mt-12 inline-block border-b-4 border-[#C0001E] pb-2">
                Biaya Hidup Rata-Rata
            </h2>
            <p>
                Biaya hidup di Jepang bervariasi tergantung prefektur (provinsi). Kota besar seperti Tokyo atau Osaka tentu lebih mahal dibandingkan daerah seperti Aichi, Fukuoka, atau Hokkaido.
            </p>
            <div class="overflow-x-auto mt-6 mb-8">
                <table class="w-full text-sm text-left border border-[#E5E7EB]">
                    <thead class="bg-[#111111] text-white">
                        <tr>
                            <th class="px-4 py-3 font-semibold">Komponen</th>
                            <th class="px-4 py-3 font-semibold">Estimasi Biaya / Bulan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#E5E7EB]">
                        <tr>
                            <td class="px-4 py-3 font-medium">Sewa Apato (Apartemen)</td>
                            <td class="px-4 py-3">¥30,000 - ¥60,000</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 font-medium">Makan & Belanja Harian</td>
                            <td class="px-4 py-3">¥25,000 - ¥40,000</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 font-medium">Asuransi & Pajak</td>
                            <td class="px-4 py-3">¥15,000 - ¥25,000</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 font-medium">Internet & Handphone</td>
                            <td class="px-4 py-3">¥5,000 - ¥10,000</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 font-medium text-[#C0001E] font-bold">Total Rata-Rata</td>
                            <td class="px-4 py-3 font-bold text-[#111111]">¥75,000 - ¥135,000 / bln</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h2 class="font-heading text-2xl md:text-3xl font-bold text-[#111111] mb-6 mt-12 inline-block border-b-4 border-[#C0001E] pb-2">
                Aturan & Hukum Berlaku
            </h2>
            <p>
                Pemerintah Jepang sangat ketat pada keamanan dan ketertiban. Beberapa hal sepele di Indonesia bisa menjadi pelanggaran berat di Jepang:
            </p>
            <ol>
                <li>Membuang sampah sembarangan atau salah memilah sampah sesuai harinya.</li>
                <li>Mengendarai sepeda berkelompok atau sambil bermain handphone.</li>
                <li>Dilarang bekerja sambilan memotong waktu kerja utama tanpa izin imigrasi.</li>
            </ol>

            <div class="mt-12 p-8 bg-[#111111] rounded-xl text-center">
                <h3 class="font-heading text-2xl font-bold text-white mb-4">Punya Pertanyaan Lain?</h3>
                <p class="text-white/70 mb-6">Konsultasikan kebutuhan Anda bersama LPK Nakami. Kami siap membimbing dari 0 hingga berangkat ke Jepang.</p>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('contact_phone', '6281931646314')) }}" target="_blank" class="inline-flex px-8 py-3.5 bg-[#C0001E] hover:bg-[#E8001F] text-white font-bold rounded-lg transition-colors shadow-lg">
                    Konsultasi Sekarang
                </a>
            </div>
        </div>

    </div>
</section>

@endsection
