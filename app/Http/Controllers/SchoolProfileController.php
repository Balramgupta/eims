<?php

namespace App\Http\Controllers;

use App\Models\SchoolProfile;
use Illuminate\Http\Request;

class SchoolProfileController extends Controller
{
    
    public function index()
    {
        $school_profile = SchoolProfile::all();
        return view('admin/school_profile/index', ['school_profile'=>$school_profile]);
    }

    
    public function create()
    {
        return view('admin/school_profile/create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'school_name'=>'required',
        ]);

        $school_profile = new SchoolProfile();
        if($request->file('logo')){
            $file = $request->file('logo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('admin/assets/uploads/school_profile'), $filename);
            $school_profile['logo'] = $filename;
        }
        $school_profile->school_name = $request->post('school_name');
        $school_profile->motto = $request->post('motto');
        $school_profile->address = $request->post('address');
        $school_profile->number = $request->post('number');
        $school_profile->pan_no = $request->post('pan_no');
        if($request->file('principle_sign')){
            $file = $request->file('principle_sign');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('admin/assets/uploads/school_profile'), $filename);
            $school_profile['principle_sign'] = $filename;
        }
        if($request->file('accountant_sign')){
            $file = $request->file('accountant_sign');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('admin/assets/uploads/school_profile'), $filename);
            $school_profile['accountant_sign'] = $filename;
        }
        $school_profile->save();
        $request->session()->flash('msg','Data has been inserted Sucessfully');
        return redirect(route('admin.school_profile'));
    }

    
    public function edit($id)
    {
        $school_profile = SchoolProfile::find($id);
        return view('admin/school_profile/edit', ['school_profile'=>$school_profile]);
    }

    public function update(Request $request, $id)
    {
        $school_profile = SchoolProfile::find($id);
        if($request->file('logo')){
            $file = $request->file('logo');
            @unlink(public_path('admin/assets/uploads/school_profile/'.$school_profile->logo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('admin/assets/uploads/school_profile'), $filename);
            $school_profile['logo'] = $filename;
        }
        $school_profile->school_name = $request->post('school_name');
        $school_profile->motto = $request->post('motto');
        $school_profile->address = $request->post('address');
        $school_profile->number = $request->post('number');
        $school_profile->pan_no = $request->post('pan_no');
        if($request->file('principle_sign')){
            $file = $request->file('principle_sign');
            @unlink(public_path('admin/assets/uploads/school_profile/'.$school_profile->principle_sign));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('admin/assets/uploads/school_profile'), $filename);
            $school_profile['principle_sign'] = $filename;
        }
        if($request->file('accountant_sign')){
            $file = $request->file('accountant_sign');
            @unlink(public_path('admin/assets/uploads/school_profile/'.$school_profile->accountant_sign));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('admin/assets/uploads/school_profile'), $filename);
            $school_profile['accountant_sign'] = $filename;
        }
        $school_profile->save();
        $request->session()->flash('msg','Data has been Updated Sucessfully');
        return redirect(route('admin.school_profile'));
    }

    public function destroy(SchoolProfile $schoolProfile)
    {
        //
    }
}
