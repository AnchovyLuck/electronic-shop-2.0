<?php

namespace App\Utilities;

class Constant {
    //Order
    const order_status_ReceiveOrders = 1;
    const order_status_Unconfirmed = 2;
    const order_status_Confirmed = 3;
    const order_status_Paid = 4;
    const order_status_Processing = 5;
    const order_status_Shipping = 6;
    const order_status_Finish = 7;
    const order_status_Cancel = 0;
    public static $order_status = [
        self::order_status_ReceiveOrders => 'Nhận đơn hàng',
        self::order_status_Unconfirmed => 'Chưa xác thực',
        self::order_status_Confirmed => 'Đã xác thực',
        self::order_status_Paid => 'Đã thanh toán',
        self::order_status_Processing => 'Đang xử lý',
        self::order_status_Shipping => 'Đang vận chuyển',
        self::order_status_Finish => 'Hoàn tất',
        self::order_status_Cancel => 'Hủy',
    ];

    //User
    const user_level_host = 0;
    const user_level_admin = 1;
    const user_level_client = 2;
    public static $user_level = [
        self::user_level_host => 'Host',
        self::user_level_admin => 'Admin',
        self::user_level_client => 'Client',
    ];
}