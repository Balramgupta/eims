<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;

    public function level(){
    	return $this->belongsTo(Level::class, 'level_id', 'id'); 
    }
    public function faculty(){
    	return $this->belongsTo(Faculty::class, 'faculty_id', 'id'); 
    }
}
