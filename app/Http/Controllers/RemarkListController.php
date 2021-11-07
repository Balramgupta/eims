<?php

namespace App\Http\Controllers;

use App\Models\RemarkList;
use Illuminate\Http\Request;

class RemarkListController extends Controller
{
    public function index()
    {
        $remarkList = RemarkList::all();
        return view('admin/examination/remark_list/index', ['remarkList'=>$remarkList]);
    }

    
    public function create()
    {
        return view('admin/examination/remark_list/create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'remark_code'=>'required',
        ]);

        $remarkList = new RemarkList();
        $remarkList->remark_code = $request->post('remark_code');
        $remarkList->remark_description = $request->post('remark_description');
        $remarkList->is_for_annual_exam = $request->post('is_for_annual_exam');
        $remarkList->save();
        $request->session()->flash('msg','Data has been inserted Sucessfully');
        return redirect(route('admin.examination.remark_list'));
    }

    

    
    public function edit($id)
    {
        $remarkList = RemarkList::find($id);
        return view('admin/examination/remark_list/edit', ['remarkList'=>$remarkList]);
    }

    
    public function update(Request $request, $id)
    { 
        $remarkList = RemarkList::find($id);
        $remarkList->remark_code = $request->post('remark_code');
        $remarkList->remark_description = $request->post('remark_description');
        $remarkList->is_for_annual_exam = $request->post('is_for_annual_exam');
        $remarkList->save();
        $request->session()->flash('msg','Data has been Updated Sucessfully');
        return redirect(route('admin.examination.remark_list'));
    }

    

    public function destroy(Request $request, $id)
    {
        RemarkList::destroy($id);
        $request->session()->flash('delMsg','Data has been Deleted Sucessfully');
        return redirect(route('admin.examination.remark_list'));

    }
}
