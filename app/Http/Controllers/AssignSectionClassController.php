<?php

namespace App\Http\Controllers;

use App\Models\AssignSectionClass;
use App\Models\Level;
use App\Models\Faculty;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class AssignSectionClassController extends Controller
{
    
    public function index()
    {
        $data['assign_section_class'] = AssignSectionClass::select('level_id','faculty_id','class_id')->groupBy('level_id','faculty_id','class_id')->get();
        return view('admin.class.assign_section_class.index', $data);
    }

    
    public function create()
    {
        $data['levels'] = Level::all();
        $data['faculty'] = Faculty::all();
        return view('admin/class/assign_section_class/create', $data);
    }

    
    public function store(Request $request)
    {
        $countSection = count($request->section_name);
        if($countSection != NULL){
            for ($i=0; $i < $countSection; $i++) { 
                $assign_section_class = new AssignSectionClass();
                $assign_section_class->level_id = $request->level_id;
                $assign_section_class->faculty_id = $request->faculty_id;
                $assign_section_class->class_id = $request->class_id;
                $assign_section_class->section_name = $request->section_name[$i];
                $assign_section_class->save();
            }
        }

        $request->session()->flash('msg','Data has been inserted Sucessfully');
        return redirect(route('admin.class.assign_section_class'));
    }

    
    public function edit($class_id)
    {
        $data['level'] = Level::all();
        $data['faculty'] = Faculty::all();
        $data['StudentClasses'] = StudentClass::all();
        $data['editData'] = AssignSectionClass::where('class_id' ,$class_id)->get();
        return view('admin/class/assign_section_class/edit', $data);
    }

    
    public function update(Request $request, $class_id)
    {
        if($request->section_name==NULL){
            $request->session()->flash('msg','Sorry, You do not select any Item');
            return redirect()->back();
        }else{
            AssignSectionClass::whereNotIn('section_name', $request->section_name)->where('class_id', $request->class_id)->delete();
            foreach ($request->section_name as $key => $value) {
                $assign_section_class_exist = AssignSectionClass::where('section_name', $request->section_name[$key])->where('class_id', $request->class_id)->first();
                if($assign_section_class_exist){
                    $assign_section_class = $assign_section_class_exist;
                }else{
                    $assign_section_class  = new AssignSectionClass();
                }
            }
                $assign_section_class->class_id = $request->class_id;
                $assign_section_class->section_name = $request->section_name[$key];
                $assign_section_class->save();
        }

        $request->session()->flash('msg','Data has been Updated Sucessfully');
        return redirect(route('admin.class.assign_section_class'));
    }

    public function detail($class_id)
    {
        
        $data['detailData'] = AssignSectionClass::where('class_id' ,$class_id)->get();
        return view('admin/class/assign_section_class/detail', $data);

    }
}
