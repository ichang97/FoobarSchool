<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class courses_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //get all students
        $students = DB::table('students')->get();
        
        //get all subjects
        $subjects = DB::table('subjects')->get();

        //count for subject. That's random 3 subject for each student
        $count = 7;

        foreach($students as $student){
            for($i = 1; $i <= $count; $i++){
                if($i === 1){
                    DB::table('student_courses')->insert([
                        'student_id' => $student->id,
                        'subject_id' => rand(1,count($subjects)),
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }else{
                    //find duplicate

                    //default value
                    $dup_count = 1;
                    $rand_no = 0;

                    while($dup_count != 0){
                        $rand_no = rand(1,count($subjects));
                        $duplicate = DB::table('student_courses')
                                    ->where('student_id','=',$student->id)
                                    ->where('subject_id','=',$rand_no)
                                    ->get();

                        $dup_count = count($duplicate);
                    }

                    DB::table('student_courses')->insert([
                        'student_id' => $student->id,
                        'subject_id' => $rand_no,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);

                }
            }
        }
    }
}
