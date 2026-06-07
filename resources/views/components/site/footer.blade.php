@props([
    'themeKey' => 'group',
])

@php
    $company = config('site.company');
    $navigation = config('site.navigation');
    $contacts = config('site.lims.contacts');
    $socialIcons = [
        'Instagram' => 'M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5Zm5 6.1A3.9 3.9 0 1 0 12 15.9 3.9 3.9 0 0 0 12 8.1Zm5.3-.8a1.1 1.1 0 1 0 0-2.2 1.1 1.1 0 0 0 0 2.2Z',
        'LinkedIn' => 'M4.98 3.5a2.48 2.48 0 1 1 0 4.96 2.48 2.48 0 0 1 0-4.96ZM3 9.5h4v11H3v-11Zm6.2 0h3.8v1.5h.1c.5-.9 1.7-1.9 3.6-1.9 3.8 0 4.5 2.5 4.5 5.8v5.6h-4v-5c0-1.2 0-2.7-1.7-2.7s-1.9 1.3-1.9 2.6v5.1h-4v-11Z',
        'GitHub' => 'M12 2a10 10 0 0 0-3.2 19.5c.5.1.7-.2.7-.5v-1.8c-2.8.6-3.4-1.2-3.4-1.2-.5-1.1-1.1-1.4-1.1-1.4-.9-.6.1-.6.1-.6 1 .1 1.6 1.1 1.6 1.1.9 1.5 2.4 1.1 3 .8.1-.7.4-1.1.7-1.3-2.2-.3-4.6-1.1-4.6-4.9 0-1.1.4-2 1.1-2.7-.1-.3-.5-1.3.1-2.7 0 0 .9-.3 2.8 1.1a9.7 9.7 0 0 1 5.2 0c1.9-1.4 2.8-1.1 2.8-1.1.6 1.4.2 2.4.1 2.7.7.7 1.1 1.6 1.1 2.7 0 3.8-2.3 4.6-4.6 4.9.4.3.8 1 .8 2v3c0 .3.2.6.8.5A10 10 0 0 0 12 2Z',
    ];
@endphp

<footer class="relative z-10 mt-24 border-t border-slate-200 bg-slate-950 text-white">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 py-14 sm:px-6 lg:grid-cols-[1.2fr,1fr,1fr] lg:px-8">
        <div>
            <div class="flex flex-col items-start gap-5 sm:flex-row sm:items-center">
                <img src="{{ asset(config('site.lims.logo')) }}" alt="LIMS" class="h-16 w-auto shrink-0 brightness-0 invert">
                <img src="{{ asset('assets/brands/ifpi-teresina-white.svg') }}" alt="IFPI - Campus Teresina Central" class="h-auto w-[24rem] max-w-full shrink-0">
            </div>
            <p class="mt-5 max-w-md text-sm leading-7 text-white/64">
                {{ $company['description'] }}
            </p>
            <div class="mt-6 flex gap-3" aria-label="Redes sociais do LIMS">
                @foreach ($company['social'] as $social)
                    <a href="{{ $social['url'] }}" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-white/15 bg-white/8 text-white transition hover:bg-white hover:text-slate-950" aria-label="{{ $social['label'] }}">
                        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor" aria-hidden="true">
                            <path d="{{ $socialIcons[$social['label']] ?? $socialIcons['GitHub'] }}" />
                        </svg>
                    </a>
                @endforeach
            </div>
        </div>

        <div>
            <h2 class="font-display text-lg font-semibold">Mapa</h2>
            <div class="mt-5 grid gap-3 text-sm">
                @foreach ($navigation as $item)
                    <a href="{{ route($item['route']) }}" class="text-white/62 transition hover:text-white">{{ $item['label'] }}</a>
                @endforeach
                <a href="{{ route('contact.show') }}" class="text-white/62 transition hover:text-white">Fale conosco</a>
            </div>
        </div>

        <div>
            <h2 class="font-display text-lg font-semibold">Contatos com o LIMS</h2>
            <div class="mt-5 space-y-4 text-sm">
                @foreach ($contacts as $contact)
                    <a href="{{ $contact['href'] }}" class="block rounded-lg border border-white/10 p-3 text-white/68 transition hover:border-white/24 hover:text-white">
                        <span class="block text-xs font-bold uppercase tracking-[0.18em] text-white/38">{{ $contact['label'] }}</span>
                        <span class="mt-1 block">{{ $contact['value'] }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</footer>
