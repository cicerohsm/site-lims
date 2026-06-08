@php
    $lims = config('site.lims');
@endphp

<x-layouts.app :meta="$meta" :page-key="$pageKey" :theme-key="$themeKey">
    <section class="px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl px-6 py-10 sm:px-10 lg:px-12">
            <div class="hero-grid items-center">
                <div class="relative z-10 max-w-3xl">
                    <span class="font-sans text-7xl font-black tracking-tighter text-white sm:text-8xl lg:text-9xl">LIMS</span>
                    <h1 class="mt-6 font-display text-3xl font-semibold tracking-tight text-white sm:text-5xl lg:text-white">
                        Laboratório de Inovação em Sistemas Multimídia
                    </h1>
                    <p class="mt-6 max-w-2xl text-base leading-8 text-white/78 sm:text-lg">
                        Núcleo de pesquisa e extensão em tecnologia do IFPI - Campus Teresina Central, criado em 2006 para transformar teoria em projetos aplicados.
                    </p>
                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <x-site.button :href="route('projects')" variant="light">Ver projetos</x-site.button>
                        <x-site.button :href="route('contact.show')" variant="ghost">Fale conosco</x-site.button>
                    </div>
                </div>

                <div class="relative z-10">
                    <div class="overflow-hidden rounded-2xl shadow-2xl shadow-slate-950/30 ring-1 ring-white/10">
                        <div class="lims-slider">
                            @foreach ($lims['hero_slides'] as $slide)
                                <article class="lims-slide">
                                    <img src="{{ asset($slide['image']) }}" alt="{{ $slide['title'] }}" loading="{{ $loop->first ? 'eager' : 'lazy' }}">
                                    <div class="lims-slide__content">
                                        <span>{{ $slide['eyebrow'] }}</span>
                                        <h2>{{ $slide['title'] }}</h2>
                                        <p>{{ $slide['description'] }}</p>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-shell tone-lims-blue px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <x-site.section-heading
                eyebrow="Sobre"
                title="Um laboratório para pesquisa aplicada, prototipação e difusão de conhecimento."
                description="O LIMS reúne alunos de cursos técnicos e superiores em projetos que integram hardware, software, artigos científicos, TCCs e produtos reais."
            />
            <div class="mt-8 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                @foreach ($lims['about_points'] as $point)
                    <article class="info-card">
                        <p class="text-sm leading-7 text-slate-600">{{ $point }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-shell tone-lims-red px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="flex flex-col justify-between gap-4 md:flex-row md:items-end">
                <x-site.section-heading eyebrow="Publicações" title="Trabalhos em destaque" description="Produções acadêmicas cadastradas pela equipe do LIMS." />
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
                <div class="mt-8 tone-lims-blue">
                    <div class="info-card">
                        <h3 class="font-display text-lg font-semibold tracking-tight text-slate-950">Trabalhos em atualização</h3>
                        <p class="mt-2 text-sm leading-7 text-slate-600">As publicações em destaque aparecerão aqui assim que forem cadastradas.</p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <section class="section-shell tone-lims-green px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-8 lg:grid-cols-[0.8fr,1.2fr] lg:items-start">
                <x-site.section-heading eyebrow="Time" title="Equipe do LIMS" description="Participantes em formato interativo. Clique em cada card para abrir a descrição." />
                <div class="grid gap-4 sm:grid-cols-3">
                    @forelse ($team as $member)
                        <div class="{{ ['tone-lims-blue', 'tone-lims-red', 'tone-lims-green'][$loop->index % 3] }}">
                            <x-lims.member-card :member="$member" />
                        </div>
                    @empty
                        <div class="tone-lims-blue sm:col-span-3">
                            <div class="info-card">
                                <h3 class="font-display text-lg font-semibold tracking-tight text-slate-950">Time em atualização</h3>
                                <p class="mt-2 text-sm leading-7 text-slate-600">Os perfis dos participantes aparecerão aqui assim que forem cadastrados.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <section class="section-shell tone-lims-blue px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="surface-panel p-6 sm:p-8">
                <x-site.section-heading eyebrow="Tecnologias" title="Frentes técnicas do laboratório" description="Áreas com forte apelo social, automação, acessibilidade, educação e inovação aplicada." />
                <div class="mt-7 flex flex-wrap gap-3">
                    @forelse ($technologies as $technology)
                        <div class="{{ ['tone-lims-blue', 'tone-lims-red', 'tone-lims-green'][$loop->index % 3] }}">
                            <x-lims.technology-card :technology="$technology" compact />
                        </div>
                    @empty
                        <p class="text-sm text-slate-500">As frentes tecnológicas aparecerão aqui assim que forem cadastradas.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <section class="section-shell tone-lims-red px-4 pb-6 sm:px-6 lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-6 lg:grid-cols-2">
            <article class="info-card">
                <span class="theme-chip">Blog</span>
                <h2 class="mt-5 font-display text-3xl font-semibold tracking-tight text-slate-950">Artigos informativos em breve.</h2>
                <p class="mt-4 text-base leading-8 text-slate-600">
                    Espaço dedicado à publicação de conteúdos do laboratório para contribuir com a difusão de conhecimento e com a sociedade.
                </p>
                <div class="mt-6">
                    <x-site.button :href="route('blog.index')" variant="secondary">Ver Blog</x-site.button>
                </div>
            </article>

            <article class="info-card">
                <span class="theme-chip">Fale conosco</span>
                <h2 class="mt-5 font-display text-3xl font-semibold tracking-tight text-slate-950">Contatos com o LIMS</h2>
                <p class="mt-4 text-base leading-8 text-slate-600">
                    Use o canal institucional para parcerias, projetos, pesquisa, extensão e informações sobre o laboratório.
                </p>
                <div class="mt-6">
                    <x-site.button :href="route('contact.show')" variant="secondary">Entrar</x-site.button>
                </div>
            </article>
        </div>
    </section>
</x-layouts.app>
