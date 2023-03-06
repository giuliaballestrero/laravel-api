
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3 pt-5 text-center tracking-in-contract">
        Create a new technology project from <span class="fw-semibold">{{ Auth::user()->name }} </span>
    </h1>

    @include('admin.technologies.partials.form', [ 'method' => 'POST', 'routeName' => 'admin.technologies.store'])

</div>
@endsection