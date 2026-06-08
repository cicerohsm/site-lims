<x-guest-layout>
    @section('title', 'Redefinir senha - LIMS')

    <div class="mb-6 text-center">
        <h1 class="font-display text-2xl font-semibold tracking-tight text-slate-950">Redefinir senha</h1>
        <p class="mx-auto mt-2 max-w-sm text-sm leading-6 text-slate-500">Crie uma nova senha para acessar o LIMS.</p>
    </div>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="E-mail" />
            <x-text-input id="email" class="block mt-1 w-full border-slate-300 focus:border-[color:var(--theme-accent)] focus:ring-[color:var(--theme-accent)]" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Nova senha" />
            <x-text-input id="password" class="block mt-1 w-full border-slate-300 focus:border-[color:var(--theme-accent)] focus:ring-[color:var(--theme-accent)]" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Confirmar senha" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full border-slate-300 focus:border-[color:var(--theme-accent)] focus:ring-[color:var(--theme-accent)]"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-5 flex justify-center">
            <button type="submit" class="inline-flex items-center rounded-lg bg-slate-950 px-5 py-2.5 text-xs font-semibold uppercase tracking-[0.14em] text-white transition hover:bg-[color:var(--theme-accent-strong)] focus:outline-none focus:ring-2 focus:ring-[color:var(--theme-accent)] focus:ring-offset-2">
                Redefinir senha
            </button>
        </div>
    </form>
</x-guest-layout>
