<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\StudentScoreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('index');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Student Resources
Route::resource('students', StudentController::class);

//Classrooms Resources
Route::resource('classrooms', ClassroomController::class);

//Subjects Resources
Route::resource('subjects', SubjectController::class);

//Student Courses Resources
Route::resource('courses', StudentCourseController::class);

//Student Scores
Route::resource('scores', StudentScoreController::class);