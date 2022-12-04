<?php

namespace App\Observers;

use App\Models\like;
use App\Notifications\ResourceWasLike;
class LikeObserver
{
    /**
     * Handle the like "created" event.
     *
     * @param  \App\Models\like  $like
     * @return void
     */
    public function created(like $like)
    {
        $like->likeable->user->notify(new ResourceWasLike($like->likeable));
    }

    /**
     * Handle the like "updated" event.
     *
     * @param  \App\Models\like  $like
     * @return void
     */
    public function updated(like $like)
    {
        //
    }

    /**
     * Handle the like "deleted" event.
     *
     * @param  \App\Models\like  $like
     * @return void
     */
    public function deleted(like $like)
    {
        //
    }

    /**
     * Handle the like "restored" event.
     *
     * @param  \App\Models\like  $like
     * @return void
     */
    public function restored(like $like)
    {
        //
    }

    /**
     * Handle the like "force deleted" event.
     *
     * @param  \App\Models\like  $like
     * @return void
     */
    public function forceDeleted(like $like)
    {
        //
    }
}
