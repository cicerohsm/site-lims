@props([
    'href' => null,
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
    'external' => false,
])

@php
    $baseClasses = 'inline-flex items-center justify-center gap-2 rounded-full font-semibold whitespace-nowrap transition duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-offset-white';
    $sizeClasses = [
        'sm' => 'px-4 py-2.5 text-sm',
        'md' => 'px-6 py-3 text-sm sm:text-base',
        'lg' => 'px-7 py-3.5 text-base',
    ][$size] ?? 'px-6 py-3 text-sm sm:text-base';
    $variantClasses = [
        'primary' => 'bg-[color:var(--theme-accent)] text-white shadow-lg shadow-slate-900/10 hover:-translate-y-0.5 hover:bg-[color:var(--theme-accent-strong)] focus-visible:ring-[color:var(--theme-accent)]',
        'secondary' => 'border border-[color:var(--theme-border)] bg-white/80 text-slate-900 hover:border-[color:var(--theme-accent)] hover:text-[color:var(--theme-accent)] focus-visible:ring-[color:var(--theme-accent)]',
        'light' => 'bg-white text-slate-950 shadow-lg shadow-slate-900/10 hover:-translate-y-0.5 hover:bg-slate-100 focus-visible:ring-white',
        'ghost' => 'text-white/80 hover:text-white focus-visible:ring-white',
        'soft' => 'bg-[color:var(--theme-soft)] text-[color:var(--theme-accent-strong)] hover:bg-white focus-visible:ring-[color:var(--theme-accent)]',
    ][$variant] ?? 'bg-[color:var(--theme-accent)] text-white shadow-lg shadow-slate-900/10 hover:-translate-y-0.5 hover:bg-[color:var(--theme-accent-strong)] focus-visible:ring-[color:var(--theme-accent)]';
@endphp

@if ($href)
    <a
        href="{{ $href }}"
        @if ($external) target="_blank" rel="noreferrer noopener" @endif
        {{ $attributes->merge(['class' => "{$baseClasses} {$sizeClasses} {$variantClasses}"]) }}
    >
        <span>{{ $slot }}</span>
        <svg aria-hidden="true" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
            <path fill-rule="evenodd" d="M3.75 10a.75.75 0 0 1 .75-.75h9.69L10.22 5.28a.75.75 0 1 1 1.06-1.06l5.25 5.25a.75.75 0 0 1 0 1.06l-5.25 5.25a.75.75 0 1 1-1.06-1.06l3.97-3.97H4.5a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
        </svg>
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => "{$baseClasses} {$sizeClasses} {$variantClasses}"]) }}>
        <span>{{ $slot }}</span>
        <svg aria-hidden="true" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
            <path fill-rule="evenodd" d="M3.75 10a.75.75 0 0 1 .75-.75h9.69L10.22 5.28a.75.75 0 1 1 1.06-1.06l5.25 5.25a.75.75 0 0 1 0 1.06l-5.25 5.25a.75.75 0 1 1-1.06-1.06l3.97-3.97H4.5a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
        </svg>
    </button>
@endif
