<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
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
        //get classrooms data
        $classrooms = DB::table('classrooms')
                    ->select(
                        'classrooms.id', 'classrooms.class_name', 'classrooms.room_no',
                        DB::raw('count(students.classroom_id) as student_count')
                    )
                    ->leftjoin('students', 'students.classroom_id', '=', 'classrooms.id')
                    ->groupby('classrooms.id','classrooms.class_name','classrooms.room_no')
                    ->get();

        return view('classrooms.index')->with('classrooms', $classrooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classroom = DB::table('classrooms')->insert([
            'class_name' => $request->txt_classname,
            'room_no' => $request->txt_roomno
        ]);

        if($classroom){
            $result = [
                'title' => 'Success!!',
                'msg' => 'Add classroom completed.',
                'type' => 'success'
            ];
        }else{
            $result = [
                'title' => 'Error!!',
                'msg' => 'Add classroom error, Please try again.',
                'type' => 'error'
            ];
        }

        return redirect()->route('classrooms.index')->with('result', $result);
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
