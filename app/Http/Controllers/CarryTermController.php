<?php

namespace App\Http\Controllers;

use App\Models\CarryTerm;
use App\Models\Term;
use Illuminate\Http\Request;

class CarryTermController extends Controller
{
    public function index()
    {
        $data['carryTerm'] = CarryTerm::all();
        $data['term'] = Term::all();
        return view('admin/examination/carry_term/index', $data);
    }

    
    public function create()
    {
        $data['terms'] = Term::all();
        return view('admin/examination/carry_term/create', $data);
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'term_id'=>'required',
            'carry_to'=>'required',
            'carry_percent'=>'required',
        ]);

        $carryTerm = new CarryTerm();
        $carryTerm->term_id = $request->term_id;
        $carryTerm->carry_to = $request->carry_to;
        $carryTerm->carry_percent = $request->carry_percent;
        $carryTerm->save();
        $request->session()->flash('msg','Data has been inserted Sucessfully');
        return redirect(route('admin.examination.carry_term'));
    }

    

    
    public function edit($id)
    {
        $data['carryTerm'] = CarryTerm::find($id);
        $data['terms'] = Term::all();
        return view('admin/examination/carry_term/edit', $data);
    }

    
    public function update(Request $request, $id)
    {   
        $validated = $request->validate([
            'term_id'=>'required',
            'carry_to'=>'required',
            'carry_percent'=>'required',
        ]);

        $carryTerm = CarryTerm::find($id);
        $carryTerm->term_id = $request->term_id;
        $carryTerm->carry_to = $request->carry_to;
        $carryTerm->carry_percent = $request->carry_percent;
        $carryTerm->save();
        $request->session()->flash('msg','Data has been Updated Sucessfully');
        return redirect(route('admin.examination.carry_term'));
    }

    

    public function destroy(Request $request, $id)
    {
        CarryTerm::destroy($id);
        $request->session()->flash('delMsg','Data has been Deleted Sucessfully');
        return redirect(route('admin.examination.carry_term'));

    }
}
