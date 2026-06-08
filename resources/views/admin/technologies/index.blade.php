@extends('layouts.admin')

@section('title', 'Tecnologias')
@section('page-title', 'Tecnologias')

@section('content')
<div class="mb-4 flex items-center justify-between">
    <p class="text-sm text-slate-400">{{ $technologies->total() }} frente(s)</p>
    <a href="{{ route('admin.technologies.create') }}" class="rounded-lg bg-purple-600 px-4 py-2 text-sm font-medium text-white hover:bg-purple-500 transition-colors">+ Nova Tecnologia</a>
</div>

<div class="overflow-hidden rounded-xl border border-slate-800">
    <table class="w-full text-sm">
        <thead class="bg-slate-900 text-left text-xs font-semibold uppercase tracking-wider text-slate-400">
            <tr>
                <th class="px-4 py-3">Título</th>
                <th class="px-4 py-3">Ícone</th>
                <th class="px-4 py-3">Ordem</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800 bg-slate-950">
            @forelse ($technologies as $technology)
                <tr class="hover:bg-slate-900/50">
                    <td class="px-4 py-3 text-slate-200 font-medium">{{ $technology->title }}</td>
                    <td class="px-4 py-3 text-slate-400">{{ $technology->icon }}</td>
                    <td class="px-4 py-3 text-slate-400">{{ $technology->sort_order }}</td>
                    <td class="px-4 py-3">
                        <span class="rounded-full px-2 py-0.5 text-xs font-medium {{ $technology->is_active ? 'bg-green-900/50 text-green-400' : 'bg-slate-800 text-slate-400' }}">
                            {{ $technology->is_active ? 'Ativa' : 'Oculta' }}
                        </span>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('admin.technologies.edit', $technology) }}" class="text-blue-400 hover:text-blue-300 text-xs">Editar</a>
                            <form method="POST" action="{{ route('admin.technologies.destroy', $technology) }}" onsubmit="return confirm('Excluir esta frente tecnológica?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300 text-xs">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-4 py-8 text-center text-slate-500">Nenhuma frente tecnológica cadastrada.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $technologies->links() }}</div>
@endsection
