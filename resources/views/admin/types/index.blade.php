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

        <h1 class="pt-5 text-center tracking-in-contract">{{ Auth::user()->name }} Project Types</h1>

        <div class="pt-3 d-flex justify-content-end">
            <a href="{{ route('admin.types.create') }}" class="btn btn-success rounded-circle">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
        <table class="table table-striped table-borderless table-hover mt-5">
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Color</th>
                    <th class="text-center" scope="col">Number of Projects</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->name }}</td>
                        <td class="text-light" style="background-color: {{ $type->color }}">{{ $type->color }}</td>
                        <td class="text-center">{{ count($type->projects) }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('admin.types.show', $type->id) }}"
                                    class="btn btn-sm btn-primary rounded-circle me-1">
                                    <i class="fa-solid fa-eye"></i>
                                </a>

                                <a href="{{ route('admin.types.edit', $type->id) }}"
                                    class="btn btn-sm btn-warning rounded-circle me-1">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>

                                {{-- per la delete inserire il bottone in un form --}}
                                <form class="delete" action="{{ route('admin.types.destroy', $type->id) }}"
                                    method="POST">
                                    @csrf
                                    {{-- utilizzo il metodo delete --}}
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger delete rounded-circle"
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

{{-- per la delete inserire il bottone in un form 
    
    --}}