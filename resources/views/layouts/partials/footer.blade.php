{{-- Footer --}}
<footer class="bg-charcoal text-white">
    {{-- Main Footer --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">

            {{-- Kolom 1: Logo & Deskripsi --}}
            <div class="lg:col-span-1">
                @if(setting('site_logo'))
                    <img src="{{ asset('storage/' . setting('site_logo')) }}" alt="{{ setting('site_name') }}" class="h-12 w-auto mb-4 brightness-0 invert">
                @else
                    <h3 class="font-heading text-xl font-bold mb-4">{{ setting('site_name', 'LKP/LPK Yuwita') }}</h3>
                @endif
                <p class="text-white/70 text-sm leading-relaxed mb-6">
                    {{ setting('site_description', 'Lembaga kursus dan pelatihan kecantikan terpercaya di Tasikmalaya sejak 2006.') }}
                </p>
                {{-- Social Media --}}
                <div class="flex items-center gap-3">
                    @if(setting('social_facebook'))
                    <a href="{{ setting('social_facebook') }}" target="_blank" rel="noopener"
                       class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-rose-gold transition-colors" aria-label="Facebook">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                    </a>
                    @endif
                    @if(setting('social_instagram'))
                    <a href="{{ setting('social_instagram') }}" target="_blank" rel="noopener"
                       class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-rose-gold transition-colors" aria-label="Instagram">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5" stroke-width="2"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z" stroke-width="2"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5" stroke-width="2"/></svg>
                    </a>
                    @endif
                    @if(setting('social_youtube'))
                    <a href="{{ setting('social_youtube') }}" target="_blank" rel="noopener"
                       class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-rose-gold transition-colors" aria-label="YouTube">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23 7s-.3-2-1.2-2.8C20.7 3.2 19.4 3 18 3H6C4.6 3 3.3 3.2 2.2 4.2 1.3 5 1 7 1 7S.7 9.4.7 11.7v2.6c0 2.3.3 4.7.3 4.7s.3 2 1.2 2.8C3.3 22.8 4.8 23 6 23h12c1.4 0 2.7-.2 3.8-1.2.9-.8 1.2-2.8 1.2-2.8s.3-2.4.3-4.7v-2.6C23.3 9.4 23 7 23 7zM9.5 16V8l7 4-7 4z"/></svg>
                    </a>
                    @endif
                    @if(setting('social_tiktok'))
                    <a href="{{ setting('social_tiktok') }}" target="_blank" rel="noopener"
                       class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-rose-gold transition-colors" aria-label="TikTok">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1v-3.52a6.37 6.37 0 00-.79-.05A6.34 6.34 0 003.15 15.2a6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.34-6.34V9.21a8.16 8.16 0 004.76 1.52v-3.4a4.82 4.82 0 01-1-.64z"/></svg>
                    </a>
                    @endif
                </div>
            </div>

            {{-- Kolom 2: Navigasi Cepat --}}
            <div>
                <h4 class="font-heading text-base font-semibold mb-4">Navigasi</h4>
                <ul class="space-y-2.5">
                    <li><a href="{{ url('/') }}" class="text-sm text-white/70 hover:text-rose-gold-light transition-colors">Beranda</a></li>
                    <li><a href="{{ url('/program') }}" class="text-sm text-white/70 hover:text-rose-gold-light transition-colors">Program Pelatihan</a></li>
                    <li><a href="{{ url('/galeri') }}" class="text-sm text-white/70 hover:text-rose-gold-light transition-colors">Galeri</a></li>
                    <li><a href="{{ url('/tentang') }}" class="text-sm text-white/70 hover:text-rose-gold-light transition-colors">Tentang Kami</a></li>
                    <li><a href="{{ url('/testimoni') }}" class="text-sm text-white/70 hover:text-rose-gold-light transition-colors">Testimoni</a></li>
                    <li><a href="{{ url('/blog') }}" class="text-sm text-white/70 hover:text-rose-gold-light transition-colors">Blog</a></li>
                    <li><a href="{{ url('/faq') }}" class="text-sm text-white/70 hover:text-rose-gold-light transition-colors">FAQ</a></li>
                    <li><a href="{{ url('/kontak') }}" class="text-sm text-white/70 hover:text-rose-gold-light transition-colors">Kontak</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Program --}}
            <div>
                <h4 class="font-heading text-base font-semibold mb-4">Program</h4>
                <ul class="space-y-2.5">
                    <li><a href="{{ url('/program') }}" class="text-sm text-white/70 hover:text-rose-gold-light transition-colors">Kelas Reguler</a></li>
                    <li><a href="{{ url('/program') }}" class="text-sm text-white/70 hover:text-rose-gold-light transition-colors">Kelas Khusus</a></li>
                    <li><a href="{{ url('/daftar') }}" class="text-sm text-white/70 hover:text-rose-gold-light transition-colors">Pendaftaran Online</a></li>
                    <li><a href="{{ url('/kontak') }}" class="text-sm text-white/70 hover:text-rose-gold-light transition-colors">Hubungi Kami</a></li>
                </ul>
            </div>

            {{-- Kolom 4: Kontak --}}
            <div>
                <h4 class="font-heading text-base font-semibold mb-4">Kontak</h4>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-rose-gold-light shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-sm text-white/70">{{ setting('contact_address', 'Jl. Leuwianyar No. 107, Kota Tasikmalaya') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-rose-gold-light shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span class="text-sm text-white/70">{{ setting('contact_phone', '+62 852-2350-6611') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-rose-gold-light shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-sm text-white/70">{{ setting('contact_email', 'lpkyuwita1@gmail.com') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-rose-gold-light shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-sm text-white/70">{{ setting('contact_hours', 'Senin – Sabtu: 08.00 – 17.00 WIB') }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Bottom Bar --}}
    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-xs text-white/50">
                &copy; {{ date('Y') }} {{ setting('site_name', 'LKP/LPK Yuwita') }}. Hak cipta dilindungi.
            </p>
            <a href="{{ url('/kebijakan-privasi') }}" class="text-xs text-white/50 hover:text-white/80 transition-colors">
                Kebijakan Privasi
            </a>
        </div>
    </div>
</footer>
