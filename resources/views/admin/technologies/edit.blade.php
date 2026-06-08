@extends('layouts.admin')

@section('title', 'Editar Tecnologia')
@section('page-title', 'Editar: ' . $technology->title)

@section('content')
<div class="max-w-3xl">
    <form method="POST" action="{{ route('admin.technologies.update', $technology) }}" class="space-y-5">
        @csrf @method('PUT')
        @include('admin.technologies.partials.form', ['technology' => $technology])
    </form>
</div>
@endsection
