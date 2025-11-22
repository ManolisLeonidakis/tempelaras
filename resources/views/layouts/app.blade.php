<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- SEO Meta Tags -->
        <title>@yield('title', config('app.name', 'Vres Mastora - Βρείτε τον Ιδανικό Επαγγελματία'))</title>
        <meta name="description" content="@yield('description', 'Συνδέστε με έμπειρους επαγγελματίες σε όλη την Ελλάδα. Βρείτε υδραυλικούς, ηλεκτρολόγους και άλλους ειδικευμένους τεχνίτες για τις εργασίες σας.')">
        <meta name="keywords" content="@yield('keywords', 'επαγγελματίες, υδραυλικοί, ηλεκτρολόγοι, τεχνίτες, Ελλάδα, υπηρεσίες, εργασίες')">
        <meta name="author" content="Vres Mastora">
        <meta name="robots" content="@yield('robots', 'index, follow')">
        <meta name="google-site-verification" content="jMLtgtiQCZOHlgRPK8F-VuOTe6bFVygVcXWBQ68SKfo" />

        <!-- Canonical URL -->
        <link rel="canonical" href="@yield('canonical', url()->current())">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="@yield('og_type', 'website')">
        <meta property="og:url" content="@yield('og_url', url()->current())">
        <meta property="og:title" content="@yield('og_title', config('app.name', 'Vres Mastora - Βρείτε τον Ιδανικό Επαγγελματία'))">
        <meta property="og:description" content="@yield('og_description', 'Συνδέστε με έμπειρους επαγγελματίες σε όλη την Ελλάδα. Βρείτε υδραυλικούς, ηλεκτρολόγους και άλλους ειδικευμένους τεχνίτες για τις εργασίες σας.')">
        <meta property="og:image" content="@yield('og_image', asset('images/og-default.jpg'))">
        <meta property="og:site_name" content="Vres Mastora">
        <meta property="og:locale" content="el_GR">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="@yield('twitter_title', config('app.name', 'Vres Mastora - Βρείτε τον Ιδανικό Επαγγελματία'))">
        <meta name="twitter:description" content="@yield('twitter_description', 'Συνδέστε με έμπειρους επαγγελματίες σε όλη την Ελλάδα. Βρείτε υδραυλικούς, ηλεκτρολόγους και άλλους ειδικευμένους τεχνίτες για τις εργασίες σας.')">
        <meta name="twitter:image" content="@yield('twitter_image', asset('images/twitter-default.jpg'))">

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="/favicons/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="/favicons/favicon.svg" />
        <link rel="shortcut icon" href="/favicons/favicon.ico" />
        <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png" />
        <meta name="apple-mobile-web-app-title" content="Fixado" />
        <link rel="manifest" href="/favicons/site.webmanifest" />

        @stack('head')

        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('consent', 'default', {
                'ad_storage': 'denied',
                'ad_user_data': 'denied',
                'ad_personalization': 'denied',
                'analytics_storage': 'denied',
                'functionality_storage': 'denied'
            });
        </script>

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <x-header />

        @yield('content')

        <x-footer />

        @stack('scripts')
        <!-- Cookie Banner -->
        <x-cookie-banner />
    </body>
</html>
