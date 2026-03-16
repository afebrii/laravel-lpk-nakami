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
      x-data="{ sidebarOpen: false, showDeleteModal: false, deleteUrl: '', deleteMessage: 'Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.' }"
      @open-delete-modal.window="showDeleteModal = true; deleteUrl = $event.detail.url; deleteMessage = $event.detail.message || deleteMessage">

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
         class="fixed inset-0 bg-black/50 z-30 lg:hidden" style="display: none;"></div>

    {{-- Global Delete Confirmation Modal --}}
    <div x-show="showDeleteModal" style="display: none;" class="relative z-50">
        <div x-show="showDeleteModal" x-transition.opacity class="fixed inset-0 bg-dark-gray/20 backdrop-blur-sm transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div x-show="showDeleteModal"
                     x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     @click.away="showDeleteModal = false"
                     class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-50 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-charcoal">Konfirmasi Hapus</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-dark-gray" x-text="deleteMessage"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <form method="POST" :action="deleteUrl">
                            @csrf
                            @method('DELETE')
                            <button @click="showDeleteModal = false" type="submit" class="inline-flex w-full justify-center rounded-xl bg-red-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-600 transition-colors sm:ml-3 sm:w-auto">Ya, Hapus</button>
                        </form>
                        <button type="button" @click="showDeleteModal = false" class="mt-3 inline-flex w-full justify-center rounded-xl bg-white px-3 py-2 text-sm font-semibold text-charcoal shadow-sm ring-1 ring-inset ring-gray-200 hover:bg-gray-50 transition-colors sm:mt-0 sm:w-auto">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
