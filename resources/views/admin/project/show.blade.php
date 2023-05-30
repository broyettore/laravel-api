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
          <hr>
          @if ($project->leads->count())
          <div class="leads">
            <h3>Leads</h3>
            <ul class="ps-0">
                @foreach ($project->leads as $lead)
                <li class="list-unstyled mb-3">
                    <h4>Lead: {{ $lead->name }}</h4>
                    <p>Message: {{ $lead->content }}</p>
                    <form action="{{ route('admin.leads.destroy', $lead) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </li>
                <hr>
                @endforeach
            </ul>
          </div>
          @endif
    </div>
    <button type="button" class="btn btn-primary mb-3">
        <a href="{{ route("admin.projects.index") }}" class="text-light">Back to Menu</a>
    </button>
</div>
@endsection