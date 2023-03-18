@extends('front/layout/master')

@section('title', 'Order Detail')

@section('body')
    <!--Breadcrumb Section Begin-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <a href="/account/my-order"><i class="fa fa-home"></i> My Order</a>
                        <span>Details</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Section End-->

    <!--Order Section Begin-->
    <section class="checkout-section span">
        <div class="container">
            <form action="" class="checkout-form">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="" class="content-btn">Order ID: <b>#{{$order->id}}</b></a>
                        </div>
                        <h4>Chi tiết thanh toán</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="fir">First Name</label>
                                <input disabled type="text" id="fir" value="{{$order->first_name}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Last Name</label>
                                <input disabled type="text" id="last" value="{{$order->last_name}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun-name">Company Name</label>
                                <input disabled type="text" id="cun-name" value="{{$order->company_name}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun">Country</label>
                                <input disabled type="text" id="cun" value="{{$order->country}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Street Address</label>
                                <input disabled type="text" id="street" value="{{$order->street_address}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="zip">Postcode / ZIP</label>
                                <input disabled type="text" id="zip" value="{{$order->postcode_zip}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="town">Town/ City</label>
                                <input disabled type="text" id="town" value="{{$order->town_city}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email Address</label>
                                <input disabled type="text" id="email" value="{{$order->email}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone</label>
                                <input disabled type="text" id="phone" value="{{$order->phone}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="" class="content-btn">
                                Trạng thái:
                                <b>{{$status}}</b>
                            </a>
                        </div>
                        <div class="place-order">
                            <h4>Đơn hàng của bạn</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Sản phẩm <span>Tổng cộng</span></li>
                                    @foreach ($order->orderDetails as $orderDetail)
                                        <li class="fw-normal">
                                            {{$orderDetail->product->name}} x {{$orderDetail->product->qty}}
                                            <span>{{$orderDetail->total}} đ</span>
                                        </li>
                                    @endforeach
                                    <li class="total-price">
                                        Tổng cộng
                                        <span>{{array_sum(array_column($order->orderDetails->toArray(), 'total'))}} đ</span>
                                    </li>
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Thanh toán khi nhận hàng
                                            <input disabled type="radio" name="payment_type" value="pay_later" id="pc-check"
                                            {{$order->payment_type == 'pay_later' ? 'checked' : ''}}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Thanh toán trực tuyến
                                            <input disabled type="radio" name="payment_type" value="online_payment" id="pc-paypal"
                                            {{$order->payment_type == 'online_payment' ? 'checked' : ''}}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--Order Section End-->
@endsection