<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
    //StoreVideoRequest
    public function store(StoreVideoRequest $request) {
        $path = storage::putFile("", $request->file);
        $request->merge([
            "url" => $path
        ]);
        $request->user()->videos()->create([
            "name"=> $request->name, 
            "url"=> $request->url,
            "lenght"=> $request->lenght,
            "thumbnail"=> "https://loremflickr.com/320/240?random=". rand(1,1000), 
            "category_id" => $request->category_id
        ]);
        return redirect()->route("videos.show", $request->url)->with("alert", __("message.success"));
    }
    public function show(Video $video) {
        $video->load("comments.user");
        return view("videos.show", compact("video"));
    }  
    public function edit(Video $video) {
        $categories = Category::all(); //show categories 
        return view("videos.edit", compact("video", "categories"));
    }
    public function update(Request $request, Video $video) {
        if($request->hasFile('file')) {
            $path  = Storage::putFile("filme", $request->file); 
            $request->merge([
                "url" => $path
            ]);
        }
        $video->update([
            "name" => $request->name, 
            "url"  => $request->url, 
            "lenght" => $request->lenght, 
            "thumbnail" => $request->thumbnail     
        ]);
        return redirect()->route("videos.update",$video->url)->with("alert", __("message.video_edited"));
    }
 }
