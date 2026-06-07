<x-layouts.app :meta="$meta" :page-key="$pageKey" :theme-key="$themeKey">

    {{-- 1. HERO --}}
    <section class="tone-lims-blue px-4 sm:px-6 lg:px-8">
        <div class="hero-shell mx-auto max-w-7xl rounded-[32px] px-8 py-20 text-center sm:px-12 lg:px-16">
            <span class="theme-chip theme-chip--light mx-auto">Sobre o LIMS</span>
            <h1 class="mx-auto mt-6 max-w-4xl font-display text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                Inovação, Tecnologia e Impacto Social no coração do Piauí.
            </h1>
            <p class="mx-auto mt-6 max-w-2xl text-base leading-8 text-white/76 sm:text-lg">
                Transformando o conhecimento acadêmico em soluções reais para a sociedade.
            </p>
        </div>
    </section>

    {{-- 2. QUEM SOMOS + NOSSA MISSÃO --}}
    <section class="section-shell tone-lims-red px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-6 lg:grid-cols-2 lg:items-stretch">

                <div class="tone-lims-blue">
                    <article class="info-card flex h-full flex-col" style="background: linear-gradient(135deg, var(--theme-soft) 0%, #fff 100%); border-color: var(--theme-border);">
                        <span class="theme-chip">Quem Somos</span>
                        <h2 class="mt-4 font-display text-2xl font-semibold tracking-tight text-slate-950 sm:text-3xl">
                            Um espaço maker onde código, hardware e criatividade se encontram.
                        </h2>
                        <p class="mt-4 flex-1 text-base leading-8 text-slate-600">
                            Fundado em 2006, o Laboratório de Inovação em Sistemas Multimídia (LIMS) é um dos principais núcleos de pesquisa, extensão e desenvolvimento tecnológico do Instituto Federal do Piauí (IFPI) — Campus Teresina Central. Nós funcionamos como uma ponte entre a teoria da sala de aula e os desafios do mundo real. Reunindo estudantes de cursos técnicos e superiores, pesquisadores e professores, o LIMS é um espaço maker onde código, hardware e criatividade se encontram para desenvolver soluções que tornam a vida das pessoas mais confortável, acessível e inteligente.
                        </p>
                    </article>
                </div>

                <div class="tone-lims-green">
                    <article class="info-card flex h-full flex-col" style="background: linear-gradient(135deg, var(--theme-soft) 0%, #fff 100%); border-color: var(--theme-border);">
                        <span class="theme-chip">Nossa Missão</span>
                        <h2 class="mt-4 font-display text-2xl font-semibold tracking-tight text-slate-950 sm:text-3xl">
                            Transformar conhecimento em impacto real.
                        </h2>
                        <p class="mt-4 flex-1 text-base leading-8 text-slate-600">
                            Desenvolver pesquisas aplicadas e projetos tecnológicos com forte impacto social, fomentando o ecossistema de inovação local. Nosso objetivo é capacitar nossos discentes através da prática real, criando desde artigos científicos até produtos de software e hardware que resolvem problemas concretos da comunidade.
                        </p>
                    </article>
                </div>

            </div>
        </div>
    </section>

    {{-- 3. ÁREAS DE ATUAÇÃO E PESQUISA --}}
    <section class="section-shell tone-lims-blue px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <x-site.section-heading
                eyebrow="Pesquisa"
                title="Áreas de Atuação e Pesquisa"
                description="As frentes de inovação do LIMS combinam tecnologia de ponta com forte impacto social, conectando academia e comunidade."
                align="center"
            />

            <div class="mt-10 grid gap-5 sm:grid-cols-2 xl:grid-cols-4">

                <div class="tone-lims-blue">
                    <article class="info-card h-full" style="background: linear-gradient(135deg, var(--theme-soft) 0%, #fff 100%); border-color: var(--theme-border);">
                        <div class="credential-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="12" cy="5" r="2"/>
                                <path d="M12 7v5M6 10h12M9 10v6M15 10v6"/>
                            </svg>
                        </div>
                        <h3 class="mt-4 font-display text-lg font-semibold tracking-tight text-slate-950">Tecnologia Assistiva</h3>
                        <p class="mt-2 text-sm leading-7 text-slate-600">Criação de sistemas e hardwares focados em acessibilidade, promovendo autonomia para pessoas com deficiência física, baixa visão e apoio ao diagnóstico de autismo.</p>
                    </article>
                </div>

                <div class="tone-lims-red">
                    <article class="info-card h-full" style="background: linear-gradient(135deg, var(--theme-soft) 0%, #fff 100%); border-color: var(--theme-border);">
                        <div class="credential-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="12" cy="12" r="2"/>
                                <path d="M4.93 4.93a10 10 0 0 0 0 14.14M19.07 4.93a10 10 0 0 1 0 14.14M7.76 7.76a6 6 0 0 0 0 8.49M16.24 7.76a6 6 0 0 1 0 8.49"/>
                            </svg>
                        </div>
                        <h3 class="mt-4 font-display text-lg font-semibold tracking-tight text-slate-950">Internet das Coisas (IoT)</h3>
                        <p class="mt-2 text-sm leading-7 text-slate-600">Integração de dispositivos físicos ao mundo digital para o desenvolvimento de ambientes automatizados e cidades inteligentes.</p>
                    </article>
                </div>

                <div class="tone-lims-green">
                    <article class="info-card h-full" style="background: linear-gradient(135deg, var(--theme-soft) 0%, #fff 100%); border-color: var(--theme-border);">
                        <div class="credential-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 22c4.97 0 9-4.03 9-9-4.97 0-9 4.03-9 9zM3 13c0 4.97 4.03 9 9 9 0-4.97-4.03-9-9-9zM12 2a9 9 0 0 0-9 9h9V2zM21 11h-9V2a9 9 0 0 1 9 9z"/>
                            </svg>
                        </div>
                        <h3 class="mt-4 font-display text-lg font-semibold tracking-tight text-slate-950">Sustentabilidade Tecnológica</h3>
                        <p class="mt-2 text-sm leading-7 text-slate-600">Inovação verde, incluindo pesquisas de ponta para a produção de filamentos de impressão 3D a partir de materiais reciclados, como garrafas PET.</p>
                    </article>
                </div>

                <div class="tone-lims-blue">
                    <article class="info-card h-full" style="background: linear-gradient(135deg, var(--theme-soft) 0%, #fff 100%); border-color: var(--theme-border);">
                        <div class="credential-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                                <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                            </svg>
                        </div>
                        <h3 class="mt-4 font-display text-lg font-semibold tracking-tight text-slate-950">Educação STEAM</h3>
                        <p class="mt-2 text-sm leading-7 text-slate-600">Desenvolvimento de plataformas e ambientes virtuais que incentivam a inclusão de alunos da rede pública em atividades científicas, matemáticas e tecnológicas.</p>
                    </article>
                </div>

            </div>
        </div>
    </section>

    {{-- 4. CTA FINAL --}}
    <section class="section-shell tone-lims-red px-4 pb-6 sm:px-6 lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-6 lg:grid-cols-2">
            <article class="info-card">
                <span class="theme-chip">Projetos</span>
                <h2 class="mt-5 font-display text-2xl font-semibold tracking-tight text-slate-950">Conheça os trabalhos do laboratório.</h2>
                <p class="mt-3 text-sm leading-7 text-slate-600">Veja os projetos desenvolvidos pelo LIMS em acessibilidade, IoT, sustentabilidade e educação STEAM.</p>
                <div class="mt-6">
                    <x-site.button :href="route('projects')" variant="secondary">Ver projetos</x-site.button>
                </div>
            </article>
            <article class="info-card">
                <span class="theme-chip">Fale conosco</span>
                <h2 class="mt-5 font-display text-2xl font-semibold tracking-tight text-slate-950">Contatos com o LIMS</h2>
                <p class="mt-3 text-sm leading-7 text-slate-600">Use o canal institucional para parcerias, projetos, pesquisa, extensão e informações sobre o laboratório.</p>
                <div class="mt-6">
                    <x-site.button :href="route('contact.show')" variant="secondary">Entrar em contato</x-site.button>
                </div>
            </article>
        </div>
    </section>

</x-layouts.app>
