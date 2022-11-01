<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Video;
class LikeController extends Controller
{
    public function store(Request $request, string $likeable_type, string $likeable_id) {
        dd($request);
        $video->likes()->create([
            "user_id" => Auth()->id(), 
            "vote" => 1
        ]);
        return back();
    }
}
