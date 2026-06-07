@props([
    'eyebrow' => null,
    'title' => '',
    'description' => null,
    'align' => 'left',
    'tone' => 'dark',
])

@php
    $isCentered = $align === 'center';
    $titleClass = $tone === 'light' ? 'text-white' : 'text-slate-950';
    $copyClass = $tone === 'light' ? 'text-white/74' : 'text-slate-600';
@endphp

<div {{ $attributes->class([$isCentered ? 'mx-auto max-w-3xl text-center' : '']) }}>
    @if ($eyebrow)
        <span class="theme-chip {{ $isCentered ? 'mx-auto' : '' }}">
            {{ $eyebrow }}
        </span>
    @endif

    <h2 class="mt-4 font-display text-3xl font-semibold tracking-tight sm:text-4xl {{ $titleClass }}">
        {{ $title }}
    </h2>

    @if ($description)
        <p class="mt-4 text-base leading-7 sm:text-lg {{ $copyClass }}">
            {{ $description }}
        </p>
    @endif
</div>
