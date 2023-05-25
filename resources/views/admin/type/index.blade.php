@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h2 class="mb-3">Projects Types</h2>
  <div class="mb-3">
    <a href="{{ route("admin.types.create") }}" class="btn btn-primary text-light">
      Add a Type
    </a>
  </div>
  @include('partials.message')
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
              <tr>
                <th scope="row">{{ $type->name }}</th>
                <td>{{ $type->slug }}</td>
                <td>
                  <div class="d-flex">
                    <a href="{{ route("admin.types.show", $type->id)}}" class="btn btn-primary me-1">
                      Show
                      </a>
                      <a href="{{ route("admin.types.edit", $type->id)}}" class="btn btn-secondary me-1">
                        <i class="fa-solid fa-pen text-light"></i>
                      </a>
                      <button type="submit" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#type-{{ $type->id }}">
                        <i class="fa-solid fa-trash text-light"></i>
                      </button>

                    <div class="modal fade" id="type-{{ $type->id }}" tabindex="-1"  aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Warning</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              Are you sure you want to delete project <strong>{{ $type->id }}</strong>?
                          </div>
                          <div class="modal-footer">
                              <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                   <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>  
</div>
@endsection