<?php

namespace App\Http\Controllers;

use App\Models\AssignSection;
use App\Models\StudentClass;
use App\Models\Student;
use Illuminate\Http\Request;

class AssignSectionController extends Controller
{
    
    public function index()
    {
        return view('admin/student/assign_section/index');
    }

    
    public function create()
    {
        $data['studentClass'] = StudentClass::all();
        $data['student'] = Student::all();
        return view('admin/student/assign_section/create', $data);
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(AssignSection $assignSection)
    {
        //
    }

    
    public function edit(AssignSection $assignSection)
    {
        //
    }

    
    public function update(Request $request, AssignSection $assignSection)
    {
        //
    }

    
    public function destroy(AssignSection $assignSection)
    {
        //
    }
}
