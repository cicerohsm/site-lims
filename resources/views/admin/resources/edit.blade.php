@extends('layouts.admin')

@section('title', 'Editar Recurso')
@section('page-title', 'Editar Recurso')

@section('content')
<div class="max-w-2xl">
    <form method="POST" action="{{ route('admin.resources.update', $resource) }}" enctype="multipart/form-data" class="space-y-5">
        @csrf @method('PUT')

        <div>
            <label class="block text-xs font-medium text-slate-400 mb-1">Título *</label>
            <input type="text" name="title" value="{{ old('title', $resource->title) }}" required
                   class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
        </div>

        <div>
            <label class="block text-xs font-medium text-slate-400 mb-1">Descrição</label>
            <textarea name="description" rows="3" class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">{{ old('description', $resource->description) }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1">Tipo *</label>
                <select name="type" class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
                    @foreach (['tool' => 'Ferramenta', 'material' => 'Material', 'dataset' => 'Dataset', 'template' => 'Template', 'other' => 'Outro'] as $v => $l)
                        <option value="{{ $v }}" @selected(old('type', $resource->type) === $v)>{{ $l }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center gap-2 pt-5">
                <input type="checkbox" name="is_public" value="1" id="is_public" @checked(old('is_public', $resource->is_public)) class="rounded">
                <label for="is_public" class="text-sm text-slate-300">Visível ao público</label>
            </div>
        </div>

        <div>
            <label class="block text-xs font-medium text-slate-400 mb-1">URL externa</label>
            <input type="url" name="url" value="{{ old('url', $resource->url) }}"
                   class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
        </div>

        <div>
            <label class="block text-xs font-medium text-slate-400 mb-1">Arquivo (substitui o atual)</label>
            @if ($resource->file_path)
                <p class="text-xs text-slate-500 mb-1">Atual: {{ basename($resource->file_path) }}</p>
            @endif
            <input type="file" name="file" class="text-sm text-slate-400">
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="rounded-lg bg-slate-700 px-5 py-2 text-sm font-medium text-white hover:bg-slate-600 transition-colors">Salvar</button>
            <a href="{{ route('admin.resources.index') }}" class="rounded-lg border border-slate-700 px-5 py-2 text-sm text-slate-400 hover:text-slate-200 transition-colors">Cancelar</a>
        </div>
    </form>
</div>
@endsection
