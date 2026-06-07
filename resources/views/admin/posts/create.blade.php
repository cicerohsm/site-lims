@extends('layouts.admin')

@section('title', 'Novo Post')
@section('page-title', 'Novo Post')

@section('content')
<div class="max-w-3xl">
    <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <div>
            <label class="block text-xs font-medium text-slate-400 mb-1">Título *</label>
            <input type="text" name="title" value="{{ old('title') }}" required
                   class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1">Categoria</label>
                <select name="post_category_id" class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
                    <option value="">Sem categoria</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" @selected(old('post_category_id') == $cat->id)>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1">Status *</label>
                <select name="status" class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
                    <option value="draft" @selected(old('status') === 'draft')>Rascunho</option>
                    <option value="published" @selected(old('status') === 'published')>Publicado</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-xs font-medium text-slate-400 mb-1">Resumo</label>
            <textarea name="excerpt" rows="2" class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">{{ old('excerpt') }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-medium text-slate-400 mb-1">Conteúdo *</label>
            <textarea name="body" rows="12" required class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 font-mono focus:border-blue-500 focus:outline-none">{{ old('body') }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-medium text-slate-400 mb-1">Imagem de capa</label>
            <input type="file" name="cover_image" accept="image/*" class="text-sm text-slate-400">
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="rounded-lg bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-500 transition-colors">Salvar</button>
            <a href="{{ route('admin.posts.index') }}" class="rounded-lg border border-slate-700 px-5 py-2 text-sm text-slate-400 hover:text-slate-200 transition-colors">Cancelar</a>
        </div>
    </form>
</div>
@endsection
