<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Http\Requests\StoreVideoRequest;

class VideoController extends Controller
{
    public function index() {
        $videos = video::all(); 
        return($videos); 
    }
    public function create() {
        return view("videos.create");
    }
    public function store(StoreVideoRequest $request) {
        date_default_timezone_set("Asia/Tehran");
        $videos = video::create([
            "name"=> $request->name, 
            "url"=> $request->url,
            "lenght"=> $request->lenght,
            "thumbnail"=> "https://loremflickr.com/320/240?random=". rand(1,1000)
        ]);
        return redirect()->route("index")->with("alert", __("message.success"));
    }
    public function show(request $request, Video $video) {
        return view("videos.show", compact("video"));
    }  
    public function edit(Video $video) {
        return view("videos.edit", compact("video"));
    }
    public function update(request $request, Video $video) {
        $video->update([
            "name" => $request->name, 
             "url"  => $request->url, 
            "lenght" => $request->lenght, 
             "thumbnail" => $request->thumbnail     
        ]);
        return redirect()->route("videos.update",$video->url)->with("alert", __("message.video_edited"));
    }
 }
