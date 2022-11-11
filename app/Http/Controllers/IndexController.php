<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video; 

class IndexController extends Controller
{
    public function index() {
        // $mostPopularVideo =  video::inRandomOrder()->limit(7)->get();
        // $mostPopularVideo = Video::with("user", "category")->get()->random()->limit(7);
        $mostPopularVideo = Video::with("user","category")->limit(7)->inRandomOrder()->get();   
        
        return view("index", compact( "mostPopularVideo")); 
    }
}
