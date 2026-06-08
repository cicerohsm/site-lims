<div>
    <label class="block text-xs font-medium text-slate-400 mb-1">Nome *</label>
    <input type="text" name="name" value="{{ old('name', $member?->name) }}" required
           class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
</div>

<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="block text-xs font-medium text-slate-400 mb-1">Função *</label>
        <input type="text" name="role" value="{{ old('role', $member?->role) }}" required
               class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
    </div>
    <div>
        <label class="block text-xs font-medium text-slate-400 mb-1">Ordem</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $member?->sort_order ?? 0) }}" min="0"
               class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
    </div>
</div>

<div>
    <label class="block text-xs font-medium text-slate-400 mb-1">Biografia</label>
    <textarea name="bio" rows="5" class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">{{ old('bio', $member?->bio) }}</textarea>
</div>

<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="block text-xs font-medium text-slate-400 mb-1">Lattes</label>
        <input type="url" name="lattes_url" value="{{ old('lattes_url', $member?->lattes_url) }}"
               class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
    </div>
    <div>
        <label class="block text-xs font-medium text-slate-400 mb-1">LinkedIn</label>
        <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $member?->linkedin_url) }}"
               class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 text-sm text-slate-100 focus:border-blue-500 focus:outline-none">
    </div>
</div>

<div>
    <label class="block text-xs font-medium text-slate-400 mb-1">Foto</label>
    @if ($member?->photo_path)
        <img src="{{ Storage::url($member->photo_path) }}" alt="" class="mb-2 h-24 w-24 rounded-full object-cover">
    @endif
    <input type="file" name="photo" accept="image/*" class="text-sm text-slate-400">
</div>

<div class="flex items-center gap-2">
    <input type="checkbox" name="is_active" value="1" id="is_active" @checked(old('is_active', $member?->is_active ?? true)) class="rounded">
    <label for="is_active" class="text-sm text-slate-300">Exibir no site</label>
</div>

<div class="flex gap-3 pt-2">
    <button type="submit" class="rounded-lg bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-500 transition-colors">Salvar</button>
    <a href="{{ route('admin.team-members.index') }}" class="rounded-lg border border-slate-700 px-5 py-2 text-sm text-slate-400 hover:text-slate-200 transition-colors">Cancelar</a>
</div>
