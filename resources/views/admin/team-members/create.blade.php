@extends('layouts.admin')

@section('title', 'Novo Membro')
@section('page-title', 'Novo Membro do Time')

@section('content')
<div class="max-w-3xl">
    <form method="POST" action="{{ route('admin.team-members.store') }}" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @include('admin.team-members.partials.form', ['member' => null])
    </form>
</div>
@endsection
