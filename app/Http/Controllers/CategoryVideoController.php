<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryVideoController extends Controller
{
    public function index(Category $category) {  // list videos categories 
        $videos = $category->videos()->paginate(); // default 15;
        return view("videos.index", compact("videos"));
    }
}
