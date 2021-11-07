<?php

namespace App\Http\Controllers;

use App\Models\GradeDetail;
use Illuminate\Http\Request;

class GradeDetailController extends Controller
{
    public function index()
    {
        $gradeDetail = GradeDetail::all();
        return view('admin/examination/grade_detail/index', ['gradeDetail'=>$gradeDetail]);
    }

    
    public function create()
    {
        return view('admin/examination/grade_detail/create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'percentage_from'=>'required',
            'percentage_to'=>'required',
            'grade_name'=>'required',
            'grade_point'=>'required',
        ]);

        $gradeDetail = new GradeDetail();
        $gradeDetail->percentage_from = $request->post('percentage_from');
        $gradeDetail->percentage_to = $request->post('percentage_to');
        $gradeDetail->grade_name = $request->post('grade_name');
        $gradeDetail->grade_point = $request->post('grade_point');
        $gradeDetail->description = $request->post('description');
        $gradeDetail->save();
        $request->session()->flash('msg','Data has been inserted Sucessfully');
        return redirect(route('admin.examination.grade_detail'));
    }

    

    
    public function edit($id)
    {
        $gradeDetail = GradeDetail::find($id);
        return view('admin/examination/grade_detail/edit', ['gradeDetail'=>$gradeDetail]);
    }

    
    public function update(Request $request, $id)
    {   
        $validated = $request->validate([
            'percentage_from'=>'required',
            'percentage_to'=>'required',
            'grade_name'=>'required',
            'grade_point'=>'required',
        ]);

        $gradeDetail = GradeDetail::find($id);
        $gradeDetail->percentage_from = $request->post('percentage_from');
        $gradeDetail->percentage_to = $request->post('percentage_to');
        $gradeDetail->grade_name = $request->post('grade_name');
        $gradeDetail->grade_point = $request->post('grade_point');
        $gradeDetail->description = $request->post('description');
        $gradeDetail->save();
        $request->session()->flash('msg','Data has been Updated Sucessfully');
        return redirect(route('admin.examination.grade_detail'));
    }

    

    public function destroy(Request $request, $id)
    {
        GradeDetail::destroy($id);
        $request->session()->flash('delMsg','Data has been Deleted Sucessfully');
        return redirect(route('admin.examination.grade_detail'));

    }
}
