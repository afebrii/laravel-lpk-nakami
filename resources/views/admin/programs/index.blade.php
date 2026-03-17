@extends('layouts.admin')

@section('title', 'Kelola Program')
@section('page_title', 'Kelola Program')

@section('content')
<div class="space-y-6">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <p class="text-sm text-dark-gray">Total: <span class="font-semibold">{{ $programs->total() }}</span> program</p>
        <a href="{{ route('admin.programs.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-#C0001E text-white text-sm font-semibold rounded-xl hover:bg-#C0001E-dark transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Program
        </a>
    </div>

    {{-- Filters --}}
    <div class="bg-white rounded-xl border border-gray-200 p-4">
        <form method="GET" class="flex flex-wrap gap-3 items-end">
            <div class="flex-1 min-w-[180px]">
                <label class="block text-xs font-medium text-dark-gray mb-1">Cari</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama program..."
                       class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
            </div>
            <div>
                <label class="block text-xs font-medium text-dark-gray mb-1">Kategori</label>
                <select name="category" class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
                    <option value="">Semua</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-medium text-dark-gray mb-1">Status</label>
                <select name="status" class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
                    <option value="">Semua</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                    <option value="coming_soon" {{ request('status') == 'coming_soon' ? 'selected' : '' }}>Segera Hadir</option>
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-charcoal text-white text-sm rounded-lg hover:bg-charcoal/90 transition-colors">Filter</button>
            @if(request()->hasAny(['search','category','status']))
                <a href="{{ route('admin.programs.index') }}" class="px-4 py-2 text-sm text-dark-gray hover:text-charcoal transition-colors">Reset</a>
            @endif
        </form>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Program</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Kategori</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Harga</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Pendaftar</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Status</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($programs as $program)
                    <tr class="hover:bg-gray-50/50">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-100 rounded-lg overflow-hidden shrink-0">
                                    @if($program->thumbnail)
                                        <img src="{{ asset('media/' . $program->thumbnail) }}" class="w-full h-full object-cover" alt="">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-dark-gray/30">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <p class="font-medium text-charcoal">{{ $program->name }}</p>
                                    <p class="text-xs text-dark-gray/60">{{ Str::limit($program->short_description, 50) }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $program->category?->type === 'reguler' ? 'bg-blue-50 text-blue-600' : 'bg-purple-50 text-purple-600' }}">
                                {{ $program->category?->name ?? '-' }}
                            </span>
                        </td>
                        <td class="px-4 py-3 font-medium">{{ $program->formatted_price }}</td>
                        <td class="px-4 py-3 text-center">{{ $program->registrations_count }}</td>
                        <td class="px-4 py-3 text-center">
                            @php
                                $sc = ['active'=>'bg-green-50 text-green-600','inactive'=>'bg-gray-100 text-gray-500','coming_soon'=>'bg-amber-50 text-amber-600'];
                                $sl = ['active'=>'Aktif','inactive'=>'Nonaktif','coming_soon'=>'Segera Hadir'];
                            @endphp
                            <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $sc[$program->status] ?? '' }}">{{ $sl[$program->status] ?? $program->status }}</span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex items-center justify-center gap-1">
                                <a href="{{ route('admin.programs.edit', $program) }}" class="p-1.5 rounded-lg hover:bg-blue-50 text-blue-500 transition-colors" title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>
                                <button type="button" 
                                        @click="$dispatch('open-delete-modal', { url: '{{ route('admin.programs.destroy', $program) }}', message: 'Hapus program {{ addslashes($program->name) }} ini?' })"
                                        class="p-1.5 rounded-lg hover:bg-red-50 text-red-500 transition-colors" title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="px-4 py-8 text-center text-dark-gray/50">Belum ada program.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($programs->hasPages())
        <div class="px-4 py-3 border-t border-gray-100">{{ $programs->links() }}</div>
        @endif
    </div>
</div>
@endsection
