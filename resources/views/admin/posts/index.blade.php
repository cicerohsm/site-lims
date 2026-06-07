@extends('layouts.admin')

@section('title', 'Posts')
@section('page-title', 'Posts')

@section('content')
<div class="mb-4 flex items-center justify-between">
    <p class="text-sm text-slate-400">{{ $posts->total() }} post(s)</p>
    <a href="{{ route('admin.posts.create') }}" class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-500 transition-colors">+ Novo Post</a>
</div>

<div class="overflow-hidden rounded-xl border border-slate-800">
    <table class="w-full text-sm">
        <thead class="bg-slate-900 text-left text-xs font-semibold uppercase tracking-wider text-slate-400">
            <tr>
                <th class="px-4 py-3">Título</th>
                <th class="px-4 py-3">Categoria</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Publicado em</th>
                <th class="px-4 py-3"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800 bg-slate-950">
            @forelse ($posts as $post)
                <tr class="hover:bg-slate-900/50">
                    <td class="px-4 py-3 text-slate-200 font-medium">{{ $post->title }}</td>
                    <td class="px-4 py-3 text-slate-400">{{ $post->category?->name ?? '—' }}</td>
                    <td class="px-4 py-3">
                        <span class="rounded-full px-2 py-0.5 text-xs font-medium
                            {{ $post->status === 'published' ? 'bg-green-900/50 text-green-400' : 'bg-slate-800 text-slate-400' }}">
                            {{ $post->status === 'published' ? 'Publicado' : 'Rascunho' }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-slate-400">{{ $post->published_at?->format('d/m/Y') ?? '—' }}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('admin.posts.edit', $post) }}" class="text-blue-400 hover:text-blue-300 text-xs">Editar</a>
                            <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('Excluir este post?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300 text-xs">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-4 py-8 text-center text-slate-500">Nenhum post cadastrado.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $posts->links() }}</div>
@endsection
