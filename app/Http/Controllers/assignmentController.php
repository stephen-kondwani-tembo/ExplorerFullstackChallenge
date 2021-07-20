<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\StudentTutor;
use App\Models\Student;

class assignmentController extends Controller
{
    public function assign(Request $request ){

        $request->validate([
           'student_id' => 'required',
             'tutor_id' => 'required',
        ]);

        return StudentTutor::create($request->all());
    }


    public function assignableStudents($id){

        $students = array();
        $studentsWithTutor = array();
        $studentsWithNoTutor = array();

        $studentsWithTutor = DB::table('students')
        ->select('students.*') 
        ->join('student_tutors', 'students.id', '=', 'student_tutors.student_id')
        ->where("student_tutors.tutor_id", $id)
        ->get();

        $students = DB::table('students')
        ->select('students.*') 
        ->get();



        foreach($students as $student){
            if(in_array($student, $studentsWithTutor->toArray())) {
                 //
             } else {
                array_push($studentsWithNoTutor, $student);
             }
        }

        return $studentsWithNoTutor;
    }
}
