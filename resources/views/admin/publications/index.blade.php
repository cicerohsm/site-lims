@extends('layouts.admin')

@section('title', 'Publicações')
@section('page-title', 'Publicações')

@section('content')
<div class="mb-4 flex items-center justify-between">
    <p class="text-sm text-slate-400">{{ $publications->total() }} publicação(ões)</p>
    <a href="{{ route('admin.publications.create') }}" class="rounded-lg bg-purple-600 px-4 py-2 text-sm font-medium text-white hover:bg-purple-500 transition-colors">+ Nova Publicação</a>
</div>

<div class="overflow-hidden rounded-xl border border-slate-800">
    <table class="w-full text-sm">
        <thead class="bg-slate-900 text-left text-xs font-semibold uppercase tracking-wider text-slate-400">
            <tr>
                <th class="px-4 py-3">Título</th>
                <th class="px-4 py-3">Autores</th>
                <th class="px-4 py-3">Ano</th>
                <th class="px-4 py-3">Tipo</th>
                <th class="px-4 py-3"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800 bg-slate-950">
            @forelse ($publications as $pub)
                <tr class="hover:bg-slate-900/50">
                    <td class="px-4 py-3 text-slate-200 font-medium max-w-xs truncate">{{ $pub->title }}</td>
                    <td class="px-4 py-3 text-slate-400 max-w-xs truncate">{{ $pub->authors }}</td>
                    <td class="px-4 py-3 text-slate-400">{{ $pub->year }}</td>
                    <td class="px-4 py-3 text-slate-400 capitalize">{{ $pub->type }}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('admin.publications.edit', $pub) }}" class="text-blue-400 hover:text-blue-300 text-xs">Editar</a>
                            <form method="POST" action="{{ route('admin.publications.destroy', $pub) }}" onsubmit="return confirm('Excluir?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300 text-xs">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-4 py-8 text-center text-slate-500">Nenhuma publicação cadastrada.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $publications->links() }}</div>
@endsection
