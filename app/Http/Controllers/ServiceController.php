<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public $records;
    public function __construct() {
        $this->records = [
            (object)[
                'name' => 'dịch vụ'
            ],
            (object)[
                'name' => 'Danh sách dịch vụ',
                'url' => route('auth.service.index')
            ],
        ];
    }
    public function index()
    {
        // remove last element $this->records
        array_pop($this->records);
        return view('pages/service/index', [
            'records' => $this->records
        ]);
    }

    public function create()
    {
        return view('pages/service/create');
    }

    public function edit($id)
    {
        array_push($this->records, (object)[
            'name' => 'Chi tiết',
            'url' => route('auth.service.show', $id)
        ]);
        $data = (object) [
            "service_id" => "DV1234",
            "service_name" => "Máy tính xách tay",
            "service_description" => "Mô tả dịch vụ",
        ];
        return view('pages/service/edit', [
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
            "service_id" => "DV1234",
            "service_name" => "Máy tính xách tay",
            "service_description" => "Chuyển các bệnh về tim ",
            "service_username" => "user123",
            "service_ip" => "192.168.1.100",
            "service_password" => "p@ssw0rd",
            "service" => "Email"       
        ];
        return view('pages/service/show', [
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
