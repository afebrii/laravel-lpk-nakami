<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- SEO Meta --}}
    <title>@yield('title', setting('seo_meta_title', 'LKP/LPK Yuwita'))</title>
    <meta name="description" content="@yield('meta_description', setting('seo_meta_description', ''))">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph --}}
    <meta property="og:title" content="@yield('title', setting('seo_meta_title', 'LKP/LPK Yuwita'))">
    <meta property="og:description" content="@yield('meta_description', setting('seo_meta_description', ''))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="@yield('og_image', '')">

    {{-- CSRF --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Favicon --}}
    @if(setting('site_favicon'))
        <link rel="icon" href="{{ asset('storage/' . setting('site_favicon')) }}">
    @endif

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="bg-soft-cream text-dark-gray font-body min-h-screen flex flex-col antialiased">

    {{-- Navbar --}}
    @include('layouts.partials.navbar')

    {{-- Flash Messages / Toast --}}
    @include('layouts.partials.toast')

    {{-- Page Content --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.partials.footer')

    {{-- WhatsApp Floating Button --}}
    @include('layouts.partials.whatsapp-button')

    @stack('scripts')
</body>
</html>
