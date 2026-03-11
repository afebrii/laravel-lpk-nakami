@extends('layouts.admin')

@section('title', 'Kelola Testimoni')
@section('page_title', 'Kelola Testimoni')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <p class="text-sm text-dark-gray">Total: <span class="font-semibold">{{ $testimonials->total() }}</span> testimoni</p>
        <a href="{{ route('admin.testimonials.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-rose-gold text-white text-sm font-semibold rounded-xl hover:bg-rose-gold-dark transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Testimoni
        </a>
    </div>

    {{-- Filters --}}
    <div class="bg-white rounded-xl border border-gray-200 p-4">
        <form method="GET" class="flex flex-wrap gap-3 items-end">
            <div class="flex-1 min-w-[180px]">
                <label class="block text-xs font-medium text-dark-gray mb-1">Cari</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama..."
                       class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
            </div>
            <div>
                <label class="block text-xs font-medium text-dark-gray mb-1">Tipe</label>
                <select name="type" class="px-3 py-2 border border-gray-200 rounded-lg text-sm">
                    <option value="">Semua</option>
                    <option value="alumni" {{ request('type') == 'alumni' ? 'selected' : '' }}>Alumni</option>
                    <option value="pelanggan" {{ request('type') == 'pelanggan' ? 'selected' : '' }}>Pelanggan</option>
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
            @if(request()->hasAny(['search','type','status']))
                <a href="{{ route('admin.testimonials.index') }}" class="px-4 py-2 text-sm text-dark-gray">Reset</a>
            @endif
        </form>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead><tr class="bg-gray-50">
                    <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Foto</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Nama</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Tipe</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Rating</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Status</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Urutan</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Aksi</th>
                </tr></thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($testimonials as $item)
                    <tr class="hover:bg-gray-50/50">
                        <td class="px-4 py-3">
                            <div class="w-10 h-10 bg-gray-100 rounded-full overflow-hidden">
                                @if($item->photo)
                                    <img src="{{ asset('storage/' . $item->photo) }}" class="w-full h-full object-cover" alt="">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <p class="font-medium text-charcoal">{{ $item->name }}</p>
                            @if($item->program)
                                <p class="text-xs text-dark-gray/60">{{ $item->program->name }}</p>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $item->type === 'alumni' ? 'bg-blue-50 text-blue-600' : 'bg-purple-50 text-purple-600' }}">
                                {{ ucfirst($item->type) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex items-center justify-center gap-0.5">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-3.5 h-3.5 {{ $i <= $item->rating ? 'text-yellow-400' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @endfor
                            </div>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $item->is_active ? 'bg-green-50 text-green-600' : 'bg-gray-100 text-gray-500' }}">{{ $item->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                        </td>
                        <td class="px-4 py-3 text-center text-dark-gray">{{ $item->order }}</td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex items-center justify-center gap-1">
                                <a href="{{ route('admin.testimonials.edit', $item) }}" class="p-1.5 rounded-lg hover:bg-blue-50 text-blue-500"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></a>
                                <form method="POST" action="{{ route('admin.testimonials.destroy', $item) }}" onsubmit="return confirm('Hapus testimoni ini?')">
                                    @csrf @method('DELETE')
                                    <button class="p-1.5 rounded-lg hover:bg-red-50 text-red-500"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="px-4 py-8 text-center text-dark-gray/50">Belum ada testimoni.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($testimonials->hasPages())
        <div class="px-4 py-3 border-t border-gray-100">{{ $testimonials->links() }}</div>
        @endif
    </div>
</div>
@endsection
