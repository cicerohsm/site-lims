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
            <div class="mt-8">
                <x-site.button :href="route('certificate.validate')" variant="light">
                    Validar certificado
                </x-site.button>
            </div>
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
            @if ($events->isNotEmpty())
                <div class="mt-10 grid gap-5 md:grid-cols-2 xl:grid-cols-4">
                    @foreach ($events as $event)
                        <div class="{{ ['tone-lims-blue', 'tone-lims-red', 'tone-lims-green', 'tone-lims-blue'][$loop->index % 4] }}">
                            <article class="info-card flex h-full flex-col overflow-hidden p-0" style="border-color: var(--theme-border);">
                                @if ($event->image)
                                    <img src="{{ Storage::url($event->image) }}" alt="{{ $event->title }}" class="h-48 w-full object-cover">
                                @else
                                    <div class="flex h-48 w-full items-center justify-center bg-[color:var(--theme-soft)] px-6 text-center">
                                        <span class="font-display text-2xl font-semibold tracking-tight text-[color:var(--theme-accent-strong)]">{{ $event->title }}</span>
                                    </div>
                                @endif
                                <div class="flex flex-1 flex-col p-5">
                                    <div class="flex items-center justify-between gap-3">
                                        <span class="theme-chip">{{ $event->starts_at->format('d/m/Y') }}</span>
                                        <span class="text-xs font-bold uppercase tracking-[0.16em] text-slate-500">{{ $event->type }}</span>
                                    </div>
                                    <h2 class="mt-4 font-display text-xl font-semibold tracking-tight text-slate-950">{{ $event->title }}</h2>
                                    @if ($event->description)
                                        <p class="mt-3 text-sm leading-7 text-slate-600">{{ Str::limit($event->description, 140) }}</p>
                                    @endif
                                    <div class="mt-auto pt-5">
                                        <x-site.button :href="route('events.show', $event->slug)" size="sm">
                                            {{ $event->registration_open ? 'Ver inscrição' : 'Ver evento' }}
                                        </x-site.button>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

                <div class="mt-10">
                    {{ $events->links() }}
                </div>
            @else
                <div class="mt-10 tone-lims-green">
                    <div class="info-card">
                        <h2 class="font-display text-xl font-semibold tracking-tight text-slate-950">Nenhum evento publicado no momento</h2>
                        <p class="mt-3 text-sm leading-7 text-slate-600">Novas atividades aparecerão aqui assim que forem publicadas pela equipe do LIMS.</p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    {{-- EVENTO EM DESTAQUE --}}
    <section class="section-shell tone-lims-red px-4 pb-6 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="spotlight-panel rounded-[2rem] p-8 sm:p-12">
                <div class="max-w-2xl">
                    <span class="theme-chip theme-chip--light">
                        {{ $highlightEvent ? 'Último evento publicado' : 'Extensão e Comunidade' }}
                    </span>
                    <h2 class="mt-5 font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                        {{ $highlightEvent?->title ?? 'O Teresina INFO' }}
                    </h2>
                    <p class="mt-4 text-base leading-8 text-white/74">
                        {{ $highlightEvent?->description ? Str::limit($highlightEvent->description, 260) : 'O LIMS é o idealizador e motor do Teresina INFO — Encontro de Informática de Teresina. Através de palestras, minicursos e exposições de projetos, o evento dissemina as produções do laboratório e fortalece o networking entre estudantes, academia e o polo tecnológico da nossa região.' }}
                    </p>
                    @if ($highlightEvent)
                        <div class="mt-5 flex flex-wrap gap-3 text-sm text-white/64">
                            <span>{{ $highlightEvent->starts_at->format('d/m/Y H:i') }}</span>
                            @if ($highlightEvent->location)
                                <span>{{ $highlightEvent->location }}</span>
                            @endif
                        </div>
                    @endif
                    <div class="mt-6">
                        <x-site.button :href="$highlightEvent ? route('events.show', $highlightEvent->slug) : route('contact.show')" variant="light">
                            {{ $highlightEvent ? 'Ver evento' : 'Participar do próximo evento' }}
                        </x-site.button>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>
