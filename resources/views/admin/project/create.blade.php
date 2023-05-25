@extends('layouts.app')

@section('content')
<div class="container py-4">
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="form-input-image">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Project's Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
    </div>
    <div class="mb-3">
        <label for="client" class="form-label">Client</label>
        <input type="text" class="form-control" id="client" name="client" value="{{ old('client') }}">
    </div>
    <div class="mb-3">
        <label for="start" class="form-label">Starting Date</label>
        <input type="date" class="form-control" id="start" name="start" value="{{ old('start') }}">
    </div>
    <div class="mb-3">
        <label for="end" class="form-label">End Date</label>
        <input type="date" class="form-control" id="end" name="end" value="{{ old('end') }}">
    </div>
    <div class="mb-3">
        <label for="progress_status" class="form-label">Progress/Status</label>
        <input type="text" class="form-control" id="progress_status" name="progress_status" value="{{ old('progress_status') }}">
    </div>
    <div class="mb-3">

        <!-- Img Preview -->
        <div class="preview">
            <img id="file-image-preview">
        </div>
         <!-- /Img Preview -->

        <label for="image" class="form-label">Image</label>
        <input class="form-control" type="file" id="image" name="image">
    </div>
    <div class="mb-3">
        <label for="type_id" class="form-label">Project's Type</label>
        <select class="form-select" aria-label="Default select example" name="type_id" id="type_id">
            <option value="">Select Project's Type</option>
            @foreach ($types as $type)
            <option value="{{ $type->id }}" {{ old("type_id") == $type->id ? "selected" : ""  }}>{{ $type->name }}</option>        
            @endforeach
          </select>
    </div>
    <div class="mb-3">
        @foreach ($technologies as $technology)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="technologies" value="{{ $technology->id }}" name="technologies[]" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
            <label class="form-check-label" for="technologies">{{ $technology->name }}</label>
        </div>
        @endforeach
    </div>
    <div class="mb-3">
        <input type="submit" value="submit" class="btn btn-primary">
    </div>
    </form>
    @include('partials.errors')
<button type="button" class="btn btn-primary mb-3">
    <a href="{{ route("admin.projects.index") }}" class="text-light">Back to Menu</a>
</button>
</div>
@endsection