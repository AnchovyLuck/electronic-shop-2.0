<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
// use Illuminate\Contracts\Auth\PasswordBroker;

class PasswordResetController extends Controller
{

    private $productCategoryService;
    public function __construct(ProductCategoryServiceInterface $productCategoryService)
    { 
        $this->productCategoryService = $productCategoryService;
    }
    public function showForgotPasswordForm() {
        $categories = $this->productCategoryService->all();
        return view('front.account.forgot-password',compact('categories'));
    }

    public function submitForgotPasswordForm(Request $request) {
        $request->validate(['email' => 'required|email']);
 
        $token = Str::random(64);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }

    public function showResetPasswordForm(Request $request) {
        $categories = $this->productCategoryService->all();
        $token = $request->token;
        $email = $request->email;
        return view('front.account.reset-password',compact('categories', 'token', 'email'));
    }

    public function submitResetPasswordForm(Request $request) {
        //   dd($request->token);
        // dd($request->only('token','email', 'password', 'password_confirmation'));
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);
        // User::where('email',$request->email)->update(['password' => bcrypt($request->password)]);
        $status = Password::reset(
            $request->only('token','email', 'password', 'password_confirmation'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
        return $status === Password::PASSWORD_RESET
                    ? redirect('account/login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)], 'password' => [__($status)], 'password_confirmation' => [__($status)]]);
    }
}
