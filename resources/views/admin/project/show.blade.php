@extends('layouts.app')

@section('content')
<div class="container py-4">
    @include('partials.message')
    <h2 class="mb-3">Project: {{ $project->name }}</h2>
    @if ($project->type_id)
        <h3 class="mb-3">Type: {{ $project->type->name }}</h3>
    @endif
    @if ($project->technologies)
    <h4 class="mb-3">Technologies: 
        @foreach ($project->technologies as $technology)
        @if ($loop->last)
            <span>{{ $technology->name}}</span>.
            @else     
            <span>{{ $technology->name}}</span>,
            @endif
        @endforeach
    </h4>
    @endif
    @if ($project->image)
    <div class="project-img mb-3">
        <img src=" {{ asset("storage/" . $project->image) }}" alt="{{ $project->name }}">
    </div>  
    @endif
    <div class="project_content mb-3">
        <ul class="list-group">
            <li class="list-group-item">Description :{{ $project->description }}</li>
            <li class="list-group-item">Client : {{ $project->client }}</li>
            <li class="list-group-item">Starting Date: {{ $project->start }}</li>
            <li class="list-group-item">End date: {{ $project->end }}</li>
            <li class="list-group-item">Progress: {{ $project->progress_status }}</li>
          </ul>
    </div>
    <button type="button" class="btn btn-primary mb-3">
        <a href="{{ route("admin.projects.index") }}" class="text-light">Back to Menu</a>
    </button>
</div>
@endsection