@extends('layouts.admin')

@section('title', isset($category) ? 'Edit Kategori Layanan' : 'Tambah Kategori Layanan')
@section('page_title', isset($category) ? 'Edit Kategori Layanan' : 'Tambah Kategori Layanan')

@section('content')
<div class="max-w-lg">
    <form method="POST" action="{{ isset($category) ? route('admin.service-categories.update', $category) : route('admin.service-categories.store') }}" class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
        @csrf
        @if(isset($category)) @method('PUT') @endif

        <div>
            <label class="block text-sm font-medium text-charcoal mb-1">Nama *</label>
            <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
            @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-charcoal mb-1">Ikon</label>
            <input type="text" name="icon" value="{{ old('icon', $category->icon ?? '') }}" placeholder="contoh: ✂️ atau nama ikon" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
            <p class="text-xs text-dark-gray/50 mt-1">Emoji atau nama ikon untuk kategori ini</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-charcoal mb-1">Urutan</label>
            <input type="number" name="order" value="{{ old('order', $category->order ?? 0) }}" min="0" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="px-6 py-2.5 bg-#C0001E text-white text-sm font-semibold rounded-xl hover:bg-#C0001E-dark transition-colors">
                {{ isset($category) ? 'Simpan' : 'Tambah Kategori' }}
            </button>
            <a href="{{ route('admin.service-categories.index') }}" class="px-6 py-2.5 border border-gray-200 text-sm rounded-xl hover:bg-gray-50">Batal</a>
        </div>
    </form>
</div>
@endsection
