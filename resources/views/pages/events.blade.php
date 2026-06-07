@php
    $events = config('site.lims.events');
@endphp

<x-layouts.app :meta="$meta" :page-key="$pageKey" :theme-key="$themeKey">

    {{-- HERO --}}
    <section class="tone-lims-green px-4 sm:px-6 lg:px-8">
        <div class="hero-shell mx-auto max-w-7xl rounded-[32px] px-8 py-20 sm:px-12 lg:px-16">
            <span class="theme-chip theme-chip--light">Eventos</span>
            <h1 class="mt-6 max-w-3xl font-display text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                Presença ativa na comunidade tecnológica do Piauí.
            </h1>
            <p class="mt-6 max-w-2xl text-base leading-8 text-white/76 sm:text-lg">
                O LIMS leva suas produções para além dos muros do IFPI através de seminários, mostras científicas e o Teresina INFO.
            </p>
        </div>
    </section>

    {{-- GRID DE EVENTOS --}}
    <section class="section-shell tone-lims-blue px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <x-site.section-heading
                eyebrow="Registros"
                title="Eventos e participações do LIMS"
                description="Apresentações, oficinas, mostras e ações de extensão que conectam o laboratório à comunidade."
            />
            <div class="mt-10 grid gap-5 md:grid-cols-2 xl:grid-cols-4">
                @foreach ($events as $event)
                    <div class="{{ ['tone-lims-blue', 'tone-lims-red', 'tone-lims-green', 'tone-lims-blue'][$loop->index % 4] }}">
                        <article class="info-card overflow-hidden p-0 h-full" style="border-color: var(--theme-border);">
                            <img src="{{ asset($event['image']) }}" alt="{{ $event['name'] }}" class="h-48 w-full object-cover">
                            <div class="p-5">
                                <div class="flex items-center justify-between gap-3">
                                    <span class="theme-chip">{{ $event['date'] }}</span>
                                    <span class="text-xs font-bold uppercase tracking-[0.16em] text-slate-500">{{ $event['type'] }}</span>
                                </div>
                                <h2 class="mt-4 font-display text-xl font-semibold tracking-tight text-slate-950">{{ $event['name'] }}</h2>
                                <p class="mt-3 text-sm leading-7 text-slate-600">{{ $event['description'] }}</p>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- TERESINA INFO CALLOUT --}}
    <section class="section-shell tone-lims-red px-4 pb-6 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="spotlight-panel rounded-[2rem] p-8 sm:p-12">
                <div class="grid gap-8 lg:grid-cols-[1.3fr,0.7fr] lg:items-center">
                    <div>
                        <span class="theme-chip theme-chip--light">Extensão e Comunidade</span>
                        <h2 class="mt-5 font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                            O Teresina INFO
                        </h2>
                        <p class="mt-4 max-w-xl text-base leading-8 text-white/74">
                            O LIMS é o idealizador e motor do Teresina INFO — Encontro de Informática de Teresina. Através de palestras, minicursos e exposições de projetos, o evento dissemina as produções do laboratório e fortalece o networking entre estudantes, academia e o polo tecnológico da nossa região.
                        </p>
                        <div class="mt-6">
                            <x-site.button :href="route('contact.show')" variant="light">Participar do próximo evento</x-site.button>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4">
                        <div class="metric-card">
                            <p class="metric-card__label">Canal oficial de extensão do LIMS com a comunidade</p>
                            <p class="metric-card__value">Teresina INFO</p>
                        </div>
                        <div class="metric-card">
                            <p class="metric-card__label">Palestras, minicursos e exposições abertas ao público</p>
                            <p class="metric-card__value">Formato Aberto</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>
