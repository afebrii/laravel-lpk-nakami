@extends('layouts.admin')

@section('title', isset($lowongan) ? 'Edit Lowongan' : 'Tambah Lowongan')
@section('page_title', isset($lowongan) ? 'Edit Lowongan' : 'Tambah Lowongan')

@section('content')
<div class="max-w-4xl">
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <form action="{{ isset($lowongan) ? route('admin.lowongan.update', $lowongan) : route('admin.lowongan.store') }}" 
              method="POST" 
              enctype="multipart/form-data" 
              class="p-6">
            @csrf
            @if(isset($lowongan)) @method('PUT') @endif

            <div class="space-y-6">
                {{-- Judul Lowongan --}}
                <div>
                    <label class="block text-sm font-medium text-charcoal mb-1">Judul Lowongan <span class="text-red-500">*</span></label>
                    <input type="text" name="judul" value="{{ old('judul', $lowongan->judul ?? '') }}" required
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
                    @error('judul') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Lokasi / Prefektur --}}
                    <div>
                        <label class="block text-sm font-medium text-charcoal mb-1">Lokasi (Prefektur) <span class="text-red-500">*</span></label>
                        <input type="text" name="lokasi" value="{{ old('lokasi', $lowongan->lokasi ?? '') }}" required placeholder="Contoh: Aichi / Tokyo"
                               class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
                        @error('lokasi') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    {{-- Program --}}
                    <div>
                        <label class="block text-sm font-medium text-charcoal mb-1">Pilih Program <span class="text-red-500">*</span></label>
                        <select name="program" required class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
                            <option value="Ginou Jisshusei" {{ old('program', $lowongan->program ?? '') == 'Ginou Jisshusei' ? 'selected' : '' }}>Ginou Jisshusei (Pemagangan)</option>
                            <option value="Tokutei Ginou" {{ old('program', $lowongan->program ?? '') == 'Tokutei Ginou' ? 'selected' : '' }}>Tokutei Ginou (SSW)</option>
                            <option value="Engineering" {{ old('program', $lowongan->program ?? '') == 'Engineering' ? 'selected' : '' }}>Engineering</option>
                        </select>
                        @error('program') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Deskripsi Pekerjaan --}}
                <div>
                    <label class="block text-sm font-medium text-charcoal mb-1">Deskripsi Pekerjaan</label>
                    <textarea name="deskripsi_pekerjaan" rows="4" 
                              class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">{{ old('deskripsi_pekerjaan', $lowongan->deskripsi_pekerjaan ?? '') }}</textarea>
                    <p class="mt-1 text-xs text-dark-gray/60">Contoh: Bekerja di pabrik pengolahan makanan seafood dengan detail jam kerja, lembur, dsb.</p>
                </div>

                {{-- Persyaratan Tambahan --}}
                <div>
                    <label class="block text-sm font-medium text-charcoal mb-1">Persyaratan Tambahan</label>
                    <textarea name="persyaratan" rows="4" 
                              class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">{{ old('persyaratan', $lowongan->persyaratan ?? '') }}</textarea>
                    <p class="mt-1 text-xs text-dark-gray/60">Contoh: Tidak buta warna, Pria maksimal 30 tahun, JLPT N4, dsb.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Status --}}
                    <div>
                        <label class="block text-sm font-medium text-charcoal mb-1">Status Lowongan <span class="text-red-500">*</span></label>
                        <select name="status" required class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
                            <option value="Buka" {{ old('status', $lowongan->status ?? '') == 'Buka' ? 'selected' : '' }}>Buka</option>
                            <option value="Tutup" {{ old('status', $lowongan->status ?? '') == 'Tutup' ? 'selected' : '' }}>Tutup</option>
                        </select>
                    </div>

                    {{-- Gambar Penunjang --}}
                    <div>
                        <label class="block text-sm font-medium text-charcoal mb-1">Gambar / Pamflet</label>
                        <input type="file" name="gambar" accept="image/*" class="w-full text-sm text-dark-gray file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-gray-50 file:text-dark-gray hover:file:bg-gray-100 transition-colors">
                        @if(isset($lowongan) && $lowongan->gambar)
                            <div class="mt-3">
                                <p class="text-xs text-dark-gray mb-1">Gambar saat ini:</p>
                                <img src="{{ asset('storage/' . $lowongan->gambar) }}" class="h-20 w-auto rounded border border-gray-200" alt="Current Image">
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="mt-8 pt-5 border-t border-gray-100 flex items-center gap-3">
                <button type="submit" class="px-6 py-2.5 bg-rose-gold text-white text-sm font-semibold rounded-lg hover:bg-rose-gold-dark transition-colors">
                    Simpan Lowongan
                </button>
                <a href="{{ route('admin.lowongan.index') }}" class="px-6 py-2.5 bg-gray-100 text-dark-gray text-sm font-medium rounded-lg hover:bg-gray-200 transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
