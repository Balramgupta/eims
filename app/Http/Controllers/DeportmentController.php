<?php

namespace App\Http\Controllers;

use App\Models\Deportment;
use Illuminate\Http\Request;

class DeportmentController extends Controller
{
    public function index()
    {
        $deportments = Deportment::all();
        return view('admin/examination/deportment/index', ['deportments'=>$deportments]);
    }

    
    public function create()
    {
        return view('admin/examination/deportment/create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=>'required',
            'type'=>'required',
        ]);

        $deportment = new Deportment();
        $deportment->title = $request->post('title');
        $deportment->type = $request->post('type');
        $deportment->save();
        $request->session()->flash('msg','Data has been inserted Sucessfully');
        return redirect(route('admin.examination.deportment'));
    }

    

    
    public function edit($id)
    {
        $deportment = Deportment::find($id);
        return view('admin/examination/deportment/edit', ['deportment'=>$deportment]);
    }

    
    public function update(Request $request, $id)
    {   
        $validated = $request->validate([
            'title'=>'required',
            'type'=>'required',
        ]);

        $deportment = Deportment::find($id);
        $deportment->title = $request->post('title');
        $deportment->type = $request->post('type');
        $deportment->save();
        $request->session()->flash('msg','Data has been Updated Sucessfully');
        return redirect(route('admin.examination.deportment'));
    }

    

    public function destroy(Request $request, $id)
    {
        Deportment::destroy($id);
        $request->session()->flash('delMsg','Data has been Deleted Sucessfully');
        return redirect(route('admin.examination.deportment'));

    }
}

