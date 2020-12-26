<?php

namespace App\Models;

use App\Models\Commune;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colline extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'commune_id'];

    public function commune()
    {
    	return $this->belongsTo(Commune::class);
    }
}
