@extends('layouts.admin')

@section('title', 'Nova Tecnologia')
@section('page-title', 'Nova Frente Tecnológica')

@section('content')
<div class="max-w-3xl">
    <form method="POST" action="{{ route('admin.technologies.store') }}" class="space-y-5">
        @csrf
        @include('admin.technologies.partials.form', ['technology' => null])
    </form>
</div>
@endsection
