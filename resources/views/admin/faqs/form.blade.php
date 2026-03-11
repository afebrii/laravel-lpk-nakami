@extends('layouts.admin')

@section('title', isset($faq) ? 'Edit FAQ' : 'Tambah FAQ')
@section('page_title', isset($faq) ? 'Edit FAQ' : 'Tambah FAQ')

@section('content')
<div class="max-w-lg">
    <form method="POST" action="{{ isset($faq) ? route('admin.faqs.update', $faq) : route('admin.faqs.store') }}" class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
        @csrf
        @if(isset($faq)) @method('PUT') @endif

        <div>
            <label class="block text-sm font-medium text-charcoal mb-1">Pertanyaan *</label>
            <input type="text" name="question" value="{{ old('question', $faq->question ?? '') }}" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
            @error('question') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-charcoal mb-1">Kategori *</label>
            <select name="category" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
                <option value="">— Pilih Kategori —</option>
                @foreach(['Pendaftaran', 'Program', 'Biaya', 'Sertifikasi', 'Salon', 'Lainnya'] as $cat)
                    <option value="{{ $cat }}" {{ old('category', $faq->category ?? '') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
            @error('category') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-charcoal mb-1">Jawaban *</label>
            <textarea name="answer" id="answer-editor" rows="6" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">{{ old('answer', $faq->answer ?? '') }}</textarea>
            @error('answer') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-charcoal mb-1">Urutan</label>
                <input type="number" name="order" value="{{ old('order', $faq->order ?? 0) }}" min="0" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
            </div>
            <div class="flex items-end pb-1">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $faq->is_active ?? true) ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-gray-300 text-rose-gold focus:ring-rose-gold/30">
                    <span class="text-sm text-dark-gray">Aktif</span>
                </label>
            </div>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="px-6 py-2.5 bg-rose-gold text-white text-sm font-semibold rounded-xl hover:bg-rose-gold-dark transition-colors">
                {{ isset($faq) ? 'Simpan' : 'Tambah FAQ' }}
            </button>
            <a href="{{ route('admin.faqs.index') }}" class="px-6 py-2.5 border border-gray-200 text-sm rounded-xl hover:bg-gray-50">Batal</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    if (document.getElementById('answer-editor')) {
        tinymce.init({
            selector: '#answer-editor',
            height: 300,
            menubar: false,
            plugins: 'lists link',
            toolbar: 'bold italic underline | bullist numlist | link | removeformat',
            content_style: 'body { font-family: "DM Sans", sans-serif; font-size: 14px; }',
        });
    }
</script>
@endpush
