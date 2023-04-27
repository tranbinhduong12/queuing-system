<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('pages/service/index');
    }

    public function create()
    {
        return view('pages/service/create');
    }

    public function edit($id)
    {
        $data = (object) [
            "service_id" => "DV1234",
            "service_name" => "Máy tính xách tay",
            "service_description" => "Mô tả dịch vụ",
        ];
        return view('pages/service/edit', compact("data", 'id'));
    }

    public function update(Request $request, $id)
    {
        // Xử lý cập nhật tài nguyên
    }

    public function show($id)
    {
        $data = (object) [
            "service_id" => "DV1234",
            "service_type" => "connected",
            "service_name" => "Máy tính xách tay",
            "service_username" => "user123",
            "service_ip" => "192.168.1.100",
            "service_password" => "p@ssw0rd",
            "service" => "Email"       
        ];
        return view('pages/service/show', compact("data", 'id'));
    }

    public function destroy($id)
    {
        // Xóa tài nguyên
    }
}
