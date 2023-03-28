@extends('front/layout/master')

@section('title', 'Home');

@section('body')
    <!--Hero Section Begin-->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="front/img/hero-1.jpg">
            </div>
            <div class="single-hero-items set-bg" data-setbg="front/img/hero-2.jpg">
                
            </div>
            <div class="single-hero-items set-bg" data-setbg="front/img/hero-3.jpg">
                
            </div>
        </div>
    </section>
    <!--Hero Section End-->

    <!--Banner Section Begin-->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="front/img/banner-1.jpg" alt="staff-img" style="width: 10vw; height: 35vh;">
                        <div class="inner-text">
                            <h4>Staff</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="front/img/banner-2.jpg" alt="dev-img" style="width: 10vw; height: 35vh;">
                        <div class="inner-text">
                            <h4>Dev</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="front/img/banner-3.jpg" alt="student-img" style="width: 10vw; height: 35vh;">
                        <div class="inner-text">
                            <h4>Student</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Banner Section End-->

    <!--Staff Banner Section Begin-->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="front/img/products/staff-large.jpg">
                        <h2>Staff's</h2>
                        <a href="#">Discover More</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    {{-- <div class="filter-control">
                        <ul>
                            <li class="active item" data-tag="*" data-category="staff">All</li>
                            <li class="item" data-tag=".Asus" data-category="staff">ASUS</li>
                            <li class="item" data-tag=".Lenovo" data-category="staff">LENOVO</li>
                            <li class="item" data-tag=".Acer" data-category="staff">ACER</li>
                            <li class="item" data-tag=".Dell" data-category="staff">DELL</li>
                        </ul>
                    </div> --}}
                    <div class="product-slider owl-carousel staff">
                        @foreach ($featuredProducts['staff'] as $product)
                            @include('front.components.product-item')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Staff Banner Section End-->

    <!--Dev Banner Section Begin-->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 offset-lg-1">
                    {{-- <div class="filter-control">
                        <ul>
                            <li class="active item" data-tag="*" data-category="dev">All</li>
                            <li class="item" data-tag=".Asus" data-category="dev">ASUS</li>
                            <li class="item" data-tag=".Lenovo" data-category="dev">LENOVO</li>
                            <li class="item" data-tag=".Acer" data-category="dev">ACER</li>
                            <li class="item" data-tag=".Dell" data-category="dev">DELL</li>
                        </ul>
                    </div> --}}
                    <div class="product-slider owl-carousel dev">
                        @foreach ($featuredProducts['dev'] as $product)
                            @include('front.components.product-item') 
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="front/img/products/dev-large.jpg">
                        <h2>Dev's</h2>
                        <a href="#">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Dev Banner Section End-->

    <!--Instagram Section Begin-->
    <div class="instagram-photo">
        <div class="insta-item set-bg" data-setbg="front/img/insta-1.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">Stranger</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="front/img/insta-2.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">Stranger</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="front/img/insta-3.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">Stranger</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="front/img/insta-4.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">Stranger</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="front/img/insta-5.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">Stranger</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="front/img/insta-6.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">Stranger</a></h5>
            </div>
        </div>
    </div>
    <!--Instagram Section End-->
@endsection