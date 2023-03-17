<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Utilities\VNPay;
use App\Services\Order\OrderServiceInterface;
use App\Services\OrderDetail\OrderDetailServiceInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    private $orderService;
    private $orderDetailService;

    public function __construct(OrderServiceInterface $orderService, OrderDetailServiceInterface $orderDetailService) {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
    }

    public function index() {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        return view('front.checkout.index', compact('carts', 'total', 'subtotal'));
    }

    public function addOrder(Request $request) {
        //Add order
        $order = $this->orderService->create($request->all());
        //Add order detail
        $carts = Cart::content();
        
        foreach($carts as $cart) {
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'amount' => $cart->price,
                'total' => $cart->price * $cart->qty,
            ];

            $this->orderDetailService->create($data);
        }
        // dd(str_replace('.','',Cart::total()));
        if ($request->payment_type === 'pay_later') {
            $subtotal =Cart::subtotal();
            $total = Cart::total();
            $this->sendEmail($order, $subtotal, $total);
            //Delete cart
            Cart::destroy();
            //Return success message
            return redirect('checkout/result')->with('notification', 'Đặt hàng thành công! Vui lòng xác nhận qua email!');
        }
        else if ($request->payment_type === 'online_payment') {
            //Get URL
            $data_url = VNPay::vnpay_create_payment([
                'vnp_TxnRef' => $order->id,
                'vnp_OrderInfo' => 'Mô tả đơn hàng',
                'vnp_Amount' => str_replace('.','',Cart::total()),
            ]);
            dd($data_url);
            // Direct to URL
            return redirect()->to($data_url);
        }
       
    }

    public function vnPayCheck(Request $request) {
        $vnp_ResponseCode = $request->get('vnp_ResponseCode');
        $vnp_TxnRef = $request->get('vnp_TxnRef');
        $vnp_Amount = $request->get('vnp_Amount');

        if ($vnp_ResponseCode != null) {
            if ($vnp_ResponseCode == 00) {
                Cart::destroy();

                $order = $this->orderService->find($vnp_TxnRef);
                $subtotal = Cart::subtotal();
                $total = Cart::total();
                $this->sendEmail($order, $subtotal, $total);
                return redirect('checkout/result')->with('notification','Đặt hàng thành công. Vui lòng xác nhận qua gmail.');
            } else {
                $this->orderService->delete($vnp_TxnRef);

                return redirect('checkout/result')->with('notification','Thanh toán thất bại.');
            }
        }
    }

    public function result() {
        $notification = session('notification');
        return view('front.checkout.result', compact('notification'));
    }

    public function sendEmail($order, $subtotal, $total) {
        $email_to = $order->email;

        Mail::send('front.checkout.email', compact('order','subtotal', 'total'), function ($message) use($email_to) {
            $message->from('tiencacom20@gmail.com', 'Nightlongbytom');
            $message->sender('john@johndoe.com', 'John Doe');
            $message->to($email_to, $email_to);
            $message->subject('Xác nhận đơn hàng!');
        });
    }
}
