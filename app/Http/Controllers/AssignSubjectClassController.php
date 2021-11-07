<?php

namespace App\Http\Controllers;

use App\Models\AssignSubjectClass;
use App\Models\Level;
use App\Models\Faculty;
use App\Models\StudentClass;
use App\Models\Subject;
use Illuminate\Http\Request;

class AssignSubjectClassController extends Controller
{

    public function index()
    {
        $data['levels'] = Level::all();
        $data['faculty'] = Faculty::all();
        $data['studentClass'] = StudentClass::all();
        $data['assignSubjectClass'] = AssignSubjectClass::all();
        $data['subjects'] = Subject::all();
        return view('admin/subject/assign_subject_class/index', $data);
    }

    public function create()
    {
        $data['levels'] = Level::all();
        $data['faculty'] = Faculty::all();
        $data['subjects'] = Subject::all();
        return view('admin/subject/assign_subject_class/create', $data);
    }

    
}
