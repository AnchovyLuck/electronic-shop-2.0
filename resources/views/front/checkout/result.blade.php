@extends('front/layout/master')

@section('title', 'Result')

@section('body')
    <!--Breadcrumb Section Begin-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <a href="shop">Shop</a>
                        <a href="checkout">Check Out</a>
                        <span>Result</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Section End-->

    <!--Section Begin-->
    <div class="checkout-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4>{{$notification}}</h4>
                    <a href="./" class="primary-btn mt-5">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
    <!--Section End-->
@endsection