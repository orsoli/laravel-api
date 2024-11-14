@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Create projects Button-->
    <a href="{{route('projects.create')}}" type="button" class="btn btn-sm btn-outline-primary mb-3">
        Create new Project
    </a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Manager</th>
                <th scope="col">Description</th>
                <th scope="col">Technology</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
            <tr>
                <th scope="row">{{$project->id}}</th>
                <td>{{$project->name}}</td>
                <td>{{$project->type->title}}</td>
                <td>{{$project->project_manager}}</td>
                <td>{{$project->description}}</td>
                <td>
                    @foreach ($project->technologies as $technology)
                    <span class="badge text-bg-secondary">{{$technology->name}}</span>
                    @endforeach
                </td>
                <td class="d-flex gap-1">
                    <a href="{{route('projects.show', $project)}}" class="btn btn-sm btn-success"><i
                            class="bi bi-eye-fill"></i></a>
                    <a href="{{route('projects.edit', $project)}}" class="btn btn-sm btn-warning"><i
                            class="bi bi-pencil-fill"></i></a>
                    <form action="{{route('projects.destroy', $project)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger delete-btn" type="submit" value="delete"
                            delete-data-name="{{$project->name}}"><i class="bi bi-trash3-fill"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            abort(404)
            @endforelse
        </tbody>
    </table>

    <div>
        {{$projects->links('vendor.pagination.simple-bootstrap-5')}}
    </div>
</div>
@endsection