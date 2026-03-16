@extends('layouts.admin')

@section('title', 'Pesan Masuk')
@section('page_title', 'Pesan Masuk')

@section('content')
<div class="space-y-6">
    {{-- Header & Filter --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <form action="{{ route('admin.contacts.index') }}" method="GET" class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama, email, subjek..." class="w-full sm:w-64 pl-10 pr-4 py-2 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
                <svg class="w-4 h-4 text-gray-400 absolute left-3.5 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <select name="status" onchange="this.form.submit()" class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
                <option value="">Semua Status</option>
                <option value="unread" {{ request('status') === 'unread' ? 'selected' : '' }}>Belum Dibaca</option>
                <option value="read" {{ request('status') === 'read' ? 'selected' : '' }}>Sudah Dibaca</option>
            </select>
        </form>
    </div>

    {{-- Data Table --}}
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead class="bg-gray-50 border-b border-gray-200 hidden sm:table-header-group">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Pengirim</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Subjek</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 block sm:table-row-group">
                    @forelse($contacts as $contact)
                    <tr class="hover:bg-gray-50/50 transition-colors block sm:table-row {{ !$contact->is_read ? 'bg-rose-gold/5 font-semibold text-charcoal' : 'text-dark-gray' }}">
                        {{-- Mobile header --}}
                        <td class="px-6 py-4 sm:hidden flex justify-between items-center bg-gray-50/80 border-b border-gray-100">
                            <span class="text-xs font-medium text-gray-500 uppercase">Detail Pengirim</span>
                            <div class="flex items-center gap-2">
                                @if(!$contact->is_read)
                                <span class="px-2 py-1 bg-red-100 text-red-600 text-xs font-medium rounded-md">Baru</span>
                                @else
                                <span class="px-2 py-1 bg-emerald-100 text-emerald-600 text-xs font-medium rounded-md">Dibaca</span>
                                @endif
                            </div>
                        </td>

                        <td class="px-6 py-4 block sm:table-cell">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full {{ !$contact->is_read ? 'bg-rose-gold text-white' : 'bg-gray-200 text-gray-500' }} flex items-center justify-center font-bold text-sm shrink-0">
                                    {{ strtoupper(substr($contact->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="text-sm font-semibold {{ !$contact->is_read ? 'text-charcoal' : 'text-dark-gray' }} flex items-center gap-2">
                                        {{ $contact->name }}
                                        <span class="hidden sm:inline-flex">
                                            @if(!$contact->is_read)
                                            <span class="px-1.5 py-0.5 bg-red-100 text-red-600 text-[10px] font-bold rounded">BARU</span>
                                            @endif
                                        </span>
                                    </div>
                                    <div class="text-xs text-gray-500">{{ $contact->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 block sm:table-cell border-b sm:border-0 border-gray-100">
                            <span class="sm:hidden text-xs font-medium text-gray-500 uppercase block mb-1">Subjek</span>
                            <div class="text-sm line-clamp-1 max-w-xs">{{ $contact->subject }}</div>
                            <div class="text-xs text-gray-500 line-clamp-1 mt-0.5 font-normal">{{ $contact->message }}</div>
                        </td>
                        <td class="px-6 py-4 block sm:table-cell border-b sm:border-0 border-gray-100">
                            <span class="sm:hidden text-xs font-medium text-gray-500 uppercase block mb-1">Tanggal</span>
                            <div class="text-sm">{{ $contact->created_at->format('d M Y') }}</div>
                            <div class="text-xs text-gray-500">{{ $contact->created_at->format('H:i') }} WIB</div>
                        </td>
                        <td class="px-6 py-4 text-left sm:text-right block sm:table-cell">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.contacts.show', $contact) }}" class="p-2 text-rose-gold hover:bg-rose-gold/10 rounded-lg transition-colors" title="Lihat/Baca Pesan">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </a>
                                <button type="button" 
                                        @click="$dispatch('open-delete-modal', { url: '{{ route('admin.contacts.destroy', $contact) }}', message: 'Yakin ingin menghapus pesan dari {{ addslashes($contact->name) }} ini secara permanen?' })"
                                        class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors" title="Hapus Permanen">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>

                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                            <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <p>Tidak ada pesan yang ditemukan.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($contacts->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $contacts->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
