@props([
    'meta' => [],
    'pageKey' => 'home',
    'themeKey' => 'group',
])

@php
    $theme = config("site.themes.{$themeKey}", config('site.themes.group'));
    $company = config('site.company');
    $meta = array_merge([
        'title' => $company['name'],
        'description' => $company['description'],
    ], $meta);
    $currentUrl = url()->current();
    $ogImage = asset('assets/brands/lims-logo.svg');
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $meta['title'] }}</title>
        <meta name="description" content="{{ $meta['description'] }}">
        <meta name="theme-color" content="{{ $theme['accent'] }}">
        <meta property="og:locale" content="pt_BR">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $meta['title'] }}">
        <meta property="og:description" content="{{ $meta['description'] }}">
        <meta property="og:url" content="{{ $currentUrl }}">
        <meta property="og:site_name" content="{{ $company['name'] }}">
        <meta property="og:image" content="{{ $ogImage }}">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $meta['title'] }}">
        <meta name="twitter:description" content="{{ $meta['description'] }}">
        <meta name="twitter:image" content="{{ $ogImage }}">
        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.svg') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body
        class="min-h-full bg-slate-50 text-slate-900 antialiased"
        style="
            --theme-accent: {{ $theme['accent'] }};
            --theme-accent-strong: {{ $theme['accent_strong'] }};
            --theme-soft: {{ $theme['soft'] }};
            --theme-surface: {{ $theme['surface'] }};
            --theme-border: {{ $theme['border'] }};
            --theme-gradient-from: {{ $theme['gradient_from'] }};
            --theme-gradient-to: {{ $theme['gradient_to'] }};
        "
    >
        <a
            href="#conteudo"
            class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-[60] focus:rounded-full focus:bg-white focus:px-4 focus:py-2 focus:text-sm focus:font-semibold focus:text-slate-950"
        >
            Pular para o conteúdo
        </a>

        <div class="relative min-h-screen overflow-hidden">
            <div class="site-backdrop" aria-hidden="true"></div>

            <x-site.header :page-key="$pageKey" :theme-key="$themeKey" />

            <main id="conteudo" class="relative z-10 pt-28 sm:pt-32">
                {{ $slot }}
            </main>

            <x-site.footer :theme-key="$themeKey" />
        </div>
    </body>
</html>
