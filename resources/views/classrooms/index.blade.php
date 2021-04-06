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
    <input class="form-control" type="text" id="txt_search" placeholder="Search..."><br />

    <a class="btn btn-success" href="{{route('classrooms.create')}}"><i class="fa fa-plus"></i> Add Classroom</a><br /><br />

    @php
        $rows = 3;
        $count = 0;
    @endphp
    <div class="row">
        @foreach($classrooms as $class_item)
        <div class="col" data-role="classrooms">
            <div class="alert alert-primary shadow text-center h5">
                <i class="fas fa-user-friends display-3"></i><br /><br />

                {{$class_item->class_name}}/{{$class_item->room_no}}<br />
                @if($class_item->student_count != 0)
                    Student counts : {{$class_item->student_count}}
                @else
                    No Student.
                @endif
            </div>
        </div>
    @php
        $count++;
    @endphp

    @if($count % $rows == 0)
    </div><div class="row">
    @endif

    @endforeach

    <script>
        $(document).ready(function(){
            $('#txt_search').on("keyup", function(){
            var value = $(this).val().toLowerCase();
            $('div[data-role="classrooms"]').filter(function(){
                $(this).toggle($(this).find('div').text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
    </script>
</div>
@endsection