    @extends('layouts.admin')

@section('title', isset($post) ? 'Edit Artikel' : 'Tulis Artikel')
@section('page_title', isset($post) ? 'Edit Artikel' : 'Tulis Artikel')

@section('content')
<form method="POST" action="{{ isset($post) ? route('admin.posts.update', $post) : route('admin.posts.store') }}" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @if(isset($post)) @method('PUT') @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Main --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-charcoal mb-1">Judul Artikel *</label>
                    <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
                    @error('title') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-charcoal mb-1">Excerpt / Ringkasan *</label>
                    <textarea name="excerpt" rows="2" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-charcoal mb-1">Konten *</label>
                    <textarea name="content" id="content" rows="12" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm tinymce-editor">{{ old('content', $post->content ?? '') }}</textarea>
                    @error('content') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- SEO --}}
            <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
                <h3 class="font-heading text-sm font-bold text-charcoal">SEO Meta</h3>
                <div>
                    <label class="block text-sm font-medium text-charcoal mb-1">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ old('meta_title', $post->meta_title ?? '') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
                </div>
                <div>
                    <label class="block text-sm font-medium text-charcoal mb-1">Meta Description</label>
                    <textarea name="meta_description" rows="2" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">{{ old('meta_description', $post->meta_description ?? '') }}</textarea>
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="space-y-6">
            <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
                <h3 class="font-heading text-sm font-bold text-charcoal">Publish</h3>

                <div>
                    <label class="block text-sm font-medium text-charcoal mb-1">Kategori *</label>
                    <input type="text" name="category" value="{{ old('category', $post->category ?? '') }}" required placeholder="contoh: Tips Kecantikan, Berita" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
                </div>

                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="hidden" name="is_published" value="0">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published', $post->is_published ?? false) ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-gray-300 text-rose-gold focus:ring-rose-gold/30">
                    <span class="text-sm text-dark-gray">Terbitkan sekarang</span>
                </label>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
                <h3 class="font-heading text-sm font-bold text-charcoal">Thumbnail</h3>
                @if(isset($post) && $post->thumbnail)
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" class="w-full aspect-video object-cover rounded-lg" alt="">
                @endif
                <input type="file" name="thumbnail" accept="image/*" class="w-full text-sm text-dark-gray file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-rose-gold/10 file:text-rose-gold">
                <p class="text-xs text-dark-gray/50">JPG/PNG, maks 2MB</p>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="flex-1 px-4 py-2.5 bg-rose-gold text-white text-sm font-semibold rounded-xl hover:bg-rose-gold-dark transition-colors">
                    {{ isset($post) ? 'Simpan' : 'Publikasikan' }}
                </button>
                <a href="{{ route('admin.posts.index') }}" class="px-4 py-2.5 border border-gray-200 text-sm rounded-xl hover:bg-gray-50">Batal</a>
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
        height: 400,
        menubar: false,
        plugins: 'lists link autolink image',
        toolbar: 'undo redo | bold italic underline | bullist numlist | link image | removeformat',
        content_style: 'body { font-family: sans-serif; font-size: 14px; }',
    });
</script>
@endpush
