<?php
    use Illuminate\Support\Facades\Route;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Facades\Response; 
    use App\Http\Controllers\IndexController; 
    use App\Http\Controllers\VideoController;
    use App\Http\Controllers\CategoryVideoController;
    use App\Http\Controllers\CommentController; 
    use App\Http\Controllers\LikeController;
    use App\Http\Controllers\DisLikeController; 
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
            Route::get("/{likeable_type}/{likeable_id}/like", [LikeController::class, "store"])->name("likes.store");
            Route::get("/{likeable_type}/{likeable_id}/dislike", [disLikeController::class, "store"])->name("dislikes.store");
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
        Route::get("/notify", function() {
            Auth()->user()->notify(new VideoProcessed("admin"));
        });
        Route::get("file", function() {
            dd("Hi!");
            // return Storage::download("contract/silkroad-site.jpg");
            // $content = Storage::get("contract/silkroad-site.jpg");
            // return response::make($content)->header("content-type", "image/jpeg");
            
        });
        Route::get("/duration", function(Request $request) {
            dd($request->user());
            $ffprobe = bFFMpeg\FFProbe::create();
            $ffprobe->format(Storage::path("sQo1Ikthu54gvczZQpUMjLAAPPdwWx3l9vPBHPab.mp4"))->get('duration'); 
        });
        require_once __DIR__."/auth.php";
        
        ?>  