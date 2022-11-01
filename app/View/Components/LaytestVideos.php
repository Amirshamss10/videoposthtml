<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Video;

class LaytestVideos extends Component
{
    public $videos; 
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->videos = video::inRandomOrder()->limit(4)->get();
        $this->videos = Video::with("user","category")->limit(7)->inRandomOrder()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.laytest-videos');
    }
}
