@extends('layouts.admin')

@section('title', 'Editar Evento')
@section('page-title', 'Editar: ' . $event->title)

@section('content')
<div class="max-w-3xl">
    <form method="POST" action="{{ route('admin.events.update', $event) }}" enctype="multipart/form-data" class="space-y-5">
        @csrf @method('PUT')

        <div>
            <label class="block text-xs font-medium text-slate-400 mb-1">Título *</label>
            <input type="text" name="title" value="{{ old('title', $event->title) }}" required
                   class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1">Tipo *</label>
                <select name="type" class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
                    @foreach (['seminar' => 'Seminário', 'workshop' => 'Workshop', 'conference' => 'Conferência', 'meeting' => 'Reunião', 'other' => 'Outro'] as $v => $l)
                        <option value="{{ $v }}" @selected(old('type', $event->type) === $v)>{{ $l }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1">Status *</label>
                <select name="status" class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
                    <option value="draft" @selected(old('status', $event->status) === 'draft')>Rascunho</option>
                    <option value="published" @selected(old('status', $event->status) === 'published')>Publicado</option>
                    <option value="cancelled" @selected(old('status', $event->status) === 'cancelled')>Cancelado</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1">Início *</label>
                <input type="datetime-local" name="starts_at" value="{{ old('starts_at', $event->starts_at->format('Y-m-d\TH:i')) }}" required
                       class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1">Término</label>
                <input type="datetime-local" name="ends_at" value="{{ old('ends_at', $event->ends_at?->format('Y-m-d\TH:i')) }}"
                       class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1">Local</label>
                <input type="text" name="location" value="{{ old('location', $event->location) }}"
                       class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1">Vagas</label>
                <input type="number" name="capacity" value="{{ old('capacity', $event->capacity) }}" min="1"
                       class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
            </div>
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" name="registration_open" value="1" id="reg_open" @checked(old('registration_open', $event->registration_open)) class="rounded">
            <label for="reg_open" class="text-sm text-slate-300">Inscrições abertas</label>
        </div>

        <div>
            <label class="block text-xs font-medium text-slate-400 mb-1">Descrição</label>
            <textarea name="description" rows="5" class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">{{ old('description', $event->description) }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-medium text-slate-400 mb-1">Imagem</label>
            @if ($event->image)
                <img src="{{ Storage::url($event->image) }}" alt="" class="mb-2 h-24 rounded object-cover">
            @endif
            <input type="file" name="image" accept="image/*" class="text-sm text-slate-400">
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="rounded-lg bg-green-600 px-5 py-2 text-sm font-medium text-white hover:bg-green-500 transition-colors">Salvar</button>
            <a href="{{ route('admin.events.index') }}" class="rounded-lg border border-slate-700 px-5 py-2 text-sm text-slate-400 hover:text-slate-200 transition-colors">Cancelar</a>
        </div>
    </form>
</div>
@endsection
