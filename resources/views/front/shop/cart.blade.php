@extends('front/layout/master')

@section('title', 'Cart')
   
@section('body')
   <!--Breadcrumb Section Begin-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <a href="shop">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Section End-->

    <!--Shopping Cart Section Begin-->
    <div class="shopping-cart spad">
        <div class="container">
            <div class="row">
                @if (Cart::count() > 0)
                    <div class="col-lg-12">
                        <div class="cart-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th class="p-name">Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th><i onclick="confirm('Bạn muốn xóa tất cả sản phẩm khỏi giỏ hàng sao?') ? destroyCart() : ''" 
                                            class="ti-close" style="cursor: pointer;"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)
                                        <tr data-rowId="{{$cart->rowId}}">
                                            <td class="cart-pic first-row"><img style="margin: auto; width: 15vw; height: 30vh;" src="{{URL('front/img/products/').'/'.$cart->options->images[0]->path}}" alt=""></td>
                                            <td class="cart-title first-row">
                                                <h5>{{$cart->name}}</h5>
                                            </td>
                                            <td class="p-price first-row">{{number_format($cart->discount ?? $cart->price, 3)}} đ</td>
                                            <td class="qua-col first-row">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="text" value="{{$cart->qty}}" data-rowId="{{$cart->rowId}}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="total-price first-row">{{number_format($cart->price * $cart->qty, 3)}} đ</td>
                                            <td class="close-td first-row">
                                                <i onclick="removeCart('{{$cart->rowId}}')" class="ti-close"></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="cart-buttons">
                                    <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                                    <a href="#" class="primary-btn up-cart">Update cart</a>
                                </div>
                                <div class="discount-coupon">
                                    <h6>Discount Codes</h6>
                                    <form action="#" class="coupon-form">
                                        <input type="text" placeholder="Enter your codes">
                                        <button type="submit" class="site-btn coupon-btn">Apply</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4 offset-lg-4">
                                <div class="proceed-checkout">
                                    <ul>
                                        <li class="subtotal">Subtotal <span>{{$subtotal}} &nbsp<span style="text-transform: lowercase;"> đ</span></span></li>
                                        <li class="cart-total">Total <span>{{$total}} &nbsp<span style="text-transform: lowercase;"> đ</span></span></li>
                                    </ul>
                                    <a href="checkout" class="proceed-btn">PROCEED TO CHECK OUT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-12 text-center">
                        <h4>Giỏ hàng của bạn đang rỗng!</h4>
                    </div>
                @endif
                
                
            </div>
        </div>
    </div>
    <!--Shopping Cart Section End-->
@endsection