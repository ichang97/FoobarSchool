<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentCourseController extends Controller
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
        //get subject name and count student for each subject
        $subjects = DB::table('subjects')
                    ->select(
                        'subjects.id','subjects.subject_code','subjects.subject_name',
                        DB::raw('count(student_courses.id) as student_count ')
                    )
                    ->leftjoin('student_courses','subjects.id', '=', 'student_courses.subject_id')
                    ->groupby('subjects.id','subjects.subject_code','subjects.subject_name')
                    ->get();

        return view('courses.index')->with('subjects', $subjects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check duplicate
        $search = DB::table('student_courses')
                    ->where('student_id', '=', $request->txt_student)
                    ->where('subject_id', '=', $request->txt_subjectid)
                    ->get();
        
        if(count($search) != 0){
            $result = [
                'title' => 'Error!!',
                'msg' => 'Student is exist for this subject.',
                'type' => 'error'
            ];
        }else{
            $course = DB::table('student_courses')->insert([
                'student_id' => $request->txt_student,
                'subject_id' => $request->txt_subjectid,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $result = [
                'title' => 'Success!!',
                'msg' => 'Add course for student completed.',
                'type' => 'success'
            ];
        }

        return redirect()->route('courses.show', $request->txt_subjectid)->with('result', $result);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get subject name
        $subject = DB::table('subjects')
                    ->select('subjects.subject_code', 'subjects.subject_name', 'subjects.id as subject_id')
                    ->where('id', '=', $id)
                    ->get();

        //get student in course
        $students = DB::table('students')
                    ->select(
                        'students.id as student_id', 'students.firstname', 'students.lastname', 'students.code',
                        'classrooms.class_name', 'classrooms.room_no'
                    )
                    ->leftjoin('student_courses','students.id', '=', 'student_courses.student_id')
                    ->leftjoin('classrooms','students.classroom_id', '=', 'classrooms.id')
                    ->where('student_courses.subject_id' ,'=', $id)
                    ->get();

        //get all students list (not in subject)
        $all_students = DB::table('students')->get();

        return view('courses.show', compact('subject', 'students', 'all_students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
