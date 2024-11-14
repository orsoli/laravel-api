@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <form action="{{route('projects.store')}}" class="form-control w-75 shadow p-5" method="POST"
        enctype="multipart/form-data">
        @csrf

        <h2 class="text-decoration-underline text-center mb-3">Create new Project</h2>
        <div class="row mb-3">
            <div class="col-12 col-lg-6">
                <label for="name" class="form-label">Project Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                @error('name')
                <small><i class="text-danger">{{$message}}</i></small>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-lg-6">
                <label for="project-manager" class="form-label">Project Manager</label>
                <input type="text" class="form-control" name="project_manager" id="project-manager"
                    value="{{old('project_manager')}}">
                @error('project_manager')
                <small><i class="text-danger">{{$message}}</i></small>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-lg-6">
                <label for="types" class="form-label">Select Type</label>
                <select class="form-select" name="type_id" id="types">
                    <option selected disabled>Select Type</option>
                    @forelse ($types as $type)
                    <option value="{{$type->id}}" {{old('type_id')==$type->id ? 'selected' : ''}}>{{$type->title}}
                    </option>
                    @empty
                    <option selected disabled>You have o Types</option>
                    @endforelse
                </select>
                @error(' type_id') <small><i class="text-danger">{{$message}}</i></small>
                @enderror
            </div>
        </div>
        <div class="mb-3 form-control">
            <p class="text-decoration-underline">Check Project Technologies:</p>
            <div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                    @forelse ($technologies as $technology)
                    <div class="col">
                        <input type="checkbox" name="technologies[]" value="{{$technology->id}}" {{
                            in_array($technology->id, old('technologies', [])) ? 'checked' : ''}}
                        class="form-check-input" id="{{$technology->name}}">
                        <label for="{{$technology->name}}" class="form-check-label">{{$technology->name}}</label>
                    </div>
                    @empty
                    <p class="text-danger">You have no Technologies</p>
                    @endforelse
                </div>
            </div>
            @error('technologies')
            <small><i class="text-danger">{{$message}}</i></small>
            @enderror
        </div>
        <div class="row row-cols-1 row-cols-md-2 mb-3">
            <div class="col">
                <label for="start-date" class="form-label">Start Date</label>
                <input type="date" name="start_date" id="start-date" value="{{old('start_date', '' )}}"
                    class="form-control">
                @error('start_date')
                <small><i class="text-danger">{{$message}}</i></small>
                @enderror
            </div>
            <div class="col">
                <label for="end-date" class="form-label">End Date</label>
                <input type="date" name="end_date" id="end-date" value="{{old('end_date', '' )}}" class="form-control">
                @error('end_date')
                <small><i class="text-danger">{{$message}}</i></small>
                @enderror
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 mb-3">
            <div class="col">
                <label for="image_url" class="form-label">Choose image</label>
                <input type="file" name="image_url" id="image_url" class="form-control">
                @error('image_url')
                <small><i class="text-danger">{{$message}}</i></small>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description"
                    rows="3">{{old('description')}}</textarea>
                @error('description')
                <small><i class="text-danger">{{$message}}</i></small>
                @enderror
            </div>
        </div>
        <div class="btns p-2">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </div>
    </form>
</div>
@endsection