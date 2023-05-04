<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public $records;
    public function __construct() {
        $this->records = [
            (object)[
                'name' => 'Cài đặt hệ thống'
            ],
            (object)[
                'name' => 'Quản lý vai trò',
                'url' => route('system.role.index')
            ],
        ];
    }
    public function index()
    {
        array_pop($this->records);
        return view('pages/role/index',[
            'records' => $this->records
        ]);
    }

    public function create()
    {
        return view('pages/role/create', [
            'records' => $this->records
        ]);
    }

    public function edit($id)
    {
        $data = (object) [
            'name' => 'Admin',
            'description' => 'Quản trị viên hệ thống',
        ];
        return view('pages/role/edit', [
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
