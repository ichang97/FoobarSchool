<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //get students count
        $students = DB::table('students')->get();
        $student_count = count($students);

        //get subjects count
        $subjects = DB::table('subjects')->get();
        $subject_count = count($subjects);

        return view('home', compact('student_count','subject_count'));
    }
}
