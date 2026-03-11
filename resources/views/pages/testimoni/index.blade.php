@extends('layouts.app')

@section('title', 'Testimoni — ' . setting('site_name', 'LKP Yuwita'))
@section('meta_description', 'Baca testimoni dari alumni dan pelanggan LKP/LPK Yuwita tentang pengalaman mereka mengikuti pelatihan kecantikan.')

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
            ['label' => 'Testimoni']
        ]])
        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4">
            Testimoni
        </h1>
        <p class="text-lg text-white/75 max-w-2xl mb-6">
            Dengarkan cerita dan pengalaman langsung dari alumni dan pelanggan kami.
        </p>

        {{-- Average Rating --}}
        @if($avgRating)
        <div class="inline-flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-full px-5 py-2.5 border border-white/10">
            <div class="flex items-center gap-1">
                @for($i = 1; $i <= 5; $i++)
                <svg class="w-5 h-5 {{ $i <= round($avgRating) ? 'text-amber-400' : 'text-white/30' }}" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>
                @endfor
            </div>
            <span class="text-white font-bold text-lg">{{ number_format($avgRating, 1) }}</span>
            <span class="text-white/60 text-sm">/ 5.0</span>
        </div>
        @endif
    </div>
</section>

{{-- ============================================= --}}
{{-- FILTER & TESTIMONIAL GRID --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24"
         x-data="{ activeType: 'semua', activeProgram: 'semua' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Filters --}}
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-10">
            {{-- Type Tabs --}}
            <div class="inline-flex bg-light-gray rounded-full p-1 gap-1">
                <button @click="activeType = 'semua'"
                        :class="activeType === 'semua' ? 'bg-rose-gold text-white shadow-md' : 'text-dark-gray hover:text-charcoal'"
                        class="px-5 py-2 text-sm font-medium rounded-full transition-all duration-300">
                    Semua
                </button>
                <button @click="activeType = 'alumni'"
                        :class="activeType === 'alumni' ? 'bg-rose-gold text-white shadow-md' : 'text-dark-gray hover:text-charcoal'"
                        class="px-5 py-2 text-sm font-medium rounded-full transition-all duration-300">
                    Alumni
                </button>
                <button @click="activeType = 'pelanggan'"
                        :class="activeType === 'pelanggan' ? 'bg-rose-gold text-white shadow-md' : 'text-dark-gray hover:text-charcoal'"
                        class="px-5 py-2 text-sm font-medium rounded-full transition-all duration-300">
                    Pelanggan
                </button>
            </div>

            {{-- Program Dropdown --}}
            @if($programs->count() > 0)
            <select x-model="activeProgram"
                    class="px-4 py-2.5 bg-white border border-medium-gray rounded-full text-sm text-charcoal focus:outline-none focus:ring-2 focus:ring-rose-gold/30 focus:border-rose-gold transition-all cursor-pointer">
                <option value="semua">Semua Program</option>
                @foreach($programs as $program)
                <option value="{{ $program->id }}">{{ $program->name }}</option>
                @endforeach
            </select>
            @endif
        </div>

        {{-- Testimonial Grid --}}
        @if($testimonials->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($testimonials as $testimonial)
            <div x-show="(activeType === 'semua' || activeType === '{{ $testimonial->type }}') && (activeProgram === 'semua' || activeProgram === '{{ $testimonial->program_id }}')"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="bg-white border border-light-gray rounded-2xl p-6 hover:shadow-lg hover:shadow-rose-gold/5 transition-all duration-300">
                {{-- Stars --}}
                <div class="flex items-center gap-1 mb-3">
                    @for($i = 1; $i <= 5; $i++)
                    <svg class="w-4 h-4 {{ $i <= $testimonial->rating ? 'text-amber-400' : 'text-medium-gray' }}" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>
                    @endfor
                </div>
                {{-- Quote --}}
                <p class="text-sm text-dark-gray italic mb-5 leading-relaxed">"{{ $testimonial->content }}"</p>
                {{-- Profile --}}
                <div class="flex items-center gap-3 pt-4 border-t border-light-gray">
                    @if($testimonial->photo)
                    <img src="{{ asset('storage/' . $testimonial->photo) }}" alt="{{ $testimonial->name }}" class="w-11 h-11 rounded-full object-cover">
                    @else
                    <div class="w-11 h-11 rounded-full bg-rose-gold/20 flex items-center justify-center text-rose-gold font-bold text-sm">
                        {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                    </div>
                    @endif
                    <div>
                        <p class="text-sm font-semibold text-charcoal">{{ $testimonial->name }}</p>
                        <p class="text-xs text-dark-gray">
                            {{ $testimonial->type === 'alumni' ? 'Alumni' : 'Pelanggan' }}
                            @if($testimonial->program) — {{ $testimonial->program->name }} @endif
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-10">
            {{ $testimonials->links() }}
        </div>
        @else
        {{-- Empty State --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @for($i = 0; $i < 3; $i++)
            <div class="bg-white border border-light-gray rounded-2xl p-6">
                <div class="flex gap-1 mb-3">@for($j=0;$j<5;$j++)<svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>@endfor</div>
                <p class="text-sm text-dark-gray italic mb-4">"Testimoni dari alumni dan pelanggan akan tampil di sini."</p>
                <div class="flex items-center gap-3 pt-4 border-t border-light-gray">
                    <div class="w-11 h-11 rounded-full bg-rose-gold/20 flex items-center justify-center text-rose-gold font-bold text-sm">Y</div>
                    <div><p class="text-sm font-semibold text-charcoal">Alumni Yuwita</p><p class="text-xs text-dark-gray">Alumni Kelas Khusus</p></div>
                </div>
            </div>
            @endfor
        </div>
        @endif
    </div>
</section>

{{-- ============================================= --}}
{{-- CTA --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative bg-gradient-to-r from-rose-gold to-rose-gold-dark rounded-3xl overflow-hidden px-6 sm:px-12 py-12 lg:py-16 text-center">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/2"></div>
            <div class="relative z-10">
                <h2 class="font-heading text-3xl lg:text-4xl font-bold text-white mb-4">Ingin Jadi Bagian dari Cerita Sukses?</h2>
                <p class="text-white/80 text-lg mb-8 max-w-xl mx-auto">Bergabunglah dengan ribuan alumni sukses LKP Yuwita di dunia kecantikan.</p>
                <a href="{{ url('/daftar') }}" class="inline-flex items-center gap-2 px-7 py-3.5 bg-white text-rose-gold font-semibold rounded-full hover:bg-soft-cream transition-all duration-300 hover:shadow-lg active:scale-95">
                    Daftar Sekarang
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
