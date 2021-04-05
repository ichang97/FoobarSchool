@extends('layouts.app')

@section('content')
<div class="container">
    <script>
        $(document).ready(function(){
            $('#tbl_students').DataTable();
        });
    </script>

    <table class="table table-hover" id="tbl_students">
        <thead class="text-center">
            <th>#</th>
            <th>[Code] Student name</th>
            <th>Classroom</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($students as $key => $value)
            <tr>
                <td class="text-center">{{$key + 1}}</td>
                <td class="text-center">[{{$value->code}}] {{$value->firstname}} {{$value->lastname}}</td>
                <td class="text-center">{{$value->class_name}}/{{$value->room_no}}</td>
                <td>
                    <div class="text-center">
                        <a href="{{route('scores.show', $value->id)}}" class="btn btn-primary">View scores</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection