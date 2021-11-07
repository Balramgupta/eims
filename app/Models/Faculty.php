<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $table = 'faculties';

    public function level(){
    	return $this->belongsTo(Level::class, 'level_id', 'id'); 
    }

    public function student_class(){
    	return $this->belongsTo(StudentClass::class, 'class_id', 'id'); 
    }
}
