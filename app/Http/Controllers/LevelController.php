<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::all();
        return view('admin/class/level/index', ['levels'=>$levels]);
    }

    
    public function create()
    {
        return view('admin/class/level/create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|unique:levels,name',
        ]);

        $level = new Level();
        $level->name = $request->post('name');
        $level->save();
        $request->session()->flash('msg','Data has been inserted Sucessfully');
        return redirect(route('admin.class.level'));
    }

    

    
    public function edit(Level $level, $id)
    {
        $level = Level::find($id);
        return view('admin/class/level/edit', ['level'=>$level]);
    }

    
    public function update(Request $request, Level $level, $id)
    {   
        $validated = $request->validate([
            'name'=>'required|unique:levels,name',
        ]);

        $level = Level::find($id);
        $level->name = $request->post('name');
        $level->save();
        $request->session()->flash('msg','Data has been Updated Sucessfully');
        return redirect(route('admin.class.level'));
    }

    

    public function destroy(Request $request, Level $level, $id)
    {
        Level::destroy($id);
        $request->session()->flash('delMsg','Data has been Deleted Sucessfully');
        return redirect(route('admin.class.level'));

    }
}
