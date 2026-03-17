@extends('layouts.admin')

@section('title', isset($category) ? 'Edit Kategori' : 'Tambah Kategori')
@section('page_title', isset($category) ? 'Edit Kategori' : 'Tambah Kategori')

@section('content')
<div class="max-w-lg">
    <form method="POST" action="{{ isset($category) ? route('admin.program-categories.update', $category) : route('admin.program-categories.store') }}" class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
        @csrf
        @if(isset($category)) @method('PUT') @endif

        <div>
            <label class="block text-sm font-medium text-charcoal mb-1">Nama Kategori *</label>
            <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
            @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-charcoal mb-1">Tipe *</label>
            <select name="type" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
                <option value="reguler" {{ old('type', $category->type ?? '') === 'reguler' ? 'selected' : '' }}>Reguler</option>
                <option value="khusus" {{ old('type', $category->type ?? '') === 'khusus' ? 'selected' : '' }}>Khusus</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-charcoal mb-1">Deskripsi</label>
            <textarea name="description" rows="3" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">{{ old('description', $category->description ?? '') }}</textarea>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="px-6 py-2.5 bg-#C0001E text-white text-sm font-semibold rounded-xl hover:bg-#C0001E-dark transition-colors">
                {{ isset($category) ? 'Simpan' : 'Tambah' }}
            </button>
            <a href="{{ route('admin.program-categories.index') }}" class="px-6 py-2.5 border border-gray-200 text-sm rounded-xl hover:bg-gray-50 transition-colors">Batal</a>
        </div>
    </form>
</div>
@endsection
