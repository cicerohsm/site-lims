<x-layouts.app :meta="$meta" :page-key="$pageKey" :theme-key="$themeKey">

    <section class="tone-lims-blue px-4 sm:px-6 lg:px-8">
        <div class="hero-shell mx-auto max-w-7xl rounded-[32px] px-8 py-20 sm:px-12 lg:px-16">
            <span class="theme-chip theme-chip--light">Publicações</span>
            <h1 class="mt-6 max-w-3xl font-display text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                Produção científica do laboratório.
            </h1>
            <p class="mt-6 max-w-2xl text-base leading-8 text-white/76 sm:text-lg">
                Artigos, TCCs, trabalhos em congressos e demais publicações produzidas pelos membros do LIMS.
            </p>
        </div>
    </section>

    {{-- FILTROS --}}
    <section class="tone-lims-blue px-4 pt-6 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <form method="GET" action="{{ route('publications.index') }}" class="flex flex-wrap gap-3 items-end">
                <div>
                    <label class="block text-xs font-medium text-slate-500 mb-1">Tipo</label>
                    <select name="type" class="rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-sm text-slate-700 focus:outline-none">
                        <option value="">Todos</option>
                        @foreach (['article' => 'Artigo', 'tcc' => 'TCC', 'conference' => 'Congresso', 'book' => 'Livro', 'other' => 'Outro'] as $v => $l)
                            <option value="{{ $v }}" @selected($type === $v)>{{ $l }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-500 mb-1">Ano</label>
                    <input type="number" name="year" value="{{ $year }}" placeholder="Ex: 2024" min="2000" max="2100"
                           class="w-28 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-sm text-slate-700 focus:outline-none">
                </div>
                <button type="submit" class="rounded-lg bg-slate-800 px-4 py-1.5 text-sm font-medium text-white hover:bg-slate-700 transition-colors">Filtrar</button>
                @if ($type || $year)
                    <a href="{{ route('publications.index') }}" class="text-sm text-slate-500 hover:text-slate-700">Limpar</a>
                @endif
            </form>
        </div>
    </section>

    {{-- LISTA --}}
    <section class="section-shell tone-lims-blue px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            @if ($publications->isEmpty())
                <p class="text-center text-slate-500 py-16">Nenhuma publicação encontrada.</p>
            @else
                <div class="space-y-4">
                    @foreach ($publications as $pub)
                        <div class="{{ ['tone-lims-blue', 'tone-lims-red', 'tone-lims-green'][$loop->index % 3] }}">
                            <article class="info-card" style="border-color: var(--theme-border);">
                                <div class="flex items-start justify-between gap-4">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="theme-chip capitalize">{{ $pub->type }}</span>
                                            <span class="text-xs text-slate-400">{{ $pub->year }}</span>
                                        </div>
                                        <h2 class="font-display text-base font-semibold tracking-tight text-slate-950">{{ $pub->title }}</h2>
                                        <p class="mt-1 text-sm text-slate-500">{{ $pub->authors }}</p>
                                        @if ($pub->venue)
                                            <p class="mt-1 text-xs text-slate-400 italic">{{ $pub->venue }}</p>
                                        @endif
                                        @if ($pub->abstract)
                                            <p class="mt-2 text-sm leading-7 text-slate-600 line-clamp-3">{{ $pub->abstract }}</p>
                                        @endif
                                    </div>
                                    @if ($pub->url || $pub->doi)
                                        <a href="{{ $pub->url ?? 'https://doi.org/' . $pub->doi }}" target="_blank" rel="noopener"
                                           class="shrink-0 rounded-lg border border-[color:var(--theme-border)] px-3 py-1.5 text-xs font-medium text-[color:var(--theme-accent)] hover:bg-[color:var(--theme-soft)] transition-colors">
                                            Ver publicação →
                                        </a>
                                    @endif
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8">{{ $publications->links() }}</div>
            @endif
        </div>
    </section>

</x-layouts.app>
