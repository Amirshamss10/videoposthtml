<?php

namespace App\View\Components;

use App\Models\Video;
use Illuminate\View\Component;

class RelatedVideo extends Component
{
    public $videos; 
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Video $videos)
    {
        $this->videos = $videos->RelatedVideos(3); 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.related-video');
    }
}
