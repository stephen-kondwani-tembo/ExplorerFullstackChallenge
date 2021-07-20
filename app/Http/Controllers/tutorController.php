<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\StudentTutor;
use App\Models\Tutor;
use App\Models\Student;

class tutorController extends Controller
{
     
    public function index()
    {
        return Tutor::all();
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
             'last_name' => 'required',
                 'phone' => 'required',
                 'email' => 'required'
        ]);

         return Tutor::create($request->all());

    }

    
    public function show($id)
    {
        $tutor = Tutor::find($id);
        
        $studentsAssignedToTutor = DB::table('students')
        ->select('students.*') 
        ->join('student_tutors', 'students.id', '=', 'student_tutors.student_id')
        ->where("student_tutors.tutor_id", $id)
        ->get();

        $data = [
               'tutor' => $tutor,
            'students' => $studentsAssignedToTutor
        ];

        return response()->json(['data' => $data], 200) ;
    }


    
    public function update(Request $request, $id)
    {
        $tutor = Tutor::find($id);
        $tutor->update($request->all());

        return $tutor;
    }

    
    public function destroy($id)
    {
        return Tutor::destroy($id);
    }

}