@php
    $team = config('site.lims.team');
@endphp

<x-layouts.app :meta="$meta" :page-key="$pageKey" :theme-key="$themeKey">

    {{-- HERO --}}
    <section class="tone-lims-blue px-4 sm:px-6 lg:px-8">
        <div class="hero-shell mx-auto max-w-7xl rounded-[32px] px-8 py-20 sm:px-12 lg:px-16">
            <span class="theme-chip theme-chip--light">Time</span>
            <h1 class="mt-6 max-w-3xl font-display text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                Pessoas que fazem a inovação acontecer.
            </h1>
            <p class="mt-6 max-w-2xl text-base leading-8 text-white/76 sm:text-lg">
                O LIMS é movido por estudantes, pesquisadores e professores do IFPI que transformam curiosidade em projetos com impacto real.
            </p>
        </div>
    </section>

    {{-- EQUIPE --}}
    <section class="section-shell tone-lims-red px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <x-site.section-heading
                eyebrow="Equipe"
                title="Quem compõe o LIMS"
                description="Clique em cada participante para abrir uma breve descrição do seu papel no laboratório."
            />
            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($team as $member)
                    <div class="{{ ['tone-lims-blue', 'tone-lims-red', 'tone-lims-green'][$loop->index % 3] }}">
                        <x-lims.member-card :member="$member" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- COMO PARTICIPAR --}}
    <section class="section-shell tone-lims-green px-4 pb-6 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <x-site.section-heading
                eyebrow="Faça parte"
                title="Como entrar para o LIMS"
                description="O laboratório é aberto a alunos de cursos técnicos e superiores do IFPI que queiram colocar a mão na massa."
            />
            <div class="mt-10 grid gap-5 sm:grid-cols-3">

                <div class="tone-lims-blue">
                    <article class="info-card h-full" style="background: linear-gradient(135deg, var(--theme-soft) 0%, #fff 100%); border-color: var(--theme-border);">
                        <div class="credential-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="12" cy="8" r="4"/>
                                <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
                            </svg>
                        </div>
                        <h3 class="mt-4 font-display text-lg font-semibold tracking-tight text-slate-950">Seja aluno do IFPI</h3>
                        <p class="mt-2 text-sm leading-7 text-slate-600">A participação é voltada a discentes dos cursos técnicos e superiores do Campus Teresina Central.</p>
                    </article>
                </div>

                <div class="tone-lims-red">
                    <article class="info-card h-full" style="background: linear-gradient(135deg, var(--theme-soft) 0%, #fff 100%); border-color: var(--theme-border);">
                        <div class="credential-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                            </svg>
                        </div>
                        <h3 class="mt-4 font-display text-lg font-semibold tracking-tight text-slate-950">Demonstre interesse</h3>
                        <p class="mt-2 text-sm leading-7 text-slate-600">Entre em contato com a coordenação do laboratório apresentando seus interesses e disponibilidade.</p>
                    </article>
                </div>

                <div class="tone-lims-green">
                    <article class="info-card h-full" style="background: linear-gradient(135deg, var(--theme-soft) 0%, #fff 100%); border-color: var(--theme-border);">
                        <div class="credential-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h3 class="mt-4 font-display text-lg font-semibold tracking-tight text-slate-950">Comece a contribuir</h3>
                        <p class="mt-2 text-sm leading-7 text-slate-600">Você será integrado a um projeto ativo onde poderá aprender, pesquisar e gerar entregas reais.</p>
                    </article>
                </div>

            </div>
            <div class="mt-6 flex justify-center">
                <x-site.button :href="route('contact.show')" variant="secondary">Fale com a coordenação</x-site.button>
            </div>
        </div>
    </section>

</x-layouts.app>
