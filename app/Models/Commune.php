<?php

namespace App\Models;

use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function province()
    {
    	return $this->belongsTo(Province::class);
    }
}
