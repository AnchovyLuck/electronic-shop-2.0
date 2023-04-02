<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Services\Order\OrderServiceInterface;
use App\Services\OrderDetail\OrderDetailServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use App\Utilities\Constant;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    private $orderService;
    private $orderDetailService;
    private $productCategoryService;

    public function __construct(OrderServiceInterface $orderService, OrderDetailServiceInterface $orderDetailService, 
    ProductCategoryServiceInterface $productCategoryService) {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
        $this->productCategoryService = $productCategoryService;
    }

    public function index() {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        $categories = $this->productCategoryService->all();
        return view('front.checkout.index', compact('carts', 'total', 'subtotal','categories'));
    }

    public function addOrder(Request $request) {
        //Add order
        $data = $request->all();
        $data['status'] = Constant::order_status_ReceiveOrders;
        $data['user_id'] = Auth::user()->id;
        $order = $this->orderService->create($data);
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
            $data_url = $this->create([
                    'vnp_TxnRef' => $order->id,
                    'vnp_OrderInfo' => 'Thanh toán đơn hàng',
                    'vnp_Amount' => str_replace(',','',Cart::total()),
            ]);
            
            return redirect()->to($data_url);
        }
       
    }

    public function create(array $data) {
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8000/checkout/vnPayCheck";
        $vnp_TmnCode = "98DTJ9NZ";
        $vnp_HashSecret = "MKLJJYZEZWCFFIKMCOLGOPFMVERNEIAH";
        
        $vnp_TxnRef = $data['vnp_TxnRef'];
        $vnp_OrderInfo = $data['vnp_OrderInfo'];
        $vnp_OrderType = 130000;
        $vnp_Amount = $data['vnp_Amount'] * 100;
        $vnp_Locale = "vn";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND", //Đơn vị tiền tệ (Phiên bản đang dùng chỉ hỗ trợ VND)
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );
        //  dd(env('APP_URL'));  //Không nhận được key
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);

        return $returnData['data'];
    }

    public function vnPayCheck(Request $request) {
        $vnp_ResponseCode = $request->get('vnp_ResponseCode');
        $vnp_TxnRef = $request->get('vnp_TxnRef');
        // $vnp_Amount = $request->get('vnp_Amount');

        if ($vnp_ResponseCode != null) {
            if ($vnp_ResponseCode == 00) {
                $this->orderService->update(['status' => Constant::order_status_Paid], $vnp_TxnRef);


                $order = $this->orderService->find($vnp_TxnRef);
                $subtotal = Cart::subtotal();
                $total = Cart::total();
                Cart::destroy();

                //Send email
                $this->sendEmail($order, $subtotal, $total);
                return redirect('checkout/result')->with('notification','Đặt hàng thành công. Vui lòng kiểm tra đơn hàng qua gmail.');
            } else {
                $this->orderService->delete($vnp_TxnRef);

                return redirect('checkout/result')->with('notification','Thanh toán thất bại.');
            }
        }
    }

    public function result() {
        $notification = session('notification');
        $categories = $this->productCategoryService->all();
        return view('front.checkout.result', compact('notification', 'categories'));
    }

    public function sendEmail($order, $subtotal, $total) {
        $email_to = $order->email;

        Mail::send('front.checkout.email', compact('order','subtotal', 'total'), function ($message) use($email_to) {
            $message->from('laptop@mailtrap.com', 'Laptop');
            $message->sender('anchovy@mailtrap.com', 'Anchovy');
            $message->to($email_to, $email_to);
            $message->subject('Xác nhận đơn hàng!');
        });
    }
}
