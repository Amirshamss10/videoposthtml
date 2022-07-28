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
        $persianFaker =  \Faker\Factory::create("fa_IR");
        return [
            "name"=> $persianFaker->name(), 
            "url"=> $this->faker->imageurl(640,680,"animals",true), 
            "lenght"=> $this->faker->randomnumber(),
            // "slug"=> $this->faker->slug(),
            "description"=> $persianFaker->realText()
        ];
    }
}
