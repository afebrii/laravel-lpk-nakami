@extends('layouts.admin')

@section('title', 'Detail Pesan Kontak')
@section('page_title', 'Detail Pesan Kontak')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <a href="{{ route('admin.contacts.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-dark-gray hover:text-rose-gold transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Kembali ke Daftar Pesan
        </a>
        <button type="button" 
                @click="$dispatch('open-delete-modal', { url: '{{ route('admin.contacts.destroy', $contact) }}', message: 'Yakin ingin menghapus pesan dari {{ addslashes($contact->name) }} ini secara permanen?' })"
                class="inline-flex items-center gap-2 px-4 py-2 bg-red-50 text-red-600 text-sm font-medium rounded-lg hover:bg-red-100 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            Hapus Pesan
        </button>

    </div>

    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm">
        {{-- Header Pesan --}}
        <div class="px-6 py-5 border-b border-gray-100 bg-gray-50/50">
            <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-rose-gold text-white flex items-center justify-center font-bold text-lg shrink-0 shadow-sm">
                        {{ strtoupper(substr($contact->name, 0, 1)) }}
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-charcoal">{{ $contact->name }}</h2>
                        <div class="flex items-center gap-3 text-sm text-gray-500 mt-0.5">
                            <a href="mailto:{{ $contact->email }}" class="hover:text-rose-gold transition-colors">{{ $contact->email }}</a>
                            <span class="text-gray-300">•</span>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}" target="_blank" class="flex items-center gap-1 hover:text-emerald-500 transition-colors">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                                {{ $contact->phone }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="text-left sm:text-right text-sm text-gray-500">
                    <p class="font-medium text-charcoal">{{ $contact->created_at->format('d M Y') }}</p>
                    <p>{{ $contact->created_at->format('H:i') }} WIB</p>
                </div>
            </div>
        </div>

        {{-- Isi Pesan --}}
        <div class="px-6 py-8">
            <h3 class="text-xl font-bold text-charcoal mb-6 border-b border-gray-100 pb-4">
                Subjek: {{ $contact->subject }}
            </h3>
            <div class="prose max-w-none text-dark-gray leading-relaxed whitespace-pre-wrap">
                {{ $contact->message }}
            </div>
        </div>

        {{-- Footer / Balas --}}
        <div class="px-6 py-5 bg-gray-50/50 border-t border-gray-100 mt-4 flex gap-3">
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}?text={{ urlencode('Halo ' . $contact->name . ', ini dari Admin LKP Yuwita membalas pesan Anda mengenai "' . $contact->subject . '".') }}" target="_blank" class="inline-flex justify-center items-center gap-2 px-5 py-2.5 bg-[#25D366] text-white text-sm font-semibold rounded-xl hover:bg-[#1fae54] transition-colors shadow-sm w-full sm:w-auto">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                Balas via WhatsApp
            </a>
            <a href="mailto:{{ $contact->email }}?subject=RE: {{ $contact->subject }}" class="inline-flex justify-center items-center gap-2 px-5 py-2.5 bg-gray-800 text-white text-sm font-semibold rounded-xl hover:bg-gray-900 transition-colors shadow-sm w-full sm:w-auto">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Balas via Email
            </a>
        </div>
    </div>
</div>
@endsection
