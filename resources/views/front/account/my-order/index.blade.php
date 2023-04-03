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
                        <span>Danh sách đơn hàng</span>
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
                        <table class="container">
                            <thead>
                                <tr class="row">
                                    <th class="col-1">Ảnh</th>
                                    <th class="col-1">ID</th>
                                    <th class="col-6" class="p-name pl-lg-5">Sản phẩm</th>
                                    <th class="col-2">Tổng cộng</th>
                                    <th class="col-2">Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr class="row">
                                        <td class="first-row col-1">
                                            <img style="height: 20vh; width: 20vh; margin-left: auto; margin-right: auto;" src="front/img/products/{{$order->orderDetails[0]->product->productImages[0]->path}}" alt="">
                                        </td>
                                        <td class="first-row col-1">#{{$order->id}}</td>
                                        <td class="cart-title first-row col-6">
                                            <h5>
                                                {{$order->orderDetails[0]->product->name}}
                                                @if (count($order->orderDetails) > 1)
                                                    , và {{count($order->orderDetails)}} sản phẩm khác. 
                                                @endif
                                            </h5>
                                        </td>
                                        <td class="first-row col-2" style="color: #e7ab3c;font-size: 16px;font-weight: 700;">{{number_format(array_sum(array_column($order->orderDetails->toArray(), 'total')),0)}} đ</td>
                                        <td class="first-row pe-3 col-2">
                                            <a href="account/my-order/{{$order->id}}" class="text-info fw-bold" style="text-decoration: none;">Chi tiết</a>
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