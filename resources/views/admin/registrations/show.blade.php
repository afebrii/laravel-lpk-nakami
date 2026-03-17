@extends('layouts.admin')

@section('title', 'Detail Pendaftaran')
@section('page_title', 'Detail Pendaftaran')

@section('content')
<div class="max-w-4xl space-y-6">
    {{-- Back --}}
    <a href="{{ route('admin.registrations.index') }}" class="inline-flex items-center gap-1.5 text-sm text-dark-gray hover:text-charcoal">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali
    </a>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Info --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-heading text-sm font-bold text-charcoal">Data Pendaftar</h3>
                    <span class="font-mono text-xs px-2 py-1 bg-gray-100 rounded-lg">{{ $registration->ref_code }}</span>
                </div>

                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div><dt class="text-dark-gray/60 text-xs mb-0.5">Nama Lengkap</dt><dd class="font-medium text-charcoal">{{ $registration->name }}</dd></div>
                    <div><dt class="text-dark-gray/60 text-xs mb-0.5">WhatsApp</dt><dd><a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $registration->phone) }}" target="_blank" class="text-green-600 hover:underline">{{ $registration->phone }}</a></dd></div>
                    <div><dt class="text-dark-gray/60 text-xs mb-0.5">Email</dt><dd>{{ $registration->email ?? '-' }}</dd></div>
                    <div><dt class="text-dark-gray/60 text-xs mb-0.5">Program</dt><dd>{{ $registration->program?->name ?? '-' }}</dd></div>
                    <div><dt class="text-dark-gray/60 text-xs mb-0.5">Tipe Pendaftaran</dt><dd><span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $registration->type === 'konsultasi' ? 'bg-sky-50 text-sky-600' : 'bg-purple-50 text-purple-600' }}">{{ ucfirst($registration->type) }}</span></dd></div>
                    <div><dt class="text-dark-gray/60 text-xs mb-0.5">Tanggal Daftar</dt><dd>{{ $registration->created_at->format('d M Y, H:i') }}</dd></div>

                    @if($registration->type === 'pelatihan')
                        <div><dt class="text-dark-gray/60 text-xs mb-0.5">Tempat/Tgl Lahir</dt><dd>{{ $registration->dob?->format('d M Y') ?? '-' }}</dd></div>
                        <div><dt class="text-dark-gray/60 text-xs mb-0.5">Jenis Kelamin</dt><dd>{{ $registration->gender ?? '-' }}</dd></div>
                        <div class="sm:col-span-2"><dt class="text-dark-gray/60 text-xs mb-0.5">Alamat</dt><dd>{{ $registration->address ?? '-' }}</dd></div>
                        <div><dt class="text-dark-gray/60 text-xs mb-0.5">Pendidikan</dt><dd>{{ $registration->last_education ?? '-' }}</dd></div>
                        <div><dt class="text-dark-gray/60 text-xs mb-0.5">Pekerjaan</dt><dd>{{ $registration->occupation ?? '-' }}</dd></div>
                        <div><dt class="text-dark-gray/60 text-xs mb-0.5">No HP Ibu/Wali</dt><dd>{{ $registration->mother_phone ?? '-' }}</dd></div>
                    @endif

                    @if($registration->message)
                        <div class="sm:col-span-2"><dt class="text-dark-gray/60 text-xs mb-0.5">Pesan / Motivasi</dt><dd>{{ $registration->message }}</dd></div>
                    @endif
                    @if($registration->motivation)
                        <div class="sm:col-span-2"><dt class="text-dark-gray/60 text-xs mb-0.5">Motivasi</dt><dd>{{ $registration->motivation }}</dd></div>
                    @endif
                </dl>

                @if($registration->photo)
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <p class="text-xs text-dark-gray/60 mb-2">Pas Foto</p>
                    <img src="{{ asset('storage/' . $registration->photo) }}" class="w-32 h-40 object-cover rounded-lg border" alt="Pas foto">
                </div>
                @endif
            </div>
        </div>

        {{-- Actions sidebar --}}
        <div class="space-y-6">
            {{-- Status --}}
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h3 class="font-heading text-sm font-bold text-charcoal mb-3">Status</h3>
                @php $sc = ['pending'=>'bg-amber-50 text-amber-600 border-amber-200','confirmed'=>'bg-green-50 text-green-600 border-green-200','completed'=>'bg-blue-50 text-blue-600 border-blue-200','rejected'=>'bg-red-50 text-red-600 border-red-200']; @endphp
                <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold border {{ $sc[$registration->status] ?? '' }}">{{ ucfirst($registration->status) }}</span>

                @if($registration->confirmed_at)
                    <p class="text-xs text-dark-gray/60 mt-2">Dikonfirmasi: {{ $registration->confirmed_at->format('d M Y, H:i') }}</p>
                @endif

                <form method="POST" action="{{ route('admin.registrations.update-status', $registration) }}" class="mt-4 space-y-3">
                    @csrf @method('PATCH')
                    <div>
                        <label class="block text-xs font-medium text-dark-gray mb-1">Ubah Status</label>
                        <select name="status" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm">
                            <option value="pending" {{ $registration->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ $registration->status === 'confirmed' ? 'selected' : '' }}>Dikonfirmasi</option>
                            <option value="completed" {{ $registration->status === 'completed' ? 'selected' : '' }}>Selesai</option>
                            <option value="rejected" {{ $registration->status === 'rejected' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-dark-gray mb-1">Catatan Admin</label>
                        <textarea name="admin_notes" rows="3" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm">{{ $registration->admin_notes }}</textarea>
                    </div>
                    <button type="submit" class="w-full px-4 py-2 bg-#C0001E text-white text-sm font-semibold rounded-lg hover:bg-#C0001E-dark transition-colors">Update Status</button>
                </form>
            </div>

            {{-- Quick Actions --}}
            <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-3">
                <h3 class="font-heading text-sm font-bold text-charcoal mb-1">Aksi Cepat</h3>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $registration->phone) }}" target="_blank"
                   class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-green-500 text-white text-sm font-medium rounded-lg hover:bg-green-600 transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                    Chat WhatsApp
                </a>

                @if(strtolower($registration->type) === 'pelatihan')
                    @php
                        $paymentMessage = "Halo *" . $registration->name . "*,\n\n" .
                                         "Terima kasih telah mendaftar di program *" . ($registration->program?->name ?? 'Pelatihan') . "* (Ref: " . $registration->ref_code . ").\n\n" .
                                         "Untuk melanjutkan pendaftaran, silakan lakukan pembayaran sebesar *" . ($registration->program?->formatted_price ?? 'pendaftaran') . "* ke rekening berikut:\n\n" .
                                         "🔹 *BANK:* [NAMA BANK]\n" .
                                         "🔹 *NO. REK:* [NOMOR REKENING]\n" .
                                         "🔹 *A.N:* [NAMA PEMILIK]\n\n" .
                                         "Setelah melakukan pembayaran, silakan kirimkan bukti pembayaran di sini untuk proses konfirmasi.\n\n" .
                                         "Terima kasih! 🙏";

                        $thankYouMessage = "Halo *" . $registration->name . "*,\n\n" .
                                          "Pembayaran Anda untuk program *" . ($registration->program?->name ?? 'Pelatihan') . "* (Ref: " . $registration->ref_code . ") telah kami terima dan dikonfirmasi. Selamat bergabung! 🎉\n\n" .
                                          "Mohon tunggu informasi selanjutnya mengenai jadwal pelaksanaan dan informasi teknis lainnya melalui grup pendaftaran atau admin kami.\n\n" .
                                          "Terima kasih! 🙏";
                    @endphp
                    <div class="space-y-2 pt-3 mt-1 border-t border-gray-100">
                        <p class="text-[10px] font-bold text-dark-gray/40 uppercase tracking-wider mb-1">Template Pesan</p>
                        
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $registration->phone) }}?text={!! rawurlencode($paymentMessage) !!}" 
                           target="_blank"
                           style="background-color: #2563eb;"
                           class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-white text-xs font-bold rounded-lg hover:opacity-90 transition-all shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                            <span>Instruksi Pembayaran</span>
                        </a>

                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $registration->phone) }}?text={!! rawurlencode($thankYouMessage) !!}" 
                           target="_blank"
                           style="background-color: #9333ea; margin-top: 8px;"
                           class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-white text-xs font-bold rounded-lg hover:opacity-90 transition-all shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>Konfirmasi Pembayaran</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
