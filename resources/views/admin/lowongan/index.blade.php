@extends('layouts.admin')

@section('title', 'Kelola Lowongan')
@section('page_title', 'Kelola Lowongan')

@section('content')
<div class="space-y-6">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <p class="text-sm text-dark-gray">Total: <span class="font-semibold">{{ $lowongans->total() }}</span> lowongan</p>
        <a href="{{ route('admin.lowongan.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-#C0001E text-white text-sm font-semibold rounded-xl hover:bg-#C0001E-dark transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Lowongan
        </a>
    </div>

    {{-- Filters --}}
    <div class="bg-white rounded-xl border border-gray-200 p-4">
        <form method="GET" class="flex flex-wrap gap-3 items-end">
            <div class="flex-1 min-w-[180px]">
                <label class="block text-xs font-medium text-dark-gray mb-1">Cari Lowongan</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Judul / Lokasi..."
                       class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
            </div>
            <div>
                <label class="block text-xs font-medium text-dark-gray mb-1">Status</label>
                <select name="status" class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
                    <option value="">Semua Status</option>
                    <option value="Buka" {{ request('status') == 'Buka' ? 'selected' : '' }}>Buka</option>
                    <option value="Tutup" {{ request('status') == 'Tutup' ? 'selected' : '' }}>Tutup</option>
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-charcoal text-white text-sm rounded-lg hover:bg-charcoal/90 transition-colors">Filter</button>
            @if(request()->hasAny(['search','status']))
                <a href="{{ route('admin.lowongan.index') }}" class="px-4 py-2 text-sm text-dark-gray hover:text-charcoal transition-colors">Reset</a>
            @endif
        </form>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Lowongan</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Lokasi</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Program</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Status</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($lowongans as $lowongan)
                    <tr class="hover:bg-gray-50/50">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-100 rounded-lg overflow-hidden shrink-0">
                                    @if($lowongan->gambar)
                                        <img src="{{ asset('media/' . $lowongan->gambar) }}" class="w-full h-full object-cover" alt="">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-dark-gray/30">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <p class="font-medium text-charcoal">{{ $lowongan->judul }}</p>
                                    <p class="text-xs text-dark-gray/60">{{ date('d M Y', strtotime($lowongan->created_at)) }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <span class="text-dark-gray font-medium">{{ $lowongan->lokasi }}</span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            @php
                                $pgColors = [
                                    'Ginou Jisshusei' => 'bg-blue-50 text-blue-600',
                                    'Tokutei Ginou' => 'bg-purple-50 text-purple-600',
                                    'Engineering' => 'bg-#C0001E/10 text-#C0001E'
                                ];
                                $colorClass = $pgColors[$lowongan->program] ?? 'bg-gray-100 text-gray-600';
                            @endphp
                            <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $colorClass }}">
                                {{ $lowongan->program }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $lowongan->status === 'Buka' ? 'bg-green-50 text-green-600' : 'bg-gray-100 text-gray-500' }}">
                                {{ $lowongan->status }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex items-center justify-center gap-1">
                                <a href="{{ route('admin.lowongan.edit', $lowongan) }}" class="p-1.5 rounded-lg hover:bg-blue-50 text-blue-500 transition-colors" title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>
                                <button type="button" 
                                        @click="$dispatch('open-delete-modal', { url: '{{ route('admin.lowongan.destroy', $lowongan) }}', message: 'Hapus lowongan {{ addslashes($lowongan->judul) }} ini?' })"
                                        class="p-1.5 rounded-lg hover:bg-red-50 text-red-500 transition-colors" title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="px-4 py-8 text-center text-dark-gray/50">Belum ada lowongan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($lowongans->hasPages())
        <div class="px-4 py-3 border-t border-gray-100">{{ $lowongans->links() }}</div>
        @endif
    </div>
</div>
@endsection
