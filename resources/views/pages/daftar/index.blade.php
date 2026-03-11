@extends('layouts.app')

@section('title', 'Pendaftaran — ' . setting('site_name', 'LKP Yuwita'))
@section('meta_description', 'Daftar program pelatihan kecantikan atau konsultasi gratis di LKP/LPK Yuwita. Proses cepat dan mudah.')

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
            ['label' => 'Pendaftaran']
        ]])
        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4">
            Pendaftaran
        </h1>
        <p class="text-lg text-white/75 max-w-2xl">
            Daftar program pelatihan kecantikan atau konsultasikan kebutuhan Anda secara gratis bersama tim kami.
        </p>
    </div>
</section>

{{-- ============================================= --}}
{{-- CARA MENDAFTAR --}}
{{-- ============================================= --}}
<section class="relative -mt-8 z-10">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white rounded-2xl shadow-xl shadow-charcoal/5 p-6 text-center">
                <div class="w-12 h-12 bg-rose-gold/10 rounded-full flex items-center justify-center mx-auto mb-3">
                    <span class="text-rose-gold font-bold text-lg">1</span>
                </div>
                <h3 class="font-heading text-sm font-bold text-charcoal mb-1">Isi Formulir</h3>
                <p class="text-xs text-dark-gray">Lengkapi data diri pada formulir di bawah ini.</p>
            </div>
            <div class="bg-white rounded-2xl shadow-xl shadow-charcoal/5 p-6 text-center">
                <div class="w-12 h-12 bg-rose-gold/10 rounded-full flex items-center justify-center mx-auto mb-3">
                    <span class="text-rose-gold font-bold text-lg">2</span>
                </div>
                <h3 class="font-heading text-sm font-bold text-charcoal mb-1">Dapatkan Nomor Referensi</h3>
                <p class="text-xs text-dark-gray">Simpan nomor referensi sebagai bukti pendaftaran.</p>
            </div>
            <div class="bg-white rounded-2xl shadow-xl shadow-charcoal/5 p-6 text-center">
                <div class="w-12 h-12 bg-rose-gold/10 rounded-full flex items-center justify-center mx-auto mb-3">
                    <span class="text-rose-gold font-bold text-lg">3</span>
                </div>
                <h3 class="font-heading text-sm font-bold text-charcoal mb-1">Konfirmasi Admin</h3>
                <p class="text-xs text-dark-gray">Tim kami akan menghubungi Anda via WhatsApp.</p>
            </div>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- FORM PENDAFTARAN --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8"
         x-data="{
             activeTab: '{{ old('type', 'konsultasi') }}',
             submitting: false
         }">

        {{-- Tab Selector --}}
        <div class="flex bg-light-gray rounded-2xl p-1.5 mb-8">
            <button @click="activeTab = 'konsultasi'"
                    :class="activeTab === 'konsultasi' ? 'bg-white text-charcoal shadow-md' : 'text-dark-gray hover:text-charcoal'"
                    class="flex-1 flex items-center justify-center gap-2 px-4 py-3 text-sm font-semibold rounded-xl transition-all duration-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                Konsultasi Gratis
            </button>
            <button @click="activeTab = 'pelatihan'"
                    :class="activeTab === 'pelatihan' ? 'bg-white text-charcoal shadow-md' : 'text-dark-gray hover:text-charcoal'"
                    class="flex-1 flex items-center justify-center gap-2 px-4 py-3 text-sm font-semibold rounded-xl transition-all duration-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                Daftar Program Pelatihan
            </button>
        </div>

        {{-- Global Errors --}}
        @if($errors->any())
        <div class="bg-red-50 border border-red-200 rounded-2xl p-4 mb-6">
            <div class="flex items-center gap-2 mb-2">
                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span class="text-sm font-semibold text-red-700">Terdapat kesalahan pada formulir:</span>
            </div>
            <ul class="list-disc list-inside text-sm text-red-600 space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- =============================== --}}
        {{-- FORM KONSULTASI --}}
        {{-- =============================== --}}
        <div x-show="activeTab === 'konsultasi'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="bg-white border border-light-gray rounded-2xl shadow-sm overflow-hidden">
                <div class="bg-gradient-to-r from-rose-gold/5 to-dusty-pink/5 px-6 py-5 border-b border-light-gray">
                    <h2 class="font-heading text-xl font-bold text-charcoal">Konsultasi Gratis</h2>
                    <p class="text-sm text-dark-gray mt-1">Tanyakan seputar program, biaya, atau jadwal tanpa biaya apapun.</p>
                </div>
                <form action="{{ route('daftar.store') }}" method="POST" class="p-6 space-y-5" @submit="submitting = true">
                    @csrf
                    <input type="hidden" name="type" value="konsultasi">
                    {{-- Honeypot --}}
                    <div class="absolute opacity-0 -z-10" aria-hidden="true">
                        <input type="text" name="website" tabindex="-1" autocomplete="off" value="">
                    </div>

                    {{-- Nama --}}
                    <div>
                        <label for="konsul_name" class="block text-sm font-semibold text-charcoal mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="konsul_name" value="{{ old('name') }}" required
                               class="w-full px-4 py-3 bg-soft-cream/50 border border-medium-gray rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30 focus:border-rose-gold transition-all"
                               placeholder="Masukkan nama lengkap Anda">
                        @error('name')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- WhatsApp --}}
                    <div>
                        <label for="konsul_phone" class="block text-sm font-semibold text-charcoal mb-1.5">Nomor WhatsApp <span class="text-red-500">*</span></label>
                        <input type="text" name="phone" id="konsul_phone" value="{{ old('phone') }}" required
                               class="w-full px-4 py-3 bg-soft-cream/50 border border-medium-gray rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30 focus:border-rose-gold transition-all"
                               placeholder="Contoh: 08521234567">
                        @error('phone')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="konsul_email" class="block text-sm font-semibold text-charcoal mb-1.5">Email <span class="text-dark-gray text-xs">(opsional)</span></label>
                        <input type="email" name="email" id="konsul_email" value="{{ old('email') }}"
                               class="w-full px-4 py-3 bg-soft-cream/50 border border-medium-gray rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30 focus:border-rose-gold transition-all"
                               placeholder="email@contoh.com">
                        @error('email')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Program Diminati --}}
                    <div>
                        <label for="konsul_program" class="block text-sm font-semibold text-charcoal mb-1.5">Program yang Diminati <span class="text-red-500">*</span></label>
                        <select name="program_id" id="konsul_program" required
                                class="w-full px-4 py-3 bg-soft-cream/50 border border-medium-gray rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30 focus:border-rose-gold transition-all">
                            <option value="">— Pilih Program —</option>
                            @foreach($programs as $program)
                                <option value="{{ $program->id }}" {{ old('program_id') == $program->id ? 'selected' : '' }}>
                                    {{ $program->name }} ({{ $program->category->name }})
                                </option>
                            @endforeach
                        </select>
                        @error('program_id')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Pesan --}}
                    <div>
                        <label for="konsul_message" class="block text-sm font-semibold text-charcoal mb-1.5">Pesan <span class="text-dark-gray text-xs">(opsional)</span></label>
                        <textarea name="message" id="konsul_message" rows="4"
                                  class="w-full px-4 py-3 bg-soft-cream/50 border border-medium-gray rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30 focus:border-rose-gold transition-all resize-none"
                                  placeholder="Tuliskan pertanyaan atau pesan Anda...">{{ old('message') }}</textarea>
                        @error('message')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Submit --}}
                    <button type="submit" :disabled="submitting"
                            class="w-full flex items-center justify-center gap-2 px-6 py-3.5 bg-rose-gold text-white font-semibold rounded-xl hover:bg-rose-gold-dark transition-all duration-300 hover:shadow-lg hover:shadow-rose-gold/25 active:scale-[0.98] disabled:opacity-50 disabled:cursor-not-allowed">
                        <template x-if="!submitting">
                            <span class="inline-flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                                Kirim Konsultasi
                            </span>
                        </template>
                        <template x-if="submitting">
                            <span class="inline-flex items-center gap-2">
                                <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                                Mengirim...
                            </span>
                        </template>
                    </button>
                </form>
            </div>
        </div>

        {{-- =============================== --}}
        {{-- FORM PELATIHAN --}}
        {{-- =============================== --}}
        <div x-show="activeTab === 'pelatihan'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-cloak>
            <div class="bg-white border border-light-gray rounded-2xl shadow-sm overflow-hidden">
                <div class="bg-gradient-to-r from-rose-gold/5 to-dusty-pink/5 px-6 py-5 border-b border-light-gray">
                    <h2 class="font-heading text-xl font-bold text-charcoal">Pendaftaran Program Pelatihan</h2>
                    <p class="text-sm text-dark-gray mt-1">Lengkapi data diri Anda untuk mendaftar program pelatihan kecantikan bersertifikat.</p>
                </div>
                <form action="{{ route('daftar.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5" @submit="submitting = true">
                    @csrf
                    <input type="hidden" name="type" value="pelatihan">
                    {{-- Honeypot --}}
                    <div class="absolute opacity-0 -z-10" aria-hidden="true">
                        <input type="text" name="website" tabindex="-1" autocomplete="off" value="">
                    </div>

                    {{-- Program --}}
                    <div>
                        <label for="training_program" class="block text-sm font-semibold text-charcoal mb-1.5">Program Pelatihan <span class="text-red-500">*</span></label>
                        <select name="program_id" id="training_program" required
                                class="w-full px-4 py-3 bg-soft-cream/50 border border-medium-gray rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30 focus:border-rose-gold transition-all">
                            <option value="">— Pilih Program —</option>
                            @foreach($programs as $program)
                                <option value="{{ $program->id }}" {{ old('program_id') == $program->id ? 'selected' : '' }}>
                                    {{ $program->name }} ({{ $program->category->name }}) — {{ $program->formatted_price }}
                                </option>
                            @endforeach
                        </select>
                        @error('program_id')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Nama --}}
                    <div>
                        <label for="training_name" class="block text-sm font-semibold text-charcoal mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="training_name" value="{{ old('name') }}" required
                               class="w-full px-4 py-3 bg-soft-cream/50 border border-medium-gray rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30 focus:border-rose-gold transition-all"
                               placeholder="Sesuai KTP/identitas">
                        @error('name')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- 2 Columns: WhatsApp & Email --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="training_phone" class="block text-sm font-semibold text-charcoal mb-1.5">Nomor WhatsApp <span class="text-red-500">*</span></label>
                            <input type="text" name="phone" id="training_phone" value="{{ old('phone') }}" required
                                   class="w-full px-4 py-3 bg-soft-cream/50 border border-medium-gray rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30 focus:border-rose-gold transition-all"
                                   placeholder="08521234567">
                            @error('phone')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="training_email" class="block text-sm font-semibold text-charcoal mb-1.5">Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" id="training_email" value="{{ old('email') }}" required
                                   class="w-full px-4 py-3 bg-soft-cream/50 border border-medium-gray rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30 focus:border-rose-gold transition-all"
                                   placeholder="email@contoh.com">
                            @error('email')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    {{-- 2 Columns: TTL & Gender --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="training_dob" class="block text-sm font-semibold text-charcoal mb-1.5">Tanggal Lahir <span class="text-red-500">*</span></label>
                            <input type="date" name="dob" id="training_dob" value="{{ old('dob') }}" required
                                   class="w-full px-4 py-3 bg-soft-cream/50 border border-medium-gray rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30 focus:border-rose-gold transition-all">
                            @error('dob')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-charcoal mb-1.5">Jenis Kelamin <span class="text-red-500">*</span></label>
                            <div class="flex gap-4 mt-2">
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="gender" value="L" {{ old('gender') === 'L' ? 'checked' : '' }} required
                                           class="w-4 h-4 border-medium-gray text-rose-gold focus:ring-rose-gold/30">
                                    <span class="text-sm text-charcoal">Laki-laki</span>
                                </label>
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="gender" value="P" {{ old('gender') === 'P' ? 'checked' : '' }}
                                           class="w-4 h-4 border-medium-gray text-rose-gold focus:ring-rose-gold/30">
                                    <span class="text-sm text-charcoal">Perempuan</span>
                                </label>
                            </div>
                            @error('gender')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    {{-- Alamat --}}
                    <div>
                        <label for="training_address" class="block text-sm font-semibold text-charcoal mb-1.5">Alamat Lengkap <span class="text-red-500">*</span></label>
                        <textarea name="address" id="training_address" rows="2" required
                                  class="w-full px-4 py-3 bg-soft-cream/50 border border-medium-gray rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30 focus:border-rose-gold transition-all resize-none"
                                  placeholder="Jl. Contoh No. 1, Kota, Provinsi">{{ old('address') }}</textarea>
                        @error('address')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- 2 Columns: Pendidikan & Pekerjaan --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="training_education" class="block text-sm font-semibold text-charcoal mb-1.5">Pendidikan Terakhir <span class="text-red-500">*</span></label>
                            <select name="last_education" id="training_education" required
                                    class="w-full px-4 py-3 bg-soft-cream/50 border border-medium-gray rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30 focus:border-rose-gold transition-all">
                                <option value="">— Pilih —</option>
                                <option value="SD" {{ old('last_education') === 'SD' ? 'selected' : '' }}>SD/Sederajat</option>
                                <option value="SMP" {{ old('last_education') === 'SMP' ? 'selected' : '' }}>SMP/Sederajat</option>
                                <option value="SMA" {{ old('last_education') === 'SMA' ? 'selected' : '' }}>SMA/SMK/Sederajat</option>
                                <option value="D3" {{ old('last_education') === 'D3' ? 'selected' : '' }}>Diploma (D1/D2/D3)</option>
                                <option value="S1" {{ old('last_education') === 'S1' ? 'selected' : '' }}>Sarjana (S1)</option>
                                <option value="S2" {{ old('last_education') === 'S2' ? 'selected' : '' }}>Magister (S2)</option>
                                <option value="Lainnya" {{ old('last_education') === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('last_education')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="training_occupation" class="block text-sm font-semibold text-charcoal mb-1.5">Pekerjaan Saat Ini <span class="text-red-500">*</span></label>
                            <input type="text" name="occupation" id="training_occupation" value="{{ old('occupation') }}" required
                                   class="w-full px-4 py-3 bg-soft-cream/50 border border-medium-gray rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30 focus:border-rose-gold transition-all"
                                   placeholder="Pelajar / Ibu Rumah Tangga / dll">
                            @error('occupation')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    {{-- No HP Ibu --}}
                    <div>
                        <label for="training_mother_phone" class="block text-sm font-semibold text-charcoal mb-1.5">Nomor HP Orang Tua / Wali <span class="text-red-500">*</span></label>
                        <input type="text" name="mother_phone" id="training_mother_phone" value="{{ old('mother_phone') }}" required
                               class="w-full px-4 py-3 bg-soft-cream/50 border border-medium-gray rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30 focus:border-rose-gold transition-all"
                               placeholder="Contoh: 08521234567">
                        @error('mother_phone')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Motivasi --}}
                    <div>
                        <label for="training_motivation" class="block text-sm font-semibold text-charcoal mb-1.5">Motivasi Mengikuti Pelatihan <span class="text-red-500">*</span></label>
                        <textarea name="motivation" id="training_motivation" rows="3" required
                                  class="w-full px-4 py-3 bg-soft-cream/50 border border-medium-gray rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30 focus:border-rose-gold transition-all resize-none"
                                  placeholder="Ceritakan motivasi Anda ingin mengikuti program ini...">{{ old('motivation') }}</textarea>
                        @error('motivation')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Pas Foto --}}
                    <div>
                        <label for="training_photo" class="block text-sm font-semibold text-charcoal mb-1.5">Pas Foto 3x4 <span class="text-dark-gray text-xs">(opsional, max 2MB, JPG/PNG)</span></label>
                        <div class="relative">
                            <input type="file" name="photo" id="training_photo" accept=".jpg,.jpeg,.png"
                                   class="w-full px-4 py-3 bg-soft-cream/50 border border-medium-gray rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30 focus:border-rose-gold transition-all file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-rose-gold/10 file:text-rose-gold hover:file:bg-rose-gold/20">
                        </div>
                        @error('photo')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Persetujuan --}}
                    <div class="bg-soft-cream/50 rounded-xl p-4">
                        <label class="flex items-start gap-3 cursor-pointer">
                            <input type="checkbox" name="agreement" value="1" {{ old('agreement') ? 'checked' : '' }} required
                                   class="w-4 h-4 border-medium-gray text-rose-gold rounded focus:ring-rose-gold/30 mt-0.5">
                            <span class="text-sm text-dark-gray leading-relaxed">
                                Saya menyatakan bahwa data yang saya isi adalah benar dan saya menyetujui
                                <a href="/kebijakan-privasi" target="_blank" class="text-rose-gold hover:underline font-medium">syarat & ketentuan</a>
                                yang berlaku di LKP/LPK Yuwita.
                            </span>
                        </label>
                        @error('agreement')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Submit --}}
                    <button type="submit" :disabled="submitting"
                            class="w-full flex items-center justify-center gap-2 px-6 py-3.5 bg-rose-gold text-white font-semibold rounded-xl hover:bg-rose-gold-dark transition-all duration-300 hover:shadow-lg hover:shadow-rose-gold/25 active:scale-[0.98] disabled:opacity-50 disabled:cursor-not-allowed">
                        <template x-if="!submitting">
                            <span class="inline-flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Kirim Pendaftaran
                            </span>
                        </template>
                        <template x-if="submitting">
                            <span class="inline-flex items-center gap-2">
                                <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                                Mengirim...
                            </span>
                        </template>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
