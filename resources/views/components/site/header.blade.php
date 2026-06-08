@props([
    'pageKey' => 'home',
    'themeKey' => 'group',
])

@php
    $navigation = config('site.navigation');
    $user = auth()->user();
@endphp

<header class="fixed inset-x-0 top-0 z-50 border-b border-slate-200 bg-white/94 backdrop-blur" data-site-header>
    <div class="mx-auto flex h-20 max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="flex items-center" aria-label="Ir para o início do LIMS">
            <img src="{{ asset(config('site.lims.logo')) }}" alt="LIMS" class="h-14 w-auto">
        </a>

        <nav class="hidden items-center gap-1 lg:flex" aria-label="Navegação principal">
            @foreach ($navigation as $item)
                @php
                    $isActive = request()->routeIs(...$item['patterns']);
                @endphp
                <a
                    href="{{ route($item['route']) }}"
                    @if ($isActive) aria-current="page" @endif
                    class="rounded-full px-4 py-2 text-sm font-semibold transition {{ $isActive ? 'bg-[color:var(--theme-soft)] text-[color:var(--theme-accent-strong)]' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-950' }}"
                >
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="flex items-center gap-3">
            @auth
                @if ($user->isAdmin())
                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-full bg-[color:var(--theme-accent)] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[color:var(--theme-accent-strong)]"
                    >
                        <span>Admin</span>
                        <svg aria-hidden="true" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                            <path fill-rule="evenodd" d="M3.75 10a.75.75 0 0 1 .75-.75h9.69L10.22 5.28a.75.75 0 1 1 1.06-1.06l5.25 5.25a.75.75 0 0 1 0 1.06l-5.25 5.25a.75.75 0 1 1-1.06-1.06l3.97-3.97H4.5a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                        </svg>
                    </a>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="rounded-full px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-100 hover:text-slate-950 transition">
                        Sair
                    </button>
                </form>
            @else
                <a
                    href="{{ route('login') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-full bg-[color:var(--theme-accent)] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[color:var(--theme-accent-strong)] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[color:var(--theme-accent)] focus-visible:ring-offset-2 focus-visible:ring-offset-white"
                >
                    <span>Entrar</span>
                    <svg aria-hidden="true" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                        <path fill-rule="evenodd" d="M3.75 10a.75.75 0 0 1 .75-.75h9.69L10.22 5.28a.75.75 0 1 1 1.06-1.06l5.25 5.25a.75.75 0 0 1 0 1.06l-5.25 5.25a.75.75 0 1 1-1.06-1.06l3.97-3.97H4.5a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                    </svg>
                </a>
            @endauth
        </div>
    </div>
</header>
