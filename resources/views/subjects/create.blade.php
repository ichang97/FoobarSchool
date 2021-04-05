@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card border-success shadow">
        <div class="card-header bg-success text-white">
            Add Subject
        </div>
        <div class="card-body">
            <form action="{{route('subjects.store')}}" method="POST">
            @csrf

                <div class="form-group">
                    <label>Subject code</label>
                    <input class="form-control" type="text" id="txt_subjectcode" name="txt_subjectcode" autofocus required>
                </div>
                <div class="form-group">
                    <label>Subject name</label>
                    <input class='form-control' type="text" id="txt_subjectname" name="txt_subjectname" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-block" type="submit" id="btn_save">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection