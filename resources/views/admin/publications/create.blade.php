@extends('layouts.admin')

@section('title', 'Nova Publicação')
@section('page-title', 'Nova Publicação')

@section('content')
<div class="max-w-3xl">
    <form method="POST" action="{{ route('admin.publications.store') }}" class="space-y-5">
        @csrf

        <div>
            <label class="block text-xs font-medium text-slate-400 mb-1">Título *</label>
            <input type="text" name="title" value="{{ old('title') }}" required
                   class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
        </div>

        <div>
            <label class="block text-xs font-medium text-slate-400 mb-1">Autores *</label>
            <input type="text" name="authors" value="{{ old('authors') }}" required placeholder="Silva, J.; Souza, M."
                   class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1">Ano *</label>
                <input type="number" name="year" value="{{ old('year', date('Y')) }}" min="1900" max="2100" required
                       class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1">Tipo *</label>
                <select name="type" class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
                    @foreach (['article' => 'Artigo', 'tcc' => 'TCC', 'conference' => 'Congresso', 'book' => 'Livro', 'other' => 'Outro'] as $value => $label)
                        <option value="{{ $value }}" @selected(old('type') === $value)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1">DOI</label>
                <input type="text" name="doi" value="{{ old('doi') }}"
                       class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
            </div>
        </div>

        <div>
            <label class="block text-xs font-medium text-slate-400 mb-1">Veículo / Revista / Evento</label>
            <input type="text" name="venue" value="{{ old('venue') }}"
                   class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
        </div>

        <div>
            <label class="block text-xs font-medium text-slate-400 mb-1">URL</label>
            <input type="url" name="url" value="{{ old('url') }}"
                   class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
        </div>

        <div>
            <label class="block text-xs font-medium text-slate-400 mb-1">Resumo</label>
            <textarea name="abstract" rows="5" class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">{{ old('abstract') }}</textarea>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="rounded-lg bg-purple-600 px-5 py-2 text-sm font-medium text-white hover:bg-purple-500 transition-colors">Salvar</button>
            <a href="{{ route('admin.publications.index') }}" class="rounded-lg border border-slate-700 px-5 py-2 text-sm text-slate-400 hover:text-slate-200 transition-colors">Cancelar</a>
        </div>
    </form>
</div>
@endsection
