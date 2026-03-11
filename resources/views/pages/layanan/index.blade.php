@extends('layouts.app')

@section('title', 'Layanan Salon — ' . setting('site_name', 'LKP Yuwita'))
@section('meta_description', 'Nikmati layanan salon kecantikan profesional di LKP/LPK Yuwita Tasikmalaya. Perawatan rambut, wajah, dan tubuh dengan harga terjangkau.')

@section('content')

{{-- ============================================= --}}
{{-- HERO SECTION --}}
{{-- ============================================= --}}
<section class="relative bg-gradient-to-br from-charcoal via-charcoal to-rose-gold-dark overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-72 h-72 bg-rose-gold rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-dusty-pink rounded-full blur-3xl"></div>
    </div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E')] opacity-50"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        @include('components.breadcrumb', ['items' => [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Layanan Salon']
        ]])
        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4">
            Layanan Salon Kami
        </h1>
        <p class="text-lg text-white/75 max-w-2xl">
            Nikmati layanan perawatan kecantikan profesional dengan harga terjangkau dari para praktisi berpengalaman di LKP Yuwita.
        </p>
    </div>
</section>

{{-- ============================================= --}}
{{-- FILTER & SERVICE LIST --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"
         x-data="{ activeTab: 'semua' }">

        {{-- Category Filter Tabs --}}
        <div class="flex justify-center mb-12">
            <div class="inline-flex bg-light-gray rounded-full p-1 gap-1">
                <button @click="activeTab = 'semua'"
                        :class="activeTab === 'semua' ? 'bg-rose-gold text-white shadow-md' : 'text-dark-gray hover:text-charcoal'"
                        class="px-5 py-2 text-sm font-medium rounded-full transition-all duration-300">
                    Semua
                </button>
                @foreach($serviceCategories as $category)
                <button @click="activeTab = '{{ $category->slug }}'"
                        :class="activeTab === '{{ $category->slug }}' ? 'bg-rose-gold text-white shadow-md' : 'text-dark-gray hover:text-charcoal'"
                        class="px-5 py-2 text-sm font-medium rounded-full transition-all duration-300">
                    {{ $category->name }}
                </button>
                @endforeach
            </div>
        </div>

        {{-- Service Cards per Category --}}
        <div class="space-y-12">
            @foreach($serviceCategories as $category)
            <div x-show="activeTab === 'semua' || activeTab === '{{ $category->slug }}'"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0">

                {{-- Category Header --}}
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-rose-gold/10 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-rose-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @if($category->slug === 'rambut')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z"/>
                            @else
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                            @endif
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-heading text-2xl font-bold text-charcoal">{{ $category->name }}</h2>
                        <p class="text-sm text-dark-gray">{{ $category->services->count() }} layanan tersedia</p>
                        @if($category->description)
                        <p class="text-sm text-dark-gray mt-2 max-w-2xl">{{ $category->description }}</p>
                        @endif
                    </div>
                </div>

                {{-- Services Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($category->services as $service)
                    <div class="group bg-white border border-light-gray rounded-2xl p-5 hover:shadow-lg hover:shadow-rose-gold/5 hover:border-rose-gold/20 transition-all duration-300">
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex-1">
                                <h3 class="font-semibold text-charcoal group-hover:text-rose-gold transition-colors mb-1">
                                    {{ $service->name }}
                                </h3>
                                @if($service->short_description)
                                <p class="text-sm text-dark-gray line-clamp-2">{{ $service->short_description }}</p>
                                @endif
                            </div>
                            <div class="text-right shrink-0">
                                <p class="text-lg font-bold text-rose-gold">{{ $service->formatted_price }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ============================================= --}}
{{-- INFO RESERVASI --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-rose-gold/10 text-rose-gold text-xs font-semibold rounded-full mb-4 uppercase tracking-wider">Reservasi</span>
            <h2 class="font-heading text-3xl lg:text-4xl font-bold text-charcoal">Informasi Reservasi</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Cara Reservasi --}}
            <div class="bg-white border border-light-gray rounded-2xl p-6 text-center hover:shadow-lg transition-shadow duration-300">
                <div class="w-14 h-14 bg-rose-gold/10 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-7 h-7 text-rose-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                </div>
                <h3 class="font-heading text-lg font-bold text-charcoal mb-2">Cara Reservasi</h3>
                <p class="text-sm text-dark-gray mb-4">Hubungi kami melalui WhatsApp atau datang langsung ke salon untuk reservasi layanan.</p>
                <a href="https://wa.me/{{ setting('contact_wa_admin') }}?text={{ urlencode('Halo, saya ingin reservasi layanan salon di LKP Yuwita.') }}"
                   target="_blank"
                   class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#25D366] text-white text-sm font-semibold rounded-full hover:bg-[#1da851] transition-all duration-300">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                    Reservasi via WhatsApp
                </a>
            </div>

            {{-- Jam Operasional --}}
            <div class="bg-white border border-light-gray rounded-2xl p-6 text-center hover:shadow-lg transition-shadow duration-300">
                <div class="w-14 h-14 bg-rose-gold/10 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-7 h-7 text-rose-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="font-heading text-lg font-bold text-charcoal mb-2">Jam Operasional</h3>
                <div class="space-y-1 text-sm text-dark-gray">
                    <p><span class="font-medium text-charcoal">Senin - Sabtu:</span> 08.00 - 17.00 WIB</p>
                    <p><span class="font-medium text-charcoal">Minggu:</span> 09.00 - 15.00 WIB</p>
                    <p class="text-xs text-dark-gray/70 mt-2">*Layanan tertentu bisa dengan janji</p>
                </div>
            </div>

            {{-- Alamat --}}
            <div class="bg-white border border-light-gray rounded-2xl p-6 text-center hover:shadow-lg transition-shadow duration-300">
                <div class="w-14 h-14 bg-rose-gold/10 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-7 h-7 text-rose-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="font-heading text-lg font-bold text-charcoal mb-2">Lokasi Kami</h3>
                <p class="text-sm text-dark-gray mb-4">{{ setting('contact_address', 'Tasikmalaya, Jawa Barat') }}</p>
                @if(setting('seo_google_maps_url'))
                <a href="{{ setting('seo_google_maps_url') }}"
                   target="_blank"
                   class="inline-flex items-center gap-1.5 text-sm font-medium text-rose-gold hover:underline">
                    Buka di Google Maps
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- CTA BANNER --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative bg-gradient-to-r from-rose-gold to-rose-gold-dark rounded-3xl overflow-hidden px-6 sm:px-12 py-12 lg:py-16 text-center">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/2"></div>

            <div class="relative z-10">
                <h2 class="font-heading text-3xl lg:text-4xl font-bold text-white mb-4">
                    Ingin Belajar Kecantikan Profesional?
                </h2>
                <p class="text-white/80 text-lg mb-8 max-w-xl mx-auto">
                    Selain layanan salon, kami juga menyediakan program pelatihan kecantikan bersertifikat resmi.
                </p>
                <a href="{{ route('program.index') }}"
                   class="inline-flex items-center gap-2 px-7 py-3.5 bg-white text-rose-gold font-semibold rounded-full hover:bg-soft-cream transition-all duration-300 hover:shadow-lg active:scale-95">
                    Lihat Program Pelatihan
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
