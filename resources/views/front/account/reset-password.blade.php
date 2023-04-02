
@extends('front/layout/master')

@section('title', 'Register')

@section('body')
    <!--Breadcrumb Section Begin-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <a href="login"><i class="fa fa-home"></i> Login</a>
                        <span>Tạo mật khẩu mới</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Section End-->

    <!--Register Section Begin-->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Thiết lập mật khẩu</h2>
                        <form action="account/reset-password" method="post">
                            @csrf
                            <input type="hidden" name="token" value="{{$token}}">
                            <div class="group-input">
                                <label for="email">Địa chỉ email *</label>
                                <input readonly type="email" id="email" name="email" value="{{$email}}">
                            </div>
                            <div class="group-input"> 
                                <label for="pass">Mật khẩu mới *</label>
                                <input type="password" id="pass" name="password">
                                <span class="text-danger">@error('password'){{$message}}@enderror</span>
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Xác nhận mật khẩu mới *</label>
                                <input type="password" id="con-pass" name="password_confirmation">
                                <span class="text-danger">@error('password_confirmation'){{$message}}@enderror</span>
                            </div>
                            <button type="submit" class="site-btn register-btn">Xác nhận</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Register Section End-->
@endsection
  