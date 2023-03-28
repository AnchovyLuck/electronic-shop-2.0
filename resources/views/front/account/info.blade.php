@extends('front/layout/master')

@section('title', 'Thông tin tài khoản')

@section('body')
    <!--Breadcrumb Section Begin-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <span>Thông tin tài khoản</span>
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
                        <h2>Thông tin tài khoản</h2>
                        @if (session('notification'))
                            <div class="alert alert-warning" role="alert">
                                {{session('notification')}}
                            </div>
                        @endif
                        <form action="account/my-account" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="group-input">
                                <label for="name">Họ và tên</label>
                                <input type="name" id="name" name="name" value="{{$info->name}}">
                            </div>
                            <div class="group-input">
                                <label for="email">Địa chỉ email</label>
                                <input type="email" id="email" name="email" value="{{$info->email}}">
                            </div>
                            <div class="group-input">
                                <label for="pass">Mật khẩu</label>
                                <input type="password" id="pass" name="password" value="">
                            </div>
                            <button type="submit" class="site-btn login-btn" style="width: 10vw;">Lưu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Login Section End-->
@endsection