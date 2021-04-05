@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card border-success shadow">
        <div class="card-header bg-success text-white">
            Add student
        </div>
        <div class="card-body">
            <form action="{{route('students.store')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Student Code</label>
                    <input class="form-control" readonly type="text" value="{{$student_code}}" id="txt_code" name="txt_code">
                </div>
                <div class="form-group">
                    <label>Firstname</label>
                    <input class="form-control" type="text" id="txt_firstname" name="txt_firstname" autofocus required>
                </div>
                <div class="form-group">
                    <label>Lastname</label>
                    <input class="form-control" type="text" id="txt_lastname" name="txt_lastname" required>
                </div>
                <div class="form-group">
                    <label>Class</label>
                    <select class="form-control" type="text" id="txt_class" name="txt_class" required>
                        <option disabled>Please select...</option>
                        @foreach ($classrooms as $item)
                        <option value="{{$item->id}}">{{$item->class_name}}/{{$item->room_no}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-block" type="submit" id="btn_save">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection