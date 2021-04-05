@extends('layouts.app')

@section('content')
<div class="container">
<script>
    $(document).ready(function(){
        $('#tbl_classrooms').DataTable();
    });
</script>
@if(session('result'))
<script>
    Swal.fire(
        "{{session('result.title')}}",
        "{{session('result.msg')}}",
        "{{session('result.type')}}"
    )
</script>
@endif
    <a class="btn btn-success" href="{{route('classrooms.create')}}">Add Classroom</a><br /><br />

    <table class="table table-hover" id="tbl_classrooms">
        <thead class="text-center">
            <th>#</th>
            <th>Classname</th>
            <th>Room Number</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($classrooms as $key => $value)
            <tr>
                <td class="text-center">{{$key + 1}}</td>
                <td class="text-center">{{$value->class_name}}</td>
                <td class="text-center">{{$value->room_no}}</td>
                <td>
                    <div class="text-center">
                    
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection