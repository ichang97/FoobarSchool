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

@php
        $rows = 3;
        $count = 0;
    @endphp
    <div class="row">
        @foreach($subjects as $subject_item)
        <div class="col" data-role="courses">
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
    </div><div class="row">
    @endif

    @endforeach

    <script>
        $(document).ready(function(){
            $('#txt_search').on("keyup", function(){
            var value = $(this).val().toLowerCase();
            $('div[data-role="courses"]').filter(function(){
                $(this).toggle($(this).find('div').text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
    </script>

</div>
@endsection