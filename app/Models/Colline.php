<?php

namespace App\Models;

use App\Models\Commune;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colline extends Model
{
    use HasFactory;

    public function commune()
    {
    	return $this->belongsTo(Commune::class);
    }
}
