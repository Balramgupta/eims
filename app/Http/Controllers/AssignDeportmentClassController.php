<?php

namespace App\Http\Controllers;

use App\Models\AssignDeportmentClass;
use Illuminate\Http\Request;

use App\Models\Level;
use App\Models\Faculty;
use App\Models\StudentClass;
use App\Models\Deportment;
use App\Models\Term;
class AssignDeportmentClassController extends Controller
{

    public function index()
    {
        $data['level'] = Level::all();
        $data['faculty'] = Faculty::all();
        $data['studentClass'] = StudentClass::all();
        $data['term'] = Term::all();
        $data['assignDeportmentClass'] = AssignDeportmentClass::all();
        $data['deportment'] = Deportment::all();
        return view('admin/examination/assign_deportment_class/index', $data);
    }

    public function create()
    {
        $data['levels'] = Level::all();
        $data['faculty'] = Faculty::all();
        $data['term'] = Term::all();
        $data['deportment'] = Deportment::all();
        return view('admin/examination/assign_deportment_class/create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name'=>'required',
        ]);

        $assignDeportmentClass = new AssignDeportmentClass();
        $assignDeportmentClass->level_id = $request->post('level_id');
        $assignDeportmentClass->faculty_id = $request->post('faculty_id');
        $assignDeportmentClass->class_id = $request->post('class_id');
        $assignDeportmentClass->term_id = $request->post('term_id');
        $assignDeportmentClass->deportment_id = $request->post('deportment_id');
        $assignDeportmentClass->save();
        $request->session()->flash('msg','Data has been inserted Sucessfully');
        return redirect(route('admin.examination.assign_deportment_class'));
    }


    public function edit($id)
    {
        $data['levels'] = Level::all();
        $data['faculty'] = Faculty::all();
        $data['assignDeportmentClass'] = AssignDeportmentClass::find($id);
        return view('admin/examination/assign_deportment_class/edit', $data);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
