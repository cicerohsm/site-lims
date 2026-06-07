<x-layouts.app :meta="config('site.meta.not-found')" page-key="not-found" theme-key="group">
    <section class="px-4 pb-8 sm:px-6 lg:px-8">
        <div class="hero-shell mx-auto flex max-w-5xl flex-col items-center rounded-[36px] px-6 py-16 text-center sm:px-10 lg:px-12 lg:py-20">
            <span class="theme-chip">Erro 404</span>
            <h1 class="mt-6 font-display text-4xl font-semibold tracking-tight text-white sm:text-5xl">
                A página que você procurou não está disponível neste portal.
            </h1>
            <p class="mt-6 max-w-2xl text-base leading-8 text-white/78 sm:text-lg">
                O caminho pode ter sido alterado, removido ou digitado incorretamente. Use os atalhos abaixo para retornar ao fluxo principal do LIMS.
            </p>
            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <x-site.button :href="route('home')" variant="light">
                    Voltar para o Início
                </x-site.button>
                <x-site.button :href="route('projects')" variant="ghost" class="justify-start sm:justify-center">
                    Ver projetos
                </x-site.button>
            </div>
        </div>
    </section>
</x-layouts.app>
