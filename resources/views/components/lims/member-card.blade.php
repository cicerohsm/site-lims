@props(['member'])

<details class="group info-card cursor-pointer">
    <summary class="list-none">
        <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-[color:var(--theme-soft)] font-display text-2xl font-bold text-[color:var(--theme-accent-strong)]">
            {{ $member['initials'] }}
        </div>
        <h3 class="mt-5 text-center font-display text-lg font-semibold tracking-tight text-slate-950">{{ $member['name'] }}</h3>
        <p class="mt-2 text-center text-sm font-semibold text-slate-500">{{ $member['role'] }}</p>
    </summary>
    <div class="mt-4 rounded-2xl bg-slate-50 p-4 text-sm leading-7 text-slate-600 group-open:animate-[fade-in_180ms_ease-out]">
        {{ $member['description'] }}
    </div>
</details>
