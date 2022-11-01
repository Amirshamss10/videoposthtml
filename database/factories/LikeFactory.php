<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Video;
use App\Models\Comment;
use App\Models\Like; 
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $likeable = $this->likeable();
        return [
            "user_id" => User::first() ?? User::factory(), 
            "likeable_type" => $likeable, 
            "likeable_id" => $likeable::factory(),
            "vote" => $this->faker->randomElement([1, -1]) 
        ];
    }
    private function likeable() {
        return $this->faker->randomElement([
            Video::class, 
            Comment::class 
        ]);
    }
}
