<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
	

    public function movie(){
        return $this->hasMany(Movie::class);
    }

     protected $fillable = [
        'name',      
    ];
}
