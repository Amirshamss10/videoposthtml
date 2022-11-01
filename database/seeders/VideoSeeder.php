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
        Video::factory()->hasComments(4)->hasLikes(10)->count(50)->create();      
    }
    /*
    has 
    مربوط به مجیک متد های خود لاراول هستش
    اسم فانکشن هم درواقع از ریلیشنی که داخل مدل تعریف کردیم میفهمه
    */
}
