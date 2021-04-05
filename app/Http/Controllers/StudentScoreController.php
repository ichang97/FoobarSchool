<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentScoreController extends Controller
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
                        'classrooms.class_name', 'classrooms.room_no'
                    )
                    ->join('classrooms', 'students.classroom_id', '=', 'classrooms.id')
                    ->get();

        return view('scores.index')->with('students', $students);
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get student name
        $student = DB::table('students')
                    ->select(
                        'students.code', 'students.firstname', 'students.lastname',
                        'classrooms.class_name', 'classrooms.room_no'
                        )
                    ->join('classrooms', 'students.classroom_id', '=', 'classrooms.id')
                    ->where('students.id', '=', $id)
                    ->get();

        //get subjects
        $subjects = DB::table('student_courses')
                    ->select(
                        'student_courses.id as course_id', 'subjects.subject_code', 'subjects.subject_name','students.id as student_id',
                        'student_scores.score'
                    )
                    ->leftjoin('subjects', 'student_courses.subject_id', '=', 'subjects.id')
                    ->leftjoin('students', 'student_courses.student_id', '=', 'students.id')
                    ->leftjoin('student_scores', 'student_courses.id', '=', 'student_scores.course_id')
                    ->where('student_courses.student_id', '=', $id)
                    ->orderby('student_courses.id','asc')
                    ->get();

        return view('scores.show')
                ->with(compact('student', 'subjects'));
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
        $score = DB::table('student_scores')->insert([
            'course_id' => $request->input('txt_courseid'. $id),
            'score' => $request->input('txt_score'. $id),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //get student id
        $student = DB::table('student_courses')
                    ->select('student_courses.student_id')
                    ->where('student_courses.id', '=' ,$id)
                    ->get();
        
        foreach($student as $item){
            $student_id = $item->student_id;
        }

        return redirect()->route('scores.show', $student_id);
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
