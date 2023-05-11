<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function logging(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        // check username and password from database users
        $user = User::where('username', $username)->where('password', $password)->first();
        if ($user) {
            $user->role = $user->role()->first();
            auth()->login($user);
            $this->historyUser('Đăng nhập vào hệ thống');
            return redirect()->route('admin.my-profile');
        }else{
            return redirect()->route('admin.login')->with('error', 'Username or password is incorrect');
        }
    }

    public function forgotPassword()
    {
        return view('auth/forgot-password');
    }

    public function newPassword()
    {
        return view('auth/new-password');
    }

    public function myProfile()
    {
        $data = auth()->user();

        return view('auth/my-profile', compact("data"));
    }

    public function logout()
    {
        $this->historyUser('Đăng xuất khỏi hệ thống');
        auth()->logout();
        return redirect()->route('admin.login');
    }
}
