{{-- Sticky Navbar LPK Nakami --}}
<nav x-data="{ mobileOpen: false, scrolled: false, activeDropdown: null }"
     x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
     :class="scrolled ? 'bg-[#111111]/95 backdrop-blur-md shadow-lg shadow-black/30' : 'bg-[#111111]'"
     class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-20">

            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex items-center gap-3 shrink-0">
                @if(setting('site_logo'))
                    <img src="{{ asset('storage/' . setting('site_logo')) }}"
                         alt="{{ setting('site_name', 'LPK Nakami Indonesia') }}"
                         class="h-10 lg:h-12 w-auto">
                @else
                    <img src="{{ asset('images/logo-nakami.png') }}"
                         alt="LPK Nakami Indonesia"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                         class="h-10 lg:h-12 w-auto">
                    <span class="font-heading text-xl font-bold text-white hidden">
                        LPK <span class="text-[#C0001E]">Nakami</span>
                    </span>
                @endif
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden lg:flex items-center gap-0.5">
                <a href="{{ url('/') }}"
                   class="px-3 py-2 text-sm font-medium text-white/80 hover:text-white hover:bg-white/10 rounded-lg transition-all {{ request()->is('/') ? 'text-white bg-white/10' : '' }}">
                    Beranda
                </a>

                {{-- Program Dropdown --}}
                <div class="relative" @mouseenter="activeDropdown = 'program'" @mouseleave="activeDropdown = null">
                    <a href="{{ url('/program') }}"
                       class="px-3 py-2 text-sm font-medium text-white/80 hover:text-white hover:bg-white/10 rounded-lg transition-all inline-flex items-center gap-1 {{ request()->is('program*') ? 'text-white bg-white/10' : '' }}">
                        Program
                        <svg class="w-3.5 h-3.5 transition-transform" :class="activeDropdown === 'program' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </a>
                    <div x-show="activeDropdown === 'program'"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute top-full left-0 mt-1 w-64 bg-[#1E1E1E] rounded-xl shadow-xl border border-white/10 py-2 z-50"
                         x-cloak>
                        <a href="{{ url('/program?kategori=ginou-jisshusei') }}"
                           class="flex items-start gap-3 px-4 py-2.5 hover:bg-white/5 transition-colors group">
                            <span class="font-jp text-[#C0001E] text-lg leading-none mt-0.5">技</span>
                            <div>
                                <p class="text-sm font-medium text-white">Ginou Jisshusei</p>
                                <p class="text-xs text-white/50">技能実習 · Pemagangan 3 Tahun</p>
                            </div>
                        </a>
                        <a href="{{ url('/program?kategori=tokutei-ginou') }}"
                           class="flex items-start gap-3 px-4 py-2.5 hover:bg-white/5 transition-colors group">
                            <span class="font-jp text-[#C0001E] text-lg leading-none mt-0.5">特</span>
                            <div>
                                <p class="text-sm font-medium text-white">Tokutei Ginou</p>
                                <p class="text-xs text-white/50">特定技能 · Keahlian Spesifik</p>
                            </div>
                        </a>
                        <a href="{{ url('/program?kategori=engineering') }}"
                           class="flex items-start gap-3 px-4 py-2.5 hover:bg-white/5 transition-colors group">
                            <span class="font-jp text-[#C0001E] text-lg leading-none mt-0.5">エ</span>
                            <div>
                                <p class="text-sm font-medium text-white">Engineering</p>
                                <p class="text-xs text-white/50">エンジニアリング · D3/S1</p>
                            </div>
                        </a>
                        <div class="border-t border-white/10 my-1"></div>
                        <a href="{{ url('/program?kategori=nihongo-gakkou') }}"
                           class="flex items-start gap-3 px-4 py-2.5 hover:bg-white/5 transition-colors group">
                            <span class="font-jp text-[#C0001E] text-lg leading-none mt-0.5">日</span>
                            <div>
                                <p class="text-sm font-medium text-white">Nihongo Gakkou</p>
                                <p class="text-xs text-white/50">日本語学校 · Kelas Bahasa Jepang</p>
                            </div>
                        </a>
                    </div>
                </div>

                <a href="{{ url('/galeri') }}"
                   class="px-3 py-2 text-sm font-medium text-white/80 hover:text-white hover:bg-white/10 rounded-lg transition-all {{ request()->is('galeri*') ? 'text-white bg-white/10' : '' }}">
                    Galeri
                </a>
                
                <a href="{{ url('/testimoni') }}"
                   class="px-3 py-2 text-sm font-medium text-white/80 hover:text-white hover:bg-white/10 rounded-lg transition-all {{ request()->is('testimoni*') ? 'text-white bg-white/10' : '' }}">
                    Testimoni
                </a>

                <a href="{{ url('/faq') }}"
                   class="px-3 py-2 text-sm font-medium text-white/80 hover:text-white hover:bg-white/10 rounded-lg transition-all {{ request()->is('faq*') ? 'text-white bg-white/10' : '' }}">
                    FAQ
                </a>

                <a href="{{ url('/tentang') }}"
                   class="px-3 py-2 text-sm font-medium text-white/80 hover:text-white hover:bg-white/10 rounded-lg transition-all {{ request()->is('tentang*') ? 'text-white bg-white/10' : '' }}">
                    Tentang
                </a>

                <a href="{{ url('/kontak') }}"
                   class="px-3 py-2 text-sm font-medium text-white/80 hover:text-white hover:bg-white/10 rounded-lg transition-all {{ request()->is('kontak*') ? 'text-white bg-white/10' : '' }}">
                    Kontak
                </a>
            </div>

            {{-- CTA Button (Desktop) --}}
            <div class="hidden lg:block">
                <a href="{{ url('/daftar') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#C0001E] text-white text-sm font-semibold rounded-full hover:bg-[#E8001F] transition-all duration-300 hover:shadow-lg hover:shadow-red-600/30 active:scale-95">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Daftar Sekarang
                </a>
            </div>

            {{-- Mobile Hamburger --}}
            <button @click="mobileOpen = !mobileOpen"
                    class="lg:hidden p-2 rounded-lg text-white hover:bg-white/10 transition-colors"
                    aria-label="Toggle menu">
                <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="mobileOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="mobileOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="lg:hidden bg-[#1E1E1E] border-t border-white/10 shadow-xl"
         x-cloak>
        <div class="max-w-7xl mx-auto px-4 py-4 space-y-1">
            <a href="{{ url('/') }}"
               class="block px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('/') ? 'bg-[#C0001E] text-white' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                Beranda
            </a>
            <a href="{{ url('/program') }}"
               class="block px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('program*') ? 'bg-[#C0001E] text-white' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                Program
            </a>
            <a href="{{ url('/galeri') }}"
               class="block px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('galeri*') ? 'bg-[#C0001E] text-white' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                Galeri
            </a>
            <a href="{{ url('/testimoni') }}"
               class="block px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('testimoni*') ? 'bg-[#C0001E] text-white' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                Testimoni
            </a>
            <a href="{{ url('/faq') }}"
               class="block px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('faq*') ? 'bg-[#C0001E] text-white' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                FAQ
            </a>
            <a href="{{ url('/tentang') }}"
               class="block px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('tentang*') ? 'bg-[#C0001E] text-white' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                Tentang Kami
            </a>
            <a href="{{ url('/kontak') }}"
               class="block px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('kontak*') ? 'bg-[#C0001E] text-white' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                Kontak
            </a>

            <div class="pt-3 border-t border-white/10 mt-2">
                <a href="{{ url('/daftar') }}"
                   class="flex items-center justify-center gap-2 w-full px-5 py-3 bg-[#C0001E] text-white text-sm font-semibold rounded-full hover:bg-[#E8001F] transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </div>
</nav>

{{-- Spacer for fixed navbar --}}
<div class="h-16 lg:h-20"></div>
