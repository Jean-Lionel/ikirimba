<?php

namespace App\Models;

use App\Models\Commune;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function communes()
    {
    	return $this->hasMany(Commune::class);
    	
    }
}
