@extends('layouts.admin')

@section('title', 'Kelola Galeri')
@section('page_title', 'Kelola Galeri')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <p class="text-sm text-dark-gray">Total: <span class="font-semibold">{{ $galleries->total() }}</span> foto</p>
        <a href="{{ route('admin.gallery.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-#C0001E text-white text-sm font-semibold rounded-xl hover:bg-#C0001E-dark transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Foto
        </a>
    </div>

    {{-- Filters --}}
    <div class="bg-white rounded-xl border border-gray-200 p-4">
        <form method="GET" class="flex flex-wrap gap-3 items-end">
            <div class="flex-1 min-w-[180px]">
                <label class="block text-xs font-medium text-dark-gray mb-1">Cari</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Judul foto..."
                       class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
            </div>
            <div>
                <label class="block text-xs font-medium text-dark-gray mb-1">Kategori</label>
                <select name="category" class="px-3 py-2 border border-gray-200 rounded-lg text-sm">
                    <option value="">Semua</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-charcoal text-white text-sm rounded-lg">Filter</button>
            @if(request()->hasAny(['search','category']))
                <a href="{{ route('admin.gallery.index') }}" class="px-4 py-2 text-sm text-dark-gray">Reset</a>
            @endif
        </form>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead><tr class="bg-gray-50">
                    <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Foto</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Judul</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Kategori</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Status</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Urutan</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Aksi</th>
                </tr></thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($galleries as $item)
                    <tr class="hover:bg-gray-50/50">
                        <td class="px-4 py-3">
                            <div class="w-16 h-12 bg-gray-100 rounded-lg overflow-hidden">
                                @if($item->image)
                                    <img src="{{ asset('media/' . $item->image) }}" class="w-full h-full object-cover" alt="">
                                @endif
                            </div>
                        </td>
                        <td class="px-4 py-3 font-medium text-charcoal">{{ $item->title }}</td>
                        <td class="px-4 py-3 text-dark-gray">{{ $item->category ?? '-' }}</td>
                        <td class="px-4 py-3 text-center">
                            <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $item->is_active ? 'bg-green-50 text-green-600' : 'bg-gray-100 text-gray-500' }}">{{ $item->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                        </td>
                        <td class="px-4 py-3 text-center text-dark-gray">{{ $item->order }}</td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex items-center justify-center gap-1">
                                <a href="{{ route('admin.gallery.edit', $item) }}" class="p-1.5 rounded-lg hover:bg-blue-50 text-blue-500"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></a>
                                <button type="button" 
                                        @click="$dispatch('open-delete-modal', { url: '{{ route('admin.gallery.destroy', $item) }}', message: 'Hapus foto {{ addslashes($item->title) }} ini?' })"
                                        class="p-1.5 rounded-lg hover:bg-red-50 text-red-500 transition-colors" title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="px-4 py-8 text-center text-dark-gray/50">Belum ada foto galeri.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($galleries->hasPages())
        <div class="px-4 py-3 border-t border-gray-100">{{ $galleries->links() }}</div>
        @endif
    </div>
</div>
@endsection
