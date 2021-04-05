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
        $('#tbl_subjects').DataTable();
    });
</script>
    <a class="btn btn-success" href="{{route('subjects.create')}}">Add subject</a><br /><br />

    <table class="table table-hover" id="tbl_subjects">
        <thead class="text-center">
            <th>#</th>
            <th>Subject Code</th>
            <th>Subject name</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($subjects as $key => $value)
            <tr>
                <td class="text-center">{{$key + 1}}</td>
                <td class="text-center">{{$value->subject_code}}</td>
                <td class="text-center">{{$value->subject_name}}</td>
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