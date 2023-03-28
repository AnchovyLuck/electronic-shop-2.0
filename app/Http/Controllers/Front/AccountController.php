<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\User\UserServiceInterface;
use App\Services\Order\OrderServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;
use App\Utilities\Constant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    private $userService;
    private $orderService;
    private $productCategoryService;

    public function __construct(UserServiceInterface $userService, OrderServiceInterface $orderService, 
    ProductCategoryServiceInterface $productCategoryService)
    {
        $this->userService = $userService;
        $this->orderService = $orderService;
        $this->productCategoryService = $productCategoryService;
    }

    public function login() {
        $categories = $this->productCategoryService->all();

        return view('front.account.login', compact('categories'));
    }

    public function checkLogin(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => [Constant::user_level_client, Constant::user_level_admin, Constant::user_level_host],
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
        $categories = $this->productCategoryService->all();
        return view('front.account.register', compact('categories'));
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
        $categories = $this->productCategoryService->all();
        $orders = $this->orderService->getOrderByUserId(Auth::id());
        return view('front.account.my-order.index', compact('orders', 'categories'));
    }

    public function myOrderShow($id) {
        $order = $this->orderService->find($id);
        $status = Constant::$order_status[$order->status];

        return view('front.account.my-order.show', compact('order', 'status'));
    }

    public function myAccount() {
        $info = User::find(Auth::id());
        $categories = $this->productCategoryService->all();
        return view('front.account.info', compact('info', 'categories'));
    }

    public function updateAccount($userId, Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];
        User::where('id',$userId)->update(array('name'));

        return $this->myAccount();
    }
}
