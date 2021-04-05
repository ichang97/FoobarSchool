@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow border-success">
        <div class="card-header bg-success text-white">
            Add Classroom
        </div>
        <div class="card-body">
            <form action="{{route('classrooms.store')}}" method="POST" id="frm_addclassroom">
            @csrf
            
            <div class="form-group">
                <label>Classname</label>
                <select class="form-control" type="text" id="txt_classname" name="txt_classname" required>
                    <option disabled>Please select...</option>
                    <option value="ป.1">ป.1</option>
                    <option value="ป.2">ป.2</option>
                    <option value="ป.3">ป.3</option>
                    <option value="ป.4">ป.4</option>
                    <option value="ป.5">ป.5</option>
                    <option value="ป.6">ป.6</option>
                </select>
            </div>
            <div class="form-group">
                <label>Room Number</label>
                <input class="form-control" type="text" id="txt_roomno" name="txt_roomno" required>
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-block" id="btn_save" type="submit">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection