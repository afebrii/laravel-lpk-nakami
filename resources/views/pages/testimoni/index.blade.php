@extends('layouts.app')

@section('title', 'Kisah Sukses Ke Jepang — LPK Nakami Indonesia')
@section('meta_description', 'Baca ribuan testimoni dan kisah nyata kesuksesan para kohai LPK Nakami yang kini telah bekerja di berbagai perusahaan di Jepang.')

@section('content')

{{-- ============================================= --}}
{{-- HERO SECTION NAKAMI --}}
{{-- ============================================= --}}
<section class="relative bg-[#111111] overflow-hidden">
     <div class="absolute inset-0 bg-gradient-to-t from-[#111111] via-[#111111]/90 to-[#111111]/50 mix-blend-multiply z-0"></div>
    <div class="absolute right-[-5%] top-[5%] text-[300px] leading-none font-jp text-white/5 select-none pointer-events-none z-0 hidden md:block">
        証
    </div>
    <div class="nakami-divider absolute bottom-0 left-0 right-0 z-10"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 z-10">
        @include('components.breadcrumb', ['items' => [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Kisah Sukses Jepang']
        ]])
        
        <div class="flex items-center gap-3 mb-4 mt-4">
            <span class="w-12 h-px bg-[#C0001E]"></span>
            <span class="text-[#C0001E] text-xs font-bold uppercase tracking-widest">Kisah Inspiratif</span>
        </div>

        <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4">
            Testimoni Kandidat
        </h1>
        <p class="text-lg text-white/70 max-w-2xl mb-6">
            Jejak nyata perjuangan para senpai yang berhasil mewujudkan impian bekerja secara profesional di ratusan Kumiai di Jepang.
        </p>

        {{-- Average Rating Nakami Style --}}
        @if($avgRating)
        <div class="inline-flex items-center gap-4 bg-[#1E1E1E] border border-white/10 rounded-2xl px-6 py-3 shadow-lg">
            <div class="flex items-center gap-1.5">
                @for($i = 1; $i <= 5; $i++)
                <svg class="w-6 h-6 {{ $i <= round($avgRating) ? 'text-[#FFD700]' : 'text-white/20' }}" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>
                @endfor
            </div>
            <div class="h-8 w-px bg-white/20 mx-2"></div>
            <div class="flex items-baseline gap-1">
                <span class="text-white font-heading font-bold text-2xl">{{ number_format($avgRating, 1) }}</span>
                <span class="text-white/50 text-sm font-semibold">/ 5.0</span>
            </div>
        </div>
        @endif
    </div>
</section>

