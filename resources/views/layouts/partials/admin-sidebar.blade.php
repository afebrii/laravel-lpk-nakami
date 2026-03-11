{{-- Sidebar --}}
<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
       class="fixed inset-y-0 left-0 z-40 w-64 bg-charcoal transition-transform duration-300 ease-in-out lg:translate-x-0 flex flex-col">

    {{-- Logo --}}
    <div class="px-6 py-5 border-b border-white/10">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
            <div class="w-9 h-9 bg-rose-gold/20 rounded-lg flex items-center justify-center">
                <span class="text-rose-gold font-heading font-bold text-sm">Y</span>
            </div>
            <div>
                <p class="font-heading font-bold text-white text-sm">LKP Yuwita</p>
                <p class="text-[10px] text-white/40">Admin Panel</p>
            </div>
        </a>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1">
        <p class="px-3 mb-2 text-[10px] font-semibold text-white/30 uppercase tracking-wider">Menu Utama</p>

        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all
                  {{ request()->routeIs('admin.dashboard') ? 'bg-rose-gold/10 text-rose-gold' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            Dashboard
        </a>

        <p class="px-3 mt-5 mb-2 text-[10px] font-semibold text-white/30 uppercase tracking-wider">Konten</p>

        <a href="{{ route('admin.programs.index') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all {{ request()->routeIs('admin.programs*') ? 'bg-rose-gold/10 text-rose-gold' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            Program
        </a>

        <a href="{{ route('admin.program-categories.index') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all {{ request()->routeIs('admin.program-categories*') ? 'bg-rose-gold/10 text-rose-gold' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
            Kategori Program
        </a>

        <a href="{{ route('admin.registrations.index') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all {{ request()->routeIs('admin.registrations*') ? 'bg-rose-gold/10 text-rose-gold' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
            Pendaftaran
        </a>

        <a href="{{ route('admin.gallery.index') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all {{ request()->routeIs('admin.gallery*') ? 'bg-rose-gold/10 text-rose-gold' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            Galeri
        </a>

        <a href="{{ route('admin.posts.index') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all {{ request()->routeIs('admin.posts*') ? 'bg-rose-gold/10 text-rose-gold' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            Blog
        </a>

        <a href="{{ route('admin.testimonials.index') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all {{ request()->routeIs('admin.testimonials*') ? 'bg-rose-gold/10 text-rose-gold' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
            Testimoni
        </a>

        <a href="{{ route('admin.faqs.index') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all {{ request()->routeIs('admin.faqs*') ? 'bg-rose-gold/10 text-rose-gold' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            FAQ
        </a>

        <a href="{{ route('admin.services.index') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all {{ request()->routeIs('admin.services*') ? 'bg-rose-gold/10 text-rose-gold' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            Layanan
        </a>

        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all {{ request()->routeIs('admin.contacts*') ? 'bg-rose-gold/10 text-rose-gold' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            Pesan Kontak
        </a>

        @if(auth()->user()->isSuperadmin())
        <p class="px-3 mt-5 mb-2 text-[10px] font-semibold text-white/30 uppercase tracking-wider">Pengaturan</p>

        <a href="{{ route('admin.users.index') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all {{ request()->routeIs('admin.users*') ? 'bg-rose-gold/10 text-rose-gold' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            Users
        </a>

        <a href="{{ route('admin.settings.index') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all {{ request()->routeIs('admin.settings*') ? 'bg-rose-gold/10 text-rose-gold' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            Settings
        </a>
        @endif
    </nav>

    {{-- User (bottom) --}}
    <div class="border-t border-white/10 px-4 py-3">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-rose-gold/20 rounded-full flex items-center justify-center shrink-0">
                <span class="text-rose-gold font-semibold text-xs">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-white truncate">{{ auth()->user()->name }}</p>
                <p class="text-[10px] text-white/40 capitalize">{{ auth()->user()->role }}</p>
            </div>
        </div>
    </div>
</aside>
