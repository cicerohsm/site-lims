@extends('layouts.admin')

@section('title', 'Eventos')
@section('page-title', 'Eventos')

@section('content')
<div class="mb-4 flex items-center justify-between">
    <p class="text-sm text-slate-400">{{ $events->total() }} evento(s)</p>
    <a href="{{ route('admin.events.create') }}" class="rounded-lg bg-green-600 px-4 py-2 text-sm font-medium text-white hover:bg-green-500 transition-colors">+ Novo Evento</a>
</div>

<div class="overflow-hidden rounded-xl border border-slate-800">
    <table class="w-full text-sm">
        <thead class="bg-slate-900 text-left text-xs font-semibold uppercase tracking-wider text-slate-400">
            <tr>
                <th class="px-4 py-3">Título</th>
                <th class="px-4 py-3">Data</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Inscrições</th>
                <th class="px-4 py-3"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800 bg-slate-950">
            @forelse ($events as $event)
                <tr class="hover:bg-slate-900/50">
                    <td class="px-4 py-3 text-slate-200 font-medium">{{ $event->title }}</td>
                    <td class="px-4 py-3 text-slate-400">{{ $event->starts_at->format('d/m/Y H:i') }}</td>
                    <td class="px-4 py-3">
                        <span class="rounded-full px-2 py-0.5 text-xs font-medium
                            {{ $event->status === 'published' ? 'bg-green-900/50 text-green-400' : ($event->status === 'cancelled' ? 'bg-red-900/50 text-red-400' : 'bg-slate-800 text-slate-400') }}">
                            {{ ['draft' => 'Rascunho', 'published' => 'Publicado', 'cancelled' => 'Cancelado'][$event->status] }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-slate-400">{{ $event->registrations_count ?? $event->registrations()->count() }}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('admin.events.registrations', $event) }}" class="text-green-400 hover:text-green-300 text-xs">Inscrições</a>
                            <a href="{{ route('admin.events.edit', $event) }}" class="text-blue-400 hover:text-blue-300 text-xs">Editar</a>
                            <form method="POST" action="{{ route('admin.events.destroy', $event) }}" onsubmit="return confirm('Excluir?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300 text-xs">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-4 py-8 text-center text-slate-500">Nenhum evento cadastrado.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $events->links() }}</div>
@endsection
