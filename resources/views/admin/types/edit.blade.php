
@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="text-center py-2 mb-2 tracking-in-contract">Edit project types: "{{$type->title}}"</h1>

    @include('admin.types.partials.form', [ 'method' => 'PUT', 'routeName' => 'admin.types.update'])

</div>
@endsection