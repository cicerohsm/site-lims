@extends('layouts.admin')

@section('title', 'Time')
@section('page-title', 'Time')

@section('content')
<div class="mb-4 flex items-center justify-between">
    <p class="text-sm text-slate-400">{{ $members->total() }} membro(s)</p>
    <a href="{{ route('admin.team-members.create') }}" class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-500 transition-colors">+ Novo Membro</a>
</div>

<div class="overflow-hidden rounded-xl border border-slate-800">
    <table class="w-full text-sm">
        <thead class="bg-slate-900 text-left text-xs font-semibold uppercase tracking-wider text-slate-400">
            <tr>
                <th class="px-4 py-3">Nome</th>
                <th class="px-4 py-3">Função</th>
                <th class="px-4 py-3">Ordem</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800 bg-slate-950">
            @forelse ($members as $member)
                <tr class="hover:bg-slate-900/50">
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            @if ($member->photo_path)
                                <img src="{{ Storage::url($member->photo_path) }}" alt="" class="h-10 w-10 rounded-full object-cover">
                            @else
                                <span class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-800 text-xs font-bold text-slate-300">{{ $member->initials }}</span>
                            @endif
                            <span class="font-medium text-slate-200">{{ $member->name }}</span>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-slate-400">{{ $member->role }}</td>
                    <td class="px-4 py-3 text-slate-400">{{ $member->sort_order }}</td>
                    <td class="px-4 py-3">
                        <span class="rounded-full px-2 py-0.5 text-xs font-medium {{ $member->is_active ? 'bg-green-900/50 text-green-400' : 'bg-slate-800 text-slate-400' }}">
                            {{ $member->is_active ? 'Ativo' : 'Oculto' }}
                        </span>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('admin.team-members.edit', $member) }}" class="text-blue-400 hover:text-blue-300 text-xs">Editar</a>
                            <form method="POST" action="{{ route('admin.team-members.destroy', $member) }}" onsubmit="return confirm('Excluir este membro do time?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300 text-xs">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-4 py-8 text-center text-slate-500">Nenhum membro cadastrado.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $members->links() }}</div>
@endsection
