@php
    $contacts = config('site.lims.contacts');
@endphp

<x-layouts.app :meta="$meta" :page-key="$pageKey" :theme-key="$themeKey">
    <section class="tone-lims-blue px-4 sm:px-6 lg:px-8">
        <div class="hero-shell mx-auto max-w-7xl rounded-[32px] px-6 py-14 sm:px-10 lg:px-12">
            <div class="hero-grid">
                <div class="relative z-10 max-w-3xl">
                    <span class="theme-chip theme-chip--light">Fale conosco</span>
                    <h1 class="mt-6 font-display text-4xl font-semibold tracking-tight text-white sm:text-6xl">
                        Contatos com o LIMS
                    </h1>
                    <p class="mt-6 max-w-2xl text-base leading-8 text-white/76 sm:text-lg">
                        Entre em contato para propor projetos, parcerias, ações de extensão, pesquisa aplicada ou solicitar informações institucionais sobre o laboratório.
                    </p>
                </div>

                <div class="relative z-10 surface-panel p-6 sm:p-8">
                    <h2 class="font-display text-2xl font-semibold tracking-tight text-slate-950">Canais principais</h2>
                    <div class="mt-6 grid gap-4">
                        @foreach ($contacts as $contact)
                            <a href="{{ $contact['href'] }}" class="rounded-2xl border border-slate-200 bg-white p-4 transition hover:border-[color:var(--theme-accent)]">
                                <span class="text-xs font-bold uppercase tracking-[0.2em] text-[color:var(--theme-accent-strong)]">{{ $contact['label'] }}</span>
                                <span class="mt-2 block text-lg font-semibold text-slate-950">{{ $contact['value'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-shell tone-lims-green px-4 pb-6 sm:px-6 lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-6 lg:grid-cols-3">
            <article class="info-card">
                <h2 class="font-display text-xl font-semibold tracking-tight text-slate-950">Projetos</h2>
                <p class="mt-3 text-sm leading-7 text-slate-600">Envie propostas, demandas e ideias para colaboração técnica ou acadêmica.</p>
            </article>
            <article class="info-card">
                <h2 class="font-display text-xl font-semibold tracking-tight text-slate-950">Pesquisa</h2>
                <p class="mt-3 text-sm leading-7 text-slate-600">Fale sobre linhas de pesquisa, produção científica e oportunidades de publicação.</p>
            </article>
            <article class="info-card">
                <h2 class="font-display text-xl font-semibold tracking-tight text-slate-950">Extensão</h2>
                <p class="mt-3 text-sm leading-7 text-slate-600">Organize ações, eventos, oficinas e atividades de difusão de conhecimento.</p>
            </article>
        </div>
    </section>
</x-layouts.app>
