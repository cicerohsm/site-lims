@php
    $tones = ['tone-lims-blue', 'tone-lims-red', 'tone-lims-green'];
@endphp

<x-layouts.app :meta="$meta" :page-key="$pageKey" :theme-key="$themeKey">

    {{-- HERO --}}
    <section class="tone-lims-red px-4 sm:px-6 lg:px-8">
        <div class="hero-shell mx-auto max-w-7xl rounded-[32px] px-8 py-20 sm:px-12 lg:px-16">
            <span class="theme-chip theme-chip--light">Tecnologias</span>
            <h1 class="mt-6 max-w-3xl font-display text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                A base técnica que sustenta nossos projetos.
            </h1>
            <p class="mt-6 max-w-2xl text-base leading-8 text-white/76 sm:text-lg">
                O LIMS atua em frentes que combinam software, hardware, pesquisa e inovação social — cada uma com forte impacto na comunidade.
            </p>
        </div>
    </section>

    {{-- GRID DE TECNOLOGIAS --}}
    <section class="section-shell tone-lims-blue px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <x-site.section-heading
                eyebrow="Frentes técnicas"
                title="Áreas de atuação do laboratório"
                description="As tecnologias e frentes de pesquisa usadas em projetos, experimentos e publicações do LIMS."
            />
            @if ($technologies->isNotEmpty())
                <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($technologies as $technology)
                        <div class="{{ $tones[$loop->index % 3] }}">
                            <x-lims.technology-card :technology="$technology" />
                        </div>
                    @endforeach
                </div>
            @else
                <div class="mt-10 tone-lims-blue">
                    <div class="info-card">
                        <h2 class="font-display text-xl font-semibold tracking-tight text-slate-950">Frentes tecnológicas em atualização</h2>
                        <p class="mt-3 text-sm leading-7 text-slate-600">As áreas de atuação aparecerão aqui assim que forem cadastradas pela equipe do LIMS.</p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    {{-- CTA --}}
    <section class="section-shell tone-lims-green px-4 pb-6 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="spotlight-panel rounded-[2rem] p-8 sm:p-12">
                <div class="max-w-2xl">
                    <span class="theme-chip theme-chip--light">Pesquisa aplicada</span>
                    <h2 class="mt-5 font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                        Tecnologia com propósito social.
                    </h2>
                    <p class="mt-4 text-base leading-8 text-white/74">
                        Cada frente técnica do LIMS nasce de uma necessidade real. Nossas pesquisas buscam resolver problemas concretos da comunidade — de acessibilidade a sustentabilidade, passando por educação e automação.
                    </p>
                    <div class="mt-6">
                        <x-site.button :href="route('projects')" variant="light">Ver projetos</x-site.button>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>
