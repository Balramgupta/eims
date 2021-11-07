<?php

namespace App\Http\Controllers;

use App\Models\TestToTerm;
use App\Models\Test;
use App\Models\Term;
use Illuminate\Http\Request;

class TestToTermController extends Controller
{
    public function index()
    {
        $data['testToTerm'] = TestToTerm::all();
        $data['test'] = Test::all();
        $data['term'] = Term::all();
        return view('admin/examination/test_to_term/index', $data);
    }

    
    public function create()
    {
        $data['tests'] = Test::all();
        $data['terms'] = Term::all();
        return view('admin/examination/test_to_term/create', $data);
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'test_id'=>'required',
            'term_id'=>'required',
            'carry_percent'=>'required',
        ]);

        $testToTerm = new TestToTerm();
        $testToTerm->test_id = $request->test_id;
        $testToTerm->term_id = $request->term_id;
        $testToTerm->carry_percent = $request->carry_percent;
        $testToTerm->save();
        $request->session()->flash('msg','Data has been inserted Sucessfully');
        return redirect(route('admin.examination.test_to_term'));
    }

    

    
    public function edit($id)
    {
        $data['testToTerm'] = TestToTerm::find($id);
        $data['tests'] = Test::all();
        $data['terms'] = Term::all();
        return view('admin/examination/test_to_term/edit', $data);
    }

    
    public function update(Request $request, $id)
    {   
        $validated = $request->validate([
            'test_id'=>'required',
            'term_id'=>'required',
            'carry_percent'=>'required',
        ]);

        $testToTerm = TestToTerm::find($id);
        $testToTerm->test_id = $request->test_id;
        $testToTerm->term_id = $request->term_id;
        $testToTerm->carry_percent = $request->carry_percent;
        $testToTerm->save();
        $request->session()->flash('msg','Data has been Updated Sucessfully');
        return redirect(route('admin.examination.test_to_term'));
    }

    

    public function destroy(Request $request, $id)
    {
        TestToTerm::destroy($id);
        $request->session()->flash('delMsg','Data has been Deleted Sucessfully');
        return redirect(route('admin.examination.test_to_term'));

    }
}
