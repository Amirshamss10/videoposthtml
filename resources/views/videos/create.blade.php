@extends('layout')
@section('content')
    <div id="upload">
        <div class="row">
            <!-- upload -->
            <x-validation-errors></x-validation-errors>
            <div class="col-md-8">
                <h1 class="page-title"><span>آپلود</span> ویدیو</h1>
                <form action="{{route('videos.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>@lang("videos.name")</label>
                            <input name="name" type="text" class="form-control" placeholder="@lang('videos.name')">
                        </div>
                        <div class="col-md-6">
                            <label>آدرس ویدیو</label>
                            <input name="url" type="text"  class="form-control" placeholder="آدرس ویدیو">
                        </div>
                        <div class="col-md-6">
                            <label>مدت زمان</label>
                            <input name="lenght" type="text"  class="form-control" placeholder="مدت زمان">
                        </div>
                        <div class="col-md-6">
                            <label>تصویر بند‌انگشتی</label>
                            <input name="thumbnail" type="text" class="form-control" placeholder="تصویر بند انگشتی">
                        </div>
                     
                        <div class="col-md-2">
                            <button type="submit" id="contact_submit" class="btn btn-dm">ذخیره</button>
                        </div>
                    </div>
                </form>
            </div><!-- // col-md-8 -->

            <div class="col-md-4">
            <a href="#"><img src="../demo_img/upload-adv.png" alt=""></a>
            </div><!-- // col-md-8 -->
            <!-- // upload -->
        </div><!-- // row -->
    </div>
@endsection
