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

@php
        $rows = 3;
        $count = 0;
    @endphp
    <div class="row row-cols-3">
        @foreach($subjects as $subject_item)
        <div class="col">
            <div class="alert alert-primary shadow text-center h5">
                <i class="fas fa-users display-3"></i><br />

                [{{$subject_item->subject_code}}] {{$subject_item->subject_name}}<br />
                @if($subject_item->student_count != 0)
                    Students in course : {{$subject_item->student_count}}
                @else
                    No student.
                @endif
                <br /><br />

                <a class="btn btn-primary" href="{{route('courses.show',$subject_item->id)}}">View</a>
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