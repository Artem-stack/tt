<?php

namespace App\Models;
  
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
      use HasFactory;
   
  
 public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    

    protected $fillable = [
        'name', 
        'image',
        'genre_id',
    ];

    
}

