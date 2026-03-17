@extends('layouts.admin')

@section('title', isset($gallery) ? 'Edit Foto' : 'Tambah Foto')
@section('page_title', isset($gallery) ? 'Edit Foto' : 'Tambah Foto')

@section('content')
<div class="max-w-lg">
    <form method="POST" action="{{ isset($gallery) ? route('admin.gallery.update', $gallery) : route('admin.gallery.store') }}" enctype="multipart/form-data" class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
        @csrf
        @if(isset($gallery)) @method('PUT') @endif

        <div>
            <label class="block text-sm font-medium text-charcoal mb-1">Judul *</label>
            <input type="text" name="title" value="{{ old('title', $gallery->title ?? '') }}" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
            @error('title') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-charcoal mb-1">Foto {{ isset($gallery) ? '' : '*' }}</label>
            @if(isset($gallery) && $gallery->image)
                <img src="{{ asset('storage/' . $gallery->image) }}" class="w-full aspect-video object-cover rounded-lg mb-2" alt="">
            @endif
            <input type="file" name="image" accept="image/*" {{ isset($gallery) ? '' : 'required' }} class="w-full text-sm text-dark-gray file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-#C0001E/10 file:text-#C0001E">
            <p class="text-xs text-dark-gray/50 mt-1">JPG/PNG, maksimal 5MB</p>
            @error('image') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-charcoal mb-1">Kategori</label>
            <input type="text" name="category" value="{{ old('category', $gallery->category ?? '') }}" placeholder="contoh: Kegiatan, Hasil Karya"
                   class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
        </div>


        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-charcoal mb-1">Urutan</label>
                <input type="number" name="order" value="{{ old('order', $gallery->order ?? 0) }}" min="0" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
            </div>
            <div class="flex items-end pb-1">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $gallery->is_active ?? true) ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-gray-300 text-#C0001E focus:ring-#C0001E/30">
                    <span class="text-sm text-dark-gray">Aktif</span>
                </label>
            </div>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="px-6 py-2.5 bg-#C0001E text-white text-sm font-semibold rounded-xl hover:bg-#C0001E-dark transition-colors">
                {{ isset($gallery) ? 'Simpan' : 'Tambah Foto' }}
            </button>
            <a href="{{ route('admin.gallery.index') }}" class="px-6 py-2.5 border border-gray-200 text-sm rounded-xl hover:bg-gray-50">Batal</a>
        </div>
    </form>
</div>
@endsection
