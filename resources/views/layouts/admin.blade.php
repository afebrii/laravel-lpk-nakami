<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — {{ setting('site_name', 'LKP Yuwita') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(setting('site_favicon'))
        <link rel="icon" href="{{ asset('storage/' . setting('site_favicon')) }}">
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-gray-50 text-dark-gray font-body min-h-screen antialiased"
      x-data="{ sidebarOpen: false }">

    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        @include('layouts.partials.admin-sidebar')

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col lg:ml-64">
            {{-- Topbar --}}
            @include('layouts.partials.admin-topbar')

            {{-- Flash --}}
            @if(session('success'))
            <div class="mx-4 lg:mx-8 mt-4 p-3 bg-green-50 border border-green-200 rounded-xl text-sm text-green-700" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)" x-transition>
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="mx-4 lg:mx-8 mt-4 p-3 bg-red-50 border border-red-200 rounded-xl text-sm text-red-600" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)" x-transition>
                {{ session('error') }}
            </div>
            @endif

            {{-- Page Content --}}
            <main class="flex-1 p-4 lg:p-8">
                @yield('content')
            </main>

            {{-- Footer --}}
            <footer class="border-t border-gray-200 px-4 lg:px-8 py-4">
                <p class="text-xs text-dark-gray/50 text-center">© {{ date('Y') }} {{ setting('site_name', 'LKP/LPK Yuwita') }}. Admin Panel.</p>
            </footer>
        </div>
    </div>

    {{-- Mobile overlay --}}
    <div x-show="sidebarOpen" x-transition.opacity @click="sidebarOpen = false"
         class="fixed inset-0 bg-black/50 z-30 lg:hidden"></div>

    @stack('scripts')
</body>
</html>
