@extends('front/layout/master')

@section('title', 'Forgot Password')

@section('body')
    <!--Breadcrumb Section Begin-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <a href="login"><i class="fa fa-home"></i> Login</a>
                        <span>Forgot Password</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Section End-->

    <!--Login Section Begin-->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Quên mật khẩu</h2>
                        <p>Nhập địa chỉ email để nhận được mail chứa đường dẫn đến trang tạo mật khẩu mới</p>
                        <form action="account/forgot-password" method="post">
                            @csrf
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{session('status')}}
                                </div>
                            @endif
                            <div class="group-input">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Nhập email">
                                <span class="text-danger">@error('email'){{$message}}@enderror</span>
                            </div>
                            <button type="submit" class="site-btn login-btn">Gửi mail đổi mật khẩu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Login Section End-->
@endsection