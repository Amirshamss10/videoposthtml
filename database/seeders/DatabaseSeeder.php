<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Video; 
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VideoSeeder::class);
        /*
        Video::factory()->create(array(
            "name"=>"admin_admin", 
            "url"=>"www.url.com/admin_panel", 
            "lenght"=> 16, 
            "description"=> "this is description" 
        )); 
        Video::factory()->create(); 
        */
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
