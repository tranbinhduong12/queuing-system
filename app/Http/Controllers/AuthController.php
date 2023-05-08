<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function logging()
    {
        return redirect()->route('auth.my-profile');
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
        $data = (object) [
            'name' => 'Trần Bình Dương',
            'email' => 'admin@gmail.com',
            'phone' => '0123456789',
            'username' => 'tranbinhduong0909',
            'password' => '123123',
            'role' => 'Developer',
        ];

        return view('auth/my-profile', compact("data"));
    }
}
