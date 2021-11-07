<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestToTerm extends Model
{
    use HasFactory;

    public function test(){
    	return $this->belongsTo(Test::class, 'test_id', 'id'); 
    }

    public function term(){
    	return $this->belongsTo(Term::class, 'term_id', 'id'); 
    }
}
