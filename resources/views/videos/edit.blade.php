@extends('layout')
@section('content')
    <div id="upload">
        <div class="row">
            <!-- upload -->
            <x-validation-errors></x-validation-errors>
            <div class="col-md-8">
                <h1 class="page-title"><span>بروزرسانی</span> ویدیو</h1>
                <form action="{{ route('videos.update',$video->url) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>@lang("videos.name")</label>
                            <input name="name" type="text" class="form-control" value="{{ $video->name }}" placeholder="@lang('videos.name')">
                        </div>
                        <div class="col-md-6">
                            <label>@lang("videos.url")</label>
                            <input name="url" type="text"  class="form-control" value="{{ $video->url}}" placeholder="@lang('videos.url')">
                        </div>
                        <div class="col-md-6">
                            <label>@lang("videos.lenght")</label>
                            <input name="lenght" type="text"  class="form-control" value="{{ $video->lenght }}" placeholder="@lang('videos.lenght')">
                        </div>
                        <div class="col-md-6">
                            <label>@lang("videos.thumbnail")</label>
                            <input name="thumbnail" type="text" class="form-control" value="{{ $video->thumbnail}}" placeholder="@lang('videos.thumbnail')">
                        </div>
                     
                        <div class="col-md-2">
                            <button type="submit" id="contact_submit" class="btn btn-dm">ذخیره</button>
                        </div>
                    </div>
                </form>
            </div><!-- // col-md-8 -->

            <div class="col-md-4">
            <a href="#"><img src="../../demo_img/upload-adv.png" alt=""></a>
            </div><!-- // col-md-8 -->
            <!-- // upload -->
        </div><!-- // row -->
    </div>
@endsection
