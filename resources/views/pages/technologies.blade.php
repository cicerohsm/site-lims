@php
    $technologies = config('site.lims.technologies');
    $svgPaths = [
        '<path d="M16 18l6-6-6-6M8 6l-6 6 6 6"/>',
        '<rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/>',
        '<circle cx="12" cy="5" r="2"/><path d="M12 7v5M6 10h12M9 10v6M15 10v6"/>',
        '<path d="M5 12.55a11 11 0 0 1 14.08 0"/><path d="M1.42 9a16 16 0 0 1 21.16 0"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0"/><circle cx="12" cy="20" r="1"/>',
        '<path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><line x1="3.27" y1="6.96" x2="12" y2="12.01"/><line x1="12" y1="22.08" x2="12" y2="12"/>',
        '<path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>',
        '<path d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>',
        '<rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><path d="M9 1v3M15 1v3M9 20v3M15 20v3M1 9h3M1 15h3M20 9h3M20 15h3"/>',
    ];
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
            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($technologies as $technology)
                    @php $tone = $tones[$loop->index % 3]; @endphp
                    <div class="{{ $tone }}">
                        <article class="info-card h-full" style="background: linear-gradient(135deg, var(--theme-soft) 0%, #fff 100%); border-color: var(--theme-border);">
                            <div class="credential-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    {!! $svgPaths[$loop->index % count($svgPaths)] !!}
                                </svg>
                            </div>
                            <h3 class="mt-4 font-display text-lg font-semibold tracking-tight text-slate-950">{{ $technology }}</h3>
                            <p class="mt-2 text-sm leading-7 text-slate-600">Frente aplicada em projetos, estudos, experimentos e documentação técnica do LIMS.</p>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="section-shell tone-lims-green px-4 pb-6 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="spotlight-panel rounded-[2rem] p-8 sm:p-12">
                <div class="grid gap-8 lg:grid-cols-[1.3fr,0.7fr] lg:items-center">
                    <div>
                        <span class="theme-chip theme-chip--light">Pesquisa aplicada</span>
                        <h2 class="mt-5 font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                            Tecnologia com propósito social.
                        </h2>
                        <p class="mt-4 max-w-xl text-base leading-8 text-white/74">
                            Cada frente técnica do LIMS nasce de uma necessidade real. Nossas pesquisas buscam resolver problemas concretos da comunidade — de acessibilidade a sustentabilidade, passando por educação e automação.
                        </p>
                        <div class="mt-6">
                            <x-site.button :href="route('projects')" variant="light">Ver projetos</x-site.button>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4">
                        <div class="metric-card">
                            <p class="metric-card__label">Software, hardware e pesquisa científica integrados</p>
                            <p class="metric-card__value">Multi-disciplinar</p>
                        </div>
                        <div class="metric-card">
                            <p class="metric-card__label">Da sala de aula ao produto com impacto real</p>
                            <p class="metric-card__value">Entrega concreta</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>
