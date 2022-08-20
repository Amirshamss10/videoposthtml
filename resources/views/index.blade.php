@extends("layout")
@section("content") 

@if(session("alert"))
    <div class="alert alert-success">
        {{session("alert")}}
    </div>
@endif
<x-laytest-videos></x-laytest>
                <h1 class="new-video-title"><i class="fa fa-bolt"></i>پربازدید ترین ویدیو</h1>
               <div class="row">
                @foreach($mostPopularVideo as $mostPopularVideo)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="video-item">
                        <div class="thumb">
                        	<div class="hover-efect"></div>
                            <small class="time" style=color:green>{{$mostPopularVideo->lenghtInHumn}}</small>
                            <a href="{{ route('videos.show',$mostPopularVideo->url) }}"><img src="{{$mostPopularVideo->thumbnail}}" alt=""></a>
                        </div>
                        <div class="video-info">
                            <a href="{{ route('videos.show',$mostPopularVideo->url) }}" class="title">{{$mostPopularVideo->name}}</a>
                            <a class="channel-name" href="#">تینار<span>
                            <i class="fa fa-check-circle"></i></span></a>
                            <span class="views"><i class="fa fa-eye"></i>{{number_format(rand(50000,60000))}} بازدید</span>
                            <span class="date"><i class="fa fa-clock-o"></i>{{$mostPopularVideo->created_at}}</span>

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
    @endsection