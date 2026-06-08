@props(['publication'])

@php
    $typeLabels = [
        'article' => 'Artigo',
        'tcc' => 'TCC',
        'conference' => 'Congresso',
        'book' => 'Livro',
        'other' => 'Outro',
    ];
@endphp

<article class="info-card flex h-full flex-col">
    <div class="flex items-start justify-between gap-4">
        <span class="theme-chip">{{ $publication->year }}</span>
        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-500">{{ $typeLabels[$publication->type] ?? $publication->type }}</span>
    </div>
    <h3 class="mt-5 font-display text-xl font-semibold tracking-tight text-slate-950">{{ $publication->title }}</h3>
    <p class="mt-3 text-sm font-semibold text-[color:var(--theme-accent-strong)]">{{ $publication->authors }}</p>
    @if ($publication->abstract)
        <p class="mt-4 flex-1 text-sm leading-7 text-slate-600">{{ Str::limit($publication->abstract, 150) }}</p>
    @endif
    <div class="mt-5 border-t border-slate-200 pt-4">
        @if ($publication->venue)
            <p class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">{{ $publication->venue }}</p>
        @endif
        @if ($publication->url || $publication->doi)
            <a href="{{ $publication->url ?? 'https://doi.org/' . $publication->doi }}" target="_blank" rel="noopener" class="mt-3 inline-flex text-sm font-semibold text-[color:var(--theme-accent-strong)] hover:underline">
                Ver publicação
            </a>
        @endif
    </div>
</article>
