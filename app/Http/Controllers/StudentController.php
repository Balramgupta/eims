<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Level;
use App\Models\Faculty;
use App\Models\StudentClass;
use App\Models\AssignSectionClass;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $data['levels'] = Level::all();
        $data['faculty'] = Faculty::all();
        $data['studentClass'] = StudentClass::all();
        $data['students'] = Student::all();
        $data['assignSectionClass'] = AssignSectionClass::all();
        return view('admin/student/add_student/index', $data);
    }

    public function create()
    {
        $data['levels'] = Level::all();
        $data['faculty'] = Faculty::all();
        return view('admin/student/add_student/create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name'=>'required',
        ]);

        $student = new Student();
        $student->roll_no = $request->post('roll_no');
        $student->student_name = $request->post('student_name');
        $student->gender = $request->post('gender');
        $student->level_id = $request->post('level_id');
        $student->faculty_id = $request->post('faculty_id');
        $student->class_id = $request->post('class_id');
        $student->section_id = $request->post('section_id');
        $student->emergency_number = $request->post('emergency_number');
        $student->address = $request->post('address');
        $student->nationality = $request->post('nationality');
        $student->father_name = $request->post('father_name');
        $student->father_number = $request->post('father_number');
        $student->father_email = $request->post('father_email');
        $student->father_occupation = $request->post('father_occupation');
        $student->father_education = $request->post('father_education');
        $student->mother_name = $request->post('mother_name');
        $student->mother_number = $request->post('mother_number');
        $student->mother_email = $request->post('mother_email');
        $student->mother_occupation = $request->post('mother_occupation');
        $student->mother_education = $request->post('mother_education');
        $student->admission_date = $request->post('admission_date');
        $student->last_school = $request->post('last_school');
        $student->previous_class_percentage = $request->post('previous_class_percentage');
        $student->guardian_name = $request->post('guardian_name');
        $student->guardian_number = $request->post('guardian_number');
        $student->guardian_email = $request->post('guardian_email');
        $student->guardian_education = $request->post('guardian_education');
        $student->guardian_relation = $request->post('guardian_relation');
        $student->passport_number = $request->post('passport_number');
        $student->place_issue = $request->post('place_issue');
        $student->issue_date = $request->post('issue_date');
        $student->vissa_category = $request->post('vissa_category');
        if($request->file('birth_certificate')){
            $file = $request->file('birth_certificate');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('admin/assets/uploads/student'), $filename);
            $student['birth_certificate'] = $filename;
        }
        if($request->file('photo')){
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('admin/assets/uploads/student'), $filename);
            $student['photo'] = $filename;
        }
        $student->disability = $request->post('disability');
        $student->special_instruction = $request->post('special_instruction');
        $student->distinct_behaviour = $request->post('distinct_behaviour');
        $student->disease = $request->post('disease');
        
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
