<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\StudentClass;
use App\Models\Faculty;
use App\Models\AssignSectionClass;

class DefaultController extends Controller
{
    public function get_faculty(Request $request){
        $level_id = $request->level_id;
        $allData = Faculty::where('level_id', $level_id)->get();
        return response()->json($allData);
    }

    public function get_class(Request $request){
        $faculty_id = $request->faculty_id;
        $allData = StudentClass::where('faculty_id', $faculty_id)->get();
        return response()->json($allData);
    }

    public function get_section(Request $request){
        $class_id = $request->class_id;
        $allData = AssignSectionClass::where('class_id', $class_id)->get();
        return response()->json($allData);
    }

    public function get_student(Request $request){
        $section_id = $request->section_id;
        $allData = Student::where('section_id', $section_id)->get();
        return response()->json($allData);
    }
}

