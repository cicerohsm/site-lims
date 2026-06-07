<x-layouts.app :meta="$meta" :page-key="$pageKey" :theme-key="$themeKey">

    <section class="tone-lims-green px-4 sm:px-6 lg:px-8">
        <div class="hero-shell mx-auto max-w-7xl rounded-[32px] px-8 py-20 sm:px-12 lg:px-16">
            <span class="theme-chip theme-chip--light capitalize">{{ $event->type }}</span>
            <h1 class="mt-6 max-w-4xl font-display text-4xl font-semibold tracking-tight text-white sm:text-5xl">
                {{ $event->title }}
            </h1>
            <div class="mt-4 flex flex-wrap gap-4 text-sm text-white/70">
                <span>{{ $event->starts_at->format('d/m/Y H:i') }}</span>
                @if ($event->location)
                    <span>{{ $event->location }}</span>
                @endif
                @if ($event->capacity)
                    <span>{{ $event->capacity }} vagas</span>
                @endif
            </div>
        </div>
    </section>

    <section class="section-shell tone-lims-green px-4 pb-12 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl">
            @if ($event->image)
                <img src="{{ Storage::url($event->image) }}" alt="{{ $event->title }}"
                     class="mb-8 w-full rounded-2xl object-cover shadow-lg" style="max-height: 400px;">
            @endif

            @if ($event->description)
                <div class="prose prose-slate max-w-none text-slate-700 leading-8 mb-8">
                    {!! nl2br(e($event->description)) !!}
                </div>
            @endif

            @if ($event->registration_open)
                <div class="info-card">
                    <h2 class="font-display text-xl font-semibold text-slate-950">Inscreva-se neste evento</h2>
                    <p class="mt-2 text-sm text-slate-500">As inscrições estão abertas. Preencha o formulário para garantir sua vaga.</p>
                    <div class="mt-4">
                        <x-site.button :href="route('events.register.create', $event->slug)">
                            Fazer inscrição
                        </x-site.button>
                    </div>
                </div>
            @else
                <div class="info-card bg-slate-50">
                    <p class="text-sm text-slate-500">As inscrições para este evento estão encerradas.</p>
                </div>
            @endif

            <div class="mt-8">
                <a href="{{ route('events') }}" class="text-sm font-semibold text-[color:var(--theme-accent)] hover:underline">
                    ← Ver todos os eventos
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>
