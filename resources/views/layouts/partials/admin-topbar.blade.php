{{-- Topbar --}}
<header class="bg-white border-b border-gray-200 px-4 lg:px-8 py-3 flex items-center justify-between sticky top-0 z-20">
    {{-- Left: Hamburger + Title --}}
    <div class="flex items-center gap-3">
        <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden w-9 h-9 flex items-center justify-center rounded-lg hover:bg-gray-100 transition-colors">
            <svg class="w-5 h-5 text-charcoal" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
        <h1 class="font-heading text-lg font-bold text-charcoal">@yield('page_title', 'Dashboard')</h1>
    </div>

    {{-- Right: User dropdown --}}
    <div class="flex items-center gap-3" x-data="{ open: false }">
        {{-- Visit site --}}
        <a href="{{ url('/') }}" target="_blank" class="hidden sm:flex items-center gap-1.5 text-xs text-dark-gray/60 hover:text-[#C0001E] transition-colors">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            Lihat Website
        </a>

        {{-- User --}}
        <div class="relative">
            <button @click="open = !open" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-50 transition-colors">
                <div class="w-8 h-8 bg-[#C0001E]/10 rounded-full flex items-center justify-center">
                    <span class="text-[#C0001E] font-semibold text-xs">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                </div>
                <div class="hidden sm:block text-left">
                    <p class="text-sm font-medium text-charcoal">{{ auth()->user()->name }}</p>
                </div>
                <svg class="w-4 h-4 text-dark-gray/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>

            {{-- Dropdown --}}
            <div x-show="open" @click.away="open = false" x-transition
                 class="absolute right-0 mt-1 w-48 bg-white rounded-xl shadow-xl shadow-black/10 border border-gray-100 py-1 z-50">
                <div class="px-4 py-2 border-b border-gray-100">
                    <p class="text-sm font-medium text-charcoal">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-dark-gray/60 capitalize">{{ auth()->user()->role }}</p>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-2 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
