@extends('layouts.app')

@section('content')
<div class="container">
@if(session('result'))
<script>
    Swal.fire(
        "{{session('result.title')}}",
        "{{session('result.msg')}}",
        "{{session('result.type')}}"
    )
</script>
@endif

<script>
    $(document).ready(function(){
        $('#tbl_students').DataTable();
    });
</script>

<a href="{{route('courses.index')}}" class="btn btn-primary btn-block"><i class="fas fa-arrow-left"></i> Back</a><br />

    <div class="card shadow">
        <div class="card-header bg-warning">
            @foreach($subject as $subject_item)
            <h5 class="h5 text-center"><i class="fas fa-book"></i> [{{$subject_item->subject_code}}] {{$subject_item->subject_name}}</h5>
            @endforeach
        </div>
    </div><br />

    
    <form action="{{route('courses.store')}}" method="post">
        @csrf
        <div class="input-group">
            <select class="form-control" type="text" id="txt_student" name="txt_student" required>
                <option disabled>Select students...</option>
                @foreach($all_students as $student_name)
                <option value="{{$student_name->id}}">[{{$student_name->code}}] : {{$student_name->firstname}} {{$student_name->lastname}}</option>
                @endforeach
            </select>
            @foreach($subject as $subject_item)
            <input hidden value="{{$subject_item->subject_id}}" id="txt_subjectid" name="txt_subjectid">
            @endforeach
            <div class="input-group-append">
                <button class="btn btn-success" type="submit" id="btn_addstudent"><i class="fa fa-plus"></i> Add student</button>
            </div>
        </div>
    </form>
    <br /><br />

    <table class="table table-hover" id="tbl_students">
        <thead class="text-center">
            <th>#</th>
            <th>Student name</th>
            <th>Classroom</th>
        </thead>
        <tbody>
            @foreach($students as $key => $value)
            <tr class="text-center">
                <td>{{$key + 1}}</td>
                <td>[{{$value->code}}] {{$value->firstname}} {{$value->lastname}}</td>
                <td>{{$value->class_name}}/{{$value->room_no}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection