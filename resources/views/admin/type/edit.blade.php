@extends('layouts.app')

@section('content')
<div class="container py-4">
    <form action="{{ route('admin.types.update', $type->id) }}" method="POST">
    @csrf
    @method("PUT")

    <div class="mb-3">
        <label for="name" class="form-label">Type</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name'), $type->name }}">
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug'), $type->slug }}">
    </div>
    <div class="mb-3">
        <input type="submit" value="submit" class="btn btn-primary">
    </div>
    </form>
    @include('partials.errors')
<button type="button" class="btn btn-primary mb-3">
    <a href="{{ route("admin.types.index") }}" class="text-light">Back to Menu</a>
</button>
</div>
@endsection