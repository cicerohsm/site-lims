<x-layouts.app :meta="$meta" :page-key="$pageKey" :theme-key="$themeKey">

    <section class="tone-lims-green px-4 sm:px-6 lg:px-8">
        <div class="hero-shell mx-auto max-w-7xl rounded-[32px] px-8 py-16 sm:px-12 lg:px-16">
            <span class="theme-chip theme-chip--light">Inscrição</span>
            <h1 class="mt-4 max-w-3xl font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                {{ $event->title }}
            </h1>
            <p class="mt-3 text-sm text-white/60">{{ $event->starts_at->format('d/m/Y H:i') }}
                @if ($event->location) · {{ $event->location }} @endif
            </p>
        </div>
    </section>

    <section class="section-shell tone-lims-green px-4 pb-12 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-xl">
            <div class="info-card">
                <h2 class="font-display text-xl font-semibold text-slate-950 mb-6">Preencha seus dados</h2>

                <form method="POST" action="{{ route('events.register.store', $event->slug) }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-xs font-medium text-slate-500 mb-1">Nome completo *</label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                               class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-2 text-sm text-slate-700 focus:border-slate-400 focus:outline-none">
                        @error('name')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-500 mb-1">E-mail *</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-2 text-sm text-slate-700 focus:border-slate-400 focus:outline-none">
                        @error('email')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-slate-500 mb-1">Telefone</label>
                            <input type="text" name="phone" value="{{ old('phone') }}"
                                   class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-2 text-sm text-slate-700 focus:border-slate-400 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-500 mb-1">Instituição</label>
                            <input type="text" name="institution" value="{{ old('institution') }}"
                                   class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-2 text-sm text-slate-700 focus:border-slate-400 focus:outline-none">
                        </div>
                    </div>

                    @if ($errors->has('event'))
                        <div class="rounded-lg bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-600">
                            {{ $errors->first('event') }}
                        </div>
                    @endif

                    <div class="pt-2">
                        <x-site.button type="submit" variant="secondary">
                            Confirmar inscrição
                        </x-site.button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</x-layouts.app>
