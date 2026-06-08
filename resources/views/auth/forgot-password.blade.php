<x-guest-layout>
    @section('title', 'Recuperar senha - LIMS')

    <div class="mb-6">
        <h1 class="font-display text-2xl font-semibold tracking-tight text-slate-950">Recuperar senha</h1>
        <p class="mt-2 text-sm leading-6 text-slate-500">
            Informe seu e-mail para receber um link de redefinição de senha.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="E-mail" />
            <x-text-input id="email" class="block mt-1 w-full border-slate-300 focus:border-[color:var(--theme-accent)] focus:ring-[color:var(--theme-accent)]" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-6 flex items-center justify-between gap-4">
            <a href="{{ route('login') }}" class="text-sm text-slate-600 underline hover:text-slate-950">Voltar ao login</a>

            <button type="submit" class="inline-flex items-center rounded-lg bg-slate-950 px-5 py-2.5 text-xs font-semibold uppercase tracking-[0.14em] text-white transition hover:bg-[color:var(--theme-accent-strong)] focus:outline-none focus:ring-2 focus:ring-[color:var(--theme-accent)] focus:ring-offset-2">
                Enviar link
            </button>
        </div>
    </form>
</x-guest-layout>
