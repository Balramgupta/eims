<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignDeportmentClass extends Model
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

    public function deportment(){
        return $this->belongsTo(Deportment::class, 'deportment_id', 'id'); 
    }
}
