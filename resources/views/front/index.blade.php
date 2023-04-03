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
                        <img src="front/img/banner-1.jpg" alt="staff-img">
                        <div class="inner-text">
                            <h4>Văn phòng</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="front/img/banner-2.jpg" alt="dev-img">
                        <div class="inner-text">
                            <h4>Gaming</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="front/img/banner-3.jpg" alt="student-img">
                        <div class="inner-text">
                            <h4>Sinh viên</h4>
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
                        <h2>Đồ họa</h2>
                        <a href="shop/category/Laptop%20Đồ%20họa">Xem thêm</a>
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
                        <h2>Gaming</h2>
                        <a href="shop/category/Laptop%20Gaming">Xem thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Dev Banner Section End-->
@endsection