@extends('layouts.admin')

@section('title', 'Kelola Pendaftaran')
@section('page_title', 'Kelola Pendaftaran')

@section('content')
<div class="space-y-6">
    <p class="text-sm text-dark-gray">Total: <span class="font-semibold">{{ $registrations->total() }}</span> pendaftaran</p>

    {{-- Filters --}}
    <div class="bg-white rounded-xl border border-gray-200 p-4">
        <form method="GET" class="flex flex-wrap gap-3 items-end">
            <div class="flex-1 min-w-[180px]">
                <label class="block text-xs font-medium text-dark-gray mb-1">Cari</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama, ref code, email..."
                       class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
            </div>
            <div>
                <label class="block text-xs font-medium text-dark-gray mb-1">Tipe</label>
                <select name="type" class="px-3 py-2 border border-gray-200 rounded-lg text-sm">
                    <option value="">Semua</option>
                    <option value="konsultasi" {{ request('type') == 'konsultasi' ? 'selected' : '' }}>Konsultasi</option>
                    <option value="pelatihan" {{ request('type') == 'pelatihan' ? 'selected' : '' }}>Pelatihan</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-medium text-dark-gray mb-1">Program</label>
                <select name="program" class="px-3 py-2 border border-gray-200 rounded-lg text-sm">
                    <option value="">Semua</option>
                    @foreach($programs as $prog)
                        <option value="{{ $prog->id }}" {{ request('program') == $prog->id ? 'selected' : '' }}>{{ $prog->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-medium text-dark-gray mb-1">Status</label>
                <select name="status" class="px-3 py-2 border border-gray-200 rounded-lg text-sm">
                    <option value="">Semua</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Dikonfirmasi</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Selesai</option>
                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-charcoal text-white text-sm rounded-lg hover:bg-charcoal/90">Filter</button>
            @if(request()->hasAny(['search','type','program','status']))
                <a href="{{ route('admin.registrations.index') }}" class="px-4 py-2 text-sm text-dark-gray">Reset</a>
            @endif
        </form>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead><tr class="bg-gray-50">
                    <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Ref Code</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Nama</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Program</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Tipe</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Status</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-dark-gray/70 uppercase">Tanggal</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-dark-gray/70 uppercase">Aksi</th>
                </tr></thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($registrations as $reg)
                    <tr class="hover:bg-gray-50/50">
                        <td class="px-4 py-3 font-mono text-xs text-dark-gray">{{ $reg->ref_code }}</td>
                        <td class="px-4 py-3 font-medium text-charcoal">{{ $reg->name }}</td>
                        <td class="px-4 py-3 text-dark-gray">{{ $reg->program?->name ?? '-' }}</td>
                        <td class="px-4 py-3 text-center">
                            <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $reg->type === 'konsultasi' ? 'bg-sky-50 text-sky-600' : 'bg-purple-50 text-purple-600' }}">{{ ucfirst($reg->type) }}</span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            @php $sc = ['pending'=>'bg-amber-50 text-amber-600','confirmed'=>'bg-green-50 text-green-600','completed'=>'bg-blue-50 text-blue-600','rejected'=>'bg-red-50 text-red-600']; @endphp
                            <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $sc[$reg->status] ?? '' }}">{{ ucfirst($reg->status) }}</span>
                        </td>
                        <td class="px-4 py-3 text-dark-gray text-xs">{{ $reg->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex items-center justify-center gap-1">
                                <a href="{{ route('admin.registrations.show', $reg) }}" class="p-1.5 rounded-lg hover:bg-blue-50 text-blue-500 inline-block transition-colors" title="Detail">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </a>
                                <button type="button" 
                                        @click="$dispatch('open-delete-modal', { url: '{{ route('admin.registrations.destroy', $reg) }}', message: 'Hapus data pendaftaran {{ addslashes($reg->name) }}?' })"
                                        class="p-1.5 rounded-lg hover:bg-red-50 text-red-500 inline-block transition-colors" title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="px-4 py-8 text-center text-dark-gray/50">Belum ada pendaftaran.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($registrations->hasPages())
        <div class="px-4 py-3 border-t border-gray-100">{{ $registrations->links() }}</div>
        @endif
    </div>

</div>
@endsection

