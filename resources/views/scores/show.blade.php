@extends('layouts.app')

@section('content')
<div class="container">
<a class="btn btn-success btn-block" href="{{route('scores.index')}}">Back</a><br />
    <div class="card shadow">
        <div class="card-header bg-primary text-white text-center">
            @foreach ($student as $student_item)
            <h3 class="h3">[{{$student_item->code}}] {{$student_item->firstname}} {{$student_item->lastname}}</h3>
            @endforeach
        </div>
    </div><br />

    <table class="table table-hover" id="tbl_scores">
        <thead class="text-center">
            <th>#</th>
            <th>Subject</th>
            <th style="width: 120px;">Score</th>
            <th>Grade</th>
        </thead>
        <tbody>
            @foreach($subjects as $key => $value)
            <tr class="text-center">
                <td>{{$key + 1}}</td>
                <td>[{{$value->subject_code}}] {{$value->subject_name}}</td>
                <td>
                    @if($value->score == 0)
                    <form action="{{route('scores.update', $value->course_id)}}" method="post" id="frm_scores{{$value->course_id}}">
                    @csrf
                    @method('PUT')
                        <input class="form-control text-center" type="number" id="txt_score{{$value->course_id}}" name="txt_score{{$value->course_id}}" max="100" required>
                        <input hidden value="{{$value->course_id}}" type="text" id="txt_courseid{{$value->course_id}}" name="txt_courseid{{$value->course_id}}">
                    </div>
                    </form>
                    @else
                    {{number_format($value->score,2)}}
                    @endif
                </td>
                <td class="text-center">
                    @if($value->score == 0)
                    <a href="Javascript: ConfirmGrade{{$value->course_id}}()" class="btn btn-success" id="btn_save{{$value->course_id}}">Confirm</a>
                    @else
                        @if ($value->score >= 80)
                            A
                        @elseif ($value->score >= 75)
                            B+
                        @elseif ($value->score >= 70)
                            B
                        @elseif ($value->score >= 65)
                            C+
                        @elseif ($value->score >= 60)
                            C
                        @elseif ($value->score >= 55)
                            D+
                        @elseif ($value->score >= 50)
                            D
                        @else
                            F
                        @endif
                    @endif

                    <script>
                        function handleConfirmGrade{{$value->course_id}}(){
                            $('#frm_scores{{$value->course_id}}').submit();
                        }

                        function ConfirmGrade{{$value->course_id}}(){
                            if($('#txt_score{{$value->course_id}}').val() == '' || $('#txt_score{{$value->course_id}}').val() == 0){
                                Swal.fire(
                                    'Error', 'Please enter score.', 'error'
                                )
                            }else if($('#txt_score{{$value->course_id}}').val() > 100){
                                Swal.fire(
                                    'Error', 'Score must be maximum = 100', 'error'
                                )
                            }else{
                                Swal.fire({
                                title: 'Confirm Grade ?<br>[{{$value->subject_code}}] : {{$value->subject_name}}',
                                icon: 'question',
                                showCancelButton: true,
                                confirmButtonText: `Confirm`,
                                cancelButtonText: `Cancel`,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    handleConfirmGrade{{$value->course_id}}();
                                } 
                            })
                            }
                        }
                    </script>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection