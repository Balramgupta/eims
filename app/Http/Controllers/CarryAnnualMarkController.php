<?php

namespace App\Http\Controllers;

use App\Models\CarryAnnualMark;
use App\Models\Term;
use Illuminate\Http\Request;

class CarryAnnualMarkController extends Controller
{
    public function index()
    {
        $data['carryAnnualMark'] = CarryAnnualMark::all();
        $data['term'] = Term::all();
        return view('admin/examination/carry_annual_mark/index', $data);
    }

    
    public function create()
    {
        $data['terms'] = Term::all();
        return view('admin/examination/carry_annual_mark/create', $data);
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'term_id'=>'required',
            'carry_percent'=>'required',
        ]);

        $countCarryPercent = count($request->carry_percent);
        if($countCarryPercent != NULL){
            for ($i=0; $i < $countCarryPercent; $i++) { 
                $carryAnnualMark = new CarryAnnualMark();
                $carryAnnualMark->term_id = $request->term_id;
                $carryAnnualMark->carry_percent = $request->carry_percent;
                $carryAnnualMark->save();
            }
        }
        $request->session()->flash('msg','Data has been inserted Sucessfully');
        return redirect(route('admin.examination.carry_annual_mark'));
    }

    

    
    public function edit($id)
    {
        $data['carryAnnualMark'] = CarryAnnualMark::find($id);
        $data['terms'] = Term::all();
        return view('admin/examination/carry_annual_mark/edit', $data);
    }

    
    public function update(Request $request, $id)
    {   
        $validated = $request->validate([
            'term_id'=>'required',
            'carry_percent'=>'required',
        ]);

        $carryAnnualMark = CarryAnnualMark::find($id);
        $carryAnnualMark->term_id = $request->term_id;
        $carryAnnualMark->carry_percent = $request->carry_percent;
        $carryAnnualMark->save();
        $request->session()->flash('msg','Data has been Updated Sucessfully');
        return redirect(route('admin.examination.carry_annual_mark'));
    }

    

    public function destroy(Request $request, $id)
    {
        CarryAnnualMark::destroy($id);
        $request->session()->flash('delMsg','Data has been Deleted Sucessfully');
        return redirect(route('admin.examination.carry_annual_mark'));

    }
}
