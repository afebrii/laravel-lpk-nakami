{{-- Sticky Navbar --}}
<nav x-data="{ mobileOpen: false, scrolled: false, activeDropdown: null }"
     x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
     :class="scrolled ? 'bg-white/95 backdrop-blur-md shadow-md' : 'bg-white'"
     class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-20">

            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex items-center gap-3 shrink-0">
                @if(setting('site_logo'))
                    <img src="{{ asset('storage/' . setting('site_logo')) }}" alt="{{ setting('site_name') }}" class="h-10 lg:h-12 w-auto">
                @else
                    <span class="font-heading text-xl lg:text-2xl font-bold text-charcoal">
                        {{ setting('site_name', 'LKP Yuwita') }}
                    </span>
                @endif
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden lg:flex items-center gap-1">
                <a href="{{ url('/') }}"
                   class="px-3 py-2 text-sm font-medium text-charcoal hover:text-rose-gold transition-colors {{ request()->is('/') ? 'text-rose-gold' : '' }}">
                    Beranda
                </a>

                {{-- Program Dropdown --}}
                <div class="relative" @mouseenter="activeDropdown = 'program'" @mouseleave="activeDropdown = null">
                    <a href="{{ url('/program') }}"
                       class="px-3 py-2 text-sm font-medium text-charcoal hover:text-rose-gold transition-colors inline-flex items-center gap-1 {{ request()->is('program*') ? 'text-rose-gold' : '' }}">
                        Program Pelatihan
                        <svg class="w-4 h-4 transition-transform" :class="activeDropdown === 'program' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                         class="absolute top-full left-0 mt-1 w-56 bg-white rounded-xl shadow-lg border border-light-gray py-2 z-50"
                         x-cloak>
                        <p class="px-4 py-1.5 text-xs font-semibold text-dark-gray uppercase tracking-wider">Kelas Reguler</p>
                        <a href="{{ url('/program?kategori=reguler') }}" class="block px-4 py-2 text-sm text-charcoal hover:bg-soft-cream hover:text-rose-gold transition-colors">Make Up Artist (MUA)</a>
                        <a href="{{ url('/program?kategori=reguler') }}" class="block px-4 py-2 text-sm text-charcoal hover:bg-soft-cream hover:text-rose-gold transition-colors">Tata Kecantikan Rambut</a>
                        <a href="{{ url('/program?kategori=reguler') }}" class="block px-4 py-2 text-sm text-charcoal hover:bg-soft-cream hover:text-rose-gold transition-colors">Kecantikan Kulit</a>
                        <a href="{{ url('/program?kategori=reguler') }}" class="block px-4 py-2 text-sm text-charcoal hover:bg-soft-cream hover:text-rose-gold transition-colors">Hand Bouquet</a>
                        <div class="border-t border-light-gray my-1"></div>
                        <p class="px-4 py-1.5 text-xs font-semibold text-dark-gray uppercase tracking-wider">Kelas Khusus</p>
                        <a href="{{ url('/program?kategori=khusus') }}" class="block px-4 py-2 text-sm text-charcoal hover:bg-soft-cream hover:text-rose-gold transition-colors">Make Up Artist (MUA)</a>
                        <a href="{{ url('/program?kategori=khusus') }}" class="block px-4 py-2 text-sm text-charcoal hover:bg-soft-cream hover:text-rose-gold transition-colors">Rias Pengantin</a>
                        <a href="{{ url('/program?kategori=khusus') }}" class="block px-4 py-2 text-sm text-charcoal hover:bg-soft-cream hover:text-rose-gold transition-colors">Tata Kecantikan Rambut</a>
                        <a href="{{ url('/program?kategori=khusus') }}" class="block px-4 py-2 text-sm text-charcoal hover:bg-soft-cream hover:text-rose-gold transition-colors">Kecantikan Kulit</a>
                    </div>
                </div>

                <a href="{{ url('/layanan') }}"
                   class="px-3 py-2 text-sm font-medium text-charcoal hover:text-rose-gold transition-colors {{ request()->is('layanan*') ? 'text-rose-gold' : '' }}">
                    Layanan Salon
                </a>

                <a href="{{ url('/galeri') }}"
                   class="px-3 py-2 text-sm font-medium text-charcoal hover:text-rose-gold transition-colors {{ request()->is('galeri*') ? 'text-rose-gold' : '' }}">
                    Galeri
                </a>

                {{-- Tentang Dropdown --}}
                <div class="relative" @mouseenter="activeDropdown = 'tentang'" @mouseleave="activeDropdown = null">
                    <a href="{{ url('/tentang') }}"
                       class="px-3 py-2 text-sm font-medium text-charcoal hover:text-rose-gold transition-colors inline-flex items-center gap-1 {{ request()->is('tentang*') ? 'text-rose-gold' : '' }}">
                        Tentang Kami
                        <svg class="w-4 h-4 transition-transform" :class="activeDropdown === 'tentang' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </a>
                    <div x-show="activeDropdown === 'tentang'"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute top-full left-0 mt-1 w-48 bg-white rounded-xl shadow-lg border border-light-gray py-2 z-50"
                         x-cloak>
                        <a href="{{ url('/tentang') }}" class="block px-4 py-2 text-sm text-charcoal hover:bg-soft-cream hover:text-rose-gold transition-colors">Profil & Sejarah</a>
                        <a href="{{ url('/tentang#visi-misi') }}" class="block px-4 py-2 text-sm text-charcoal hover:bg-soft-cream hover:text-rose-gold transition-colors">Visi & Misi</a>
                        <a href="{{ url('/tentang#legalitas') }}" class="block px-4 py-2 text-sm text-charcoal hover:bg-soft-cream hover:text-rose-gold transition-colors">Legalitas</a>
                        <a href="{{ url('/testimoni') }}" class="block px-4 py-2 text-sm text-charcoal hover:bg-soft-cream hover:text-rose-gold transition-colors">Testimoni</a>
                        <a href="{{ url('/blog') }}" class="block px-4 py-2 text-sm text-charcoal hover:bg-soft-cream hover:text-rose-gold transition-colors">Blog</a>
                    </div>
                </div>

                <a href="{{ url('/faq') }}"
                   class="px-3 py-2 text-sm font-medium text-charcoal hover:text-rose-gold transition-colors {{ request()->is('faq*') ? 'text-rose-gold' : '' }}">
                    FAQ
                </a>

                <a href="{{ url('/kontak') }}"
                   class="px-3 py-2 text-sm font-medium text-charcoal hover:text-rose-gold transition-colors {{ request()->is('kontak*') ? 'text-rose-gold' : '' }}">
                    Kontak
                </a>
            </div>

            {{-- CTA Button (Desktop) --}}
            <div class="hidden lg:block">
                <a href="{{ url('/daftar') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 bg-rose-gold text-white text-sm font-semibold rounded-full hover:bg-rose-gold-dark transition-all duration-300 hover:shadow-lg hover:shadow-rose-gold/25 active:scale-95">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Daftar Sekarang
                </a>
            </div>

            {{-- Mobile Hamburger --}}
            <button @click="mobileOpen = !mobileOpen" class="lg:hidden p-2 rounded-lg text-charcoal hover:bg-light-gray transition-colors" aria-label="Toggle menu">
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
         class="lg:hidden bg-white border-t border-light-gray shadow-lg"
         x-cloak>
        <div class="max-w-7xl mx-auto px-4 py-4 space-y-1">
            <a href="{{ url('/') }}" class="block px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->is('/') ? 'bg-soft-cream text-rose-gold' : 'text-charcoal hover:bg-soft-cream' }} transition-colors">Beranda</a>
            <a href="{{ url('/program') }}" class="block px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->is('program*') ? 'bg-soft-cream text-rose-gold' : 'text-charcoal hover:bg-soft-cream' }} transition-colors">Program Pelatihan</a>
            <a href="{{ url('/layanan') }}" class="block px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->is('layanan*') ? 'bg-soft-cream text-rose-gold' : 'text-charcoal hover:bg-soft-cream' }} transition-colors">Layanan Salon</a>
            <a href="{{ url('/galeri') }}" class="block px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->is('galeri*') ? 'bg-soft-cream text-rose-gold' : 'text-charcoal hover:bg-soft-cream' }} transition-colors">Galeri</a>
            <a href="{{ url('/tentang') }}" class="block px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->is('tentang*') ? 'bg-soft-cream text-rose-gold' : 'text-charcoal hover:bg-soft-cream' }} transition-colors">Tentang Kami</a>
            <a href="{{ url('/faq') }}" class="block px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->is('faq*') ? 'bg-soft-cream text-rose-gold' : 'text-charcoal hover:bg-soft-cream' }} transition-colors">FAQ</a>
            <a href="{{ url('/kontak') }}" class="block px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->is('kontak*') ? 'bg-soft-cream text-rose-gold' : 'text-charcoal hover:bg-soft-cream' }} transition-colors">Kontak</a>

            <div class="pt-3">
                <a href="{{ url('/daftar') }}" class="flex items-center justify-center gap-2 w-full px-5 py-3 bg-rose-gold text-white text-sm font-semibold rounded-full hover:bg-rose-gold-dark transition-all">
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
