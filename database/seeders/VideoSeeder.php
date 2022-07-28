<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Video; 
class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::factory()->create(array(
            "name"=>"admin_admin", 
            "url"=>"www.url.com/admin_panel", 
            "lenght"=> 16, 
            "description"=> "this is description" 
        )); 
        Video::factory()->create();       
    }
}
