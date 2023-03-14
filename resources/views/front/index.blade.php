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
                    <div class="filter-control">
                        <ul>
                            <li class="active item" data-tag="*" data-category="staff">All</li>
                            <li class="item" data-tag=".Asus" data-category="staff">ASUS</li>
                            <li class="item" data-tag=".Lenovo" data-category="staff">LENOVO</li>
                            <li class="item" data-tag=".Acer" data-category="staff">ACER</li>
                            <li class="item" data-tag=".Dell" data-category="staff">DELL</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel staff">
                        @foreach ($featuredProducts['staff'] as $staffProduct)
                            <div class="product-item item {{$staffProduct->tag}}">
                                <div class="pi-pic">
                                    <img src="{{URL('front/img/products/').'/'.$staffProduct->productImages[0]->path}}" alt="">
                                    @if ($staffProduct->discount != null)
                                        <div class="sale">Sale</div>
                                    @endif
                                    <div class="icon">
                                        <i class="icon_heart_alt"></i>
                                    </div>
                                    <ul>
                                        <li><a class="w-icon active" href=""><i class="icon_bag_alt"></i></a></li>
                                        <li><a class="quick-view" href="shop/product/{{$staffProduct->id}}" >+ Quick View</a></li>
                                        <li><a class="w-icon" href=""><i class="fa fa-random"></i></a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">{{$staffProduct->tag}}</div>
                                    <a href="shop/product/{{$staffProduct->id}}">
                                        <h5>{{$staffProduct->name}}</h5>
                                    </a>
                                    <div class="product-price">
                                        @if ($staffProduct->discount != null)
                                            {{$staffProduct->discount}} đ <span>{{$staffProduct->price}} đ</span>
                                        @else
                                            {{$staffProduct->price}} đ
                                        @endif
                                    </div>
                                </div>
                            </div>
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
                    <div class="filter-control">
                        <ul>
                            <li class="active item" data-tag="*" data-category="dev">All</li>
                            <li class="item" data-tag=".Asus" data-category="dev">ASUS</li>
                            <li class="item" data-tag=".Lenovo" data-category="dev">LENOVO</li>
                            <li class="item" data-tag=".Acer" data-category="dev">ACER</li>
                            <li class="item" data-tag=".Dell" data-category="dev">DELL</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel dev">
                        @foreach ($featuredProducts['dev'] as $devProduct)
                        <div class="product-item item {{$devProduct->tag}}">
                            <div class="pi-pic">
                                <img src="{{URL('front/img/products/').'/'.$devProduct->productImages[0]->path}}" alt="">
                                @if ($devProduct->discount != null)
                                    <div class="sale">Sale</div>
                                @endif
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li><a class="w-icon active" href=""><i class="icon_bag_alt"></i></a></li>
                                    <li><a class="quick-view" href="shop/product/{{$devProduct->id}}" >+ Quick View</a></li>
                                    <li><a class="w-icon" href=""><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">{{$devProduct->tag}}</div>
                                <a href="shop/product/{{$devProduct->id}}">
                                    <h5>{{$devProduct->name}}</h5>
                                </a>
                                <div class="product-price">
                                    @if ($devProduct->discount != null)
                                        {{$devProduct->discount}} đ <span>{{$devProduct->price}} đ</span>
                                    @else
                                        {{$devProduct->price}} đ
                                    @endif
                                </div>
                            </div>
                        </div>
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

    <!--Latest Blog Section Begin-->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-latest-blog">
                            <img src="{{URL('front/img/blog/').'/'.$blog->image}}" alt="">
                            <div class="latest-text">
                                <div class="tag-list">
                                    <div class="tag-item"><i class="fa fa-calendar-o"></i> {{date(strtotime('M d, Y', $blog->created_at))}}</div>
                                    <div class="tag-item"><i class="fa fa-comment-o"></i> {{count($blog->blogComments)}}</div>
                                </div>
                                <a href="">
                                    <h4>{{$blog->title}}</h4>
                                </a>
                                <p>{{$blog->subtitle}}</p>
                            </div>
                        </div>
                    </div>  
                @endforeach
            </div>
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For all order over 50$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Delivery On Time</h6>
                                <p>Even if goods have problems</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-3.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Secure Payment</h6>
                                <p>100% secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Latest Blog Section End-->
@endsection