{{-- ============================================= --}}
{{-- FILTER & TESTIMONIAL GRID NAKAMI EDITION --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24 bg-[#F9F5F2]"
         x-data="{ activeType: 'semua', activeProgram: 'semua' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Filters --}}
        <div class="flex flex-col sm:flex-row items-center justify-between gap-6 mb-12 bg-white p-4 rounded-2xl border border-[#E5E7EB] shadow-sm">
            {{-- Type Tabs Nakami --}}
            <div class="inline-flex gap-2 w-full sm:w-auto overflow-x-auto pb-2 sm:pb-0">
                <button @click="activeType = 'semua'"
                        :class="activeType === 'semua' ? 'bg-[#111111] text-white shadow-md' : 'bg-[#F9F5F2] text-[#6B7280] hover:text-[#111111] border border-[#E5E7EB] hover:border-[#111111]'"
                        class="px-6 py-3 text-sm font-bold uppercase tracking-wider rounded-xl transition-all duration-300 min-w-max">
                    Semua (全)
                </button>
                <button @click="activeType = 'alumni'"
                        :class="activeType === 'alumni' ? 'bg-[#111111] text-white shadow-md' : 'bg-[#F9F5F2] text-[#6B7280] hover:text-[#111111] border border-[#E5E7EB] hover:border-[#111111]'"
                        class="px-6 py-3 text-sm font-bold uppercase tracking-wider rounded-xl transition-all duration-300 min-w-max">
                    Senpai (Jepang)
                </button>
                <button @click="activeType = 'pelanggan'"
                        :class="activeType === 'pelanggan' ? 'bg-[#111111] text-white shadow-md' : 'bg-[#F9F5F2] text-[#6B7280] hover:text-[#111111] border border-[#E5E7EB] hover:border-[#111111]'"
                        class="px-6 py-3 text-sm font-bold uppercase tracking-wider rounded-xl transition-all duration-300 min-w-max">
                    Kohai (Peserta)
                </button>
            </div>

            {{-- Program Dropdown --}}
            @if($programs->count() > 0)
            <div class="relative w-full sm:w-80 group">
                <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-[#111111] group-hover:text-[#C0001E] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </div>
                <select x-model="activeProgram"
                        class="w-full px-5 py-3.5 bg-[#F9F5F2] border border-[#E5E7EB] rounded-xl text-sm font-bold text-[#111111] appearance-none focus:outline-none focus:ring-2 focus:ring-[#C0001E]/30 focus:border-[#C0001E] hover:border-[#111111] transition-all cursor-pointer">
                    <option value="semua">— Berdasarkan Filter Program —</option>
                    @foreach($programs as $program)
                    <option value="{{ $program->id }}">{{ $program->name }}</option>
                    @endforeach
                </select>
            </div>
            @endif
        </div>

        {{-- Testimonial Grid --}}
        @if($testimonials->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($testimonials as $testimonial)
            <div x-show="(activeType === 'semua' || activeType === '{{ $testimonial->type }}') && (activeProgram === 'semua' || activeProgram === '{{ $testimonial->program_id }}')"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="bg-white border border-[#E5E7EB] rounded-3xl p-8 hover:shadow-2xl hover:border-[#C0001E]/50 transition-all duration-500 relative group flex flex-col h-full">
                
                {{-- Decorative Quote Mark --}}
                <div class="absolute right-6 top-6 text-7xl font-serif text-[#F9F5F2] leading-none group-hover:-translate-y-2 group-hover:text-[#C0001E]/10 transition-all duration-500">"</div>

                {{-- Stars --}}
                <div class="flex items-center gap-1.5 mb-5 relative z-10">
                    @for($i = 1; $i <= 5; $i++)
                    <svg class="w-4 h-4 {{ $i <= $testimonial->rating ? 'text-[#FFD700]' : 'text-[#E5E7EB]' }}" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>
                    @endfor
                </div>
                
                {{-- Quote --}}
                <p class="text-[15px] text-[#6B7280] italic mb-8 leading-loose relative z-10 flex-grow">"{{ $testimonial->content }}"</p>
                
                {{-- Profile --}}
                <div class="flex items-center gap-4 pt-6 border-t border-[#F3F4F6] relative z-10">
                    @if($testimonial->photo)
                    <div class="w-14 h-14 rounded-full overflow-hidden border-2 border-[#111111]/10 bg-[#F9F5F2] shrink-0">
                        <img src="{{ asset('storage/' . $testimonial->photo) }}" alt="{{ $testimonial->name }}" class="w-full h-full object-cover" loading="lazy">
                    </div>
                    @else
                    <div class="w-14 h-14 rounded-full border-2 border-[#C0001E]/30 bg-[#F9F5F2] flex items-center justify-center text-[#111111] font-heading font-bold text-lg shrink-0">
                        {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                    </div>
                    @endif
                    
                    <div>
                        <p class="text-base font-bold text-[#111111] leading-tight mb-1">{{ $testimonial->name }}</p>
                        <p class="text-[11px] font-bold uppercase tracking-widest text-[#C0001E]">
                            {{ $testimonial->type === 'alumni' ? 'Senpai di Jepang' : 'Peserta Aktif' }}
                            @if($testimonial->program) 
                                <span class="text-[#6B7280] font-normal mx-1">•</span> 
                                <span class="text-[#6B7280]">{{ $testimonial->program->name }}</span> 
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-14 flex justify-center">
            {{ $testimonials->links() }}
        </div>
        @else
        {{-- Empty State --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @for($i = 0; $i < 3; $i++)
            <div class="bg-white border border-[#E5E7EB] border-dashed rounded-3xl p-8 opacity-60">
                <div class="flex gap-1.5 mb-5">@for($j=0;$j<5;$j++)<svg class="w-4 h-4 text-[#FFD700]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>@endfor</div>
                <p class="text-[15px] text-[#6B7280] italic mb-8 leading-loose">"Daftar ulasan dan cerita keberangkatan oleh siswa Nakami (Kenshusei & Tokutei Ginou) akan di publish pada bagian ini oleh Admin untuk dibagikan."</p>
                <div class="flex items-center gap-4 pt-6 border-t border-[#F3F4F6]">
                    <div class="w-14 h-14 rounded-full border-2 border-[#E5E7EB] bg-[#F9F5F2] flex items-center justify-center text-[#111111] font-heading font-bold text-lg">N</div>
                    <div><p class="text-base font-bold text-[#111111] mb-1">Nama Senpai Lulusan</p><p class="text-[11px] font-bold uppercase tracking-widest text-[#6B7280]">Perusahaan Penempatan</p></div>
                </div>
            </div>
            @endfor
        </div>
        @endif
    </div>
</section>

{{-- ============================================= --}}
{{-- NAKAMI CTA --}}
{{-- ============================================= --}}
<section class="py-16 lg:py-24 bg-white border-t border-[#E5E7EB]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative bg-gradient-to-br from-[#111111] to-[#1E1E1E] rounded-3xl overflow-hidden px-6 sm:px-12 py-16 lg:py-20 text-center shadow-2xl border border-white/10 group">
            
            {{-- Decorative Grid --}}
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMjAiIGN5PSIyMCIgcj0iMSIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjA1KSIvPjwvc3ZnPg==')] opacity-50"></div>
            
            <div class="relative z-10">
                <h2 class="font-heading text-3xl lg:text-4xl lg:text-5xl font-bold text-white mb-6">Mulai Wujudkan<br><span class="text-[#C0001E]">Gaji 15-25 Juta/Bulan</span> di Jepang!</h2>
                <p class="text-white/70 text-lg mb-10 max-w-2xl mx-auto font-medium">Jadilah bagian dari alumni LPK Nakami selanjutnya. Lulus pelatihan, lulus interview, dan berangkat terbang sebagai pahlawan devisa negara yang diakui profesional di Jepang.</p>
                <a href="{{ url('/daftar?type=pelatihan') }}" class="btn-nakami-primary inline-flex justify-center items-center py-4 px-10 bg-[#C0001E] hover:bg-red-800 text-white text-lg shadow-xl shadow-red-900/40">
                    <span class="flex items-center gap-2">
                        Reservasi Pendaftaran Sekarang
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
