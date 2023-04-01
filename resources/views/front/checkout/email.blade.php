<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <title>Order Notification | Laptop</title>
</head>

<body
    style="background-color: #e7eff8; font-family: trebuchet,sans-serif; margin-top: 0; box-sizing: border-box; line-height: 1.5;">
<div class="container-fluid">
    <div class="container" style="background-color: #e7eff8; width: 600px; margin: auto;">
        <div class="col-12 mx-auto" style="width: 580px;  margin: 0 auto;">

            <div class="row">
                <div class="container-fluid">
                    <div class="row" style="background-color: #e7eff8; height: 10px;">

                    </div>
                </div>
            </div>

            <div class="row"
                 style="height: 100px; padding: 10px 20px; line-height: 90px; background-color: white; box-sizing: border-box;">
                {{--<h1 class="pl-3"
                    style="color: orange; line-height: 00px; float: left; padding-left: 20px; padding-top: 5px;">
                    <img src="{{$message->embed(asset('front/img/logo.png'))}}"
                         height="40" alt="logo">
                </h1>--}}
                <h1 class="pl-2"
                    style="color: orange; line-height: 30px; float: left; padding-left: 20px; font-size: 40px; font-weight: 500;">
                    Laptop
                </h1>
            </div>

            <div class="row" style="background-color: #070a0c; height: 200px; padding: 35px; color: white;">
                <div class="container-fluid">
                    <h3 class="m-0 p-0 mt-4" style="margin-top: 0; font-size: 28px; font-weight: 500;">
                        <strong style="font-size: 32px;">Thông báo đơn hàng</strong>
                        <br>
                        Cảm ơn bạn vì đã đặt hàng!
                    </h3>
                    <div class="row mt-5" style="margin-top: 35px; display: flex;">
                        <div class="col-6"
                             style="margin-bottom: 25px; flex: 0 0 50%; width: 50%; box-sizing: border-box;">
                            <b>{{ $order->first_name . ', ' . $order->last_name }}</b>
                            <br>
                            <span>
                                <a style="color: white !important;" href="mailto:{{ $order->email }}" target="_blank">{{ $order->email }}</a>
                            </span>
                            <br>
                            <span>{{ $order->phone }}</span>
                        </div>
                        <div class="col-6" style="flex: 0 0 50%; width: 50%; box-sizing: border-box;">
                            <b>Ngày đặt hàng:</b> {{ date('d/m/yy H:i', strtotime($order->created_at)) }}
                            <br>
                            <b>Địa chỉ:</b> {{ $order->street_address . ' - ' .  $order->town_city }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2 p-4" style="background-color: white; margin-top: 15px; padding: 20px;">
                <table>
                    <tr>
                        <td>
                            <img
                                src="https://ci6.googleusercontent.com/proxy/8eUxMUXMkvgUKX8veBCRQM5N7-jXP0Wx8KjQLaGDch2DnV_5HYw9PMgJXsoqgSR_jonTY9jAftWPKNsN5W9cUUneQ9hz7IhxH4rIXNzHMm0ijbsNjHB9m7g6XfJJ=s0-d-e1-ft#https://www.bambooairways.com/reservation/common/hosted-images/tickets.jpg"
                                alt="">
                        </td>

                        @if($order->payment_type == "pay_later")
                            <td class="pl-3" style=" padding-left:15px;">
                                <span class="d-inline"
                                      style="color:#424853; font-family:trebuchet,sans-serif; font-size:16px; font-weight:normal; line-height:22px;">
                                    Bạn đã chọn <span style="font-weight: bold;">phương thức thanh toán khi nhận hàng</span>. Chúng tôi sẽ chuyển đơn hàng của bạn sang đối tác giao hàng.
                                </span>
                            </td>
                        @endif

                        @if($order->payment_type == "online_payment")
                            <td class="pl-3" style=" padding-left:15px;">
                                <span class="d-inline"
                                      style="color:#424853; font-family:trebuchet,sans-serif; font-size:16px; font-weight:normal; line-height:22px;">
                                      Bạn đã chọn <span style="font-weight: bold;">phương thức thanh toán online</span>. Chúng tôi sẽ chuyển đơn hàng của bạn sang đối tác giao hàng.
                                </span>
                            </td>
                            <td class="pl-3" style=" padding-left:10px;">
                                <img src="https://vnpay.vn/wp-content/uploads/2020/07/Logo-VNPAYQR-update.png"
                                     width="130px" style="margin-top: 10px;" alt="">
                            </td>
                        @endif

                    </tr>
                </table>
            </div>

            <div class="row mt-2" style="margin-top: 15px;">
                <div class="container-fluid">
                    <div class="row pl-3 py-2" style="background-color: #f4f8fd; padding: 10px 0 10px 20px;">
                        <b>Chi tiết đơn hàng</b>
                    </div>
                    <div class="row pl-3 py-2" style="background-color: #fff; padding: 10px 20px 10px 20px;">
                        <table class="table table-sm table-hover"
                               style="text-align: left;  width: 100%; margin-bottom: 5px; border-collapse: collapse;">
                            <thead>
                            <tr>
                                <th style="padding: 5px 0; width: 70%;">SẢN PHẨM</th>
                                <th style="padding: 5px 20px 5px 0; text-align: right;">TỔNG CỘNG</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->orderDetails as $orderDetail)
                                <tr>
                                    <td style="border-top: 1px solid #dee2e6; padding: 5px 0; width:70%;">
                                        {{ $orderDetail->product->name . ' (x' . $orderDetail->qty . ')'}}
                                    </td>
                                    <td style="border-top: 1px solid #dee2e6; padding: 5px 20px 5px 0; text-align: right;">
                                        {{ number_format(intval($orderDetail->total),0) }} đ
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row mt-2" style="margin-top: 15px;">
                <div class="container-fluid">
                    <div class="row pl-3 py-2" style="background-color: #f4f8fd; padding: 10px 0 10px 20px;">
                        <b>Chi tiết thanh toán</b>
                    </div>
                    <div class="row pl-3 py-2"
                         style="background-color: #fff; font-size: 18px; padding: 2px 20px 10px 20px;">
                        <div class="col-12 p-0">
                            <hr style="border-top: 1px solid #0000001a;">
                            <table class="mt-2 w-100"
                                   style="font-size: 16px; width: 100%; text-align: left;  margin-bottom: 5px;">
                                <tr>
                                    <td class="">Phí giao hàng</td>
                                    <td class="pr-3 text-right" style="text-align: right; padding-right: 20px;">
                                        0 đ
                                    </td>
                                </tr>
                                <tr>
                                    <td class="">TỔNG CỘNG</td>
                                    <td class="pr-3 text-right" style="text-align: right; padding-right: 20px;">
                                        {{ $subtotal }} đ
                                    </td>
                                </tr>
                                <tr style="font-size: 18px;">
                                    <td><b>THÀNH TIỀN</b></td>
                                    <td class="pr-3 text-right" style="text-align: right; padding-right: 20px;">
                                        <b>{{ $total }} đ</b>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2 mb-4" style="margin-top: 15px; margin-bottom: 25px;">
                <div class="container-fluid">
                    <div class="row pl-3 py-2" style="background-color: #f4f8fd; padding: 10px 0 10px 20px;">
                        <b style="color: #00509d; font-size: 18px;">Thông tin bổ sung</b>
                    </div>
                    <div class="row pl-3 py-2" style="background-color: #fff; padding: 10px 20px;">
                        <p>Bạn có thể kiểm tra lại sản phẩm (thương hiệu, màu sắc, số lượng,...) trước khi
                            thanh toán và có thể từ chối nhận sản phẩm nếu không hài lòng. 
                        </p>

                        <p>Nếu sản phẩm có dấu hiệu hư hỏng hoặc không giống với thông tin mô tả trên website, 
                            hãy liên hệ với chúng tôi trong vòng 48 giờ từ thời điểm nhận hàng để được hỗ trợ.</p>

                        <p>Giữ hóa đơn, hộp đựng sản phẩm và phiếu bảo hành để đổi trả sản phẩm và sửa
                            chữa miễn phí trong vòng 1 năm.
                        </p>

                        <b>LapTop xin cảm ơn.</b>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="container-fluid">
                    <div class="row" style="background-color: #e7eff8; height: 10px;">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
