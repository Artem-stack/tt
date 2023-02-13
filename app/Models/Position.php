<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
	

    public function user(){
        return $this->hasMany(User::class);
    }

	 protected $table = 'position';
     protected $fillable = [
        'name', 
        'admin_created_id', 
        'admin_updated_id', 
    
    ];
}
