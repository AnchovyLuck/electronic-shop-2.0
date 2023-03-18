<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\User\UserServiceInterface;
use App\Utilities\Common;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->get('password') != $request->get('password_confirmation')) {
            return back()->with('notification', 'Lỗi: Mật khẩu xác nhận không khớp!');
        }
        $data = $request->all();
        $data['password'] = bcrypt($request->get('password'));

        
        if ($request->hasFile('image')) {
            $data['avatar'] = Common::uploadFile($request->file('image'), 'front/img/user');
        }
        $user = $this->userService->create($data);

        return redirect('admin/user/' . $user->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();
        if ($request->get('password') != null) {
            if ($request->get('password') != $request->get('password_confirmation')) {
                return back()->with('notification', 'Lỗi: Mật khẩu xác nhận không khớp!');
            }
            $data['password'] = bcrypt($request->get('password'));
        } else {
            unset($data['password']);
        }
        // dd($request);
        if ($request->hasFile('image')) {
            $data['avatar'] = Common::uploadFile($request->file('image'), 'front/img/user');

            $file_name_old = $request->get('image_old');
            if ($file_name_old != '') {
                unlink('front/img/user/' . $file_name_old);
            }
        }
        
        $this->userService->update($data, $user->id);

        return redirect('admin/user/' . $user->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->userService->delete($user->id);

        $file_name = $user->avatar;
        if ($file_name != '' && file_exists('front/img/user/' . $file_name)) {
            unlink('front/img/user/' . $file_name);
        }

        return redirect('admin/user');
    }
}
