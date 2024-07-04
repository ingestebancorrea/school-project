<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::select('subjects.id','subjects.name', 'subjects.alias')
        ->get();

        return $subjects;
    }
}
