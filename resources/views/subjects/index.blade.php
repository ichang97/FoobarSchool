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
    <a class="btn btn-success" href="{{route('subjects.create')}}"><i class="fa fa-plus"></i> Add subject</a><br /><br />

    @php
        $rows = 3;
        $count = 0;
    @endphp
    <div class="row row-cols-3">
        @foreach($subjects as $subject_item)
        <div class="col">
            <div class="alert alert-primary shadow text-center h5">
                <i class="fas fa-book display-3"></i><br /><br />

                [{{$subject_item->subject_code}}]<br />
                {{$subject_item->subject_name}}
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