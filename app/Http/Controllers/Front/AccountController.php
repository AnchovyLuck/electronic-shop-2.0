<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\User\UserServiceInterface;
use App\Services\Order\OrderServiceInterface;
use Illuminate\Http\Request;
use App\Utilities\Constant;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    private $userService;
    private $orderService;

    public function __construct(UserServiceInterface $userService, OrderServiceInterface $orderService)
    {
        $this->userService = $userService;
        $this->orderService = $orderService;
    }

    public function login() {
        return view('front.account.login');
    }

    public function checkLogin(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => Constant::user_level_client,
        ];
        $remember = $request->remember;

        if (Auth::attempt($credentials,$remember)) {
            return redirect()->intended('');
        } else {
            return back()->with('notification','Email hoặc mật khẩu không đúng!');
        }
    }

    public function logout() {
        Auth::logout();

        return back();
    }

    public function register() {

        return view('front.account.register');
    }

    public function postRegister(Request $request) {
        if ($request->password !== $request->password_confimation) {
            return back()->with('notification', 'Nhập sai mật khẩu xác nhận!');
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => Constant::user_level_client,
        ];
        $this->userService->create($data);

        return redirect('account/login')->with('notification','Đăng ký tài khoản thành công! Vui lòng đăng nhập!');
    }

    public function myOrderIndex() {
        $orders = $this->orderService->getOrderByUserId(Auth::id());

        return view('front.account.my-order.index', compact('orders'));
    }

    public function myOrderShow($id) {
        $order = $this->orderService->find($id);
        $status = Constant::$order_status[$order->status];

        return view('front.account.my-order.show', compact('order', 'status'));
    }
}
