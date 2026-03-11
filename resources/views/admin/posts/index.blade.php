@extends('layouts.admin')

@section('title', 'Kelola Blog')
@section('page_title', 'Kelola Blog')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <p class="text-sm text-dark-gray">Total: <span class="font-semibold">{{ $posts->total() }}</span> artikel</p>
        <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-rose-gold text-white text-sm font-semibold rounded-xl hover:bg-rose-gold-dark transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tulis Artikel
        </a>
    </div>

    {{-- Filters --}}
    <div class="bg-white rounded-xl border border-gray-200 p-4">
        <form method="GET" class="flex flex-wrap gap-3 items-end">
            <div class="flex-1 min-w-[180px]">
                <label class="block text-xs font-medium text-dark-gray mb-1">Cari</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Judul artikel..."
                       class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
            </div>
            <div>
                <label class="block text-xs font-medium text-dark-gray mb-1">Kategori</label>
                <select name="category" class="px-3 py-2 border border-gray-200 rounded-lg text-sm">
                    <option value="">Semua</option>
                    <option value="Tips Kecantikan" {{ request('category') == 'Tips Kecantikan' ? 'selected' : '' }}>Tips Kecantikan</option>
                    <option value="Berita" {{ request('category') == 'Berita' ? 'selected' : '' }}>Berita</option>
                    <option value="Tutorial" {{ request('category') == 'Tutorial' ? 'selected' : '' }}>Tutorial</option>
                    <option value="Info Program" {{ request('category') == 'Info Program' ? 'selected' : '' }}>Info Program</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-medium text-dark-gray mb-1">Status</label>
                <select name="status" class="px-3 py-2 border border-gray-200 rounded-lg text-sm">
                    <option value="">Semua</option>
                    <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Terbit</option>
                    <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-charcoal text-white text-sm rounded-lg">Filter</button>
            @if(request()->hasAny(['search','category','status']))
                <a href="{{ route('admin.posts.index') }}" class="px-4 py-2 text-sm text-dark-gray">Reset</a>
            @endif
        </form>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead><tr class="bg-gray-50">
                    <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Artikel</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Kategori</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Penulis</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Status</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Tanggal</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Aksi</th>
                </tr></thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($posts as $post)
                    <tr class="hover:bg-gray-50/50">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-9 bg-gray-100 rounded-lg overflow-hidden shrink-0">
                                    @if($post->thumbnail)
                                        <img src="{{ asset('storage/' . $post->thumbnail) }}" class="w-full h-full object-cover" alt="">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-dark-gray/20"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2"/></svg></div>
                                    @endif
                                </div>
                                <p class="font-medium text-charcoal line-clamp-1">{{ $post->title }}</p>
                            </div>
                        </td>
                        <td class="px-4 py-3"><span class="px-2 py-0.5 rounded-full text-xs font-medium bg-rose-gold/10 text-rose-gold">{{ $post->category }}</span></td>
                        <td class="px-4 py-3 text-dark-gray">{{ $post->author?->name ?? '-' }}</td>
                        <td class="px-4 py-3 text-center">
                            <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $post->is_published ? 'bg-green-50 text-green-600' : 'bg-gray-100 text-gray-500' }}">{{ $post->is_published ? 'Terbit' : 'Draft' }}</span>
                        </td>
                        <td class="px-4 py-3 text-dark-gray text-xs">{{ ($post->published_at ?? $post->created_at)->format('d/m/Y') }}</td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex items-center justify-center gap-1">
                                <a href="{{ route('admin.posts.edit', $post) }}" class="p-1.5 rounded-lg hover:bg-blue-50 text-blue-500"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></a>
                                <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('Hapus artikel ini?')">
                                    @csrf @method('DELETE')
                                    <button class="p-1.5 rounded-lg hover:bg-red-50 text-red-500"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="px-4 py-8 text-center text-dark-gray/50">Belum ada artikel.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($posts->hasPages())
        <div class="px-4 py-3 border-t border-gray-100">{{ $posts->links() }}</div>
        @endif
    </div>
</div>
@endsection
