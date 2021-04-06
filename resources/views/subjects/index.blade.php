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

    <a class="btn btn-success" href="{{route('subjects.create')}}"><i class="fa fa-plus"></i> Add subject</a><br /><br />

    @php
        $rows = 3;
        $count = 0;
    @endphp
    <div class="row">
        @foreach($subjects as $subject_item)
        <div class="col" data-role="subjects">
            <div class="alert alert-primary shadow text-center h5" style="display: block;">
                <i class="fas fa-book display-3"></i><br /><br />

                <div>
                [{{$subject_item->subject_code}}]<br />
                {{$subject_item->subject_name}}
                </div>
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
            $('div[data-role="subjects"]').filter(function(){
                $(this).toggle($(this).find('div').text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
    </script>
</div>
@endsection