@extends('layouts.admin')

@section('title', isset($service) ? 'Edit Layanan' : 'Tambah Layanan')
@section('page_title', isset($service) ? 'Edit Layanan' : 'Tambah Layanan')

@section('content')
<div class="max-w-lg">
    <form method="POST" action="{{ isset($service) ? route('admin.services.update', $service) : route('admin.services.store') }}" class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
        @csrf
        @if(isset($service)) @method('PUT') @endif

        <div>
            <label class="block text-sm font-medium text-charcoal mb-1">Nama Layanan *</label>
            <input type="text" name="name" value="{{ old('name', $service->name ?? '') }}" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
            @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-charcoal mb-1">Kategori *</label>
            <select name="category_id" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
                <option value="">— Pilih Kategori —</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id', $service->category_id ?? '') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
            @error('category_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-charcoal mb-1">Deskripsi Singkat</label>
            <textarea name="short_description" rows="2" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">{{ old('short_description', $service->short_description ?? '') }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-charcoal mb-1">Harga Mulai *</label>
                <input type="number" name="price_start" value="{{ old('price_start', $service->price_start ?? '') }}" required min="0" step="1000" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
                @error('price_start') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-charcoal mb-1">Harga Sampai</label>
                <input type="number" name="price_end" value="{{ old('price_end', $service->price_end ?? '') }}" min="0" step="1000" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
                <p class="text-xs text-dark-gray/50 mt-1">Kosongkan jika harga tetap</p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-charcoal mb-1">Urutan</label>
                <input type="number" name="order" value="{{ old('order', $service->order ?? 0) }}" min="0" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
            </div>
            <div class="flex items-end pb-1">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-gray-300 text-rose-gold focus:ring-rose-gold/30">
                    <span class="text-sm text-dark-gray">Aktif</span>
                </label>
            </div>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="px-6 py-2.5 bg-rose-gold text-white text-sm font-semibold rounded-xl hover:bg-rose-gold-dark transition-colors">
                {{ isset($service) ? 'Simpan' : 'Tambah Layanan' }}
            </button>
            <a href="{{ route('admin.services.index') }}" class="px-6 py-2.5 border border-gray-200 text-sm rounded-xl hover:bg-gray-50">Batal</a>
        </div>
    </form>
</div>
@endsection
