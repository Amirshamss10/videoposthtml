@extends("layout")
@section("content") 

                <h1 class="new-video-title"><i class="fa fa-bolt"></i>تست</h1>
               <div class="row">
                @foreach($videos as $mostPopularVideo)
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
                            <span class="date"><i class="fa fa-clock-o"></i>{{$mostPopularVideo->category->name}}</span>
                            
                        </div>
                    </div>
                </div>
                @endforeach
      </div> 
      <div class="text-center">
          {{  $videos->links() }}
      </div>
      @endsection