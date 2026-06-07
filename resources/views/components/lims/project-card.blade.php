@props(['project'])

<article class="info-card flex h-full flex-col">
    <div class="flex items-start justify-between gap-4">
        <span class="theme-chip">{{ $project['year'] }}</span>
        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-500">{{ $project['event'] }}</span>
    </div>
    <h3 class="mt-5 font-display text-2xl font-semibold tracking-tight text-slate-950">{{ $project['name'] }}</h3>
    <p class="mt-3 text-sm font-semibold text-[color:var(--theme-accent-strong)]">{{ $project['responsible'] }}</p>
    <p class="mt-4 flex-1 text-sm leading-7 text-slate-600">{{ $project['description'] }}</p>
    <p class="mt-5 border-t border-slate-200 pt-4 text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">{{ $project['article'] }}</p>
</article>
