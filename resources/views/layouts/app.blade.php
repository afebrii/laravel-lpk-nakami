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
    <meta property="og:locale" content="id_ID">
    <meta property="og:site_name" content="{{ setting('site_name', 'LKP/LPK Yuwita') }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', setting('seo_meta_title', 'LKP/LPK Yuwita'))">
    <meta name="twitter:description" content="@yield('meta_description', setting('seo_meta_description', ''))">

    {{-- CSRF --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Favicon --}}
    @if(setting('site_favicon'))
        <link rel="icon" href="{{ asset('storage/' . setting('site_favicon')) }}">
    @endif

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- JSON-LD Schema --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "EducationalOrganization",
        "name": "{{ setting('site_name', 'LKP/LPK Yuwita') }}",
        "description": "{{ setting('seo_meta_description', '') }}",
        "url": "{{ url('/') }}",
        "telephone": "{{ setting('contact_phone', '') }}",
        "email": "{{ setting('contact_email', '') }}",
        "address": {
            "@@type": "PostalAddress",
            "streetAddress": "{{ setting('contact_address', '') }}",
            "addressLocality": "Tasikmalaya",
            "addressRegion": "Jawa Barat",
            "addressCountry": "ID"
        },
        "sameAs": [
            "{{ setting('social_facebook', '') }}",
            "{{ setting('social_instagram', '') }}",
            "{{ setting('social_youtube', '') }}",
            "{{ setting('social_tiktok', '') }}"
        ]
    }
    </script>

    {{-- Google Analytics --}}
    @if(setting('seo_google_analytics'))
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ setting('seo_google_analytics') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ setting('seo_google_analytics') }}');
    </script>
    @endif

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
    @if(empty($hide_whatsapp))
        @include('layouts.partials.whatsapp-button')
    @endif

    @stack('scripts')
</body>
</html>
