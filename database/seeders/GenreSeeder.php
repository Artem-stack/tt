<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         for($i = 1; $i < 10; $i++)
            \Illuminate\Support\Facades\DB::table('genres')->insert([
                'id' => $i,     
                'name' => Str::random(8), 
            ]);
    }
}
