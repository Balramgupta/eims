<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function level(){
    	return $this->belongsTo(Level::class, 'level_id', 'id'); 
    }
    public function faculty(){
    	return $this->belongsTo(Faculty::class, 'faculty_id', 'id'); 
    }

    public function student_class(){
    	return $this->belongsTo(StudentClass::class, 'class_id', 'id'); 
    }

    public function assign_section_class(){
        return $this->belongsTo(AssignSectionClass::class, 'section_id', 'id'); 
    }
}
