@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h2 class="mb-3">Project's List</h2>
  <div class="mb-3">
    <a href="{{ route("admin.projects.create") }}" class="btn btn-primary text-light">
      Add a Project
    </a>
  </div>
  @include('partials.message')
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Project's Name</th>
                <th scope="col">Description</th>
                <th scope="col">Client</th>
                <th scope="col">Start_of_project</th>
                <th scope="col">End_of_project</th>
                <th scope="col">Progress_Status</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
              <tr>
                <th scope="row">{{ $project->name }}</th>
                <td>{{ $project->description }}</td>
                <td>{{ $project->client }}</td>
                <td>{{ $project->start }}</td>
                <td>{{ $project->end }}</td>
                <td>{{ $project->progress_status }}</td>
                <td>
                  <div class="d-flex">
                    <a href="{{ route("admin.projects.show", $project->slug)}}" class="btn btn-primary me-1">
                      Show
                      </a>
                      <a href="{{ route("admin.projects.edit", $project->slug)}}" class="btn btn-secondary me-1">
                        <i class="fa-solid fa-pen text-light"></i>
                      </a>
                      <button type="submit" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#project-{{ $project->slug }}">
                        <i class="fa-solid fa-trash text-light"></i>
                      </button>

                    <div class="modal fade" id="project-{{ $project->id }}" tabindex="-1"  aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Warning</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              Are you sure you want to delete project <strong>{{ $project->id }}</strong>?
                          </div>
                          <div class="modal-footer">
                              <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
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