<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;

date_default_timezone_set("Asia/Tehran");

class VideoController extends Controller
{
    public function index() { 
        $videos = video::all(); 
        return($videos); 
    }
    public function create() {
        $categories = Category::all(); 
        return view("videos.create", compact("categories"));
    }
    public function store(StoreVideoRequest $request) {
        $videos = video::create([
            "name"=> $request->name, 
            "url"=> $request->url,
            "lenght"=> $request->lenght,
            "thumbnail"=> "https://loremflickr.com/320/240?random=". rand(1,1000), 
            "category_id" => $request->category_id  
        ]);
        return redirect()->route("videos.show", $request->url)->with("alert", __("message.success"));
    }
    public function show(request $request, Video $video) {
        return view("videos.show", compact("video"));
    }  
    public function edit(Video $video) {
        $categories = Category::all(); //show categories 
        return view("videos.edit", compact("video", "categories"));
    }
    public function update(UpdateVideoRequest $request, Video $video) {
        $video->update([
            "name" => $request->name, 
            "url"  => $request->url, 
            "lenght" => $request->lenght, 
            "thumbnail" => $request->thumbnail     
        ]);
        return redirect()->route("videos.update",$video->url)->with("alert", __("message.video_edited"));
    }
 }
