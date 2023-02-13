<?php

namespace App\Models;
  
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
      use HasFactory;
   
  
 public function position()
    {
        return $this->belongsTo(Position::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    

    protected $fillable = [
        'name', 
        'email', 
        'phone', 
        'head', 
        'salary', 
        'image',
        'position_id',
        'admin_created_id',
        'admin_updated_id',
        'created_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}

