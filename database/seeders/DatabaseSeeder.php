<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
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

   /*AdminUser::factory(1)->create([
            "name" => "Admin",
            "email" => "laravel@laravqe.com",
            "password" => "12345",
        ]);*/
      \App\Models\User::factory()->count(60000)->create(); 

        
        
        /* for($i = 1; $i < 41; $i++)
            \Illuminate\Support\Facades\DB::table('users')->insert([
                'id' => $i,
                'salary' => rand(100000, 500000),
                'position_id' => rand(1, 2),
                'phone' => 380 . rand(0, 9),
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);*/
   

      
    }
}
