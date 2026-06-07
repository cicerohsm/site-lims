<x-layouts.app :meta="$meta" :page-key="$pageKey" :theme-key="$themeKey">

    {{-- HERO --}}
    <section class="tone-lims-green px-4 sm:px-6 lg:px-8">
        <div class="hero-shell mx-auto max-w-7xl rounded-[32px] px-8 py-20 sm:px-12 lg:px-16">
            <span class="theme-chip theme-chip--light">Blog</span>
            <h1 class="mt-6 max-w-3xl font-display text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                Artigos e notícias do laboratório.
            </h1>
            <p class="mt-6 max-w-2xl text-base leading-8 text-white/76 sm:text-lg">
                Publicações, atualizações de projetos e conteúdo produzido pela equipe do LIMS.
            </p>
        </div>
    </section>

    {{-- FILTROS DE CATEGORIA --}}
    @if ($categories->isNotEmpty())
        <section class="tone-lims-green px-4 pt-6 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-7xl">
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('blog.index') }}"
                       class="theme-chip {{ ! $category ? 'bg-[color:var(--theme-accent)] text-white' : '' }}">
                        Todos
                    </a>
                    @foreach ($categories as $cat)
                        <a href="{{ route('blog.index', ['category' => $cat->slug]) }}"
                           class="theme-chip {{ $category === $cat->slug ? 'bg-[color:var(--theme-accent)] text-white' : '' }}">
                            {{ $cat->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- GRID DE POSTS --}}
    <section class="section-shell tone-lims-green px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            @if ($posts->isEmpty())
                <p class="text-center text-slate-500 py-16">Nenhuma postagem publicada ainda.</p>
            @else
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($posts as $post)
                        <div class="{{ ['tone-lims-blue', 'tone-lims-red', 'tone-lims-green'][$loop->index % 3] }}">
                            <article class="info-card flex h-full flex-col overflow-hidden p-0" style="border-color: var(--theme-border);">
                                @if ($post->cover_image)
                                    <img src="{{ Storage::url($post->cover_image) }}" alt="{{ $post->title }}" class="h-44 w-full object-cover">
                                @endif
                                <div class="flex flex-1 flex-col p-5">
                                    <div class="flex items-center gap-2 mb-3">
                                        @if ($post->category)
                                            <span class="theme-chip">{{ $post->category->name }}</span>
                                        @endif
                                        <span class="text-xs text-slate-400">{{ $post->published_at->format('d/m/Y') }}</span>
                                    </div>
                                    <h2 class="font-display text-lg font-semibold tracking-tight text-slate-950 leading-snug">{{ $post->title }}</h2>
                                    @if ($post->excerpt)
                                        <p class="mt-2 flex-1 text-sm leading-7 text-slate-600">{{ $post->excerpt }}</p>
                                    @endif
                                    <div class="mt-4">
                                        <a href="{{ route('blog.show', $post->slug) }}"
                                           class="text-sm font-semibold text-[color:var(--theme-accent)] hover:underline">
                                            Ler artigo →
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8">{{ $posts->links() }}</div>
            @endif
        </div>
    </section>

</x-layouts.app>
