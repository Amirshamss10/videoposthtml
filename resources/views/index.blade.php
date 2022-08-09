<x-layout>
    <x-slot name="content">
    <h1 class="new-video-title"><i class="fa fa-bolt"></i>آخرین ویدیو</h1>
            <div class="row">

                <!-- // video-item -->


                <!-- video-item -->
                @foreach($videos as $video) 
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="video-item">
                            <div class="thumb">
                                <div class="hover-efect"></div>
                                <small class="time" style=color:green>{{$video->lenght}}</small>
                                <a href="#"><img src="{{$video->thumbnail}}" alt=""></a>
                            </div>
                            <div class="video-info">
                                <a href="#" class="title" >{{$video->name}} </a>
                                <a class="channel-name" href="#">تینار<span>
                                    <i class="fa fa-check-circle"></i></span></a>
                                    <span class="views"><i class="fa fa-eye"></i>2.8M بازدید </span>
                                    <span class="date"><i class="fa fa-clock-o"></i>{{$video->created_at;}}</span>
                                </div>
                            </div>
                        </div>
                @endforeach
        </div>
                <!-- // video-item -->
                <h1 class="new-video-title"><i class="fa fa-bolt"></i>پربازدید ترین ویدیو</h1>
               <div class="row">
                @foreach($mostPopularVideo as $mostPopularVideo)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="video-item">
                        <div class="thumb">
                        	<div class="hover-efect"></div>
                            <small class="time" style=color:green>{{$mostPopularVideo->lenght}}</small>
                            <a href="#"><img src="{{$video->thumbnail}}" alt=""></a>
                        </div>
                        <div class="video-info">
                            <a href="#" class="title">{{$mostPopularVideo->name}}</a>
                            <a class="channel-name" href="#">تینار<span>
                            <i class="fa fa-check-circle"></i></span></a>
                            <span class="date"><i class="fa fa-clock-o"></i>{{$mostPopularVideo->created_at;}}</span>

                        </div>
                    </div>
                </div>
                @endforeach
        </div>  
            <!-- Loading More Videos -->
            <div id="loading-more">
            	<i class="fa fa-refresh faa-spin animated"></i> <span>در حال بارگیری بیشتر</span>
            </div>
            <!-- // Loading More Videos -->
      </div> 
    </x-slot>
</x-layout>
