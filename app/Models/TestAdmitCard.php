<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestAdmitCard extends Model
{
    use HasFactory;

    public function term(){
    	return $this->belongsTo(Term::class, 'term_id', 'id'); 
    }
}
