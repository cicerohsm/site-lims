<x-layouts.app :meta="$meta" :page-key="$pageKey" :theme-key="$themeKey">

    <section class="tone-lims-green px-4 sm:px-6 lg:px-8">
        <div class="hero-shell mx-auto max-w-7xl rounded-[32px] px-8 py-20 sm:px-12 lg:px-16">
            <span class="theme-chip theme-chip--light">Inscrição confirmada</span>
            <h1 class="mt-4 max-w-3xl font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                Sua inscrição foi registrada!
            </h1>
            <p class="mt-3 text-sm text-white/60">
                Após o evento, use o link abaixo para acessar e baixar seu certificado.
            </p>
        </div>
    </section>

    <section class="section-shell tone-lims-green px-4 pb-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-xl">
            <div class="info-card text-center">
                <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-green-100">
                    <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>

                <h2 class="font-display text-xl font-semibold text-slate-950">{{ $registration->name }}</h2>
                <p class="mt-1 text-sm text-slate-500">{{ $registration->email }}</p>

                <div class="my-6 rounded-lg bg-slate-50 border border-slate-200 px-4 py-3">
                    <p class="text-xs text-slate-400 mb-1">Evento</p>
                    <p class="font-semibold text-slate-800">{{ $event->title }}</p>
                    <p class="mt-1 text-xs text-slate-500">{{ $event->starts_at->format('d/m/Y H:i') }}</p>
                </div>

                <p class="text-xs text-slate-400 mb-2">Link do certificado (guarde este endereço)</p>
                <div class="rounded-lg bg-slate-100 px-3 py-2 text-xs font-mono text-slate-600 break-all">
                    {{ route('certificate.show', $registration->token) }}
                </div>

                <div class="mt-6">
                    <a href="{{ route('certificate.show', $registration->token) }}"
                       class="inline-flex items-center gap-2 rounded-xl bg-slate-950 px-5 py-2.5 text-sm font-medium text-white hover:bg-slate-800 transition-colors">
                        Ver página do certificado
                    </a>
                </div>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('events.show', $event->slug) }}" class="text-sm text-slate-500 hover:text-slate-700">
                    ← Voltar ao evento
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>
