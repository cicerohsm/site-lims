@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
    @php
        $cards = [
            ['label' => 'Posts', 'value' => $stats['posts'], 'route' => 'admin.posts.index', 'color' => 'blue'],
            ['label' => 'Publicações', 'value' => $stats['publications'], 'route' => 'admin.publications.index', 'color' => 'purple'],
            ['label' => 'Eventos', 'value' => $stats['events'], 'route' => 'admin.events.index', 'color' => 'green'],
            ['label' => 'Inscrições', 'value' => $stats['registrations'], 'route' => 'admin.events.index', 'color' => 'yellow'],
            ['label' => 'Pendentes', 'value' => $stats['pending_registrations'], 'route' => 'admin.events.index', 'color' => 'red'],
        ];
        $colors = ['blue' => 'text-blue-400', 'purple' => 'text-purple-400', 'green' => 'text-green-400', 'yellow' => 'text-yellow-400', 'red' => 'text-red-400'];
    @endphp

    @foreach ($cards as $card)
        <a href="{{ route($card['route']) }}" class="block rounded-xl bg-slate-900 border border-slate-800 p-5 hover:border-slate-600 transition-colors">
            <p class="text-xs font-medium uppercase tracking-wider text-slate-500">{{ $card['label'] }}</p>
            <p class="mt-2 text-4xl font-bold {{ $colors[$card['color']] }}">{{ $card['value'] }}</p>
        </a>
    @endforeach
</div>

<div class="mt-8 grid gap-6 lg:grid-cols-2">
    <div class="rounded-xl bg-slate-900 border border-slate-800 p-5">
        <h2 class="text-sm font-semibold text-slate-300 mb-4">Ações rápidas</h2>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('admin.posts.create') }}" class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-500 transition-colors">+ Novo Post</a>
            <a href="{{ route('admin.publications.create') }}" class="rounded-lg bg-purple-600 px-4 py-2 text-sm font-medium text-white hover:bg-purple-500 transition-colors">+ Nova Publicação</a>
            <a href="{{ route('admin.events.create') }}" class="rounded-lg bg-green-600 px-4 py-2 text-sm font-medium text-white hover:bg-green-500 transition-colors">+ Novo Evento</a>
            <a href="{{ route('admin.resources.create') }}" class="rounded-lg bg-slate-700 px-4 py-2 text-sm font-medium text-white hover:bg-slate-600 transition-colors">+ Novo Recurso</a>
        </div>
    </div>
    <div class="rounded-xl bg-slate-900 border border-slate-800 p-5">
        <h2 class="text-sm font-semibold text-slate-300 mb-2">Site público</h2>
        <p class="text-xs text-slate-500 mb-3">Veja como o site está sendo exibido para os visitantes.</p>
        <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center gap-1 text-sm text-blue-400 hover:text-blue-300">
            Abrir site
            <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
        </a>
    </div>
</div>
@endsection
