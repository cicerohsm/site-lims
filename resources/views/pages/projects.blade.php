@php
    $projects = config('site.lims.projects');
@endphp

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
                    <p class="mt-2 font-display text-5xl font-semibold tracking-tight text-slate-950">{{ count($projects) }}+</p>
                    <p class="mt-2 text-sm leading-6 text-slate-500">trabalhos ativos ou concluídos pelo laboratório</p>
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
            <x-site.section-heading
                eyebrow="Portfólio"
                title="Trabalhos em destaque"
                description="Cada projeto reúne equipe, objetivo, evento de apresentação e entrega acadêmica ou produto funcional."
            />
            <div class="mt-10 grid gap-5 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($projects as $project)
                    <div class="{{ ['tone-lims-blue', 'tone-lims-red', 'tone-lims-green'][$loop->index % 3] }}">
                        <x-lims.project-card :project="$project" />
                    </div>
                @endforeach
            </div>
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
