<?php
    // use App\Http\Controllers\login;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/panel', function(){
        echo("Hello Panel"); 
    });
    Route::get("/login", "App\Http\Controllers\login@index");
    Route::get("/video", "App\Http\Controllers\login@show_video"); 
?>