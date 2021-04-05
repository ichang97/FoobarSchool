@extends('layouts.app')

@section('content')
<div class="container">
    <div class="alert alert-primary shadow">
        <h3 class="h3 text-center">
        Welcome to FooBarSchool.<br />
        User : {{Auth::user()->name}}
        </h3>
    </div>
</div>
@endsection