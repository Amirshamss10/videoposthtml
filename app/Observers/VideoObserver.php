<?php

namespace App\Observers;

use Illuminate\Support\Facades\Storage;
use App\Models\video;

class VideoObserver
{
    /**
     * Handle the video "created" event.
     *
     * @param  \App\Models\video  $video
     * @return void
     */
    public function created(video $video)
    {
        //
    }

    /**
     * Handle the video "updated" event.
     *
     * @param  \App\Models\video  $video
     * @return void
     */
    public function updated(video $video)
    {
        if($video->waschanged("url")) {
            Storage::delete($video->getOriginal('url'));
        }
    }

    /**
     * Handle the video "deleted" event.
     *
     * @param  \App\Models\video  $video
     * @return void
     */
    public function deleted(video $video)
    {
        //
    }

    /**
     * Handle the video "restored" event.
     *
     * @param  \App\Models\video  $video
     * @return void
     */
    public function restored(video $video)
    {
        //
    }

    /**
     * Handle the video "force deleted" event.
     *
     * @param  \App\Models\video  $video
     * @return void
     */
    public function forceDeleted(video $video)
    {
        //
    }
}
