<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function index() {
        $videos = video::all(); 
        return($videos); 
    }
    public function create() {
        return view("videos.create");
    }
    public function store(Request $request) {
        $request->validate([
            "name"=> ["required"],
            "url"=> ["required", "url","unique:videos,url"], 
            "lenght"=> ["required", "integer"],
            "thumbnail"=> ["required"]
        ]);
        $video = video::create([
            "name"=> $request->name, 
            "url"=> $request->url,
            "lenght"=> $request->lenght,
            "thumbnail"=> "https://loremflickr.com/320/240?random=". rand(1,1000)
        ]);
        return redirect()->route("index")->with("alert","عملیات آپلود با موفقیت انجام شد");
    }   
}
