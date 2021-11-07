<?php

namespace App\Http\Controllers;

use App\Models\TestSetting;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Level;
use App\Models\Faculty;
use App\Models\StudentClass;

class TestSettingController extends Controller
{

    public function index()
    {
        $data['tests'] = Test::all();
        $data['levels'] = Level::all();
        $data['faculty'] = Faculty::all();
        $data['studentClass'] = StudentClass::all();
        $data['testSetting'] = TestSetting::all();
        return view('admin/examination/test_setting/index', $data);
    }

    public function create()
    {
        $data['tests'] = Test::all();
        $data['levels'] = Level::all();
        return view('admin/examination/test_setting/create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name'=>'required',
        ]);

        $testSetting = new TestSetting();
        $testSetting->level_id = $request->post('level_id');
        $testSetting->faculty_id = $request->post('faculty_id');
        $testSetting->class_id = $request->post('class_id');
        $testSetting->section_id = $request->post('section_id');
        $testSetting->save();
        $request->session()->flash('msg','Data has been inserted Sucessfully');
        return redirect(route('admin.examination.test_setting'));
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
