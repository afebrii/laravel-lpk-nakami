@extends('layouts.admin')

@section('title', 'Kelola User')
@section('page_title', 'Kelola User')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <p class="text-sm text-dark-gray">Total: <span class="font-semibold">{{ $users->total() }}</span> user</p>
        <a href="{{ route('admin.users.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-rose-gold text-white text-sm font-semibold rounded-xl hover:bg-rose-gold-dark transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah User
        </a>
    </div>

    {{-- Filters --}}
    <div class="bg-white rounded-xl border border-gray-200 p-4">
        <form method="GET" class="flex flex-wrap gap-3 items-end">
            <div class="flex-1 min-w-[180px]">
                <label class="block text-xs font-medium text-dark-gray mb-1">Cari</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama atau email..."
                       class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">
            </div>
            <div>
                <label class="block text-xs font-medium text-dark-gray mb-1">Role</label>
                <select name="role" class="px-3 py-2 border border-gray-200 rounded-lg text-sm">
                    <option value="">Semua</option>
                    <option value="superadmin" {{ request('role') == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                    <option value="staff" {{ request('role') == 'staff' ? 'selected' : '' }}>Staff</option>
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-charcoal text-white text-sm rounded-lg">Filter</button>
            @if(request()->hasAny(['search','role']))
                <a href="{{ route('admin.users.index') }}" class="px-4 py-2 text-sm text-dark-gray">Reset</a>
            @endif
        </form>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead><tr class="bg-gray-50">
                    <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">User</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Email</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Role</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Status</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Login Terakhir</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Aksi</th>
                </tr></thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($users as $item)
                    <tr class="hover:bg-gray-50/50">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-rose-gold/10 rounded-full flex items-center justify-center shrink-0 overflow-hidden">
                                    @if($item->avatar)
                                        <img src="{{ asset('storage/' . $item->avatar) }}" class="w-full h-full object-cover" alt="">
                                    @else
                                        <span class="text-rose-gold font-semibold text-xs">{{ strtoupper(substr($item->name, 0, 1)) }}</span>
                                    @endif
                                </div>
                                <span class="font-medium text-charcoal">{{ $item->name }}</span>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-dark-gray">{{ $item->email }}</td>
                        <td class="px-4 py-3 text-center">
                            <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $item->role === 'superadmin' ? 'bg-purple-50 text-purple-600' : 'bg-blue-50 text-blue-600' }}">
                                {{ ucfirst($item->role) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $item->is_active ? 'bg-green-50 text-green-600' : 'bg-gray-100 text-gray-500' }}">{{ $item->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                        </td>
                        <td class="px-4 py-3 text-dark-gray text-xs">{{ $item->last_login_at ? $item->last_login_at->diffForHumans() : '-' }}</td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex items-center justify-center gap-1">
                                <a href="{{ route('admin.users.edit', $item) }}" class="p-1.5 rounded-lg hover:bg-blue-50 text-blue-500"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></a>
                                @if($item->id !== auth()->id())
                                <form method="POST" action="{{ route('admin.users.destroy', $item) }}" onsubmit="return confirm('Hapus user ini?')">
                                    @csrf @method('DELETE')
                                    <button class="p-1.5 rounded-lg hover:bg-red-50 text-red-500"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="px-4 py-8 text-center text-dark-gray/50">Belum ada user.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($users->hasPages())
        <div class="px-4 py-3 border-t border-gray-100">{{ $users->links() }}</div>
        @endif
    </div>
</div>
@endsection
