<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $tests = Test::all();
        return view('admin/examination/test/index', ['tests'=>$tests]);
    }

    
    public function create()
    {
        return view('admin/examination/test/create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|unique:tests,name',
        ]);

        $test = new Test();
        $test->name = $request->post('name');
        $test->save();
        $request->session()->flash('msg','Data has been inserted Sucessfully');
        return redirect(route('admin.examination.test'));
    }

    

    
    public function edit(Test $test, $id)
    {
        $test = Test::find($id);
        return view('admin/examination/test/edit', ['test'=>$test]);
    }

    
    public function update(Request $request, Test $test, $id)
    {   
        $validated = $request->validate([
            'name'=>'required|unique:tests,name',
        ]);

        $test = Test::find($id);
        $test->name = $request->post('name');
        $test->save();
        $request->session()->flash('msg','Data has been Updated Sucessfully');
        return redirect(route('admin.examination.test'));
    }

    

    public function destroy(Request $request, Test $test, $id)
    {
        Test::destroy($id);
        $request->session()->flash('delMsg','Data has been Deleted Sucessfully');
        return redirect(route('admin.examination.test'));

    }
}
