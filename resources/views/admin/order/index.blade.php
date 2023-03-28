@extends('admin.layout.master')

@section('title', 'Đặt hàng')

@section('body')
<!-- Main -->
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Đơn hàng
                    <div class="page-title-subheading">
                        Các tính năng CRUD
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">

                <div class="card-header">

                    <form>
                        <div class="input-group">
                            <input type="search" name="search" id="search"
                                placeholder="Search everything" class="form-control" value="{{request('search')}}">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i>&nbsp;
                                    Tìm kiếm
                                </button>
                            </span>
                        </div>
                    </form>

                    <div class="btn-actions-pane-right">
                        <div role="group" class="btn-group-sm btn-group">
                            <button class="btn btn-focus">Tuần này</button>
                            <button class="active btn btn-focus">Tất cả</button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead class="container">
                            <tr class="row">
                                <th class="text-center col-1">ID</th>
                                <th class="text-center col-3">Khách hàng/Sản phẩm</th>
                                <th class="text-center col">Địa chỉ</th>
                                <th class="text-center col">Giá</th>
                                <th class="text-center col">Trạng thái</th>
                                <th class="text-center col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody class="container">
                            @foreach ($orders as $order)
                                <tr class="row">
                                    <td class="text-center text-muted col-1">#{{$order->id}}</td>
                                    <td class="col-3">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="widget-content-left">
                                                        <img style="height: 60px;"
                                                            data-toggle="tooltip" title="Image"
                                                            data-placement="bottom"
                                                            src="front/img/products/{{$order->orderDetails[0]->product->productImages[0]->path}}" alt="">
                                                    </div>
                                                </div>
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">{{$order->first_name . ' '. $order->last_name}}</div>
                                                    <div class="widget-subheading opacity-7">
                                                        {{$order->orderDetails[0]->product->name}}
                                                        @if (count($order->orderDetails) > 1)
                                                            (và {{count($order->orderDetails) - 1}} sản phẩm khác)
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center col">
                                        {{$order->street_address . ' - ' . $order->town_city}}
                                    </td>
                                    <td class="text-center col">{{number_format(array_sum(array_column($order->orderDetails->toArray(), 'total')),0)}} đ</td>
                                    <td class="text-center col">
                                        <div class="badge badge-dark">
                                            {{\App\Utilities\Constant::$order_status[$order->status]}}
                                        </div>
                                    </td>
                                    <td class="text-center col">
                                        <a href="admin/order/{{$order->id}}"
                                            class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                            Chi tiết
                                        </a>
                                    </td>
                                </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-block card-footer">
                    {{$orders->links()}}
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection