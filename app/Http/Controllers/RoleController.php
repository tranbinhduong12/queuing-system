<?php

namespace App\Http\Controllers;

use App\Models\action;
use App\Models\role;
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
        $action_list = action::orderBy('group')->get();
        $action_list = $action_list->groupBy('group');
    
        return view('pages/role/create', [
            'action_list' => $action_list,
            'records' => $this->records
        ]);
    }

    // store
    public function store(Request $request)
    {
        // Xử lý lưu tài nguyên
        dd($request->all());
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
