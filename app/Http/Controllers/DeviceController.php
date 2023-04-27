<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        return view('pages/device/index');
    }

    public function create()
    {
        return view('pages/device/create');
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
        return view('pages/device/edit', compact("data", 'id'));
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
        return view('pages/device/show', compact("data", 'id'));
    }

    public function destroy($id)
    {
        // Xóa tài nguyên
    }
}
