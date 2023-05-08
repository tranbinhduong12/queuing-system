<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public $records;
    public function __construct() {
        $this->records = [
            (object)[
                'name' => 'Cài đặt hệ thống'
            ]
        ];
    }
    public function index()
    {
        return view('pages/user/index',[
            'records' => $this->records
        ]);
    }

    public function create()
    {
        array_push($this->records, (object)[
            'name' => 'Quản Lý Tài Khoản',
            'url' => route('system.user.index')
        ]);
        return view('pages/user/create', [
            'records' => $this->records
        ]);
    }

    public function edit($id)
    {
        array_push($this->records, (object)[
            'name' => 'Quản Lý Tài Khoản',
            'url' => route('system.user.index')
        ]);
        $data = (object) [
            'fullname' => 'Trần Bình Dương',
            'email' => 'admin@gmail.com',    
            'phone' => '0123456789',    
            'username' => 'tranbinhduong0909',    
            'password' => '123123',    
            'role' => 'Developer',
        ];
        return view('pages/user/edit', [
            'data' => $data,
            'id' => $id,
            'records' => $this->records
        ]);
    }

    public function update(Request $request, $id)
    {
        // Xử lý cập nhật tài nguyên
    }

    public function destroy($id)
    {
        // Xóa tài nguyên
    }
}
