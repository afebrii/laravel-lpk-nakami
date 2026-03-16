@extends('layouts.admin')

@section('title', 'Kelola Layanan')
@section('page_title', 'Kelola Layanan')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <p class="text-sm text-dark-gray">Total: <span class="font-semibold">{{ $services->total() }}</span> layanan</p>
        <a href="{{ route('admin.services.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-rose-gold text-white text-sm font-semibold rounded-xl hover:bg-rose-gold-dark transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Layanan
        </a>
    </div>

    {{-- Filters --}}
    <div class="bg-white rounded-xl border border-gray-200 p-4">
        <form method="GET" class="flex flex-wrap gap-3 items-end">
            <div class="flex-1 min-w-[180px]">
                <label class="block text-xs font-medium text-dark-gray mb-1">Cari</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama layanan..."
                       class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
            </div>
            <div>
                <label class="block text-xs font-medium text-dark-gray mb-1">Kategori</label>
                <select name="category" class="px-3 py-2 border border-gray-200 rounded-lg text-sm">
                    <option value="">Semua</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-medium text-dark-gray mb-1">Status</label>
                <select name="status" class="px-3 py-2 border border-gray-200 rounded-lg text-sm">
                    <option value="">Semua</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-charcoal text-white text-sm rounded-lg">Filter</button>
            @if(request()->hasAny(['search','category','status']))
                <a href="{{ route('admin.services.index') }}" class="px-4 py-2 text-sm text-dark-gray">Reset</a>
            @endif
        </form>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead><tr class="bg-gray-50">
                    <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Nama</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Kategori</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Harga</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Status</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Urutan</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Aksi</th>
                </tr></thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($services as $item)
                    <tr class="hover:bg-gray-50/50">
                        <td class="px-4 py-3">
                            <p class="font-medium text-charcoal">{{ $item->name }}</p>
                            @if($item->short_description)
                                <p class="text-xs text-dark-gray/60 line-clamp-1">{{ $item->short_description }}</p>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-dark-gray">{{ $item->category->name ?? '-' }}</td>
                        <td class="px-4 py-3 text-dark-gray">{{ $item->formatted_price }}</td>
                        <td class="px-4 py-3 text-center">
                            <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $item->is_active ? 'bg-green-50 text-green-600' : 'bg-gray-100 text-gray-500' }}">{{ $item->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                        </td>
                        <td class="px-4 py-3 text-center text-dark-gray">{{ $item->order }}</td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex items-center justify-center gap-1">
                                <a href="{{ route('admin.services.edit', $item) }}" class="p-1.5 rounded-lg hover:bg-blue-50 text-blue-500"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></a>
                                <button type="button" 
                                        @click="$dispatch('open-delete-modal', { url: '{{ route('admin.services.destroy', $item) }}', message: 'Hapus layanan {{ addslashes($item->name) }} ini?' })"
                                        class="p-1.5 rounded-lg hover:bg-red-50 text-red-500 transition-colors" title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="px-4 py-8 text-center text-dark-gray/50">Belum ada layanan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($services->hasPages())
        <div class="px-4 py-3 border-t border-gray-100">{{ $services->links() }}</div>
        @endif
    </div>
</div>
@endsection
