@extends('layouts.app')

@section('title', 'Kebijakan Privasi — LPK Nakami Indonesia')

@section('content')

{{-- ============================================= --}}
{{-- HERO SECTION NAKAMI --}}
{{-- ============================================= --}}
<section class="relative bg-[#111111] overflow-hidden">
     <div class="absolute inset-0 bg-gradient-to-t from-[#111111] via-[#111111]/90 to-[#111111]/50 mix-blend-multiply z-0"></div>
    <div class="absolute left-[-5%] top-[5%] text-[300px] leading-none font-jp text-white/5 select-none pointer-events-none z-0 hidden md:block">
        秘
    </div>
    <div class="nakami-divider absolute bottom-0 left-0 right-0 z-10"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 z-10">
        @include('components.breadcrumb', ['items' => [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Kebijakan Privasi']
        ]])
        
        <div class="flex items-center gap-3 mb-4 mt-4">
            <span class="w-12 h-px bg-[#C0001E]"></span>
            <span class="text-[#C0001E] text-xs font-bold uppercase tracking-widest">Informasi Hukum</span>
        </div>

        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4">
            Kebijakan Privasi
        </h1>
        <p class="text-lg text-white/70 max-w-2xl mb-8">
            Komitmen LPK Nakami Indonesia dalam menjaga kerahasiaan dan keamanan data calon peserta didik.
        </p>
    </div>
</section>

