<?php

namespace App\Http\Controllers;

use App\Models\TestAdmitCard;
use App\Models\Term;
use Illuminate\Http\Request;

class TestAdmitCardController extends Controller
{
    public function index()
    {
        $data['testAdmitCard'] = TestAdmitCard::all();
        $data['term'] = TestAdmitCard::select('term_id')->groupBy('term_id')->get();
        return view('admin/examination/test_admit_card/index', $data);
    }

    
    public function create()
    {
        $data['terms'] = Term::all();
        return view('admin/examination/test_admit_card/create', $data);
    }

    
    public function store(Request $request)
    {
        $testAdmitCard = new TestAdmitCard();
        $testAdmitCard->term_id = $request->term_id;
        $testAdmitCard->valid_from = $request->post('valid_from');
        $testAdmitCard->valid_to = $request->post('valid_to');
        $testAdmitCard->save();
        $request->session()->flash('msg','Data has been inserted Sucessfully');
        return redirect(route('admin.examination.test_admit_card'));
    }

    

    
    public function edit($id)
    {
        $data['testAdmitCard'] = TestAdmitCard::find($id);
        $data['terms'] = Term::all();
        return view('admin/examination/test_admit_card/edit', $data);
    }

    
    public function update(Request $request, $id)
    {

        $testAdmitCard = TestAdmitCard::find($id);
        $testAdmitCard->term_id = $request->term_id;
        $testAdmitCard->valid_from = $request->post('valid_from');
        $testAdmitCard->valid_to = $request->post('valid_to');
        $testAdmitCard->save();
        $request->session()->flash('msg','Data has been Updated Sucessfully');
        return redirect(route('admin.examination.test_admit_card'));
    }

    

    public function destroy(Request $request, $id)
    {
        TestAdmitCard::destroy($id);
        $request->session()->flash('delMsg','Data has been Deleted Sucessfully');
        return redirect(route('admin.examination.test_admit_card'));

    }
}
