<?php
    use Illuminate\Support\Facades\Route;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Mail;
    use App\Http\Controllers\IndexController; 
    use App\Http\Controllers\VideoController;
    use App\Http\Controllers\CategoryVideoController;
    use App\Http\Controllers\CommentController; 
    use App\Http\Controllers\LikeController;
    use App\Mail\VerfyEmail;
    use App\Models\User;
    use App\Jobs\ProcessVideo; 
    use App\Jobs\Otp;
    use App\Events\VideoCreated;
    use App\Models\Video;
    use App\Notifications\VideoProcessed;

        Route::middleware("auth")->group(function(){
            Route::get("/videos/create", [VideoController::class, "create"])->name("videos.create"); 
            Route::post("/videos", [VideoController::class, "store"])->name("videos.store");
            Route::get("/videos/{video}/edit", [VideoController::class, "edit"])->name("videos.edit");
            Route::post("/videos/{video}", [VideoController::class,"update"])->name("videos.update");
            Route::post("/videos/{video}/comments",[CommentController::class, "store"])->name("comments.store");
            Route::get("/ {likeable_type} / {likeable_id} /like", [LikeController::class, "store"])->name("likes.store");
        });
        
        Route::get("/", [IndexController::class, "index"])->name("index");
        Route::get("/videos/{video}", [VideoController::class, "show"])->name("videos.show");
        Route::get("/categories/{category}/videos", [CategoryVideoController::class, "index"])->name("categories.videos.index"); 
        
        
        Route::get("/events", function() {
            $video = Video::first();
            // VideoCreated::dispatch($video);
            event(new VideoCreated($video));
        });
        Route::get("/notify", function(){
            $user = Auth::user(); 
            $video = Video::first(); 
            $user->notify(new VideoProcessed($video));
        });
        
        Route::get("query", function(){
            $video = Video::with("user")->get(); 
            foreach($video AS $video) {
                dump($video->user->name);
            }
        });
        require_once __DIR__."/auth.php";
        
        ?>