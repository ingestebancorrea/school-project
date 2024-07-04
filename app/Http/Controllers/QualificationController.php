<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qualification;
use App\Models\Subject;
use App\Models\Course;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use Session;

class QualificationController extends Controller
{
    public function index()
    {
        $qualifications = Qualification::orderby("score",'DESC') # Ordena resultados de mayor a menor
        ->leftJoin('students', 'qualifications.student_id', '=','students.id')
        ->leftJoin('subjects', 'qualifications.subject_id', '=', 'subjects.id')
        ->select('qualifications.id','qualifications.score', 'qualifications.date', 'students.name as student_name', 'students.lastname as student_lastname', 'subjects.name as subject_name')
        ->get();

        return view('qualifications.index', compact('qualifications'));
    }

    public function show($id)
    {
        $qualification = Qualification::join('students', 'qualifications.student_id', '=','students.id')
        ->join('subjects', 'qualifications.subject_id', '=', 'subjects.id')
        ->select('qualifications.id','qualifications.score', 'subjects.id as subject_id', 'subjects.name as subject_name','students.id as student_id', 'students.name as student_name', 'students.lastname as student_lastname' )
        ->where('qualifications.id',$id)
        ->first();

        if (!$qualification) {
            abort(404);
        }

        $studentController = new StudentController();
        $course = $studentController->getCourse($qualification->student_id);
        $qualification->course_id = $course->id;
        $qualification->course_name = $course->name;

        $subjectController = new SubjectController();
        $subjects = $subjectController->index();
        $courseController = new CourseController();
        $courses = $courseController->show();

        return view('qualifications.edit')
        ->with('qualification',$qualification)
        ->with('subjects',$subjects)
        ->with('courses',$courses);
    }

    public function register()
    {
        $subjectController = new SubjectController();
        $subjects = $subjectController->index();
        $courseController = new CourseController();
        $courses = $courseController->show();
    
        return view('qualifications.create',compact('subjects','courses'));
    }

    public function create(Request $request)
    {
        // Validate form data
        $request->validate([
            'subject_id' => 'required|numeric',
            'score' => 'required|numeric',
            'student_id' => 'required|numeric'
        ]);

        // Retrieve input values
        $subject_id = $request->input('subject_id');
        $score = $request->input('score');
        $student_id = $request->input('student_id');

        // Create new Qualification instance and save
        $qualification = new Qualification();
        $qualification->subject_id = $subject_id;
        $qualification->score = $score;
        $qualification->student_id = $student_id;
        $qualification->save();

        Session::flash('mensaje', "La nota ha sido registrada correctamente.");
        return redirect()->route('notesreport');
    }

    public function update(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|numeric',
            'score' => 'required|numeric',
            'student_id' => 'required|numeric'
        ]);

        $qualification = Qualification::find($request->id);

        $qualification->id = $request->id;
        $qualification->subject_id = $request->subject_id;
        $qualification->score = $request->score;
        $qualification->student_id = $request->student_id;

        $qualification->save();

        Session::flash('mensaje', "La nota ha sido modificada correctamente.");
        return redirect()->route('notesreport');
    }
}
