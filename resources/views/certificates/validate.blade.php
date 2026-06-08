<x-layouts.app :meta="$meta" :page-key="$pageKey" :theme-key="$themeKey">

    <section class="tone-lims-green px-4 sm:px-6 lg:px-8">
        <div class="hero-shell mx-auto max-w-7xl rounded-[32px] px-8 py-16 sm:px-12 lg:px-16">
            <span class="theme-chip theme-chip--light">Certificados</span>
            <h1 class="mt-4 max-w-3xl font-display text-4xl font-semibold tracking-tight text-white sm:text-5xl">
                Validar certificado
            </h1>
            <p class="mt-4 max-w-2xl text-base leading-8 text-white/76">
                Consulte a autenticidade de certificados emitidos pelo LIMS a partir do código de validação.
            </p>
        </div>
    </section>

    <section class="section-shell tone-lims-green px-4 pb-16 sm:px-6 lg:px-8">
        <div class="mx-auto grid max-w-5xl gap-6 lg:grid-cols-[0.9fr,1.1fr]">
            <div class="info-card">
                <h2 class="font-display text-2xl font-semibold tracking-tight text-slate-950">Código do certificado</h2>

                <form method="POST" action="{{ route('certificate.validate.check') }}" class="mt-6 space-y-4">
                    @csrf

                    <div>
                        <label for="code" class="block text-xs font-medium uppercase tracking-[0.16em] text-slate-500">Código de validação</label>
                        <input
                            id="code"
                            type="text"
                            name="code"
                            value="{{ old('code', $code ?? '') }}"
                            required
                            class="mt-2 w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 font-mono text-sm text-slate-700 focus:border-[color:var(--theme-accent)] focus:outline-none"
                        >
                        @error('code')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-site.button type="submit">
                        Validar certificado
                    </x-site.button>
                </form>
            </div>

            @isset($registration)
                <div class="info-card border-green-200 bg-green-50">
                    <span class="theme-chip">Certificado válido</span>
                    <h2 class="mt-5 font-display text-3xl font-semibold tracking-tight text-slate-950">{{ $registration->name }}</h2>
                    <p class="mt-2 text-sm text-slate-600">{{ $registration->email }}</p>

                    <div class="mt-6 grid gap-4 rounded-xl border border-green-200 bg-white p-5 text-sm">
                        <div>
                            <span class="block text-xs font-bold uppercase tracking-[0.16em] text-slate-400">Evento</span>
                            <span class="mt-1 block font-semibold text-slate-900">{{ $event->title }}</span>
                        </div>
                        <div>
                            <span class="block text-xs font-bold uppercase tracking-[0.16em] text-slate-400">Data</span>
                            <span class="mt-1 block text-slate-700">{{ $event->starts_at->format('d/m/Y H:i') }}</span>
                        </div>
                        @if ($event->location)
                            <div>
                                <span class="block text-xs font-bold uppercase tracking-[0.16em] text-slate-400">Local</span>
                                <span class="mt-1 block text-slate-700">{{ $event->location }}</span>
                            </div>
                        @endif
                        <div>
                            <span class="block text-xs font-bold uppercase tracking-[0.16em] text-slate-400">Emitido em</span>
                            <span class="mt-1 block text-slate-700">{{ $certificate->generated_at?->format('d/m/Y H:i') ?? 'Certificado emitido' }}</span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <x-site.button :href="route('certificate.download', $registration->token)" variant="secondary">
                            Baixar certificado
                        </x-site.button>
                    </div>
                </div>
            @else
                <div class="info-card">
                    <h2 class="font-display text-2xl font-semibold tracking-tight text-slate-950">Como encontrar o código</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        O código aparece no rodapé do certificado emitido pelo LIMS. Ele é composto por letras e números e identifica uma emissão confirmada.
                    </p>
                </div>
            @endisset
        </div>
    </section>

</x-layouts.app>
