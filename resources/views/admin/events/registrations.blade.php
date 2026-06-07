@extends('layouts.admin')

@section('title', 'Inscrições — ' . $event->title)
@section('page-title', 'Inscrições: ' . $event->title)

@section('content')
<div class="mb-4 flex items-center justify-between">
    <a href="{{ route('admin.events.index') }}" class="text-sm text-slate-400 hover:text-slate-200">← Voltar aos eventos</a>
    <form method="POST" action="{{ route('admin.events.certificates.generate', $event) }}">
        @csrf
        <button type="submit" class="rounded-lg bg-green-600 px-4 py-2 text-sm font-medium text-white hover:bg-green-500 transition-colors">
            Gerar certificados (confirmados)
        </button>
    </form>
</div>

<div class="overflow-hidden rounded-xl border border-slate-800">
    <table class="w-full text-sm">
        <thead class="bg-slate-900 text-left text-xs font-semibold uppercase tracking-wider text-slate-400">
            <tr>
                <th class="px-4 py-3">Nome</th>
                <th class="px-4 py-3">E-mail</th>
                <th class="px-4 py-3">Instituição</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Certificado</th>
                <th class="px-4 py-3"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800 bg-slate-950">
            @forelse ($registrations as $reg)
                <tr class="hover:bg-slate-900/50">
                    <td class="px-4 py-3 text-slate-200 font-medium">{{ $reg->name }}</td>
                    <td class="px-4 py-3 text-slate-400">{{ $reg->email }}</td>
                    <td class="px-4 py-3 text-slate-400">{{ $reg->institution ?? '—' }}</td>
                    <td class="px-4 py-3">
                        <span class="rounded-full px-2 py-0.5 text-xs font-medium
                            {{ $reg->status === 'confirmed' ? 'bg-green-900/50 text-green-400' : ($reg->status === 'cancelled' ? 'bg-red-900/50 text-red-400' : 'bg-yellow-900/50 text-yellow-400') }}">
                            {{ ['pending' => 'Pendente', 'confirmed' => 'Confirmado', 'cancelled' => 'Cancelado'][$reg->status] }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-slate-400">
                        @if ($reg->certificate)
                            <a href="{{ route('certificate.download', $reg->token) }}" class="text-green-400 hover:text-green-300 text-xs">Download</a>
                        @else
                            <span class="text-slate-600 text-xs">—</span>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        @if ($reg->status === 'pending')
                            <form method="POST" action="{{ route('admin.events.registrations.confirm', [$event, $reg]) }}">
                                @csrf
                                <button type="submit" class="text-blue-400 hover:text-blue-300 text-xs">Confirmar</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="px-4 py-8 text-center text-slate-500">Nenhuma inscrição.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $registrations->links() }}</div>
@endsection
