@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center py-3">Types of Project</h1>
    <!-- Create types Button-->
    {{-- <a href="{{route('types.create')}}" type="button" class="btn btn-sm btn-outline-primary mb-3">
        Create new Type
    </a> --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Nr of projects</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($types as $type)
            <tr>
                <th scope="row">{{$type->id}}</th>
                <td>{{$type->title}}</td>
                <td>{{$type->description}}</td>
                <td>{{count($type->projects)}}</td>
                <td class="d-flex gap-1">
                    <a href="{{route('types.show', $type)}}" class="btn btn-sm btn-success"><i
                            class="bi bi-eye-fill"></i></a>
                    <a href="{{route('types.edit', $type)}}" class="btn btn-sm btn-warning"><i
                            class="bi bi-pencil-fill"></i></a>
                    <form action="{{route('types.destroy', $type)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger delete-btn" type="submit" value="delete"
                            delete-data-name="{{$type->name}}"><i class="bi bi-trash3-fill"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            abort(404)
            @endforelse
        </tbody>
    </table>
</div>
@endsection