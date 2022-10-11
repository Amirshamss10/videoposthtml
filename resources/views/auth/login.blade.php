@extends('auth-layout') 
@section('class-body', 'log_in_page')
@section('content')
<div id="log-in" class="site-form log-in-form">
      
      <div id="log-in-head">
        <h1>ورود</h1>
        <div id="logo"><a href="{{ route('index') }}"><img src="{{asset('img/logo.png') }}" alt=""></a></div>
    </div>
    
    <div class="form-output">
        <x-validation-errors></x-validation-errors>

        <form action="{{ route('login.store') }}" method="POST">
            @csrf
            <div class="form-group label-floating">
                <label class="control-label">ایمیل</label>
                <input name="email" class="form-control" placeholder="" type="email">
            </div>
            <div class="form-group label-floating">
                <label class="control-label">رمز عبور</label>
                <input name="password" class="form-control" placeholder="" type="password">
            </div>
            
            <div class="remember">
                <div class="checkbox">
                    <label>
                        <input name="remember" type="checkbox">
                            مرا به خاطر بسپار
                    </label>
                </div>
                <a href="{{ route('password.request') }}" class="forgot">رمز عبور من را فراموش کرده ام</a>
            </div>
            
            <button type="submit" class="btn btn-lg btn-primary full-width">ورود</button>

            <p>آیا شما یک حساب کاربری ندارید؟ <a href="{{ route('register.create') }}">ثبت نام کنید!</a> </p>
        </form>
    </div>
  </div>
  <!--======= // log_in_page =======-->
</body>
@endsection