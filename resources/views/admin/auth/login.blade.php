<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — {{ setting('site_name', 'LKP Yuwita') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-charcoal via-charcoal to-rose-gold-dark flex items-center justify-center p-4">

    {{-- Background decor --}}
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-20 left-20 w-96 h-96 bg-rose-gold/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-20 w-80 h-80 bg-dusty-pink/5 rounded-full blur-3xl"></div>
    </div>

    <div class="relative w-full max-w-md" x-data="{ showPassword: false }">
        {{-- Card --}}
        <div class="bg-white rounded-2xl shadow-2xl shadow-black/20 overflow-hidden">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-charcoal to-rose-gold-dark px-8 py-8 text-center">
                <div class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center mx-auto mb-4 backdrop-blur-sm">
                    <svg class="w-8 h-8 text-dusty-pink" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h1 class="font-heading text-2xl font-bold text-white">Admin Panel</h1>
                <p class="text-sm text-white/60 mt-1">{{ setting('site_name', 'LPK Nakami Indonesia') }}</p>
            </div>

            {{-- Form --}}
            <div class="px-8 py-8">
                {{-- Flash Messages --}}
                @if(session('success'))
                <div class="mb-4 p-3 bg-green-50 border border-green-200 rounded-xl text-sm text-green-700">
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-xl text-sm text-red-600">
                    {{ session('error') }}
                </div>
                @endif

                @if($errors->any())
                <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-xl text-sm text-red-600">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
                @endif

                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf

                    <div class="space-y-5">
                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-sm font-semibold text-charcoal mb-1.5">Email</label>
                            <div class="relative">
                                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-dark-gray/40 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                                       class="w-full pl-11 pr-4 py-3 bg-soft-cream/50 border border-medium-gray rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30 focus:border-rose-gold transition-all"
                                       placeholder="admin@lkp-yuwita.com">
                            </div>
                        </div>

                        {{-- Password --}}
                        <div>
                            <label for="password" class="block text-sm font-semibold text-charcoal mb-1.5">Password</label>
                            <div class="relative">
                                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-dark-gray/40 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                <input :type="showPassword ? 'text' : 'password'" name="password" id="password" required
                                       class="w-full pl-11 pr-12 py-3 bg-soft-cream/50 border border-medium-gray rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30 focus:border-rose-gold transition-all"
                                       placeholder="••••••••">
                                <button type="button" @click="showPassword = !showPassword"
                                        class="absolute right-4 top-1/2 -translate-y-1/2 text-dark-gray/40 hover:text-dark-gray transition-colors">
                                    <svg x-show="!showPassword" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    <svg x-show="showPassword" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                                </button>
                            </div>
                        </div>

                        {{-- Remember --}}
                        <div class="flex items-center justify-between">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="remember" class="w-4 h-4 rounded border-medium-gray text-rose-gold focus:ring-rose-gold/30">
                                <span class="text-sm text-dark-gray">Ingat saya</span>
                            </label>
                        </div>

                        {{-- Submit --}}
                        <button type="submit"
                                class="w-full flex items-center justify-center gap-2 px-6 py-3.5 bg-rose-gold text-white font-semibold rounded-xl hover:bg-rose-gold-dark transition-all duration-300 hover:shadow-lg hover:shadow-rose-gold/25 active:scale-[0.98]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                            Masuk
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Back link --}}
        <div class="text-center mt-6">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-1.5 text-sm text-white/50 hover:text-white/80 transition-colors">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Website
            </a>
        </div>
    </div>

</body>
</html>
