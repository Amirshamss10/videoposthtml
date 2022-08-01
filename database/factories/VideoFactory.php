<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Video; 
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
            "url"=> "https://www.aparat.com/v/bPWo8", 
            "lenght"=> rand(2,60),
            "description"=> $this->faker->realText(), 
            "thumbnail" => "https://loremflickr.com/320/240?random=". rand(1,99)
        ];
    }
}
