<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('admin/subject/add_subject/index', ['subjects'=>$subjects]);
    }

    public function create()
    {
        return view('admin/subject/add_subject/create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject_name'=>'required',
        ]);

        $subject = new Subject();
        $subject->subject_name = $request->post('subject_name');
        $subject->credit_hour = $request->post('credit_hour');
        $subject->save();
        $request->session()->flash('msg','Data has been inserted Sucessfully');
        return redirect(route('admin.subject'));
    }

    

    
    public function edit(Subject $Subject, $id)
    {
        $subject = Subject::find($id);
        return view('admin/subject/add_subject/edit', ['subject'=>$subject]);
    }

    
    public function update(Request $request, Subject $Subject, $id)
    {   
        $validated = $request->validate([
            'subject_name'=>'required',
        ]);

        $subject = Subject::find($id);
        $subject->subject_name = $request->post('subject_name');
        $subject->credit_hour = $request->post('credit_hour');
        $subject->save();
        $request->session()->flash('msg','Data has been Updated Sucessfully');
        return redirect(route('admin.subject'));
    }

    

    public function destroy(Request $request, Subject $Subject, $id)
    {
        Subject::destroy($id);
        $request->session()->flash('delMsg','Data has been Deleted Sucessfully');
        return redirect(route('admin.subject'));

    }
}
