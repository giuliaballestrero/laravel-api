@extends('layouts.app')

@section('content')
<div class="container pb-5">
    <!--Aggiungo un if session per i messaggi di conferma azioni-->
    @if (session('message'))
        <div class=" mt-5 alert alert-{{ session('alert-type') }}">
            {{ session('message')}}
        </div>
    @endif

    <h1 class="py-5 text-center"> 
        Projects in {{$type->name}} type
    </h1> 

    @foreach ($type->projects as $project)
        

    <div class="card text-center mb-4">
        <div class="card-header text-light fs-5">
            Author: <span class="fw-bold">{{ Auth::user()->name }} </span>
        </div>

        <div class="card-body p-3 m-3">
            <h2 class="card-title fw-bold p-3">
                {{ $project->title }}
            </h2>

            <p class="card-textpt-4 pt-4 mb-4">
                {{ $type->description }}
            </p>
            <p class="fw-bold py-3">
                Type: <a class="btn btn-disabled rounded-pill fw-bold ms-2" style="background-color: {{$project->type->color}}">{{$project->type->name}}<a>
            </p>

            {{--Per oogni progetto mostro i tag delle categorie--}}
            <div class="pb-4">
                <span class="fw-bold me-2">Made with (&hearts;): </span>
                @foreach ($project->technologies as $technology )
                   <a class="btn btn-disabled rounded-pill fw-bold me-2" style="background-color: {{$technology->bg_color}}">#{{$technology->name}}</a> 
                @endforeach
            </div>
        </div>

        <div class="card-footer text-muted">
            Created on {{ $project->creation_date }} - Proj. id: {{ $project->slug }}
        </div>
    </div>    
    @endforeach
</div>
@endsection