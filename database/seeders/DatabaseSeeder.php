<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class DatabaseSeeder extends Seeder
{
     use HasFactory;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        
        for($i = 1; $i < 30; $i++)
            \Illuminate\Support\Facades\DB::table('movies')->insert([
                'id' => $i,   
                'genre_id' => '1',
                'name' => Str::random(10), 
                'image' => '20230319225856.jpg',
            ]);
   

      
    }
}
