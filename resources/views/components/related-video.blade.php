
<div id="related-posts">
    @foreach($videos as $item) 
    <div class="related-video-item">
        <div class="thumb">
            <small class="time">{{ $item->lenghtInHumn }}</small>
            <a href="{{ route('videos.show',$item->id) }}"><img src="{{ $item->thumbnail }}" alt=""></a>
        </div>
        <a href="{{ route('videos.show', $item->url) }}" class="title">{{ $item->name }} </a>
        <a class="channel-name" href="#">تینار<span>
        <i class="fa fa-check-circle"></i></span></a>
    </div>
    @endforeach

<!-- video item -->
<!-- // video item -->