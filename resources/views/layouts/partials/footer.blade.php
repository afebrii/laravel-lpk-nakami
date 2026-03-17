{{-- Footer LPK Nakami Indonesia --}}
<footer class="bg-[#111111] text-white">

    {{-- Red top divider --}}
    <div class="h-1 bg-gradient-to-r from-[#C0001E] via-[#E8001F] to-[#C0001E]"></div>

    {{-- Main Footer --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">

            {{-- Kolom 1: Logo & Deskripsi --}}
            <div class="lg:col-span-1">
                {{-- Logo --}}
                @if(setting('site_logo'))
                    <img src="{{ asset('media/' . setting('site_logo')) }}"
                         alt="{{ setting('site_name') }}"
                         class="h-12 w-auto mb-4">
                @else
                    <img src="{{ asset('images/logo-nakami.png') }}"
                         alt="LPK Nakami Indonesia"
                         class="h-12 w-auto mb-4"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    <h3 class="font-heading text-xl font-bold mb-4 hidden">
                        LPK <span class="text-[#C0001E]">Nakami</span>
                    </h3>
                @endif

                <p class="text-xs font-medium text-[#C0001E] uppercase tracking-widest mb-2">Japanese Learning Center</p>
                <p class="text-white/60 text-sm leading-relaxed mb-6">
                    {{ setting('site_description', 'Lembaga pelatihan kerja terpercaya untuk program ke Jepang. Ginou Jisshusei, Tokutei Ginou, Engineering, dan Nihongo Gakkou.') }}
                </p>

                {{-- Social Media --}}
                <div class="flex items-center gap-3">
                    @if(setting('social_instagram'))
                    <a href="{{ setting('social_instagram') }}" target="_blank" rel="noopener"
                       class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#C0001E] transition-colors"
                       aria-label="Instagram">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5" stroke-width="2"/>
                            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z" stroke-width="2"/>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" stroke-width="2"/>
                        </svg>
                    </a>
                    @endif
                    @if(setting('social_youtube'))
                    <a href="{{ setting('social_youtube') }}" target="_blank" rel="noopener"
                       class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#C0001E] transition-colors"
                       aria-label="YouTube">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23 7s-.3-2-1.2-2.8C20.7 3.2 19.4 3 18 3H6C4.6 3 3.3 3.2 2.2 4.2 1.3 5 1 7 1 7S.7 9.4.7 11.7v2.6c0 2.3.3 4.7.3 4.7s.3 2 1.2 2.8C3.3 22.8 4.8 23 6 23h12c1.4 0 2.7-.2 3.8-1.2.9-.8 1.2-2.8 1.2-2.8s.3-2.4.3-4.7v-2.6C23.3 9.4 23 7 23 7zM9.5 16V8l7 4-7 4z"/>
                        </svg>
                    </a>
                    @endif
                    @if(setting('social_tiktok'))
                    <a href="{{ setting('social_tiktok') }}" target="_blank" rel="noopener"
                       class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#C0001E] transition-colors"
                       aria-label="TikTok">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1v-3.52a6.37 6.37 0 00-.79-.05A6.34 6.34 0 003.15 15.2a6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.34-6.34V9.21a8.16 8.16 0 004.76 1.52v-3.4a4.82 4.82 0 01-1-.64z"/>
                        </svg>
                    </a>
                    @endif
                    {{-- WhatsApp --}}
                    @if(setting('contact_wa_admin'))
                    <a href="https://wa.me/{{ setting('contact_wa_admin') }}" target="_blank" rel="noopener"
                       class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#25D366] transition-colors"
                       aria-label="WhatsApp">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                            <path d="M12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.66 1.438 5.168L2 22l4.832-1.438A9.955 9.955 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2zm0 18a8 8 0 01-4.27-1.23l-.27-.16-2.87.85.85-2.87-.16-.27A8 8 0 1112 20z"/>
                        </svg>
                    </a>
                    @endif
                </div>
            </div>

            {{-- Kolom 2: Navigasi --}}
            <div>
                <h4 class="font-heading text-sm font-semibold uppercase tracking-wider text-white/40 mb-4">Navigasi</h4>
                <ul class="space-y-2.5">
                    <li><a href="{{ url('/') }}"          class="text-sm text-white/70 hover:text-[#E8001F] transition-colors">Beranda</a></li>
                    <li><a href="{{ url('/tentang') }}"   class="text-sm text-white/70 hover:text-[#E8001F] transition-colors">Tentang Kami</a></li>
                    <li><a href="{{ url('/lowongan') }}"   class="text-sm text-white/70 hover:text-[#E8001F] transition-colors">Lowongan Kerja</a></li>
                    {{-- 
                    <li><a href="{{ url('/jepang-info') }}" class="text-sm text-white/70 hover:text-[#E8001F] transition-colors">Info Jepang</a></li>
                    <li><a href="{{ url('/jlpt') }}"        class="text-sm text-white/70 hover:text-[#E8001F] transition-colors">Materi JLPT</a></li>
                    --}}
                    <li><a href="{{ url('/galeri') }}"      class="text-sm text-white/70 hover:text-[#E8001F] transition-colors">Galeri Kegiatan</a></li>
                    <li><a href="{{ url('/testimoni') }}"   class="text-sm text-white/70 hover:text-[#E8001F] transition-colors">Alumni / Senpai</a></li>
                    <li><a href="{{ url('/faq') }}"      class="text-sm text-white/70 hover:text-[#E8001F] transition-colors">Pusat Bantuan</a></li>
                    <li><a href="{{ url('/blog') }}"      class="text-sm text-white/70 hover:text-[#E8001F] transition-colors">Blog / Berita</a></li>
                    <li><a href="{{ url('/kontak') }}"    class="text-sm text-white/70 hover:text-[#E8001F] transition-colors">Hubungi Kami</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Program --}}
            <div>
                <h4 class="font-heading text-sm font-semibold uppercase tracking-wider text-white/40 mb-4">Program</h4>
                <ul class="space-y-2.5">
                    <li>
                        <a href="{{ url('/program?kategori=ginou-jisshusei') }}"
                           class="text-sm text-white/70 hover:text-[#E8001F] transition-colors flex items-center gap-2">
                            <span class="font-jp text-[#C0001E]">技</span> Ginou Jisshusei
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/program?kategori=tokutei-ginou') }}"
                           class="text-sm text-white/70 hover:text-[#E8001F] transition-colors flex items-center gap-2">
                            <span class="font-jp text-[#C0001E]">特</span> Tokutei Ginou
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/program?kategori=engineering') }}"
                           class="text-sm text-white/70 hover:text-[#E8001F] transition-colors flex items-center gap-2">
                            <span class="font-jp text-[#C0001E]">エ</span> Engineering
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/program?kategori=nihongo-gakkou') }}"
                           class="text-sm text-white/70 hover:text-[#E8001F] transition-colors flex items-center gap-2">
                            <span class="font-jp text-[#C0001E]">日</span> Nihongo Gakkou
                        </a>
                    </li>
                    <li class="pt-1">
                        <a href="{{ url('/daftar') }}"
                           class="inline-flex items-center gap-1.5 text-sm font-semibold text-[#C0001E] hover:text-[#E8001F] transition-colors">
                            Daftar Sekarang →
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Kolom 4: Kontak --}}
            <div>
                <h4 class="font-heading text-sm font-semibold uppercase tracking-wider text-white/40 mb-4">Kontak</h4>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <svg class="w-4 h-4 text-[#C0001E] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-sm text-white/60 leading-relaxed">{{ setting('contact_address', 'Citra Graha Residence Blok H26, Tasikmalaya 46153') }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-4 h-4 text-[#C0001E] shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zM12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.66 1.438 5.168L2 22l4.832-1.438A9.955 9.955 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2zm0 18a8 8 0 01-4.27-1.23l-.27-.16-2.87.85.85-2.87-.16-.27A8 8 0 1112 20z"/>
                        </svg>
                        <a href="https://wa.me/{{ setting('contact_wa_admin', '6281931646314') }}"
                           target="_blank"
                           class="text-sm text-white/60 hover:text-[#E8001F] transition-colors">
                            {{ setting('contact_phone', '+62 819-3164-6314') }}
                        </a>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-4 h-4 text-[#C0001E] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <a href="mailto:{{ setting('contact_email', 'lpknakamiindonesia@gmail.com') }}"
                           class="text-sm text-white/60 hover:text-[#E8001F] transition-colors">
                            {{ setting('contact_email', 'lpknakamiindonesia@gmail.com') }}
                        </a>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-4 h-4 text-[#C0001E] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-sm text-white/60">{{ setting('contact_hours', 'Senin – Sabtu: 08.00 – 17.00 WIB') }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Bottom Bar --}}
    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-xs text-white/40">
                &copy; {{ date('Y') }} {{ setting('site_name', 'LPK Nakami Indonesia') }}. Hak cipta dilindungi.
            </p>
            <div class="flex items-center gap-4">
                <a href="{{ url('/kebijakan-privasi') }}" class="text-xs text-white/40 hover:text-white/70 transition-colors">Kebijakan Privasi</a>
                <span class="text-white/20">·</span>
                <span class="text-xs text-white/30 font-jp">日本語学校</span>
            </div>
        </div>
    </div>
</footer>
