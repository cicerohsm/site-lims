@extends('layouts.admin')

@section('title', 'Recursos')
@section('page-title', 'Recursos')

@section('content')
<div class="mb-4 flex items-center justify-between">
    <p class="text-sm text-slate-400">{{ $resources->total() }} recurso(s)</p>
    <a href="{{ route('admin.resources.create') }}" class="rounded-lg bg-slate-700 px-4 py-2 text-sm font-medium text-white hover:bg-slate-600 transition-colors">+ Novo Recurso</a>
</div>

<div class="overflow-hidden rounded-xl border border-slate-800">
    <table class="w-full text-sm">
        <thead class="bg-slate-900 text-left text-xs font-semibold uppercase tracking-wider text-slate-400">
            <tr>
                <th class="px-4 py-3">Título</th>
                <th class="px-4 py-3">Tipo</th>
                <th class="px-4 py-3">Público</th>
                <th class="px-4 py-3"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800 bg-slate-950">
            @forelse ($resources as $resource)
                <tr class="hover:bg-slate-900/50">
                    <td class="px-4 py-3 text-slate-200 font-medium">{{ $resource->title }}</td>
                    <td class="px-4 py-3 text-slate-400 capitalize">{{ $resource->type }}</td>
                    <td class="px-4 py-3">
                        <span class="rounded-full px-2 py-0.5 text-xs font-medium {{ $resource->is_public ? 'bg-green-900/50 text-green-400' : 'bg-slate-800 text-slate-400' }}">
                            {{ $resource->is_public ? 'Sim' : 'Não' }}
                        </span>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('admin.resources.edit', $resource) }}" class="text-blue-400 hover:text-blue-300 text-xs">Editar</a>
                            <form method="POST" action="{{ route('admin.resources.destroy', $resource) }}" onsubmit="return confirm('Excluir?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300 text-xs">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-4 py-8 text-center text-slate-500">Nenhum recurso cadastrado.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $resources->links() }}</div>
@endsection
