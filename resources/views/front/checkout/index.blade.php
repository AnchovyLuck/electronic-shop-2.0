@extends('front/layout/master')

@section('title', 'Check Out')

@section('body')
    <!--Breadcrumb Section Begin-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <span>Đặt hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Section End-->

    <!--Shopping Cart Section Begin-->
    <div class="checkout-section spad">
        <div class="container">
            <form action="" method="post" class="checkout-form">
                @csrf
                <div class="row">
                    @if (Cart::count() > 0)
                        <div class="col-lg-6">
                            <h4>Thông tin khách hàng</h4>
                            <div class="row">

                                <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id ?? ''}}">

                                <div class="col-lg-6">
                                    <label for="fir">Họ và tên <span>*</span></label>
                                    <input type="text" id="fir" name="first_name" value="{{Auth::user()->name ?? ''}}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="last">Phiên bản ứng dụng <span>*</span></label>
                                    <input type="text" id="last" name="last_name" value="Demo">
                                </div>
                                <div class="col-lg-12">
                                    <label for="cun-name">Công ty</label>
                                    <input type="text" id="cun-name" name="company_name"  value="{{Auth::user()->company_name ?? ''}}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="cun">Quốc gia <span>*</span></label>
                                    <input type="text" id="cun" name="country" value="{{Auth::user()->country ?? ''}}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="street">Địa chỉ <span>*</span></label>
                                    <input type="text" id="street" class="street-first" name="street_address" value="{{Auth::user()->street_address ?? ''}}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="zip">Postcode / ZIP (optional)</label>
                                    <input type="text" id="zip" name="postcode_zip" value="{{Auth::user()->postcode_zip ?? ''}}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="town">Thành phố <span>*</span></label>
                                    <input type="text" id="town" name="town_city" value="{{Auth::user()->town_city ?? ''}}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="email">Địa chỉ Email <span>*</span></label>
                                    <input type="text" id="email" name="email" value="{{Auth::user()->email ?? ''}}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="phone">Điện thoại <span>*</span></label>
                                    <input type="text" id="phone" name="phone" value="{{Auth::user()->phone ?? ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            {{-- <div class="checkout-content">
                                <input type="text" placeholder="Enter Your Coupon Code">
                            </div> --}}
                            <div class="place-order">
                                <h4>Thông tin đơn hàng</h4>
                                <div class="order-total">
                                    <ul class="order-table">
                                        <li>Sản phẩm <span>Tổng cộng</span></li>
                                        @foreach ($carts as $cart)
                                            <li class="fw-normal text-justify">
                                                <span class="font-weight-bold text-left margin:right:auto; margin-left:auto;" style="width: 10%;"> x {{$cart->qty}}</span><span style="width: 70%; margin-right:20%;">{{$cart->name}}</span>
                                                <div>{{number_format(($cart->price * $cart->qty), 0)}} đ</div>
                                            </li>
                                        @endforeach
                                        <li class="fw-normal">Tổng giá <div style="display:inline-block;">{{$subtotal}} đ</div></li>
                                        <li class="total-price">Thành tiền <span>{{$total}} đ</span></li>
                                    </ul>
                                    <div class="payment-check">
                                        <div class="pc-item">
                                            <label for="pc-check">
                                                Thanh toán khi nhận hàng
                                                <input type="radio" name="payment_type" value="pay_later" id="pc-check" checked>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="pc-item">
                                            <label for="pc-paypal">
                                                Thanh toán trực tuyến
                                                <input type="radio" name="payment_type" value="online_payment" id="pc-paypal">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="order-btn">
                                        <button type="submit" class="site-btn place-btn">ĐẶT HÀNG</button>
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
            </form>
        </div>
    </div>
    <!--Shopping Cart Section End-->
@endsection