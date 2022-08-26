<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Video; 
use App\Models\Category; 
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {   
        $persianFaker = \Faker\Factory::create("fa_IR");
        return [
            "name"=> $persianFaker->name(), 
            "url"=> $this->faker->slug(),
            "lenght"=> rand(2,60),
            "thumbnail" => "https://loremflickr.com/320/240?random=". rand(1,99),
            "category_id" => Category::first() ?? Category::factory() 
        ];
    }
}
