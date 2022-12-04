@extends("layout")
@section("content")
<form class="mt-5" action="#" method="get">
        <div class="row">   
            <div class="form-group col-md-3">
                <lable for="inputCity">ترتیب براساس</lable>
                <select class="form-control" name="sortBy">
                    <option {{ request()->query("sortBy")== "created_at" ? 'selected': ''}}  value="created_at">جدیدترین</option>
                    <option {{ request()->query("sortBy")== "like" ? 'selected': ''}} value="like">محبوب ترین</option>
                    <option {{ request()->query("sortBy")== "lenght" ? 'selected': ''}} value="lenght">مدت زمان ویدیو</option>
                </select>
            </div>

            <div class="row">   
            <div class="form-group col-md-3">
                <lable for="inputState">مدت زمان</lable>
                <select id="inputState" class="form-control" name="lenght">
                    <option {{ request()->query('lenght')== null ? 'selected': ''}} value="">همه</option>
                    <option {{ request()->query("lenght")== 1 ? 'selected': ''}} value="1">کمتر از یک دقیقه</option>
                    <option {{ request()->query("lenght")== 2 ? 'selected' : ''}} value="2">یک تا پنج دقیقه</option>
                    <option {{ request()->query("lenght")== 3 ? 'selected': ''}} value="3">بیشتر از پنج دقیقه</option>
                </select>
            </div>
            <div class="form-group col-md-3" style="margin-top: 23px">
                <button type="submit" class="btn btn-primary">فیلتر</button>
            </div>
        </div>

        </div>
    </form>
                <h1 class="new-video-title"><i class="fa fa-bolt"></i>تست</h1>
               <div class="row">
                @foreach($videos as $mostPopularVideo)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="video-item">
                        <div class="thumb">
                        	<div class="hover-efect"></div>
                            <small class="time" style=color:green>{{$mostPopularVideo->lenghtInHumn}}</small>
                            <a href="{{ route('videos.show',$mostPopularVideo->url) }}"><img sr c="{{$mostPopularVideo->thumbnail}}" alt=""></a>
                        </div>
                        <div class="video-info">
                            <a href="{{ route('videos.show',$mostPopularVideo->url) }}" class="title">{{$mostPopularVideo->name}}</a>
                            <a class="channel-name" href="#">{{$mostPopularVideo->Owner_name }}<span>
                            <i class="fa fa-check-circle"></i></span></a>
                            <span class="views"><i class="fa fa-eye"></i>{{number_format(rand(50000,60000))}} بازدید</span>
                            <span class="date"><i class="fa fa-clock-o"></i>{{$mostPopularVideo->created_at}}</span>
                            <span class="date"><i class="fa fa-clock-o"></i>{{$mostPopularVideo->category->name}}</span>
                            
                        </div>
                    </div>
                </div>
                @endforeach
      </div> 
      <div class="text-center" dir="ltr">
          {{  $videos->links() }}
      </div>
      @endsection