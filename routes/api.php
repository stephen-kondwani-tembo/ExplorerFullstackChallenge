<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;
use App\Http\Controllers\tutorController;
use App\Http\Controllers\assignmentController;


# API ENDPOINTS FOR STUDENTS

Route::get('/students',[studentController::class, 'index'])->name('student.index');
Route::post('/student',[studentController::class, 'store'])->name('student.store');
Route::put('/student/{id}',[studentController::class, 'update'])->name('student.update');;
Route::get('/student/{id}',[studentController::class, 'show'])->name('student.show');
Route::delete('/student/{id}',[studentController::class, 'destroy'])->name('student.delete');

# API ENDPOINTS FOR TUTORS

Route::get('/tutors',[tutorController::class, 'index'])->name('tutor.index');
Route::post('/tutor',[tutorController::class, 'store'])->name('tutor.store');
Route::put('/tutor/{id}',[tutorController::class, 'update'])->name('tutor.update');
Route::get('/tutor/{id}',[tutorController::class, 'show'])->name('tutor.show');
Route::delete('/tutor/{id}',[tutorController::class, 'destroy'])->name('tutor.delete');


# API ENDPOINTS FOR STUDENTS, TUTOR ASSIGNMENT

Route::post('/assignStudentToTutor',[assignmentController::class, 'assign'])->name('assign'); 
Route::get('/assignableStudents/{id}',[assignmentController::class, 'assignableStudents'])->name('assignable');



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
