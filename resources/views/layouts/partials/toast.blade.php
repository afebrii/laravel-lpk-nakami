{{-- Toast Notification --}}
@if(session('success') || session('error') || session('info'))
<div x-data="{ show: true }"
     x-show="show"
     x-init="setTimeout(() => show = false, 5000)"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 translate-y-4"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 translate-y-4"
     class="fixed top-20 right-4 z-[60] max-w-sm w-full"
     x-cloak>
    @if(session('success'))
    <div class="bg-white border-l-4 border-emerald-500 rounded-lg shadow-xl p-4 flex items-start gap-3">
        <div class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center shrink-0">
            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        </div>
        <div class="flex-1">
            <p class="text-sm font-semibold text-charcoal">Berhasil!</p>
            <p class="text-xs text-dark-gray mt-0.5">{{ session('success') }}</p>
        </div>
        <button @click="show = false" class="text-dark-gray/50 hover:text-charcoal transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>
    @endif

    @if(session('error'))
    <div class="bg-white border-l-4 border-red-500 rounded-lg shadow-xl p-4 flex items-start gap-3">
        <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center shrink-0">
            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </div>
        <div class="flex-1">
            <p class="text-sm font-semibold text-charcoal">Gagal!</p>
            <p class="text-xs text-dark-gray mt-0.5">{{ session('error') }}</p>
        </div>
        <button @click="show = false" class="text-dark-gray/50 hover:text-charcoal transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>
    @endif

    @if(session('info'))
    <div class="bg-white border-l-4 border-blue-500 rounded-lg shadow-xl p-4 flex items-start gap-3">
        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center shrink-0">
            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div class="flex-1">
            <p class="text-sm font-semibold text-charcoal">Informasi</p>
            <p class="text-xs text-dark-gray mt-0.5">{{ session('info') }}</p>
        </div>
        <button @click="show = false" class="text-dark-gray/50 hover:text-charcoal transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>
    @endif
</div>
@endif
