<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Tutor;
use App\Models\Student;

class frontendRouteController extends Controller
{
    public function AllTutors(){
        return inertia('AllTutors');
    }

    public function Tutor($id){
        return inertia('Tutor',["id" => $id]);
    }

    public function EditTutor($id){

        $tutor = Tutor::find($id);
        return inertia('EditTutor', ["tutor" => $tutor]);
    }

    public function AllStudents(){
        return inertia('AllStudents');
    }

    public function Student($id){
        return inertia('Student',["id" => $id]);
    }

    public function EditStudent($id){

        $student = Student::find($id);
        return inertia('EditStudent',['student'=> $student]);

    }

    public function TutorToAssignStudent(){
        return inertia('TutorToAssignStudent');
    }

    
    public function AssignStudentToTutor($id){
        return inertia('AssignStudentToTutor', ["id" => $id]);
    }
}
