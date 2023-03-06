
@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="text-center py-2 mb-2 tracking-in-contract">Edit projects technology: "{{$technology->title}}"</h1>

    @include('admin.technologies.partials.form', [ 'method' => 'PUT', 'routeName' => 'admin.technologies.update'])
    
</div>
@endsection