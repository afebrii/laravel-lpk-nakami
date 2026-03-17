@extends('layouts.app')

@section('title', 'Kontak — LPK Nakami Indonesia')
@section('meta_description', 'Hubungi LPK Nakami Indonesia untuk informasi program magang Jepang, Tokutei Ginou, atau pendaftaran sekolah bahasa.')

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
        話
    </div>
    <div class="nakami-divider absolute bottom-0 left-0 right-0 z-10"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-16 lg:pt-40 lg:pb-24 z-10">
        @include('components.breadcrumb', ['items' => [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Kontak']
        ]])
        
        <div class="flex items-center gap-3 mb-4 mt-4">
            <span class="w-12 h-px bg-[#C0001E]"></span>
            <span class="text-[#C0001E] text-xs font-bold uppercase tracking-widest">Nakami Indonesia • Kontak</span>
        </div>

        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4">
            Hubungi Pusat Resmi Nakami
        </h1>
        <p class="text-lg text-white/70 max-w-2xl">
            Ada pertanyaan mengenai program pendaftaran, persyaratan, atau jadwal keberangkatan ke Jepang? Tim representatif kami siap memandu Anda.
        </p>
    </div>
</section>

{{-- ============================================= --}}
{{-- CONTACT CONTENT --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24 bg-[#F9F5F2]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-12">

            {{-- LEFT: Contact Form --}}
            <div class="lg:col-span-3">
                <div class="bg-white border border-[#E5E7EB] rounded-3xl shadow-xl overflow-hidden relative">
                    {{-- Decorative Top Line --}}
                    <div class="h-1.5 w-full bg-gradient-to-r from-[#C0001E] to-[#111111]"></div>
                    
                    <div class="px-8 py-8 border-b border-[#F3F4F6] relative overflow-hidden">
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 text-[100px] font-jp text-[#F9F5F2] select-none pointer-events-none">信</div>
                        <h2 class="font-heading text-2xl font-bold text-[#111111] relative z-10">Kirim Pesan Resmi</h2>
                        <p class="text-sm text-[#6B7280] mt-2 relative z-10">Silakan isi formulir di bawah ini dengan data yang valid. Kami akan merespons maksimal 1x24 jam kerja.</p>
                    </div>

                    @if($errors->any())
                    <div class="mx-8 mt-6 bg-red-50 border-l-4 border-[#C0001E] p-4 rounded-r-xl">
                        <ul class="list-none text-sm text-red-700 space-y-1">
                            @foreach($errors->all() as $error)
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[#C0001E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('kontak.store') }}" method="POST" class="p-8 space-y-6" x-data="{ submitting: false }" @submit="submitting = true">
                        @csrf
                        <div class="absolute opacity-0 -z-10" aria-hidden="true">
                            <input type="text" name="website" tabindex="-1" autocomplete="off" value="">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="contact_name" class="block text-sm font-bold text-[#111111] mb-2">Nama Lengkap Sesuai KTP <span class="text-[#C0001E]">*</span></label>
                                <input type="text" name="name" id="contact_name" value="{{ old('name') }}" required
                                       class="w-full px-4 py-3.5 bg-[#F9F5F2] border border-[#E5E7EB] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#C0001E] transition-all bg-white hover:bg-[#F9F5F2]"
                                       placeholder="Cth: Budi Santoso">
                            </div>
                            <div>
                                <label for="contact_email" class="block text-sm font-bold text-[#111111] mb-2">Alamat Email Aktif <span class="text-[#C0001E]">*</span></label>
                                <input type="email" name="email" id="contact_email" value="{{ old('email') }}" required
                                       class="w-full px-4 py-3.5 bg-[#F9F5F2] border border-[#E5E7EB] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#C0001E] transition-all bg-white hover:bg-[#F9F5F2]"
                                       placeholder="email@contoh.com">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="contact_phone" class="block text-sm font-bold text-[#111111] mb-2">Nomor WhatsApp <span class="text-[#6B7280] font-normal text-xs">(Bila ada)</span></label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#6B7280] text-sm font-semibold">+62</span>
                                    <input type="text" name="phone" id="contact_phone" value="{{ old('phone') }}"
                                           class="w-full pl-12 pr-4 py-3.5 bg-[#F9F5F2] border border-[#E5E7EB] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#C0001E] transition-all bg-white hover:bg-[#F9F5F2]"
                                           placeholder="81234567890">
                                </div>
                            </div>
                            <div>
                                <label for="contact_subject" class="block text-sm font-bold text-[#111111] mb-2">Perihal (Topik Utama) <span class="text-[#C0001E]">*</span></label>
                                <select name="subject" id="contact_subject" required
                                        class="w-full px-4 py-3.5 bg-[#F9F5F2] border border-[#E5E7EB] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#C0001E] transition-all bg-white hover:bg-[#F9F5F2] cursor-pointer">
                                    <option value="">— Pilih Topik Perihal —</option>
                                    <option value="Informasi Program Magang Jepang (Ginou Jisshusei)" {{ old('subject') === 'Informasi Program Magang Jepang (Ginou Jisshusei)' ? 'selected' : '' }}>Informasi Program Magang Jepang (Ginou Jisshusei)</option>
                                    <option value="Informasi Program Tokutei Ginou (TG)" {{ old('subject') === 'Informasi Program Tokutei Ginou (TG)' ? 'selected' : '' }}>Informasi Program Tokutei Ginou (TG)</option>
                                    <option value="Informasi Engineering Visa" {{ old('subject') === 'Informasi Engineering Visa' ? 'selected' : '' }}>Informasi Engineering Visa</option>
                                    <option value="Informasi Nihongo Gakkou" {{ old('subject') === 'Informasi Nihongo Gakkou' ? 'selected' : '' }}>Informasi Nihongo Gakkou</option>
                                    <option value="Daftar Pelatihan" {{ old('subject') === 'Daftar Pelatihan' ? 'selected' : '' }}>Pendaftaran Pelatihan</option>
                                    <option value="Kerjasama Institusi/BKK" {{ old('subject') === 'Kerjasama Institusi/BKK' ? 'selected' : '' }}>Kerjasama Institusi / BKK Sekolah</option>
                                    <option value="Lainnya" {{ old('subject') === 'Lainnya' ? 'selected' : '' }}>Lain-lain</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="contact_message" class="block text-sm font-bold text-[#111111] mb-2">Detail Pesan <span class="text-[#C0001E]">*</span></label>
                            <textarea name="message" id="contact_message" rows="5" required
                                      class="w-full px-4 py-3.5 bg-[#F9F5F2] border border-[#E5E7EB] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#C0001E] transition-all bg-white hover:bg-[#F9F5F2] resize-none"
                                      placeholder="Tuliskan pertanyaan, tujuan spesifik, atau informasi penting lainnya yang ingin Anda diskusikan dengan LPK Nakami...">{{ old('message') }}</textarea>
                        </div>

                        <div class="pt-2">
                            <button type="submit" :disabled="submitting"
                                    class="w-full btn-nakami-primary justify-center py-4 bg-[#111111] hover:bg-black text-white disabled:opacity-50 disabled:cursor-not-allowed">
                                <template x-if="!submitting">
                                    <span class="inline-flex items-center gap-2 text-base">
                                        Kirim Pesan Sekarang
                                        <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                                    </span>
                                </template>
                                <template x-if="submitting">
                                    <span class="inline-flex items-center gap-2">
                                        <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                                        Memproses Pengiriman...
                                    </span>
                                </template>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- RIGHT: Info --}}
            <div class="lg:col-span-2 space-y-6">
                
                {{-- Fast Response Card --}}
                <div class="bg-gradient-to-br from-[#111111] to-[#1E1E1E] rounded-3xl p-8 relative overflow-hidden shadow-xl border border-white/10 group">
                    <div class="absolute right-[-10%] bottom-[-10%] text-9xl font-jp text-white/5 group-hover:text-white/10 transition-colors pointer-events-none z-0">即</div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 bg-[#25D366]/20 rounded-full flex items-center justify-center mb-4">
                            <div class="w-12 h-12 bg-[#25D366] rounded-full flex items-center justify-center shadow-lg shadow-[#25D366]/40 animate-pulse">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                            </div>
                        </div>
                        <h3 class="font-heading text-xl font-bold text-white mb-2">Butuh Jawaban Cepat?</h3>
                        <p class="text-white/70 text-sm mb-6">Staff admin (Sensei) kami siap memandu pendaftaran harian Anda via WhatsApp Business.</p>
                        <a href="https://wa.me/{{ setting('contact_wa_admin') }}?text={{ urlencode('Konnichiwa LPK Nakami, saya ingin bertanya mengenai program pendaftaran ke Jepang.') }}" target="_blank"
                           class="w-full py-3.5 bg-white text-[#111111] font-bold rounded-xl text-center hover:bg-[#F9F5F2] transition-colors shadow-lg active:scale-95">
                            Hubungi via WhatsApp
                        </a>
                    </div>
                </div>

                {{-- Contact Info Details --}}
                <div class="bg-white border border-[#E5E7EB] rounded-2xl p-6 lg:p-8 shadow-sm">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="w-8 h-px bg-[#C0001E]"></span>
                        <h3 class="font-heading text-lg font-bold text-[#111111]">Kantor Pusat Nakami</h3>
                    </div>
                    
                    <div class="space-y-5">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-[#F9F5F2] border border-[#E5E7EB] rounded-xl flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-[#C0001E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-[#6B7280] uppercase tracking-wider mb-1">Kantor Utama & Pusat Pelatihan Asrama</p>
                                <p class="text-sm font-semibold text-[#111111] leading-snug">{{ setting('contact_address') }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-[#F9F5F2] border border-[#E5E7EB] rounded-xl flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-[#C0001E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-[#6B7280] uppercase tracking-wider mb-1">Telepon Office</p>
                                <p class="text-sm font-semibold text-[#111111]">{{ setting('contact_phone') }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-[#F9F5F2] border border-[#E5E7EB] rounded-xl flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-[#C0001E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-[#6B7280] uppercase tracking-wider mb-1">Surel/Email Resmi</p>
                                <p class="text-sm font-semibold text-[#111111]">{{ setting('contact_email') }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-[#F9F5F2] border border-[#E5E7EB] rounded-xl flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-[#C0001E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-[#6B7280] uppercase tracking-wider mb-1">Jam Operasional Pelayanan</p>
                                <p class="text-sm font-semibold text-[#111111]">{{ setting('contact_hours') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Social Media Horizontal --}}
                    <div class="mt-8 pt-6 border-t border-[#F3F4F6]">
                         <p class="text-xs font-bold text-[#6B7280] uppercase tracking-wider mb-3 text-center">Ikuti Aktivitas Kami</p>
                         <div class="flex items-center justify-center gap-3">
                            <a href="{{ setting('social_facebook') }}" target="_blank" class="w-10 h-10 bg-[#F9F5F2] border border-[#E5E7EB] rounded-full flex items-center justify-center text-[#1877F2] hover:bg-[#1877F2] hover:text-white transition-all shadow-sm">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                            <a href="{{ setting('social_instagram') }}" target="_blank" class="w-10 h-10 bg-[#F9F5F2] border border-[#E5E7EB] rounded-full flex items-center justify-center text-[#E4405F] hover:bg-gradient-to-br hover:from-[#f09433] hover:via-[#dc2743] hover:to-[#bc1888] hover:text-white transition-all shadow-sm hover:border-transparent">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                            </a>
                            <a href="{{ setting('social_youtube') }}" target="_blank" class="w-10 h-10 bg-[#F9F5F2] border border-[#E5E7EB] rounded-full flex items-center justify-center text-[#FF0000] hover:bg-[#FF0000] hover:text-white transition-all shadow-sm hover:border-transparent">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            </a>
                            <a href="{{ setting('social_tiktok') }}" target="_blank" class="w-10 h-10 bg-[#F9F5F2] border border-[#E5E7EB] rounded-full flex items-center justify-center text-[#111111] hover:bg-[#111111] hover:text-white transition-all shadow-sm hover:border-transparent">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Maps --}}
                <div class="bg-white border border-[#E5E7EB] rounded-2xl overflow-hidden shadow-sm relative group">
                    <div class="aspect-[4/3] bg-[#E5E7EB] relative">
                        @if(setting('seo_google_maps_embed'))
                            <iframe src="{{ parse_google_maps_url(setting('seo_google_maps_embed')) }}" width="100%" height="100%" style="border:0; filter: grayscale(100%) contrast(1.2);" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="group-hover:filter-none transition-all duration-700"></iframe>
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center text-[#6B7280]">
                                <svg class="w-12 h-12 text-[#C0001E]/20 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <p class="text-sm font-semibold">Peta Lokasi Nakami</p>
                            </div>
                        @endif
                    </div>
                    <div class="absolute bottom-4 left-4 right-4 bg-white/95 backdrop-blur-sm p-3 rounded-xl shadow-lg flex justify-center border border-white/20">
                        <a href="https://maps.google.com/?q={{ urlencode(setting('contact_address')) }}" target="_blank"
                           class="inline-flex items-center gap-2 text-sm font-bold text-[#111111] hover:text-[#C0001E] transition-colors">
                            <svg class="w-4 h-4 text-[#C0001E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            Buka Detail di Google Maps
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

@endsection
