<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video; 

class IndexController extends Controller
{
    public function index() {
        //  $videos = video::inRandomOrder()->limit(4)->get();
        $mostPopularVideo =  video::inRandomOrder()->limit(7)->get();
        return view("index", compact( "mostPopularVideo")); 
    }
}
