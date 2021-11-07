<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignStudent extends Model
{
    use HasFactory;


    public function student(){
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function student_class(){
        return $this->belongsTo(StudentClass::class, 'class_id', 'id'); 
    }


    public function faculty(){
        return $this->belongsTo(Faculty::class, 'faculty_id', 'id'); 
    }

    public function level(){
        return $this->belongsTo(Level::class, 'level_id', 'id'); 
    }

    public function section(){
        return $this->belongsTo(AssignSection::class, 'section_id', 'id'); 
    }

}
