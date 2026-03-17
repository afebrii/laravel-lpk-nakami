@extends('layouts.admin')

@section('title', isset($program) ? 'Edit Program' : 'Tambah Program')
@section('page_title', isset($program) ? 'Edit Program' : 'Tambah Program')

@section('content')
<form method="POST" action="{{ isset($program) ? route('admin.programs.update', $program) : route('admin.programs.store') }}" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @if(isset($program)) @method('PUT') @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Main content --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- Basic Info --}}
            <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
                <h3 class="font-heading text-sm font-bold text-charcoal">Informasi Dasar</h3>

                <div>
                    <label class="block text-sm font-medium text-charcoal mb-1">Nama Program *</label>
                    <input type="text" name="name" value="{{ old('name', $program->name ?? '') }}" required
                           class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
                    @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-charcoal mb-1">Kategori *</label>
                        <select name="category_id" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
                            <option value="">— Pilih —</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id', $program->category_id ?? '') == $cat->id ? 'selected' : '' }}>{{ $cat->name }} ({{ ucfirst($cat->type) }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-charcoal mb-1">Status *</label>
                        <select name="status" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
                            <option value="active" {{ old('status', $program->status ?? 'active') === 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ old('status', $program->status ?? '') === 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                            <option value="coming_soon" {{ old('status', $program->status ?? '') === 'coming_soon' ? 'selected' : '' }}>Segera Hadir</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-charcoal mb-1">Deskripsi Singkat *</label>
                    <textarea name="short_description" rows="2" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">{{ old('short_description', $program->short_description ?? '') }}</textarea>
                </div>
            </div>

            {{-- Rich Text --}}
            <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
                <h3 class="font-heading text-sm font-bold text-charcoal">Konten</h3>

                <div>
                    <label class="block text-sm font-medium text-charcoal mb-1">Deskripsi Lengkap</label>
                    <textarea name="description" id="description" rows="8" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm tinymce-editor">{{ old('description', $program->description ?? '') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-charcoal mb-1">Kurikulum</label>
                    <textarea name="curriculum" id="curriculum" rows="6" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm tinymce-editor">{{ old('curriculum', $program->curriculum ?? '') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-charcoal mb-1">Fasilitas</label>
                    <textarea name="facilities" id="facilities" rows="4" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm tinymce-editor">{{ old('facilities', $program->facilities ?? '') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-charcoal mb-1">Persyaratan</label>
                    <textarea name="requirements" id="requirements" rows="4" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm tinymce-editor">{{ old('requirements', $program->requirements ?? '') }}</textarea>
                </div>
            </div>

            {{-- SEO --}}
            <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
                <h3 class="font-heading text-sm font-bold text-charcoal">SEO Meta</h3>
                <div>
                    <label class="block text-sm font-medium text-charcoal mb-1">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ old('meta_title', $program->meta_title ?? '') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
                </div>
                <div>
                    <label class="block text-sm font-medium text-charcoal mb-1">Meta Description</label>
                    <textarea name="meta_description" rows="2" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">{{ old('meta_description', $program->meta_description ?? '') }}</textarea>
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="space-y-6">
            {{-- Thumbnail --}}
            <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
                <h3 class="font-heading text-sm font-bold text-charcoal">Thumbnail</h3>
                @if(isset($program) && $program->thumbnail)
                    <img src="{{ asset('media/' . $program->thumbnail) }}" class="w-full aspect-video object-cover rounded-lg" alt="">
                @endif
                <input type="file" name="thumbnail" accept="image/*" class="w-full text-sm text-dark-gray file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-#C0001E/10 file:text-#C0001E hover:file:bg-#C0001E/20">
                <p class="text-xs text-dark-gray/50">JPG/PNG, maks 2MB</p>
            </div>

            {{-- Details --}}
            <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
                <h3 class="font-heading text-sm font-bold text-charcoal">Detail Program</h3>

                <div>
                    <label class="block text-sm font-medium text-charcoal mb-1">Durasi</label>
                    <input type="text" name="duration" value="{{ old('duration', $program->duration ?? '') }}" placeholder="contoh: 3 Bulan"
                           class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
                </div>
                <div>
                    <label class="block text-sm font-medium text-charcoal mb-1">Jadwal</label>
                    <input type="text" name="schedule" value="{{ old('schedule', $program->schedule ?? '') }}" placeholder="contoh: Senin - Jumat"
                           class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
                </div>
                <div>
                    <label class="block text-sm font-medium text-charcoal mb-1">Kuota</label>
                    <input type="number" name="quota" value="{{ old('quota', $program->quota ?? '') }}" min="0"
                           class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
                </div>
                <div>
                    <label class="block text-sm font-medium text-charcoal mb-1">Harga (Rp)</label>
                    <input type="number" name="price" value="{{ old('price', $program->price ?? '') }}" min="0" step="1000"
                           class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
                </div>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="hidden" name="is_free" value="0">
                    <input type="checkbox" name="is_free" value="1" {{ old('is_free', $program->is_free ?? false) ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-gray-300 text-#C0001E focus:ring-#C0001E/30">
                    <span class="text-sm text-dark-gray">Program Gratis</span>
                </label>
                <div>
                    <label class="block text-sm font-medium text-charcoal mb-1">Urutan</label>
                    <input type="number" name="order" value="{{ old('order', $program->order ?? 0) }}" min="0"
                           class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex gap-3">
                <button type="submit" class="flex-1 px-4 py-2.5 bg-#C0001E text-white text-sm font-semibold rounded-xl hover:bg-#C0001E-dark transition-colors">
                    {{ isset($program) ? 'Simpan Perubahan' : 'Tambah Program' }}
                </button>
                <a href="{{ route('admin.programs.index') }}" class="px-4 py-2.5 border border-gray-200 text-sm rounded-xl hover:bg-gray-50 transition-colors">Batal</a>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.3/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '.tinymce-editor',
        height: 300,
        menubar: false,
        plugins: 'lists link autolink',
        toolbar: 'undo redo | bold italic | bullist numlist | link | removeformat',
        content_style: 'body { font-family: sans-serif; font-size: 14px; }',
    });
</script>
@endpush
