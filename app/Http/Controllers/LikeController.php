<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Video;
class LikeController extends Controller
{
    public function store(Request $request,string $likeable_type, $likeable) {
        $likeable->likedBy(Auth()->user());
        /* return $likeable->likes()->create([
            "user_id" => $user, 
                "vote" => 1,
        ]); */
        return back();
    }
}
