@extends('layouts.admin')

@section('title', 'Editar Membro')
@section('page-title', 'Editar: ' . $teamMember->name)

@section('content')
<div class="max-w-3xl">
    <form method="POST" action="{{ route('admin.team-members.update', $teamMember) }}" enctype="multipart/form-data" class="space-y-5">
        @csrf @method('PUT')
        @include('admin.team-members.partials.form', ['member' => $teamMember])
    </form>
</div>
@endsection
