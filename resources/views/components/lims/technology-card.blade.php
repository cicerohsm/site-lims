@props(['technology', 'compact' => false])

@php
    $icons = [
        'code' => '<path d="M16 18l6-6-6-6M8 6l-6 6 6 6"/>',
        'monitor' => '<rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/>',
        'network' => '<circle cx="12" cy="5" r="2"/><path d="M12 7v5M6 10h12M9 10v6M15 10v6"/>',
        'wifi' => '<path d="M5 12.55a11 11 0 0 1 14.08 0"/><path d="M1.42 9a16 16 0 0 1 21.16 0"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0"/><circle cx="12" cy="20" r="1"/>',
        'cube' => '<path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><line x1="3.27" y1="6.96" x2="12" y2="12.01"/><line x1="12" y1="22.08" x2="12" y2="12"/>',
        'education' => '<path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>',
        'list' => '<path d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>',
        'chip' => '<rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><path d="M9 1v3M15 1v3M9 20v3M15 20v3M1 9h3M1 15h3M20 9h3M20 15h3"/>',
    ];
@endphp

@if ($compact)
    <span class="inline-flex items-center gap-2 rounded-full border border-[color:var(--theme-border)] bg-[color:var(--theme-soft)] px-4 py-2 text-sm font-semibold text-[color:var(--theme-accent-strong)]">
        <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            {!! $icons[$technology->icon] ?? $icons['code'] !!}
        </svg>
        {{ $technology->title }}
    </span>
@else
    <article class="info-card h-full" style="background: linear-gradient(135deg, var(--theme-soft) 0%, #fff 100%); border-color: var(--theme-border);">
        <div class="credential-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                {!! $icons[$technology->icon] ?? $icons['code'] !!}
            </svg>
        </div>
        <h3 class="mt-4 font-display text-lg font-semibold tracking-tight text-slate-950">{{ $technology->title }}</h3>
        <p class="mt-2 text-sm leading-7 text-slate-600">{{ $technology->description ?: 'Frente aplicada em projetos, estudos, experimentos e documentação técnica do LIMS.' }}</p>
    </article>
@endif
