@extends('layouts.app')

@section('title', 'Pendaftaran & Konsultasi — LPK Nakami Indonesia')
@section('meta_description', 'Daftar program pelatihan LPK Nakami Indonesia (Ginou Jisshusei, Tokutei Ginou, Engineering) atau jadwalkan konsultasi gratis sekarang.')

@section('content')

{{-- ============================================= --}}
{{-- HERO SECTION NAKAMI --}}
{{-- ============================================= --}}
<section class="relative bg-[#111111] overflow-hidden">
     <div class="absolute inset-0 bg-gradient-to-t from-[#111111] via-[#111111]/90 to-[#111111]/50 mix-blend-multiply z-0"></div>
    <div class="absolute right-[-5%] top-[5%] text-[300px] leading-none font-jp text-white/5 select-none pointer-events-none z-0 hidden md:block">
        録
    </div>
    <div class="nakami-divider absolute bottom-0 left-0 right-0 z-10"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 z-10">
        @include('components.breadcrumb', ['items' => [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Pendaftaran']
        ]])
        
        <div class="flex items-center gap-3 mb-4 mt-4">
            <span class="w-12 h-px bg-[#C0001E]"></span>
            <span class="text-[#C0001E] text-xs font-bold uppercase tracking-widest">Portal Penerimaan</span>
        </div>

        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4">
            Pendaftaran & Konsultasi
        </h1>
        <p class="text-lg text-white/70 max-w-2xl">
            Ambil langkah pertama menuju karir global Anda di Jepang. Daftar program pelatihan unggulan kami atau jadwalkan sesi konsultasi gratis.
        </p>
    </div>
</section>

