@extends('front/layout/master')

@section('title', 'My Order')

@section('body')
    <!--Breadcrumb Section Begin-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <span>My Order</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Section End-->

    <!--My Order Section Begin-->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <th>Ảnh</th>
                                <th>ID</th>
                                <th class="p-name pl-lg-5">Sản phẩm</th>
                                <th>Tổng cộng</th>
                                <th>Chi tiết</th>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="cart-pic first-row">
                                            <img style="height: 20vh; width: 20vh; margin: auto 5vw auto 5vw;" src="front/img/products/{{$order->orderDetails[0]->product->productImages[0]->path}}" alt="">
                                        </td>
                                        <td class="first-row">#{{$order->id}}</td>
                                        <td class="cart-title first-row pl-lg-5">
                                            <h5>
                                                {{$order->orderDetails[0]->product->name}}
                                                @if (count($order->orderDetails) > 1)
                                                    , và {{count($order->orderDetails)}} sản phẩm khác. 
                                                @endif
                                            </h5>
                                        </td>
                                        <td class="total-price first-row">{{array_sum(array_column($order->orderDetails->toArray(), 'total'))}} đ</td>
                                        <td class="first-row">
                                            <a href="account/my-order/{{$order->id}}" class="btn">Chi tiết</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--My Order Section End-->
@endsection