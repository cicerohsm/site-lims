@props(['member'])

<details class="group info-card cursor-pointer">
    <summary class="list-none">
        @if ($member->photo_path)
            <img src="{{ Storage::url($member->photo_path) }}" alt="{{ $member->name }}" class="mx-auto h-24 w-24 rounded-full object-cover">
        @else
            <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-[color:var(--theme-soft)] font-display text-2xl font-bold text-[color:var(--theme-accent-strong)]">
                {{ $member->initials }}
            </div>
        @endif
        <h3 class="mt-5 text-center font-display text-lg font-semibold tracking-tight text-slate-950">{{ $member->name }}</h3>
        <p class="mt-2 text-center text-sm font-semibold text-slate-500">{{ $member->role }}</p>
    </summary>
    <div class="mt-4 rounded-2xl bg-slate-50 p-4 text-sm leading-7 text-slate-600 group-open:animate-[fade-in_180ms_ease-out]">
        @if ($member->bio)
            <p>{{ $member->bio }}</p>
        @else
            <p>Biografia em breve.</p>
        @endif

        @if ($member->lattes_url || $member->linkedin_url)
            <div class="mt-4 flex flex-wrap gap-3 text-xs font-semibold">
                @if ($member->lattes_url)
                    <a href="{{ $member->lattes_url }}" target="_blank" rel="noreferrer noopener" class="text-[color:var(--theme-accent-strong)] hover:underline">Lattes</a>
                @endif
                @if ($member->linkedin_url)
                    <a href="{{ $member->linkedin_url }}" target="_blank" rel="noreferrer noopener" class="text-[color:var(--theme-accent-strong)] hover:underline">LinkedIn</a>
                @endif
            </div>
        @endif
    </div>
</details>
