@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="mb-5 text-center text-light bg-dark tracking-in-contract">
        Last Projects
    </h1>

    @forelse ( $projects as $project)
        <div class="card text-center mb-3">
            <div class="card-body p-3 m-3">
                <h2 class="card-title fw-bold p-3">
                    {{ $project->title }}
                </h2>

                @if ( $project->isImageAUrl())
                <img src="{{$project->thumb}}" class="img-thumb" alt="{{$project->title}}">
                @else
                <img src="{{asset('storage/' . $project->thumb)}}" class="card-img-top" alt="{{$project->title}}">
                @endif

                <p class="card-text pt-4 mb-4">
                    {{ $project->description }}
                </p>
                <p class="fw-bold">
                    Type: <a class="btn btn-disabled rounded-pill fw-bold ms-2" style="background-color: {{$project->type->color}}">{{$project->type->name}}<a>
                </p>

                {{--Per oogni progetto mostro i tag delle categorie--}}

                <span class="fw-bold me-2">Made with (&hearts;): </span>
                @foreach ($project->technologies as $technology )
                   <a class="btn btn-disabled rounded-pill fw-bold me-2" style="background-color: {{$technology->bg_color}}">#{{$technology->name}}</a> 
                @endforeach
            </div>
            
            <div class="card-footer text-muted">
                Created on {{ $project->creation_date }} - Proj. id: {{ $project->slug }}
            </div>
        </div>    
    @empty
        <div>
            <h5 class="text-secondary">
                No Projects to show
            </h5>
        </div>
    @endforelse

        {{-- inserisco la pagination --}}
        <div class="py-5">
            {{ $projects->links() }}
        </div>    
</div>

@endsection