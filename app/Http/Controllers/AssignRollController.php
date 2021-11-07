<?php

namespace App\Http\Controllers;

use App\Models\AssignRoll;
use App\Models\Level;
use App\Models\Faculty;
use App\Models\StudentClass;
use App\Models\Student;
use App\Models\AssignStudent;
use Illuminate\Http\Request;

class AssignRollController extends Controller
{
    
    public function index()
    {
        $data['levels'] = Level::all();
        $data['faculty'] = Faculty::all();
        $data['studentClass'] = StudentClass::all();
        $data['student'] = Student::all();
        return view('admin/student/assign_roll/index', $data);
    }

    
    public function getStudent(Request $request){
        $allData = AssignStudent::with(['student'])->where('level_id', $request->level_id)->where('faculty_id', $request->faculty_id)->where('class_id', $request->class_id)->where('section_id', $request->section_id)->get();
        return response()->json($allData);
    }

    
    public function store(Request $request)
    {
        $class_id = $request->class_id;
        $section_id = $request->section_id;
        if($request->student_id != null){
            for($i=0; $i < count($request->student_id); $i++){
                AssignStudent::where('class_id', $class_id)->where('section_id', $section_id)->where('student_id', $request->student_id[$i])->update(['roll'=>$request->roll[$i]]);
            }

        }else{
            $request->session()->flash('delMsg','Sorry, There are no Student.');
            return redirect(route('admin.student.assign_roll'));
        }
        $request->session()->flash('msg','Successfully, Roll Generated.');
        return redirect(route('admin.student'));
    }

    
    public function show(AssignSection $assignSection)
    {
        //
    }

    
    public function edit(AssignSection $assignSection)
    {
        //
    }

    
    public function update(Request $request, AssignSection $assignSection)
    {
        //
    }

    
    public function destroy(AssignSection $assignSection)
    {
        //
    }
}
