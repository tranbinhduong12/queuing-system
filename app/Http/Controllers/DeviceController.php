<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public $records;
    public function __construct() {
        $this->records = [
            (object)[
                'name' => 'Thiết bị'
            ],
            (object)[
                'name' => 'Danh sách thiết bị',
                'url' => route('auth.device.index')
            ],
        ];
    }
    public function index()
    {
        array_pop($this->records);
        return view('pages/device/index',['records' => $this->records]);
    }

    public function create()
    {
        return view('pages/device/create', ['records' => $this->records]);
    }

    public function edit($id)
    {
        $data = (object) [
            "device_id" => "DV1234",
            "device_type" => "connected",
            "device_name" => "Máy tính xách tay",
            "device_username" => "user123",
            "device_ip" => "192.168.1.100",
            "device_password" => "p@ssw0rd",
            "service" => "Email"       
        ];
        return view('pages/device/edit', [
            'data' => $data,
            'id' => $id,
            'records' => $this->records
        ]);
    }

    public function update(Request $request, $id)
    {
        // Xử lý cập nhật tài nguyên
    }

    public function show($id)
    {
        $data = (object) [
            "device_id" => "DV1234",
            "device_type" => "connected",
            "device_name" => "Máy tính xách tay",
            "device_username" => "user123",
            "device_ip" => "192.168.1.100",
            "device_password" => "p@ssw0rd",
            "service" => "Email"       
        ];
        return view('pages/device/show', [
            'data' => $data,
            'id' => $id,
            'records' => $this->records
        ]);
    }

    public function destroy($id)
    {
        // Xóa tài nguyên
    }
}
