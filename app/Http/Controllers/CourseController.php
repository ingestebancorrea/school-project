<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index() 
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function show()
    {
        $courses = Course::select('courses.id','courses.name', 'courses.alias')
        ->get();

        return $courses;
    }
}
