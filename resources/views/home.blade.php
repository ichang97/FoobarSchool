@extends('layouts.app')

@section('content')
<div class="container">
    <div class="alert alert-primary shadow">
        <h3 class="h3 text-center">
        Welcome to FooBarSchool.<br />
        User : {{Auth::user()->name}}
        </h3>
    </div>

    <div class="row">
        <div class="col">
            <div class="alert alert-success shadow text-center">
                <i class="fas fa-users display-3"></i><br /><br />

                <h5 class="h3">Students : {{$student_count}}</h3>
            </div>
        </div>
        <div class="col">
            <div class="alert alert-warning shadow text-center">
                <i class="fas fa-book display-3"></i><br /><br />

                <h5 class="h3">Subjects : {{$subject_count}}</h3>
            </div>
        </div>
    </div>
    
</div>
@endsection