<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Video; 
use App\Http\Requests\StoreCommentRequest; 

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, Video $video) {  
        $video->comments()->create([
            "user_id" => Auth()->id(), 
            "body" => $request->comment, 
            "create_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s") 
        ]);
        return back()->with("alert", __("message.comment_send_successfully")); 
    }
}
?>