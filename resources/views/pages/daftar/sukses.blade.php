@extends('layouts.app')

@section('title', 'Pendaftaran Berhasil — LPK Nakami Indonesia')

@section('content')

{{-- ============================================= --}}
{{-- HERO SUCCESS NAKAMI --}}
{{-- ============================================= --}}
<section class="py-20 lg:py-32 relative bg-[#F9F5F2] overflow-hidden min-h-[80vh] flex items-center">
    
    {{-- Decorative Kanji bg --}}
    <div class="absolute right-[-10%] bottom-[-10%] text-[250px] font-jp text-[#E5E7EB]/50 select-none pointer-events-none z-0">成</div>
    
    <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 w-full">

        {{-- Success Icon --}}
        <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-8 animate-bounce shadow-xl shadow-[#C0001E]/10 border-4 border-[#C0001E]/20 relative">
            <div class="absolute inset-0 rounded-full bg-[#C0001E] scale-0 animate-[ping_1.5s_ease-out_infinite] opacity-20"></div>
            <svg class="w-12 h-12 text-[#C0001E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
            </svg>
        </div>

        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-[#111111] mb-4">
            {{ session('reg_type') === 'konsultasi' ? 'Permintaan Terkirim!' : 'Pendaftaran Berhasil!' }}
        </h1>
        <p class="text-[#6B7280] text-lg mb-10 leading-relaxed font-medium">
            {{ session('reg_type') === 'konsultasi'
                ? 'Arigatou gozaimasu! Pesan Anda telah diterima oleh sistem Nakami. Sensei kami akan segera memandu Anda melalui WhatsApp.'
                : 'Arigatou gozaimasu! Formulir pendaftaran program telah masuk ke sistem LPK Nakami. Simpan kode referensi Anda dengan baik.'
            }}
        </p>

        {{-- Ref Code Card --}}
        <div class="bg-white border-2 border-[#111111] rounded-2xl p-8 mb-10 shadow-2xl relative overflow-hidden" x-data="{ copied: false }">
            {{-- Top Accent Line --}}
            <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-[#111111] to-[#C0001E]"></div>

            <p class="text-xs font-bold text-[#6B7280] uppercase tracking-widest mb-3">Kode Registrasi (登録コード)</p>
            <div class="flex items-center justify-center gap-4">
                <span class="text-3xl sm:text-4xl font-bold text-[#C0001E] font-mono tracking-widest bg-[#F9F5F2] px-6 py-2 rounded-xl border border-[#E5E7EB]">
                    {{ session('ref_code') ?? 'NKM-TNK-XXX' }}
                </span>
                <button @click="navigator.clipboard.writeText('{{ session('ref_code') ?? 'NKM-TNK-XXX' }}'); copied = true; setTimeout(() => copied = false, 2000)"
                        class="p-3.5 rounded-xl bg-white border-2 border-[#E5E7EB] hover:border-[#111111] hover:bg-[#111111] hover:text-white transition-all group"
                        :class="copied ? 'border-[#25D366] bg-[#25D366] text-white' : 'text-[#6B7280]'">
                    <svg x-show="!copied" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                    <svg x-show="copied" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                </button>
            </div>
            <p class="text-sm font-bold mt-4 transition-colors duration-300" :class="copied ? 'text-[#25D366]' : 'text-transparent'">Kode berhasil disalin!</p>
        </div>

        {{-- Steps --}}
        <div class="bg-white border border-[#E5E7EB] rounded-2xl p-8 mb-10 text-left relative">
            <h3 class="font-heading text-lg font-bold text-[#111111] mb-6 flex items-center gap-3">
                <span class="w-8 h-px bg-[#C0001E]"></span> 
                Panduan Selanjutnya
            </h3>
            
            <div class="space-y-6">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 bg-[#F9F5F2] border border-[#E5E7EB] rounded-full flex items-center justify-center shrink-0 mt-1">
                        <span class="text-[#111111] font-bold text-sm font-heading">1</span>
                    </div>
                    <div>
                        <p class="text-base font-bold text-[#111111] mb-1">Simpan Kode Pendaftaran</p>
                        <p class="text-[13px] text-[#6B7280] leading-relaxed">Harap screenshot halaman ini atau catat kode referensi. Kode digunakan saat wawancara awal.</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 bg-[#F9F5F2] border border-[#E5E7EB] rounded-full flex items-center justify-center shrink-0 mt-1">
                        <span class="text-[#111111] font-bold text-sm font-heading">2</span>
                    </div>
                    <div>
                        <p class="text-base font-bold text-[#111111] mb-1">Tunggu Proses Verifikasi Admin</p>
                        <p class="text-[13px] text-[#6B7280] leading-relaxed">Tim rekrutmen kami (Sensei) akan mengirimkan WhatsApp resmi dalam 1x24 jam kerja.</p>
                    </div>
                </div>

                @if(session('reg_type') !== 'konsultasi')
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 bg-[#F9F5F2] border border-[#E5E7EB] rounded-full flex items-center justify-center shrink-0 mt-1">
                        <span class="text-[#111111] font-bold text-sm font-heading">3</span>
                    </div>
                    <div>
                        <p class="text-base font-bold text-[#111111] mb-1">Siapkan Dokumen Fisik</p>
                        <p class="text-[13px] text-[#6B7280] leading-relaxed">Siapkan fotokopi KTP, KK, Akta Kelahiran, dan Ijazah Terakhir untuk dibawa saat orientasi ke asrama.</p>
                    </div>
                </div>
                @endif
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 w-full">
            <a href="https://wa.me/{{ setting('contact_wa_admin') }}?text={{ urlencode('Konnichiwa, saya telah terdaftar di sistem LPK Nakami dengan Kode Referensi: ' . (session('ref_code') ?? 'NKM-___') . '. Mohon konfirmasi dan bimbingannya, Sensei.') }}"
               target="_blank"
               class="w-full sm:w-auto inline-flex justify-center items-center gap-3 px-8 py-4 bg-[#25D366] text-white font-bold rounded-xl hover:bg-[#1da851] transition-all duration-300 hover:shadow-lg hover:shadow-[#25D366]/30 active:scale-95 text-base border-2 border-transparent">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                Chat Wa Konfirmasi
            </a>
            
            <a href="{{ url('/') }}"
               class="w-full sm:w-auto inline-flex justify-center items-center gap-2 px-8 py-4 bg-white text-[#111111] font-bold rounded-xl hover:bg-[#F9F5F2] border-2 border-[#E5E7EB] hover:border-[#111111] transition-all duration-300 active:scale-95 text-base">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Kembali ke Beranda
            </a>
        </div>
        
    </div>
</section>

@endsection
