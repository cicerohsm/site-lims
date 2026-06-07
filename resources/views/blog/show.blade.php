<x-layouts.app :meta="$meta" :page-key="$pageKey" :theme-key="$themeKey">

    <section class="tone-lims-green px-4 sm:px-6 lg:px-8">
        <div class="hero-shell mx-auto max-w-7xl rounded-[32px] px-8 py-16 sm:px-12 lg:px-16">
            @if ($post->category)
                <span class="theme-chip theme-chip--light">{{ $post->category->name }}</span>
            @endif
            <h1 class="mt-4 max-w-4xl font-display text-3xl font-semibold tracking-tight text-white sm:text-4xl lg:text-5xl">
                {{ $post->title }}
            </h1>
            <p class="mt-4 text-sm text-white/60">
                Por {{ $post->author->name }} · {{ $post->published_at->format('d \d\e F \d\e Y') }}
            </p>
        </div>
    </section>

    <section class="section-shell tone-lims-green px-4 pb-12 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl">
            @if ($post->cover_image)
                <img src="{{ Storage::url($post->cover_image) }}" alt="{{ $post->title }}"
                     class="mb-8 w-full rounded-2xl object-cover shadow-lg" style="max-height: 420px;">
            @endif

            <div class="prose prose-slate max-w-none text-slate-700 leading-8">
                {!! nl2br(e($post->body)) !!}
            </div>

            <div class="mt-10 border-t border-slate-200 pt-6">
                <a href="{{ route('blog.index') }}" class="text-sm font-semibold text-[color:var(--theme-accent)] hover:underline">
                    ← Voltar ao Blog
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>
