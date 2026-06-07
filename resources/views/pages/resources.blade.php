<x-layouts.app :meta="$meta" :page-key="$pageKey" :theme-key="$themeKey">

    <section class="tone-lims-red px-4 sm:px-6 lg:px-8">
        <div class="hero-shell mx-auto max-w-7xl rounded-[32px] px-8 py-20 sm:px-12 lg:px-16">
            <span class="theme-chip theme-chip--light">Recursos</span>
            <h1 class="mt-6 max-w-3xl font-display text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                Ferramentas e materiais do LIMS.
            </h1>
            <p class="mt-6 max-w-2xl text-base leading-8 text-white/76 sm:text-lg">
                Datasets, templates, ferramentas e materiais educacionais disponibilizados pelo laboratório.
            </p>
        </div>
    </section>

    {{-- FILTROS --}}
    <section class="tone-lims-red px-4 pt-6 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <form method="GET" action="{{ route('resources.index') }}" class="flex flex-wrap gap-3 items-end">
                <div>
                    <label class="block text-xs font-medium text-slate-500 mb-1">Tipo</label>
                    <select name="type" class="rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-sm text-slate-700 focus:outline-none">
                        <option value="">Todos</option>
                        @foreach (['tool' => 'Ferramenta', 'material' => 'Material', 'dataset' => 'Dataset', 'template' => 'Template', 'other' => 'Outro'] as $v => $l)
                            <option value="{{ $v }}" @selected($type === $v)>{{ $l }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="rounded-lg bg-slate-800 px-4 py-1.5 text-sm font-medium text-white hover:bg-slate-700 transition-colors">Filtrar</button>
                @if ($type)
                    <a href="{{ route('resources.index') }}" class="text-sm text-slate-500 hover:text-slate-700">Limpar</a>
                @endif
            </form>
        </div>
    </section>

    {{-- GRID --}}
    <section class="section-shell tone-lims-red px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            @if ($resources->isEmpty())
                <p class="text-center text-slate-500 py-16">Nenhum recurso encontrado.</p>
            @else
                <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($resources as $resource)
                        <div class="{{ ['tone-lims-blue', 'tone-lims-red', 'tone-lims-green'][$loop->index % 3] }}">
                            <article class="info-card flex h-full flex-col" style="border-color: var(--theme-border);">
                                <div class="flex items-start justify-between gap-2 mb-3">
                                    <span class="theme-chip capitalize">{{ $resource->type }}</span>
                                </div>
                                <h2 class="font-display text-lg font-semibold tracking-tight text-slate-950">{{ $resource->title }}</h2>
                                @if ($resource->description)
                                    <p class="mt-2 flex-1 text-sm leading-7 text-slate-600">{{ $resource->description }}</p>
                                @endif
                                <div class="mt-4 flex gap-3">
                                    @if ($resource->url)
                                        <a href="{{ $resource->url }}" target="_blank" rel="noopener"
                                           class="text-sm font-semibold text-[color:var(--theme-accent)] hover:underline">
                                            Acessar →
                                        </a>
                                    @endif
                                    @if ($resource->file_path)
                                        <a href="{{ Storage::url($resource->file_path) }}" target="_blank"
                                           class="text-sm font-semibold text-[color:var(--theme-accent)] hover:underline">
                                            Download →
                                        </a>
                                    @endif
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8">{{ $resources->links() }}</div>
            @endif
        </div>
    </section>

</x-layouts.app>
