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
    <a class="btn btn-success" href="{{route('classrooms.create')}}"><i class="fa fa-plus"></i> Add Classroom</a><br /><br />

    @php
        $rows = 3;
        $count = 0;
    @endphp
    <div class="row row-cols-3">
        @foreach($classrooms as $class_item)
        <div class="col">
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
    </div><div class="row row-cols-3">
    @endif

    @endforeach
</div>
@endsection