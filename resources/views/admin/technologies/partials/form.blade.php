@php
    $icons = [
        'code' => 'Código',
        'monitor' => 'Tela',
        'network' => 'Rede',
        'wifi' => 'IoT',
        'cube' => '3D',
        'education' => 'Educação',
        'list' => 'APIs',
        'chip' => 'Hardware',
    ];
@endphp

<div>
    <label class="block text-xs font-medium text-slate-400 mb-1">Título *</label>
    <input type="text" name="title" value="{{ old('title', $technology?->title) }}" required
           class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
</div>

<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="block text-xs font-medium text-slate-400 mb-1">Ícone *</label>
        <select name="icon" class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
            @foreach ($icons as $value => $label)
                <option value="{{ $value }}" @selected(old('icon', $technology?->icon ?? 'code') === $value)>{{ $label }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block text-xs font-medium text-slate-400 mb-1">Ordem</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $technology?->sort_order ?? 0) }}" min="0"
               class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
    </div>
</div>

<div>
    <label class="block text-xs font-medium text-slate-400 mb-1">Descrição</label>
    <textarea name="description" rows="5" class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">{{ old('description', $technology?->description) }}</textarea>
</div>

<div class="flex items-center gap-2">
    <input type="checkbox" name="is_active" value="1" id="is_active" @checked(old('is_active', $technology?->is_active ?? true)) class="rounded">
    <label for="is_active" class="text-sm text-slate-300">Exibir no site</label>
</div>

<div class="flex gap-3 pt-2">
    <button type="submit" class="rounded-lg bg-purple-600 px-5 py-2 text-sm font-medium text-white hover:bg-purple-500 transition-colors">Salvar</button>
    <a href="{{ route('admin.technologies.index') }}" class="rounded-lg border border-slate-700 px-5 py-2 text-sm text-slate-400 hover:text-slate-200 transition-colors">Cancelar</a>
</div>
