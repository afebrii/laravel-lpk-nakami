@extends('layouts.app')

@section('title', 'Kebijakan Privasi — ' . setting('site_name', 'LKP Yuwita'))

@section('content')

<section class="relative bg-gradient-to-br from-charcoal via-charcoal to-rose-gold-dark overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-72 h-72 bg-rose-gold rounded-full blur-3xl"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        @include('components.breadcrumb', ['items' => [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Kebijakan Privasi']
        ]])
        <h1 class="font-heading text-3xl sm:text-4xl font-bold text-white">Kebijakan Privasi</h1>
    </div>
</section>

<section class="py-12 lg:py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none text-dark-gray
                    prose-headings:font-heading prose-headings:text-charcoal
                    prose-h2:text-2xl prose-h2:mt-8 prose-h2:mb-4
                    prose-p:mb-4 prose-li:my-1
                    prose-strong:text-charcoal">

            <p class="text-sm text-dark-gray/70 mb-8">Terakhir diperbarui: {{ now()->translatedFormat('d F Y') }}</p>

            <h2>1. Pendahuluan</h2>
            <p>{{ setting('site_name', 'LKP/LPK Yuwita') }} ("kami") berkomitmen melindungi privasi pengguna situs web ini. Kebijakan privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi pribadi Anda.</p>

            <h2>2. Informasi yang Kami Kumpulkan</h2>
            <p>Kami dapat mengumpulkan informasi pribadi berikut saat Anda menggunakan situs web kami:</p>
            <ul>
                <li><strong>Data Identitas</strong>: Nama lengkap, tanggal lahir, jenis kelamin</li>
                <li><strong>Data Kontak</strong>: Alamat email, nomor telepon/WhatsApp, alamat tempat tinggal</li>
                <li><strong>Data Pendaftaran</strong>: Informasi pendidikan, pekerjaan, motivasi, dan pas foto</li>
                <li><strong>Data Penggunaan</strong>: Informasi tentang bagaimana Anda menggunakan situs web kami</li>
            </ul>

            <h2>3. Penggunaan Informasi</h2>
            <p>Informasi yang kami kumpulkan digunakan untuk:</p>
            <ul>
                <li>Memproses pendaftaran program pelatihan</li>
                <li>Menghubungi Anda terkait program dan layanan kami</li>
                <li>Mengirimkan informasi mengenai promosi atau acara (dengan persetujuan Anda)</li>
                <li>Meningkatkan kualitas layanan dan situs web kami</li>
                <li>Memenuhi kewajiban hukum</li>
            </ul>

            <h2>4. Perlindungan Data</h2>
            <p>Kami mengambil langkah-langkah keamanan yang wajar untuk melindungi informasi pribadi Anda dari akses yang tidak sah, perubahan, pengungkapan, atau penghancuran.</p>

            <h2>5. Pembagian Informasi</h2>
            <p>Kami tidak menjual, memperdagangkan, atau mentransfer informasi pribadi Anda kepada pihak ketiga tanpa persetujuan Anda, kecuali jika diwajibkan oleh hukum.</p>

            <h2>6. Cookie</h2>
            <p>Situs web kami dapat menggunakan cookie untuk meningkatkan pengalaman pengguna. Anda dapat mengatur preferensi cookie melalui pengaturan browser Anda.</p>

            <h2>7. Hak Anda</h2>
            <p>Anda berhak untuk:</p>
            <ul>
                <li>Mengakses informasi pribadi yang kami simpan tentang Anda</li>
                <li>Meminta koreksi informasi yang tidak akurat</li>
                <li>Meminta penghapusan informasi pribadi Anda</li>
                <li>Menarik persetujuan atas penggunaan informasi Anda</li>
            </ul>

            <h2>8. Kontak</h2>
            <p>Untuk pertanyaan mengenai kebijakan privasi ini, silakan hubungi kami:</p>
            <ul>
                <li><strong>Email</strong>: {{ setting('contact_email') }}</li>
                <li><strong>Telepon</strong>: {{ setting('contact_phone') }}</li>
                <li><strong>Alamat</strong>: {{ setting('contact_address') }}</li>
            </ul>

            <h2>9. Perubahan Kebijakan</h2>
            <p>Kami dapat memperbarui kebijakan privasi ini dari waktu ke waktu. Perubahan akan efektif segera setelah dipublikasikan di halaman ini.</p>
        </div>
    </div>
</section>

@endsection
