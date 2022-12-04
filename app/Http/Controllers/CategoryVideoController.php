<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Video; 
use App\Models\Comments;
use App\Models\User;

class CategoryVideoController extends Controller
{
    
    public function index(Request $request, Category $category) { 
        $videos = Video::with(["Category","user","category.videos"])->Filter($request->all())->sort($request->all())->simplePaginate();
        return view("videos.index", compact("videos"));
    }
    
}
