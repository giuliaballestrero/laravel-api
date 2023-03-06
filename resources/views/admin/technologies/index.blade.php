@extends('layouts.app')

@section('content')
    @include('admin.partials.popup')

    <div class="container">
        <!--Aggiungo un if session per i messaggi di conferma azioni-->
        @if (session('message'))
            <div class=" mt-5 alert alert-{{ session('alert-type') }}">
                {{ session('message') }}
            </div>
        @endif

        <h1 class="pt-5 text-center tracking-in-contract">{{ Auth::user()->name }} Projects technologies</h1>

        <div class="pt-3 d-flex justify-content-end">
            <a href="{{ route('admin.technologies.create') }}" class="btn btn-success rounded-circle">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
        <table class="table table-striped table-borderless table-hover mt-5">
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Text Color</th>
                    <th scope="col">Background Color</th>
                    <th class="text-center" scope="col">Number of projects</th>
                    <th class="text-center" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($technologies as $technology)
                    <tr>
                        <td>{{ $technology->id }}</td>
                        <td>{{ $technology->name }}</td>
                        <td class="fw-bold"style="color: {{ $technology->text_color }}">{{ $technology->text_color }}</td>
                        <td style="background-color: {{ $technology->bg_color }}">{{ $technology->bg_color }}</td>
                        <td class="text-center">{{ count($technology->projects) }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('admin.technologies.show', $technology->id) }}"
                                    class="btn btn-sm btn-primary rounded-circle me-1">
                                    <i class="fa-solid fa-eye"></i>
                                </a>

                                <a href="{{ route('admin.technologies.edit', $technology->id) }}"
                                    class="btn btn-sm btn-warning rounded-circle me-1">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>

                                {{-- per la delete inserire il bottone in un form --}}
                                <form class="delete" action="{{ route('admin.technologies.destroy', $technology->id) }}"
                                    method="POST">
                                    @csrf
                                    {{-- utilizzo il metodo delete --}}
                                    @method('DELETE')
                                    <button technlogy="submit" class="btn btn-sm btn-danger delete rounded-circle"
                                        title="delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection

@section('script')
    @vite('resources/js/confirmDelete.js')
@endsection

{{-- rotte da aggiungere
    
    


    --}}