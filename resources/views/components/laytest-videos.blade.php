<h1 class="new-video-title"><i class="fa fa-bolt"></i>آخرین ویدیو</h1>
            <div class="row">

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
                                    <span class="views"><i class="fa fa-eye"></i>{{number_format(rand(10,50000));}} بازدید</span>
                                    <span class="date"><i class="fa fa-clock-o"></i>{{$video->created_at;}}</span>
                                </div>
                            </div>
                        </div>
                @endforeach
        </div>
    