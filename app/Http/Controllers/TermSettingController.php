<?php

namespace App\Http\Controllers;

use App\Models\TermSetting;
use Illuminate\Http\Request;
use App\Models\Term;
use App\Models\Level;
use App\Models\Faculty;
use App\Models\StudentClass;

class TermSettingController extends Controller
{

    public function index()
    {
        $data['terms'] = Term::all();
        $data['levels'] = Level::all();
        $data['faculty'] = Faculty::all();
        $data['studentClass'] = StudentClass::all();
        $data['termSetting'] = TermSetting::all();
        return view('admin/examination/term_setting/index', $data);
    }

    public function create()
    {
        $data['terms'] = Term::all();
        $data['levels'] = Level::all();
        return view('admin/examination/term_setting/create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name'=>'required',
        ]);

        $student = new Student();
        $student->level_id = $request->post('level_id');
        $student->faculty_id = $request->post('faculty_id');
        $student->class_id = $request->post('class_id');
        $student->section_id = $request->post('section_id');
        $student->save();
        $request->session()->flash('msg','Data has been inserted Sucessfully');
        return redirect(route('admin.student.add_student'));
    }

    public function show(Student $student)
    {
        //
    }

    public function edit($id)
    {
        $data['levels'] = Level::all();
        $data['faculty'] = Faculty::all();
        $data['student'] = Student::find($id);
        return view('admin/student/add_student/edit', $data);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Student $student)
    {
        //
    }
}
