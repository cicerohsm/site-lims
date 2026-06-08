<x-guest-layout>
    @section('title', 'Entrar - LIMS')

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-6 text-center">
        <h1 class="font-display text-2xl font-semibold tracking-tight text-slate-950">Entrar no LIMS</h1>
        <p class="mx-auto mt-2 max-w-sm text-sm leading-6 text-slate-500">Acesse o painel administrativo e os recursos protegidos do laboratório.</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="E-mail" />
            <x-text-input id="email" class="block mt-2 w-full rounded-xl border-slate-300 px-4 py-3 text-base focus:border-[color:var(--theme-accent)] focus:ring-[color:var(--theme-accent)]" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Senha" />

            <x-text-input id="password" class="block mt-2 w-full rounded-xl border-slate-300 px-4 py-3 text-base focus:border-[color:var(--theme-accent)] focus:ring-[color:var(--theme-accent)]"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-[color:var(--theme-accent)] shadow-sm focus:ring-[color:var(--theme-accent)]" name="remember">
                <span class="ms-2 text-sm text-slate-600">Lembrar de mim</span>
            </label>
        </div>

        <div class="mt-5 flex flex-col-reverse items-center justify-between gap-4 sm:flex-row">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-slate-600 hover:text-slate-950 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[color:var(--theme-accent)]" href="{{ route('password.request') }}">
                    Esqueceu sua senha?
                </a>
            @endif

            <button type="submit" class="inline-flex items-center rounded-lg bg-slate-950 px-5 py-2.5 text-xs font-semibold uppercase tracking-[0.14em] text-white transition hover:bg-[color:var(--theme-accent-strong)] focus:outline-none focus:ring-2 focus:ring-[color:var(--theme-accent)] focus:ring-offset-2">
                Entrar
            </button>
        </div>
    </form>
</x-guest-layout>
