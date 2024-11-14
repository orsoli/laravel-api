@extends('layouts.app')

@section('content')
<main>
    <div class="container">
        <div class="card my-5 shadow">
            <div class="card-body">
                <img src="{{asset('storage/'.$project->image_url)}}" alt="{{$project->name. '\'s image'}}"
                    class="rounded-4 shadow">
                <h5 class="card-title py-3">{{$project->name}}</h5>
                <p class="card-text">{{$project->description}}</p>
                <p class="card-text fw-bold fst-italic">Technology to use:</p>
                @foreach ($project->technologies as $technology)
                <p class="card-text">{{$technology->name}}: {{$technology->description}}</p>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection