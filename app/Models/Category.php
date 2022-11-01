<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Video;
use App\Models\comments;

class Category extends Model
{
    use HasFactory; 
    
    public function getRouteKeyName() {
        return "slug";
    }
    public function videos() {
        return $this->hasMany(Video::class);
    }
    public function getRandomVideos(int $count) {
        return $this->videos()->inRandomOrder()->get()->take($count)->load("user");
    }
    public function comments() {
        return $this->belongsTo(Comment::class);        
    }
}
