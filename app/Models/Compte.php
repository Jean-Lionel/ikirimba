<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compte extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $guarded = [];


    public function membre(){
    	return $this->belongsTo('App\Models\Person','person_id','id');
    }
}
