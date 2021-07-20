<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontendRouteController;



Route::get('/AllTutors',[frontendRouteController::class, 'AllTutors']);


Route::get('/Tutor/{id}',[frontendRouteController::class, 'Tutor']);


Route::get('/EditTutor/{id}',[frontendRouteController::class, 'EditTutor']);


Route::get('/AllStudents',[frontendRouteController::class, 'AllStudents']);


Route::get('/Student/{id}',[frontendRouteController::class, 'Student']);


Route::get('/EditStudent/{id}',[frontendRouteController::class, 'EditStudent']);


Route::get('/TutorToAssignStudent',[frontendRouteController::class, 'TutorToAssignStudent']);


Route::get('/AssignStudentToTutor/{id}',[frontendRouteController::class, 'AssignStudentToTutor']);
