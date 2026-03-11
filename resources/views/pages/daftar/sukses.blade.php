@extends('layouts.app')

@section('title', 'Pendaftaran Berhasil — ' . setting('site_name', 'LKP Yuwita'))

@section('content')

<section class="py-20 lg:py-32">
    <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

        {{-- Success Icon --}}
        <div class="w-20 h-20 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-6 animate-bounce">
            <svg class="w-10 h-10 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        </div>

        <h1 class="font-heading text-3xl sm:text-4xl font-bold text-charcoal mb-3">
            {{ session('reg_type') === 'konsultasi' ? 'Konsultasi Terkirim!' : 'Pendaftaran Berhasil!' }}
        </h1>
        <p class="text-dark-gray mb-8">
            {{ session('reg_type') === 'konsultasi'
                ? 'Terima kasih telah menghubungi kami. Tim kami akan segera merespons melalui WhatsApp.'
                : 'Terima kasih telah mendaftar program pelatihan. Simpan nomor referensi Anda sebagai bukti pendaftaran.'
            }}
        </p>

        {{-- Ref Code Card --}}
        <div class="bg-soft-cream border border-dusty-pink/30 rounded-2xl p-6 mb-8" x-data="{ copied: false }">
            <p class="text-sm text-dark-gray mb-2">Nomor Referensi</p>
            <div class="flex items-center justify-center gap-3">
                <span class="text-2xl sm:text-3xl font-bold text-rose-gold font-mono tracking-wider">
                    {{ session('ref_code') }}
                </span>
                <button @click="navigator.clipboard.writeText('{{ session('ref_code') }}'); copied = true; setTimeout(() => copied = false, 2000)"
                        class="p-2 rounded-lg bg-white border border-medium-gray hover:border-rose-gold transition-colors"
                        :class="copied ? 'border-emerald-500' : ''">
                    <svg x-show="!copied" class="w-4 h-4 text-dark-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                    <svg x-show="copied" x-cloak class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </button>
            </div>
            <p x-show="copied" x-cloak class="text-xs text-emerald-600 mt-2">Tersalin!</p>
        </div>

        {{-- Steps --}}
        <div class="bg-white border border-light-gray rounded-2xl p-6 mb-8 text-left">
            <h3 class="font-heading text-lg font-bold text-charcoal mb-4">Langkah Selanjutnya</h3>
            <div class="space-y-4">
                <div class="flex items-start gap-3">
                    <div class="w-7 h-7 bg-rose-gold/10 rounded-full flex items-center justify-center shrink-0 mt-0.5">
                        <span class="text-rose-gold font-bold text-xs">1</span>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-charcoal">Simpan Nomor Referensi</p>
                        <p class="text-xs text-dark-gray">Screenshot atau catat nomor referensi di atas sebagai bukti pendaftaran Anda.</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-7 h-7 bg-rose-gold/10 rounded-full flex items-center justify-center shrink-0 mt-0.5">
                        <span class="text-rose-gold font-bold text-xs">2</span>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-charcoal">Tunggu Konfirmasi</p>
                        <p class="text-xs text-dark-gray">Tim admin kami akan menghubungi Anda melalui WhatsApp dalam 1x24 jam kerja.</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-7 h-7 bg-rose-gold/10 rounded-full flex items-center justify-center shrink-0 mt-0.5">
                        <span class="text-rose-gold font-bold text-xs">3</span>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-charcoal">Siapkan Dokumen</p>
                        <p class="text-xs text-dark-gray">Siapkan fotokopi KTP, ijazah, dan pas foto untuk proses verifikasi.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="{{ url('/') }}"
               class="inline-flex items-center gap-2 px-6 py-3 bg-charcoal text-white font-semibold rounded-full hover:bg-charcoal/90 transition-all duration-300 active:scale-95">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Kembali ke Beranda
            </a>
            <a href="https://wa.me/{{ setting('contact_wa_admin') }}?text={{ urlencode('Halo admin, saya baru saja mendaftar dengan nomor referensi ' . session('ref_code') . '. Mohon konfirmasinya.') }}"
               target="_blank"
               class="inline-flex items-center gap-2 px-6 py-3 bg-[#25D366] text-white font-semibold rounded-full hover:bg-[#1da851] transition-all duration-300 active:scale-95">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                Hubungi Admin via WA
            </a>
        </div>
    </div>
</section>

@endsection
