<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'LIMS'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-slate-900 antialiased">
        <div class="min-h-screen flex flex-col items-center justify-center bg-slate-50 px-4 py-10">
            <div class="w-full max-w-md rounded-2xl border border-slate-200 bg-white px-6 py-6 shadow-xl shadow-slate-900/8">
                <div class="mb-8 text-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center justify-center">
                        <img src="{{ asset(config('site.lims.logo')) }}" alt="LIMS" class="h-24 w-auto">
                    </a>
                    <p class="mt-3 text-sm font-medium text-slate-500">Laboratório de Inovação em Sistemas Multimídia</p>
                </div>

                {{ $slot }}
            </div>
        </div>
    </body>
</html>