{{-- ============================================= --}}
{{-- CONTENT SECTION NAKAMI EDITION --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24 bg-[#F9F5F2]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white border border-[#E5E7EB] rounded-3xl p-8 sm:p-12 shadow-xl relative overflow-hidden">
            {{-- Decorative Line --}}
            <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-[#111111] via-[#C0001E] to-[#111111]"></div>
            <div class="absolute right-8 top-8 text-6xl font-jp text-[#F9F5F2] select-none pointer-events-none">規</div>

            <div class="prose prose-lg max-w-none text-[#6B7280]
                        prose-headings:font-heading prose-headings:text-[#111111] prose-headings:font-bold
                        prose-h2:text-2xl prose-h2:mt-10 prose-h2:mb-5 prose-h2:pb-2 prose-h2:border-b prose-h2:border-[#F3F4F6]
                        prose-p:mb-5 prose-p:leading-relaxed prose-li:my-2
                        prose-strong:text-[#111111] prose-a:text-[#C0001E] hover:prose-a:text-red-800">

                <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#F9F5F2] rounded-lg border border-[#E5E7EB] mb-8">
                    <svg class="w-4 h-4 text-[#C0001E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <p class="text-sm text-[#111111] font-semibold m-0">Terakhir diperbarui: {{ now()->translatedFormat('d F Y') }}</p>
                </div>

                <h2>1. Pendahuluan</h2>
                <p><strong>LPK Nakami Indonesia</strong> ("kami", "Nakami") menempatkan prioritas tertinggi pada perlindungan privasi seluruh pengguna dan calon Peserta Didik situs web dan Sistem Informasi ini. Kebijakan privasi ini menjelaskan secara rinci bagaimana kami mengumpulkan, menggunakan, menyimpan, dan melindungi informasi pribadi yang Anda percayakan kepada kami selama proses pendaftaran Program Magang Jepang, Tokutei Ginou, maupun Engineering.</p>

                <h2>2. Informasi yang Kami Kumpulkan</h2>
                <p>Untuk memfasilitasi proses pendaftaran dan pengiriman ke Jepang secara legal dan aman, kami mengumpulkan data pribadi berikut:</p>
                <ul>
                    <li><strong>Data Identitas Valid Mutlak</strong>: Nama lengkap sesuai KTP/Paspor, NIK, tanggal lahir, tempat lahir, jenis kelamin.</li>
                    <li><strong>Data Kontak Resmi</strong>: Alamat domisili lengkap, alamat email aktif, nomor Telepon/WhatsApp peserta.</li>
                    <li><strong>Data Keluarga/Wali</strong>: Nomor kontak darurat/Orang Tua, hubungan keluarga (Sangat penting untuk izin keberangkatan).</li>
                    <li><strong>Data Pendaftaran & Kualifikasi</strong>: Riwayat pendidikan jenjang terakhir, pengalaman kerja, status pekerjaan saat ini, riwayat medis dasar (seperti mata minus/buta warna/tato), motivasi ke Jepang, foto/dokumen diri yang Anda unggah.</li>
                </ul>

                <h2>3. Penggunaan Informasi Secara Etis</h2>
                <p>Setiap informasi yang dikumpulkan <strong>tidak akan pernah</strong> diperjualbelikan. Kami menggunakannya secara ketat terbatas pada:</p>
                <ul>
                    <li>Memproses verifikasi administrasi awal calon peserta didik / peserta magang.</li>
                    <li>Pembuatan profil dan CV yang akan diajukan ke SO (Sending Organization) dan perusahaan penerima di Jepang.</li>
                    <li>Menghubungi Anda terkait panggilan interview, jadwal fisik, orientasi, atau updates program terkini melalui kanal resmi WhatsApp Admin Nakami.</li>
                    <li>Meningkatkan pengawasan operasional serta penyusunan pelaporan pada Kementerian Ketenagakerjaan RI (Kemenaker) sesuai regulasi yang berlaku.</li>
                </ul>

                <h2>4. Perlindungan Data dan Rahasia Medis</h2>
                <p>Infrastruktur web dan database kami mengambil langkah keamanan fisik tingkat menengah maupun administratif untuk mencegah akses tanpa izin, perubahan tidak sah, kerusakan, dan eksploitasi data calon kandidat.</p>

                <h2>5. Pembagian Informasi Secara Terbatas</h2>
                <p>Data diri Anda <strong>HANYA</strong> akan diteruskan secara resmi dan legal kepada:</p>
                <ul>
                    <li><strong>Sending Organization (SO) Berafiliasi</strong> - Untuk kepentingan seleksi ke pabrik atau Kaigo.</li>
                    <li><strong>Perusahaan Penerima (Kumiai / Kaisha) di Jepang</strong> - Dalam tahap User Interview.</li>
                    <li><strong>Lembaga Hukum Republik Indonesia (Imigrasi/Disnaker)</strong> - Jika disyaratkan oleh Undang-Undang demi ketertiban berkas paspor & visa.</li>
                </ul>

                <h2>6. Penggunaan Layanan Analisis & Cookie</h2>
                <p>Situs web pendaftaran kami berhak menggunakan teknologi cookie standar browser semata-mata untuk mengoptimalkan preferensi antarmuka Anda di kunjungan mendatang dan menghitung metrik statistik dari sisi web server.</p>

                <h2>7. Hak Sepenuhnya Anda Sebagai Kandidat</h2>
                <p>Sebagai kandidat yang kami hargai, Anda berhak penuh untuk:</p>
                <ul>
                    <li>Meminta <em>review</em> atau salinan informasi data Anda yang tersimpan di sistem kami.</li>
                    <li>Mengajukan permohonan pembatalan/penghapusan data apabila Anda memutuskan mengundurkan diri (<em>Jitai</em>) sebelum proses SO berlangsung.</li>
                </ul>

                <h2>8. Kontak Hukum LPK Nakami</h2>
                <p>Segala bentuk kendala, pertanyaan seputar pelindungan privasi, serta penyalahgunaan dapat diteruskan langsung ke Manajemen:</p>
                <div class="bg-[#F9F5F2] border border-[#E5E7EB] rounded-xl p-6 mt-4">
                    <ul class="list-none pl-0 space-y-3 m-0">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#C0001E] mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <strong class="text-[#111111] min-w-[80px]">Surel</strong>: <span>{{ setting('contact_email', 'lpknakamiindonesia@gmail.com') }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#C0001E] mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <strong class="text-[#111111] min-w-[80px]">Hotline</strong>: <span>{{ setting('contact_phone') }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#C0001E] mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <strong class="text-[#111111] min-w-[80px]">Alamat</strong>: <span>{{ setting('contact_address') }}</span>
                        </li>
                    </ul>
                </div>

                <h2>9. Klausul Perubahan Regulasi</h2>
                <p>Kebijakan ini bersifat dinamis mengikuti aturan perundang-undangan PMI (Pekerja Migran Indonesia) terbaru. Modifikasi privasi akan diperbarui secara sepihak dan langsung berlaku di URL halaman ini.</p>
            </div>
        </div>
    </div>
</section>

@endsection
