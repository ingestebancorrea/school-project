<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
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
Route::get('/',[QualificationController::class,'index'])->name('notesreport');
Route::get('qualificationsregister', [QualificationController::class, 'register'])->name('qualificationsregister');
Route::post('qualification', [QualificationController::class, 'create'])->name('create');
route::get('qualification/{id}',[QualificationController::class,'show'])->name('qualificationupdate');
route::post('qualificationupdate',[QualificationController::class,'update'])->name('update');

Route::get('students', [StudentController::class, 'index'])->name('students');
Route::get('courses', [CourseController::class, 'index'])->name('courses');
Route::get('/students/by-course/{course}', [StudentController::class, 'getStudentsByCourse'])->name('students-by-course');