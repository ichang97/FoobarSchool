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
        $('#tbl_courses').DataTable();
    });
</script>
    <table class="table table-hover" id="tbl_courses">
        <thead class="text-center">
            <th>#</th>
            <th>Subject</th>
            <th>Students in course</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($subjects as $key => $value)
            <tr>
                <td class="text-center">{{$key + 1}}</td>
                <td class="text-center">{{$value->subject_name}}</td>
                <td class="text-center">
                    @if($value->student_count != 0)
                    {{$value->student_count}}
                    @else
                    -
                    @endif
                </td>
                <td>
                    <div class="text-center">
                    <a class="btn btn-primary" href="{{route('courses.show',$value->id)}}">View</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection