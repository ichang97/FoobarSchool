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
        $('#tbl_students').DataTable();
    });
</script>

    <a class="btn btn-success" href="{{route('students.create')}}"><i class="fa fa-plus"></i> Add Student</a><br /><br />

    @if(count($students) != 0)

    <table class="table table-hover" id="tbl_students">
        <thead class="text-center">
            <th>#</th>
            <th>Student code</th>
            <th>Fullname</th>
            <th>Class</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($students as $key => $value)
            <tr>
                <td class="text-center">{{$key+1}}</td>
                <td class="text-center">{{$value->code}}</td>
                <td class="text-center">{{$value->firstname}} {{$value->lastname}}</td>
                <td class="text-center">{{$value->class_name}}/{{$value->room_no}}</td>
                <td>
<div class="text-center">
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editmodal{{$value->id}}">
  <i class="fas fa-edit"></i> Edit
  </button>
<a class="btn btn-danger" href="Javascript: DeletePopup{{$value->id}}();" id="btn_del{{$value->id}}"><i class="fas fa-trash-alt"></i> Delete</a>
<form action="{{route('students.destroy', $value->id)}}" method="POST" id="frm_del{{$value->id}}">
    @csrf
    @method('DELETE')
</form>
<script>
    function handleDelete{{$value->id}}(){
        $('#frm_del{{$value->id}}').submit();
    }

    function DeletePopup{{$value->id}}(){
        Swal.fire({
  title: 'Are you sure for delete?<br>[{{$value->firstname}} {{$value->lastname}}]',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: `Delete`,
  cancelButtonText: `Cancel`,
}).then((result) => {
  if (result.isConfirmed) {
    handleDelete{{$value->id}}();
  } 
})

    }
</script>
</div>
  
  <!-- Modal -->
  <div class="modal fade" id="editmodal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modallabel{{$value->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modallabel{{$value->id}}">Edit student [{{$value->firstname}} {{$value->lastname}}]</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('students.update', $value->id)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Firstname</label>
                <input class="form-control" type="text" id="txt_firstname{{$value->id}}" name="txt_firstname{{$value->id}}" value="{{$value->firstname}}" autofocus required>
            </div>
            <div class="form-group">
                <label>Lastname</label>
                <input class="form-control" type="text" id="txt_lastname{{$value->id}}" name="txt_lastname{{$value->id}}" value="{{$value->lastname}}" required>
            </div>
            <div class="form-group">
                <label>Class</label>
                <select class="form-control" type="text" id="txt_class{{$value->id}}" name="txt_class{{$value->id}}">
                    <option disabled>Please select...</option>
                    @foreach ($classrooms as $item)
                        @if($value->classroom_id == $item->id)
                            <option value="{{$item->id}}" selected>{{$item->class_name}}/{{$item->room_no}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->class_name}}/{{$item->room_no}}</option>
                        @endif
                        
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-warning btn-block" type="submit" id="btn_edit{{$value->id}}"><i class="fas fa-edit"></i> Edit</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-warning shadow">No data.</div>
    @endif
</div>
@endsection