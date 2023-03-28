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
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo">
                        <a href="/">
                            <img src="front/img/laptop.png" heihgt="25" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <form action="shop">
                        <div class="advanced-search row">
                            <div class="dropdown col-md-3">
                                <a class="btn btn-secondary dropdown-toggle item-dropdown" href="test" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Dropdown link
                                </a>
                              
                                <ul class="dropdown-menu col-md-9 item-dropdown">
                                  <li><a class="dropdown-item" href="#">Action</a></li>
                                  <li><a class="dropdown-item" href="#">Another action</a></li>
                                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                            <div class="input-group">
                                <input class="text-dark font-weight-bold" name="search" value="{{request('search')}}" type="text" placeholder="What do you need?">
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
                                    <a href="./cart" class="primary-btn view-card">VIEW CARD</a>
                                    <a href="checkout" class="primary-btn checkout-btn">CHECK OUT</a>
                                </div>
                            </div>
                        </li>
                        <li class="cart-price">{{Cart::total()}} đ</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
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
    <script src="front/js/main.js "></script>
</body>

</html>