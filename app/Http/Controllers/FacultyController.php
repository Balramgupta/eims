<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Models\Level;

class FacultyController extends Controller
{
    public function index()
    {
        $data['faculty'] = Faculty::all();
        $data['level'] = Faculty::select('level_id')->groupBy('level_id')->get();
        return view('admin/class/faculty/index', $data);
    }

    
    public function create()
    {
        $data['levels'] = Level::all();
        return view('admin/class/faculty/create', $data);
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required',
        ]);

        $faculty = new Faculty();
        $faculty->name = $request->post('name');
        $faculty->level_id = $request->level_id;
        $faculty->save();
        $request->session()->flash('msg','Data has been inserted Sucessfully');
        return redirect(route('admin.class.faculty'));
    }

    

    
    public function edit($id)
    {
        $data['faculty'] = Faculty::find($id);
        $data['levels'] = Level::all();
        return view('admin/class/faculty/edit', $data);
    }

    
    public function update(Request $request, $id)
    {   
        $validated = $request->validate([
            'name'=>'required',
        ]);

        $faculty = Faculty::find($id);
        $faculty->name = $request->post('name');
        $faculty->level_id = $request->level_id;
        $faculty->save();
        $request->session()->flash('msg','Data has been Updated Sucessfully');
        return redirect(route('admin.class.faculty'));
    }

    

    public function destroy(Request $request, $id)
    {
        Faculty::destroy($id);
        $request->session()->flash('delMsg','Data has been Deleted Sucessfully');
        return redirect(route('admin.class.faculty'));

    }
}
