<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Groupement extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'colline_id'];

    public function colline()
    {
    	return $this->belongsTo('App\Models\Colline','colline_id','id');
    }

    public function people()
    {
    	return $this->hasMany(Person::class);
    }
}
