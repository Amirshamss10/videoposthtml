<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryes = array(
            "ورزشی" => [
                "slug"=> "sport", 
                "icon"=> "fa fa-futbol-o"
            ], 
            "سینما" => [
                "slug" => "cinema",
                "icon" => "fa fa-film"
            ], 
            "طنز" => [
                "slug" => "horror",
                "icon" => "fa fa-hashtag"
            ],
            "تکنولوژی" => [
                "slug" => "tech", 
                "icon" => "fa fa-laptop"
            ]
        );
        foreach($categoryes AS $categoryName => $detail) {
            Category::create([
                "name" => $categoryName,
                "slug" => $detail["slug"], 
                "icon" => $detail["icon"] 
            ]);
        }   
    }
}
