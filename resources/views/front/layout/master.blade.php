<!DOCTYPE html>
<html lang="zxx">

<head>
    <base href="{{ asset('/') }}">
    <meta charset="UTF-8">
    <meta name="description" content="codelean Template">
    <meta name="keywords" content="codelean, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | LapTop</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
    <link rel="stylesheet" href="front/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="front/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://kit.fontawesome.com/02c0e39c7a.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Start coding here -->

    <!--Page preloder-->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!--Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class="fa fa-envelope"></i><span>......@@gmail.com</span>
                    </div>
                    <div class="phone-service">
                        <i class="fa fa-phone"></i><span> +84 36.758.7383</span>
                    </div>
                </div>
                <div class="ht-right">
                    @if (Auth::check())
                        <a href="account/logout" class="login-panel"><i class="fa fa-user"></i>{{Auth::user()->name}} - Đăng xuất</a>
                    @else
                        <a href="account/login" class="login-panel"><i class="fa fa-user"></i>Đăng nhập</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="container">
            <img class="logo" src="front/img/laptop.png" height="20" width="500" alt="logo" style="margin-left: auto; margin-right: auto;">
            <div class="inner-header">
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-7">
                        <form action="shop">
                            <div class="advanced-search">
                                <button type="button" class="category-btn">Disabled</button>
                                <div class="input-group">
                                    <input class="text-dark font-weight-bold" name="search" value="{{request('search')}}" type="text" placeholder="Nhập tên sản phẩm bạn cần">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon">
                                <a href="./cart">
                                    <i class="icon_bag_alt"></i>
                                    <span class="cart-count">{{Cart::count()}}</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                @foreach (Cart::content() as $cart)
                                                    <tr data-rowId="{{$cart->rowId}}">
                                                        <td class="si-pic"><img style="margin: auto; width: 50rem; height: 8rem;" src="front/img/products/{{$cart->options->images[0]->path}}" alt=""></td>
                                                        <td class="si-text">
                                                            <div class="product-selected">
                                                                <p>{{number_format(($cart->discount ?? $cart->price))}} đ x {{$cart->qty}}</p>
                                                                <h6>{{$cart->name}}</h6>
                                                            </div>
                                                        </td>
                                                        <td class="si-close">
                                                            <i onclick="removeCart('{{$cart->rowId}}')" class="ti-close"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>{{Cart::total()}} đ</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="./cart" class="primary-btn view-card">GIỎ HÀNG</a>
                                        <a href="checkout" class="primary-btn checkout-btn">ĐẶT HÀNG</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">{{Cart::total()}} đ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart" style="padding-left: 10vw;">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>Nhu cầu sử dụng</span>
                        <ul class="depart-hover">
                            @foreach ($categories as $category)
                                <li><a href="shop/category/{{$category->name}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="{{(request()->segment(1) == '') ? 'active' : ''}}"><a href="/">Home</a></li>
                        <li class="{{(request()->segment(1) == 'shop') ? 'active' : ''}}"><a href="shop">Sản phẩm</a></li>
                        <li class="{{(request()->segment(1) == 'about') ? 'active' : ''}}"><a href="about">Giới thiệu</a></li>
                        <li><a href="">Khác</a>
                            <ul class="dropdown">
                                <li class="{{(request()->segment(1) == 'account/my-order') ? 'active' : ''}}"><a href="account/my-order">Danh sách đơn hàng</a></li>
                                <li><a href="./cart">Giỏ hàng</a></li>
                                <li><a href="checkout">Đặt hàng</a></li>
                                <li><a href="account/register">Đăng ký</a></li>
                                <li><a href="account/login">Đăng nhập</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!--Header Section End-->

    @yield('body')

    <!--Partner Logo Section Begin-->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-6.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Partner Logo Section End-->

    <!--Footer Section Begin-->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <img src="front/img/footer-logo.png" height="25" alt="">
                        </div>
                        <ul>
                            <li>123 Ninh Kieu - Can Tho</li>
                            <li>Phone: +84 36.758.7383</li>
                            <li>Email: ......@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Thông tin</h5>
                        <ul>
                            <li><a href="about">Giới thiệu</a></li>
                            <li><a href="checkout">Đặt hàng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Tài khoản</h5>
                        <ul>
                            <li><a href="account/{{Auth::id()}}">Thông tin tài khoản</a></li>
                            <li><a href="account/my-order">Danh sách đơn hàng</a></li>
                            <li><a href="cart">Giỏ hàng</a></li>
                            <li><a href="shop">Sản phẩm</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Đăng ký nhận thông báo</h5>
                        <p>Cập nhật thông tin về các sản phẩm và chương trình ưu đãi mới nhất của chúng tôi.</p>
                        <form action="" class="subscribe-form">
                            <input type="text" name="" value="" placeholder="Tính năng chưa được phát triển">
                            <button type="button">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="payment-pic">
                            <img src="front/img/payment-method.png" alt="">
                        </div>
                        <div class="copyright text-light">
                            Copyright
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true" style="color:red"></i> by
                            <a href="https://github.com/AnchovyLuck" target="_blank">Anchovy</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--Footer Section End-->
    <!-- Js Plugins -->
    <script src="front/js/jquery-3.3.1.min.js "></script>
    <script src="front/js/bootstrap.min.js "></script>
    <script src="front/js/jquery-ui.min.js "></script>
    <script src="front/js/jquery.countdown.min.js "></script>
    <script src="front/js/jquery.nice-select.min.js "></script>
    <script src="front/js/jquery.zoom.min.js "></script>
    <script src="front/js/jquery.dd.min.js "></script>
    <script src="front/js/jquery.slicknav.js "></script>
    <script src="front/js/owl.carousel.min.js "></script>
    <script src="front/js/owlcarousel2-filter.min.js "></script>
    <script src="front/js/main.js"></script>
</body>

</html>