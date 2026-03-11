@extends('layouts.admin')

@section('title', 'Kategori Program')
@section('page_title', 'Kategori Program')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <p class="text-sm text-dark-gray">Total: <span class="font-semibold">{{ $categories->count() }}</span> kategori</p>
        <a href="{{ route('admin.program-categories.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-rose-gold text-white text-sm font-semibold rounded-xl hover:bg-rose-gold-dark transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Kategori
        </a>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead><tr class="bg-gray-50">
                <th class="px-5 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Nama</th>
                <th class="px-5 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Tipe</th>
                <th class="px-5 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Jumlah Program</th>
                <th class="px-5 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Aksi</th>
            </tr></thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($categories as $cat)
                <tr class="hover:bg-gray-50/50">
                    <td class="px-5 py-3 font-medium text-charcoal">{{ $cat->name }}</td>
                    <td class="px-5 py-3 text-center">
                        <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $cat->type === 'reguler' ? 'bg-blue-50 text-blue-600' : 'bg-purple-50 text-purple-600' }}">{{ ucfirst($cat->type) }}</span>
                    </td>
                    <td class="px-5 py-3 text-center">{{ $cat->programs_count }}</td>
                    <td class="px-5 py-3 text-center">
                        <div class="flex items-center justify-center gap-1">
                            <a href="{{ route('admin.program-categories.edit', $cat) }}" class="p-1.5 rounded-lg hover:bg-blue-50 text-blue-500"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></a>
                            <form method="POST" action="{{ route('admin.program-categories.destroy', $cat) }}" onsubmit="return confirm('Hapus kategori ini?')">
                                @csrf @method('DELETE')
                                <button class="p-1.5 rounded-lg hover:bg-red-50 text-red-500"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="px-5 py-8 text-center text-dark-gray/50">Belum ada kategori.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
