<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $students = DB::table('students')
        ->select(
            'students.id', 'students.firstname', 'students.lastname', 'students.code', 
            'classrooms.class_name', 'classrooms.room_no', 'students.classroom_id'
        )
        ->join('classrooms', 'students.classroom_id', '=', 'classrooms.id')
        ->orderby('id', 'asc')->get();

        $classrooms = DB::table('classrooms')->get();

        return view('students.index',compact('students','classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //find student code for generate and send data to form
        $code_prefix = date("Ymd");
        $students = DB::table('students')->get();
        if(count($students) == 0){
            $running_no = 1;
            $student_code = $code_prefix . $running_no;
        }else{
            $student_code = $code_prefix . (count($students) + 1);
        }

        //classrooms data
        $classrooms = DB::table('classrooms')->get();

        return view('students.create',compact('classrooms', 'student_code'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'txt_firstname' => ['required','max:100'],
            'txt_lastname' => ['required', 'max:100'],
            'txt_code' => 'required',
            'txt_class' => 'required'
        ]);

        $student = DB::table('students')->insert([
            'firstname' => $request->txt_firstname,
            'lastname' => $request->txt_lastname,
            'code' => $request->txt_code,
            'classroom_id' => $request->txt_class,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if($student){
            $result = [
                'title' => 'Success!!',
                'msg' => 'Add student success.',
                'type' => 'success'
            ];
        }else{
            $result = [
                'title' => 'Error!!',
                'msg' => 'Add student error, Please try again.',
                'type' => 'error'
            ];
        }

        return redirect()->route('students.index')->with('result', $result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $txt_firstname = $request->input('txt_firstname'.$id);
        $txt_lastname = $request->input('txt_lastname'.$id);
        $txt_class = $request->input('txt_class'.$id);

        $student = DB::table('students')->where('id', '=', $id)
        ->update([
            'firstname' => $txt_firstname,
            'lastname' => $txt_lastname,
            'classroom_id' => $txt_class,
            'updated_at' => now()
        ]);

        if($student){
            $result = [
                'title' => 'Success!!',
                'msg' => 'Update student completed.',
                'type' => 'success'
            ];
        }else{
            $result = [
                'title' => 'Error!!',
                'msg' => 'Update student error, Please try again.',
                'type' => 'error '
            ];
        }

        return redirect()->route('students.index')->with('result', $result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = DB::table('students')->where('id', '=', $id)->delete();

        if($student){
            $result = [
                'title' => 'Success!!',
                'msg' => 'Delete student completed.',
                'type' => 'success'
            ];
        }else{
            $result = [
                'title' => 'Error!!',
                'msg' => 'Delete student error, Please try again.',
                'type' => 'error '
            ];
        }

        return redirect()->route('students.index')->with('result', $result);
    }
}
