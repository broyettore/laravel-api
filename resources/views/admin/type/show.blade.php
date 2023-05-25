@extends('layouts.app')

@section('content')
<div class="container py-4">
    @include('partials.message')
    <h2 class="mb-3">Type: {{ $type->name }}</h2>

    <div class="project_content mb-3">
        <ul class="list-group">
            @foreach ($type->projects as $project)
            <li class="list-group-item">
                <a href="{{ route("admin.projects.edit", $project->id) }}">{{ $project->name }}</a>
            </li>     
            @endforeach
          </ul>
    </div>
    <button type="button" class="btn btn-primary mb-3">
        <a href="{{ route("admin.types.index") }}" class="text-light">Back to Menu</a>
    </button>
</div>
@endsection