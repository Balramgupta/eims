<?php

namespace App\Http\Controllers;

use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function index()
    {
        $terms = Term::all();
        return view('admin/examination/term/index', ['terms'=>$terms]);
    }

    
    public function create()
    {
        return view('admin/examination/term/create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|unique:terms,name',
        ]);

        $term = new Term();
        $term->name = $request->post('name');
        $term->save();
        $request->session()->flash('msg','Data has been inserted Sucessfully');
        return redirect(route('admin.examination.term'));
    }

    

    
    public function edit(Term $term, $id)
    {
        $term = Term::find($id);
        return view('admin/examination/term/edit', ['term'=>$term]);
    }

    
    public function update(Request $request, Term $term, $id)
    {   
        $validated = $request->validate([
            'name'=>'required|unique:terms,name',
        ]);

        $term = Term::find($id);
        $term->name = $request->post('name');
        $term->save();
        $request->session()->flash('msg','Data has been Updated Sucessfully');
        return redirect(route('admin.examination.term'));
    }

    

    public function destroy(Request $request, Term $term, $id)
    {
        Term::destroy($id);
        $request->session()->flash('delMsg','Data has been Deleted Sucessfully');
        return redirect(route('admin.examination.term'));

    }
}
