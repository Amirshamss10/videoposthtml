<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisLikeController extends Controller
{
    public function store(Request $request,string $likeable_type, $likeable) {
        $likeable->dislikedBy(Auth()->user());
        return back();
     }
}
?>