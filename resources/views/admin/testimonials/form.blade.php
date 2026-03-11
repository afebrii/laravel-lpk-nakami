@extends('layouts.admin')

@section('title', isset($testimonial) ? 'Edit Testimoni' : 'Tambah Testimoni')
@section('page_title', isset($testimonial) ? 'Edit Testimoni' : 'Tambah Testimoni')

@section('content')
<div class="max-w-lg">
    <form method="POST" action="{{ isset($testimonial) ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}" enctype="multipart/form-data" class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
        @csrf
        @if(isset($testimonial)) @method('PUT') @endif

        <div>
            <label class="block text-sm font-medium text-charcoal mb-1">Nama *</label>
            <input type="text" name="name" value="{{ old('name', $testimonial->name ?? '') }}" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
            @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-charcoal mb-1">Foto</label>
            @if(isset($testimonial) && $testimonial->photo)
                <img src="{{ asset('storage/' . $testimonial->photo) }}" class="w-20 h-20 object-cover rounded-full mb-2" alt="">
            @endif
            <input type="file" name="photo" accept="image/*" class="w-full text-sm text-dark-gray file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-rose-gold/10 file:text-rose-gold">
            <p class="text-xs text-dark-gray/50 mt-1">JPG/PNG, maksimal 2MB</p>
            @error('photo') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-charcoal mb-1">Tipe *</label>
                <select name="type" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
                    <option value="alumni" {{ old('type', $testimonial->type ?? '') == 'alumni' ? 'selected' : '' }}>Alumni</option>
                    <option value="pelanggan" {{ old('type', $testimonial->type ?? '') == 'pelanggan' ? 'selected' : '' }}>Pelanggan</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-charcoal mb-1">Rating *</label>
                <select name="rating" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
                    @for($i = 5; $i >= 1; $i--)
                        <option value="{{ $i }}" {{ old('rating', $testimonial->rating ?? 5) == $i ? 'selected' : '' }}>{{ $i }} ⭐</option>
                    @endfor
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-charcoal mb-1">Program Terkait</label>
            <select name="program_id" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
                <option value="">— Tidak ada —</option>
                @foreach($programs as $program)
                    <option value="{{ $program->id }}" {{ old('program_id', $testimonial->program_id ?? '') == $program->id ? 'selected' : '' }}>{{ $program->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-charcoal mb-1">Isi Testimoni *</label>
            <textarea name="content" rows="4" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">{{ old('content', $testimonial->content ?? '') }}</textarea>
            @error('content') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-charcoal mb-1">Urutan</label>
                <input type="number" name="order" value="{{ old('order', $testimonial->order ?? 0) }}" min="0" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
            </div>
            <div class="flex items-end pb-1">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active ?? true) ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-gray-300 text-rose-gold focus:ring-rose-gold/30">
                    <span class="text-sm text-dark-gray">Aktif</span>
                </label>
            </div>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="px-6 py-2.5 bg-rose-gold text-white text-sm font-semibold rounded-xl hover:bg-rose-gold-dark transition-colors">
                {{ isset($testimonial) ? 'Simpan' : 'Tambah Testimoni' }}
            </button>
            <a href="{{ route('admin.testimonials.index') }}" class="px-6 py-2.5 border border-gray-200 text-sm rounded-xl hover:bg-gray-50">Batal</a>
        </div>
    </form>
</div>
@endsection
