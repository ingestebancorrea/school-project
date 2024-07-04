<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index() 
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function getStudentsByCourse($courseId)
    {
        $students = Student::where('course_id', $courseId)->get(['id', 'name', 'lastname']);
        return response()->json($students);
    }

    public function getCourse($studentId)
    {
        $course = Student::join('courses', 'students.course_id', '=','courses.id')
        ->select('courses.id','courses.name')
        ->where('students.id',$studentId)
        ->first();

        return $course;
    }
}