{{-- ============================================= --}}
{{-- CARA MENDAFTAR (FLOW) --}}
{{-- ============================================= --}}
<section class="relative -mt-8 z-10">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            {{-- Step 1 --}}
            <div class="bg-white border border-[#E5E7EB] rounded-2xl shadow-xl p-6 text-center hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 bg-[#111111] rounded-full flex items-center justify-center mx-auto mb-4 border-2 border-[#C0001E]">
                    <span class="text-[#C0001E] font-jp font-bold text-lg">一</span>
                </div>
                <h3 class="font-heading text-sm font-bold text-[#111111] mb-2 uppercase tracking-wide">Pilih & Isi Form</h3>
                <p class="text-xs text-[#6B7280] leading-relaxed">Pilih jenis program (Magang/TG/Sekolah) dan lengkapi data diri Anda dengan valid sesuai KTP.</p>
            </div>
            {{-- Step 2 --}}
             <div class="bg-white border border-[#E5E7EB] rounded-2xl shadow-xl p-6 text-center hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 bg-[#111111] rounded-full flex items-center justify-center mx-auto mb-4 border-2 border-[#C0001E]">
                    <span class="text-[#C0001E] font-jp font-bold text-lg">二</span>
                </div>
                <h3 class="font-heading text-sm font-bold text-[#111111] mb-2 uppercase tracking-wide">Verifikasi Data</h3>
                <p class="text-xs text-[#6B7280] leading-relaxed">Sistem akan mencatat pendaftaran Anda. Simpan nomor referensi pendaftaran untuk pengecekan.</p>
            </div>
            {{-- Step 3 --}}
             <div class="bg-white border border-[#E5E7EB] rounded-2xl shadow-xl p-6 text-center hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 bg-[#C0001E] rounded-full flex items-center justify-center mx-auto mb-4 border-2 border-[#111111] shadow-lg shadow-[#C0001E]/30 animate-pulse">
                    <span class="text-white font-jp font-bold text-lg">三</span>
                </div>
                <h3 class="font-heading text-sm font-bold text-[#111111] mb-2 uppercase tracking-wide">Panggilan Seleksi</h3>
                <p class="text-xs text-[#6B7280] leading-relaxed">Sensei kami akan menghubungi via WhatsApp untuk mengatur jadwal interview dan orientasi awal.</p>
            </div>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- FORM PENDAFTARAN --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24 bg-[#F9F5F2]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8"
         x-data="{
             activeTab: '{{ request('type', old('type', 'pelatihan')) }}',
             submitting: false
         }">

        {{-- Tab Selector --}}
        <div class="flex flex-col sm:flex-row bg-[#E5E7EB] rounded-2xl p-1.5 mb-10 overflow-hidden">
            <button @click="activeTab = 'pelatihan'"
                    :class="activeTab === 'pelatihan' ? 'bg-[#111111] text-white shadow-lg shadow-black/20' : 'text-[#6B7280] hover:text-[#111111] hover:bg-white/50'"
                    class="flex-1 flex items-center justify-center gap-2 px-6 py-4 text-sm font-bold rounded-xl transition-all duration-300 uppercase tracking-widest">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                Daftar Program
            </button>
            <button @click="activeTab = 'konsultasi'"
                    :class="activeTab === 'konsultasi' ? 'bg-[#111111] text-white shadow-lg shadow-black/20' : 'text-[#6B7280] hover:text-[#111111] hover:bg-white/50'"
                    class="flex-1 flex items-center justify-center gap-2 px-6 py-4 text-sm font-bold rounded-xl transition-all duration-300 uppercase tracking-widest">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                Konsultasi Gratis
            </button>
        </div>

        {{-- Global Errors --}}
        @if($errors->any())
        <div class="bg-red-50 border-l-4 border-[#C0001E] rounded-r-2xl p-5 mb-8 shadow-sm">
            <div class="flex items-center gap-2 mb-3">
                <div class="w-6 h-6 rounded-full bg-[#C0001E]/20 flex items-center justify-center shrink-0">
                    <svg class="w-4 h-4 text-[#C0001E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <span class="text-sm font-bold text-[#111111]">Terdapat kesalahan pengisian:</span>
            </div>
            <ul class="list-none text-sm text-[#C0001E] space-y-2 ml-8">
                @foreach($errors->all() as $error)
                    <li class="flex items-start gap-2">
                        <span class="text-[#C0001E] mt-0.5">•</span>
                        <span>{{ $error }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- =============================== --}}
        {{-- FORM PELATIHAN --}}
        {{-- =============================== --}}
        <div x-show="activeTab === 'pelatihan'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="bg-white border border-[#E5E7EB] rounded-3xl shadow-xl overflow-hidden relative">
                
                {{-- Decorative Top Line --}}
                <div class="h-1.5 w-full bg-gradient-to-r from-[#C0001E] to-[#111111]"></div>
                
                <div class="px-8 py-8 border-b border-[#F3F4F6] relative overflow-hidden">
                    <div class="absolute right-4 top-1/2 -translate-y-1/2 text-[100px] font-jp text-[#F9F5F2] select-none pointer-events-none">願</div>
                    <h2 class="font-heading text-2xl font-bold text-[#111111] relative z-10">Formulir Peserta Didik Baru</h2>
                    <p class="text-sm text-[#6B7280] mt-2 relative z-10">Data yang Anda masukkan akan langsung diverifikasi oleh tim administrasi LPK Nakami.</p>
                </div>
                
                <form action="{{ route('daftar.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6" @submit="submitting = true">
                    @csrf
                    <input type="hidden" name="type" value="pelatihan">
                    {{-- Honeypot --}}
                    <div class="absolute opacity-0 -z-10" aria-hidden="true">
                        <input type="text" name="website" tabindex="-1" autocomplete="off" value="">
                    </div>

                    {{-- Section Title --}}
                    <div class="flex items-center gap-3 pt-2 pb-4 border-b border-[#F3F4F6]">
                        <span class="w-6 h-6 rounded bg-[#111111] text-white flex items-center justify-center font-bold text-xs font-heading">1</span>
                        <h3 class="font-bold text-[#111111] uppercase tracking-wider text-sm">Pilihan Program</h3>
                    </div>

                    {{-- Program --}}
                    <div>
                        <label for="training_program" class="block text-sm font-bold text-[#111111] mb-2">Pilih Program Sertifikasi/Pelatihan <span class="text-[#C0001E]">*</span></label>
                        <select name="program_id" id="training_program" required
                                class="w-full px-4 py-3.5 bg-white border border-[#E5E7EB] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#C0001E] transition-all cursor-pointer hover:bg-[#F9F5F2]">
                            <option value="">— Silakan Pilih Program —</option>
                            @foreach($programs as $program)
                                <option value="{{ $program->id }}" {{ (old('program_id') ?? request('program_id')) == $program->id ? 'selected' : '' }}>
                                    [{{ $program->category->name }}] {{ $program->name }}
                                </option>
                            @endforeach
                        </select>
                        <p class="text-xs text-[#6B7280] mt-2 italic">*Biaya pendidikan akan diinformasikan lebih lanjut saat sesi konsultasi/interview.</p>
                        @error('program_id')<p class="text-xs text-[#C0001E] mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Section Title --}}
                    <div class="flex items-center gap-3 pt-6 pb-4 border-b border-[#F3F4F6]">
                        <span class="w-6 h-6 rounded bg-[#111111] text-white flex items-center justify-center font-bold text-xs font-heading">2</span>
                        <h3 class="font-bold text-[#111111] uppercase tracking-wider text-sm">Identitas Diri</h3>
                    </div>

                    {{-- Nama --}}
                    <div>
                        <label for="training_name" class="block text-sm font-bold text-[#111111] mb-2">Nama Lengkap <span class="text-[#C0001E]">*</span></label>
                        <input type="text" name="name" id="training_name" value="{{ old('name') }}" required
                               class="w-full px-4 py-3.5 bg-white border border-[#E5E7EB] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#C0001E] transition-all hover:bg-[#F9F5F2]"
                               placeholder="Sesuai KTP / Paspor / Ijazah">
                        @error('name')<p class="text-xs text-[#C0001E] mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- 2 Columns: WhatsApp & Email --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="training_phone" class="block text-sm font-bold text-[#111111] mb-2">Nomor WhatsApp Aktif <span class="text-[#C0001E]">*</span></label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#6B7280] text-sm font-semibold">+62</span>
                                <input type="text" name="phone" id="training_phone" value="{{ old('phone') }}" required
                                       class="w-full pl-12 pr-4 py-3.5 bg-white border border-[#E5E7EB] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#C0001E] transition-all hover:bg-[#F9F5F2]"
                                       placeholder="81234567890">
                            </div>
                            @error('phone')<p class="text-xs text-[#C0001E] mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="training_email" class="block text-sm font-bold text-[#111111] mb-2">Alamat Email <span class="text-[#C0001E]">*</span></label>
                            <input type="email" name="email" id="training_email" value="{{ old('email') }}" required
                                   class="w-full px-4 py-3.5 bg-white border border-[#E5E7EB] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#C0001E] transition-all hover:bg-[#F9F5F2]"
                                   placeholder="email@contoh.com">
                            @error('email')<p class="text-xs text-[#C0001E] mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    {{-- 2 Columns: TTL & Gender --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="training_dob" class="block text-sm font-bold text-[#111111] mb-2">Tanggal Lahir <span class="text-[#C0001E]">*</span></label>
                            <input type="date" name="dob" id="training_dob" value="{{ old('dob') }}" required
                                   class="w-full px-4 py-3.5 bg-white border border-[#E5E7EB] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#C0001E] transition-all hover:bg-[#F9F5F2] text-[#111111]">
                            @error('dob')<p class="text-xs text-[#C0001E] mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-[#111111] mb-3">Jenis Kelamin <span class="text-[#C0001E]">*</span></label>
                            <div class="flex gap-6">
                                <label class="inline-flex items-center gap-3 cursor-pointer group">
                                    <div class="relative flex items-center">
                                        <input type="radio" name="gender" value="L" {{ old('gender') === 'L' ? 'checked' : '' }} required
                                               class="peer sr-only">
                                        <div class="w-5 h-5 rounded-full border-2 border-[#E5E7EB] peer-checked:border-[#C0001E] peer-focus:ring-2 peer-focus:ring-[#C0001E]/30 transition-all flex items-center justify-center">
                                            <div class="w-2.5 h-2.5 rounded-full bg-[#C0001E] scale-0 peer-checked:scale-100 transition-transform"></div>
                                        </div>
                                    </div>
                                    <span class="text-sm font-semibold text-[#6B7280] group-hover:text-[#111111] peer-checked:text-[#111111] transition-colors">Laki-laki (男)</span>
                                </label>
                                <label class="inline-flex items-center gap-3 cursor-pointer group">
                                    <div class="relative flex items-center">
                                        <input type="radio" name="gender" value="P" {{ old('gender') === 'P' ? 'checked' : '' }}
                                               class="peer sr-only">
                                        <div class="w-5 h-5 rounded-full border-2 border-[#E5E7EB] peer-checked:border-[#C0001E] peer-focus:ring-2 peer-focus:ring-[#C0001E]/30 transition-all flex items-center justify-center">
                                            <div class="w-2.5 h-2.5 rounded-full bg-[#C0001E] scale-0 peer-checked:scale-100 transition-transform"></div>
                                        </div>
                                    </div>
                                    <span class="text-sm font-semibold text-[#6B7280] group-hover:text-[#111111] peer-checked:text-[#111111] transition-colors">Perempuan (女)</span>
                                </label>
                            </div>
                            @error('gender')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    {{-- Alamat --}}
                    <div>
                        <label for="training_address" class="block text-sm font-bold text-[#111111] mb-2">Alamat Lengkap <span class="text-[#C0001E]">*</span></label>
                        <textarea name="address" id="training_address" rows="3" required
                                  class="w-full px-4 py-3.5 bg-white border border-[#E5E7EB] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#C0001E] transition-all resize-none hover:bg-[#F9F5F2]"
                                  placeholder="Jalan, RT/RW, Desa/Kelurahan, Kecamatan, Kota/Kabupaten, Provinsi">{{ old('address') }}</textarea>
                        @error('address')<p class="text-xs text-[#C0001E] mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Section Title --}}
                    <div class="flex items-center gap-3 pt-6 pb-4 border-b border-[#F3F4F6]">
                        <span class="w-6 h-6 rounded bg-[#111111] text-white flex items-center justify-center font-bold text-xs font-heading">3</span>
                        <h3 class="font-bold text-[#111111] uppercase tracking-wider text-sm">Latar Belakang</h3>
                    </div>

                    {{-- 2 Columns: Pendidikan & Pekerjaan --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="training_education" class="block text-sm font-bold text-[#111111] mb-2">Pendidikan Terakhir <span class="text-[#C0001E]">*</span></label>
                            <select name="last_education" id="training_education" required
                                    class="w-full px-4 py-3.5 bg-white border border-[#E5E7EB] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#C0001E] transition-all cursor-pointer hover:bg-[#F9F5F2]">
                                <option value="">— Silakan Pilih —</option>
                                <option value="SMP" {{ old('last_education') === 'SMP' ? 'selected' : '' }}>SMP/Sederajat</option>
                                <option value="SMA" {{ old('last_education') === 'SMA' ? 'selected' : '' }}>SMA/SMK/MA/Sederajat</option>
                                <option value="D3" {{ old('last_education') === 'D3' ? 'selected' : '' }}>Diploma (D1/D2/D3)</option>
                                <option value="S1" {{ old('last_education') === 'S1' ? 'selected' : '' }}>Sarjana (S1/D4)</option>
                                <option value="Lainnya" {{ old('last_education') === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('last_education')<p class="text-xs text-[#C0001E] mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="training_occupation" class="block text-sm font-bold text-[#111111] mb-2">Status / Pekerjaan Saat Ini <span class="text-[#C0001E]">*</span></label>
                            <input type="text" name="occupation" id="training_occupation" value="{{ old('occupation') }}" required
                                   class="w-full px-4 py-3.5 bg-white border border-[#E5E7EB] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#C0001E] transition-all hover:bg-[#F9F5F2]"
                                   placeholder="Cth: Fresh Graduate SMK / Karyawan Pabrik">
                            @error('occupation')<p class="text-xs text-[#C0001E] mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    {{-- No HP Wali --}}
                    <div>
                        <label for="training_mother_phone" class="block text-sm font-bold text-[#111111] mb-2">Nomor HP Orang Tua / Wali Kelularga (62) <span class="text-[#C0001E]">*</span></label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#6B7280] text-sm font-semibold">+62</span>
                            <input type="text" name="mother_phone" id="training_mother_phone" value="{{ old('mother_phone') }}" required
                                   class="w-full pl-12 pr-4 py-3.5 bg-white border border-[#E5E7EB] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#C0001E] transition-all hover:bg-[#F9F5F2]"
                                   placeholder="Nomor HP ayah/ibu/wali">
                        </div>
                        <p class="text-xs text-[#6B7280] mt-1.5 italic">Dibutuhkan untuk izin persetujuan orang tua/wali ke Jepang.</p>
                        @error('mother_phone')<p class="text-xs text-[#C0001E] mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Motivasi --}}
                    <div>
                        <label for="training_motivation" class="block text-sm font-bold text-[#111111] mb-2">Alasan Ingin ke Jepang bersama LPK Nakami <span class="text-[#C0001E]">*</span></label>
                        <textarea name="motivation" id="training_motivation" rows="3" required
                                  class="w-full px-4 py-3.5 bg-white border border-[#E5E7EB] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#C0001E] transition-all resize-none hover:bg-[#F9F5F2]"
                                  placeholder="Tuliskan motivasi utama Anda mengikuti program ini... (misal: ingin membantu ekonomi pasca, mendapatkan pengalaman kerja global)">{{ old('motivation') }}</textarea>
                        @error('motivation')<p class="text-xs text-[#C0001E] mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Pas Foto --}}
                    <div class="pt-2">
                        <label for="training_photo" class="block text-sm font-bold text-[#111111] mb-2">Upload Pas Foto Terkini <span class="text-[#6B7280] text-xs font-normal">(opsional)</span></label>
                        <div class="relative bg-[#F9F5F2] border-2 border-dashed border-[#E5E7EB] rounded-xl p-4 text-center hover:bg-[#E5E7EB]/50 transition-colors">
                            <input type="file" name="photo" id="training_photo" accept=".jpg,.jpeg,.png"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                            <div class="pointer-events-none">
                                <svg class="w-8 h-8 mx-auto text-[#6B7280] mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                                <p class="text-sm font-semibold text-[#111111]">Klik untuk memilih file</p>
                                <p class="text-xs text-[#6B7280] mt-1">Format: JPG, PNG. Ukuran maksimal: 2MB</p>
                            </div>
                        </div>
                        @error('photo')<p class="text-xs text-[#C0001E] mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Persetujuan --}}
                    <div class="bg-gray-50 border border-[#E5E7EB] rounded-xl p-5 mt-6">
                        <label class="flex items-start gap-4 cursor-pointer group">
                            <div class="relative flex items-start mt-0.5">
                                <input type="checkbox" name="agreement" value="1" {{ old('agreement') ? 'checked' : '' }} required
                                       class="peer sr-only">
                                <div class="w-5 h-5 rounded border-2 border-[#E5E7EB] bg-white peer-checked:bg-[#C0001E] peer-checked:border-[#C0001E] peer-focus:ring-2 peer-focus:ring-[#C0001E]/30 transition-all flex items-center justify-center">
                                    <svg class="w-3.5 h-3.5 text-white scale-0 peer-checked:scale-100 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                </div>
                            </div>
                            <span class="text-sm text-[#6B7280] leading-relaxed group-hover:text-[#111111] transition-colors">
                                Saya menyatakan bahwa seluruh data yang saya isikan adalah <strong>benar</strong>. Saya bersedia mengikuti prosedur pendaftaran, seleksi, serta menyetujui <a href="/kebijakan-privasi" target="_blank" class="text-[#C0001E] hover:underline font-bold">syarat & ketentuan operasional</a> yang berlaku di LPK Nakami Indonesia.
                            </span>
                        </label>
                        @error('agreement')<p class="text-xs text-[#C0001E] mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Submit --}}
                    <div class="pt-6">
                        <button type="submit" :disabled="submitting"
                                class="w-full btn-nakami-primary justify-center py-4 bg-[#C0001E] hover:bg-red-800 text-white disabled:opacity-50 disabled:cursor-not-allowed text-base shadow-xl shadow-red-900/20">
                            <template x-if="!submitting">
                                <span class="flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    Kirim Formulir Pendaftaran
                                </span>
                            </template>
                            <template x-if="submitting">
                                <span class="flex items-center gap-2">
                                    <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                                    Memproses Data Ke Sistem...
                                </span>
                            </template>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- =============================== --}}
        {{-- FORM KONSULTASI --}}
        {{-- =============================== --}}
        <div x-show="activeTab === 'konsultasi'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-cloak>
            <div class="bg-white border border-[#E5E7EB] rounded-3xl shadow-xl overflow-hidden relative">
                
                {{-- Decorative Top Line --}}
                <div class="h-1.5 w-full bg-gradient-to-r from-[#111111] to-[#6B7280]"></div>
                
                <div class="px-8 py-8 border-b border-[#F3F4F6] relative overflow-hidden bg-gradient-to-b from-[#F9F5F2] to-white">
                    <div class="absolute right-4 top-1/2 -translate-y-1/2 text-[100px] font-jp text-[#E5E7EB]/50 select-none pointer-events-none">問</div>
                    <h2 class="font-heading text-2xl font-bold text-[#111111] relative z-10">Jadwalkan Konsultasi Gratis</h2>
                    <p class="text-sm text-[#6B7280] mt-2 relative z-10">Masih ragu memilih program magang yang cocok? Tinggalkan kontak Anda, Sensei kami akan memandu Anda.</p>
                </div>
                
                <form action="{{ route('daftar.store') }}" method="POST" class="p-8 space-y-6" @submit="submitting = true">
                    @csrf
                    <input type="hidden" name="type" value="konsultasi">
                    {{-- Honeypot --}}
                    <div class="absolute opacity-0 -z-10" aria-hidden="true">
                        <input type="text" name="website" tabindex="-1" autocomplete="off" value="">
                    </div>

                    {{-- Nama --}}
                    <div>
                        <label for="konsul_name" class="block text-sm font-bold text-[#111111] mb-2">Nama Anda <span class="text-[#C0001E]">*</span></label>
                        <input type="text" name="name" id="konsul_name" value="{{ old('name') }}" required
                               class="w-full px-4 py-3.5 bg-white border border-[#E5E7EB] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#111111] transition-all hover:bg-[#F9F5F2]"
                               placeholder="Nama Panggilan / Lengkap">
                        @error('name')<p class="text-xs text-[#C0001E] mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- WhatsApp --}}
                    <div>
                        <label for="konsul_phone" class="block text-sm font-bold text-[#111111] mb-2">Nomor WhatsApp Aktif <span class="text-[#C0001E]">*</span></label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#6B7280] text-sm font-semibold">+62</span>
                            <input type="text" name="phone" id="konsul_phone" value="{{ old('phone') }}" required
                                   class="w-full pl-12 pr-4 py-3.5 bg-white border border-[#E5E7EB] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#111111] transition-all hover:bg-[#F9F5F2]"
                                   placeholder="81234567890">
                        </div>
                        @error('phone')<p class="text-xs text-[#C0001E] mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Program Diminati --}}
                    <div>
                        <label for="konsul_program" class="block text-sm font-bold text-[#111111] mb-2">Tertarik Pada Program Apa? <span class="text-[#C0001E]">*</span></label>
                        <select name="program_id" id="konsul_program" required
                                class="w-full px-4 py-3.5 bg-white border border-[#E5E7EB] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#111111] transition-all cursor-pointer hover:bg-[#F9F5F2]">
                            <option value="">— Pilih Minat Program —</option>
                            @foreach($programs as $program)
                                <option value="{{ $program->id }}" {{ old('program_id') == $program->id ? 'selected' : '' }}>
                                    {{ $program->category->name }} ({{ $program->name }})
                                </option>
                            @endforeach
                        </select>
                        <p class="text-xs text-[#6B7280] italic mt-2">Bila Anda belum yakin, pilih program apa saja, nanti bisa didiskusikan kembali.</p>
                        @error('program_id')<p class="text-xs text-[#C0001E] mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Pesan --}}
                    <div>
                        <label for="konsul_message" class="block text-sm font-bold text-[#111111] mb-2">Pesan & Pertanyaan <span class="text-[#6B7280] font-normal text-xs">(Opsional)</span></label>
                        <textarea name="message" id="konsul_message" rows="4"
                                  class="w-full px-4 py-3.5 bg-white border border-[#E5E7EB] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#111111] transition-all resize-none hover:bg-[#F9F5F2]"
                                  placeholder="Tuliskan jika ada kendala tinggi badan, mata minus, tato, riwayat penyakit, dll agar Sensei dapat mencarikan SO (Sending Organization) yang paling tepat...">{{ old('message') }}</textarea>
                        @error('message')<p class="text-xs text-[#C0001E] mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Submit --}}
                    <div class="pt-4">
                        <button type="submit" :disabled="submitting"
                                class="w-full btn-nakami-primary justify-center py-4 bg-[#111111] hover:bg-black text-white disabled:opacity-50 disabled:cursor-not-allowed text-base">
                            <template x-if="!submitting">
                                <span class="flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                                    Panggil Tim Konsultasi
                                </span>
                            </template>
                            <template x-if="submitting">
                                <span class="flex items-center gap-2">
                                    <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                                    Memproses Permintaan...
                                </span>
                            </template>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</section>

@endsection
