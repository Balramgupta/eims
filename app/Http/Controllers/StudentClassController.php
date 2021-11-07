<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use App\Models\Level;
use App\Models\Faculty;
use App\Models\AssignStudent;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
     public function index()
    {
        $data['studentClass'] = StudentClass::all();
        $data['level'] = StudentClass::select('level_id')->groupBy('level_id')->get();
        $data['faculty'] = StudentClass::select('faculty_id')->groupBy('faculty_id')->get();
        return view('admin/class/add_class/index', $data);
    }

    
    public function create()
    {
        $data['levels'] = Level::all();
        $data['faculty'] = Faculty::all();
        return view('admin/class/add_class/create', $data);
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'level_id'=>'required',
            'faculty_id'=>'required',
            'class_name'=>'required',
        ]);
        $studentClass = new StudentClass();
        $studentClass->level_id = $request->level_id;
        $studentClass->faculty_id = $request->faculty_id;
        $studentClass->class_code = $request->class_code;
        $studentClass->class_name = $request->class_name;
        $studentClass->save();
        $request->session()->flash('msg','Data has been inserted Sucessfully');
        return redirect(route('admin.class'));
    }

    

    
    public function edit($id)
    {
        $data['studentClass'] = StudentClass::find($id);
        $data['level'] = Level::all();
        return view('admin/class/edit', $data);
    }

    
    public function update(Request $request, StudentClass $studentClass, $id)
    {   
        $validated = $request->validate([
            'name'=>'required|unique:student_classes,name',
            'numeric_value'=>'unique:student_classes,numeric_value',
        ]);

        $studentClass = StudentClass::find($id);
        $studentClass->level_id = $request->level_id;
        $studentClass->faculty_id = $request->faculty_id;
        $studentClass->class_code = $request->post('class_code');
        $studentClass->class_name = $request->post('class_name');
        $studentClass->save();
        $request->session()->flash('msg','Data has been Updated Sucessfully');
        return redirect(route('admin.class'));
    }

    

    public function destroy(Request $request, StudentClass $studentClass, $id)
    {
        StudentClass::destroy($id);
        $request->session()->flash('delMsg','Data has been Deleted Sucessfully');
        return redirect(route('admin.class'));

    }
}
