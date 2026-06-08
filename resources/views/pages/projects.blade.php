<x-layouts.app :meta="$meta" :page-key="$pageKey" :theme-key="$themeKey">

    {{-- HERO --}}
    <section class="tone-lims-red px-4 sm:px-6 lg:px-8">
        <div class="hero-shell mx-auto max-w-7xl rounded-[32px] px-8 py-20 sm:px-12 lg:px-16">
            <span class="theme-chip theme-chip--light">Projetos</span>
            <h1 class="mt-6 max-w-3xl font-display text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                Pesquisa aplicada que vira produto real.
            </h1>
            <p class="mt-6 max-w-2xl text-base leading-8 text-white/76 sm:text-lg">
                Conheça os trabalhos desenvolvidos pelo LIMS em acessibilidade, IoT, sustentabilidade e educação STEAM — da ideia ao protótipo.
            </p>
        </div>
    </section>

    {{-- MÉTRICAS --}}
    <section class="section-shell tone-lims-blue px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-4 sm:grid-cols-3">
                <article class="info-card" data-reveal>
                    <p class="text-xs font-bold uppercase tracking-widest text-[color:var(--theme-accent)]">Projetos</p>
                    <p class="mt-2 font-display text-5xl font-semibold tracking-tight text-slate-950">{{ $featuredPublications->count() }}</p>
                    <p class="mt-2 text-sm leading-6 text-slate-500">trabalhos destacados por publicações cadastradas</p>
                </article>
                <article class="info-card">
                    <p class="text-xs font-bold uppercase tracking-widest text-[color:var(--theme-accent)]">Áreas cobertas</p>
                    <p class="mt-2 font-display text-5xl font-semibold tracking-tight text-slate-950">4</p>
                    <p class="mt-2 text-sm leading-6 text-slate-500">frentes: assistiva, IoT, STEAM e sustentabilidade</p>
                </article>
                <article class="info-card">
                    <p class="text-xs font-bold uppercase tracking-widest text-[color:var(--theme-accent)]">Entrega</p>
                    <p class="mt-2 font-display text-5xl font-semibold tracking-tight text-slate-950">Real</p>
                    <p class="mt-2 text-sm leading-6 text-slate-500">artigos científicos, TCCs e protótipos funcionais</p>
                </article>
            </div>
        </div>
    </section>

    {{-- GRID DE PROJETOS --}}
    <section class="section-shell tone-lims-red px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="flex flex-col justify-between gap-4 md:flex-row md:items-end">
                <x-site.section-heading
                    eyebrow="Publicações"
                    title="Trabalhos em destaque"
                    description="Produções acadêmicas cadastradas pela equipe do LIMS."
                />
                <x-site.button :href="route('publications.index')" variant="secondary" size="sm">Ver publicações</x-site.button>
            </div>

            @if ($featuredPublications->isNotEmpty())
                <div class="mt-8 grid gap-5 md:grid-cols-2 xl:grid-cols-4">
                    @foreach ($featuredPublications as $publication)
                        <div class="{{ ['tone-lims-blue', 'tone-lims-red', 'tone-lims-green', 'tone-lims-blue'][$loop->index % 4] }}">
                            <x-lims.publication-feature-card :publication="$publication" />
                        </div>
                    @endforeach
                </div>
            @else
                <div class="mt-8 rounded-3xl border border-dashed border-slate-200 bg-white/80 p-8 text-center text-slate-500">
                    <h3 class="font-display text-2xl font-semibold tracking-tight text-slate-950">Trabalhos em atualização</h3>
                    <p class="mt-3 text-sm leading-6">As publicações em destaque serão exibidas aqui assim que forem cadastradas pela equipe.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- CTA --}}
    <section class="section-shell tone-lims-green px-4 pb-6 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="spotlight-panel rounded-[2rem] p-8 sm:p-12">
                <div class="max-w-2xl">
                    <span class="theme-chip theme-chip--light">Participe</span>
                    <h2 class="mt-5 font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                        Quer desenvolver um projeto no LIMS?
                    </h2>
                    <p class="mt-4 text-base leading-8 text-white/74">
                        O laboratório está sempre aberto a novos pesquisadores, bolsistas e parceiros. Se você tem uma ideia, uma demanda ou quer participar de uma das frentes ativas, entre em contato com a equipe.
                    </p>
                    <div class="mt-6">
                        <x-site.button :href="route('contact.show')" variant="light">Fale conosco</x-site.button>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>
