<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QueueController extends Controller
{
    public $records;
    public function __construct() {
        $this->records = [
            (object)[
                'name' => 'Cấp số'
            ]
        ];
    }
    public function index()
    {
        return view('pages/queue/index', [
            'records' => $this->records
        ]);
    }

    public function create()
    {
        array_push($this->records, (object)[
            'name' => 'Danh sách cấp số',
            'url' => route('auth.queue.index')
        ]);
        $queue_service = [
            (object) [
                "service_id" => "DV1234",
                "service_name" => "Khám tim mạch",
            ],
            (object) [
                "service_id" => "DV1234",
                "service_name" => "Khám phổi",
            ],
            (object) [
                "service_id" => "DV1234",
                "service_name" => "Khám tai mũi họng",
            ],
            (object) [
                "service_id" => "DV1234",
                "service_name" => "Khám mắt",
            ],
        ];
        return view('pages/queue/create', [
            'records' => $this->records,
            'queue_service' => $queue_service
        ]);
    }

    public function edit($id)
    {
        array_push($this->records, (object)[
            'name' => 'Danh sách cấp số',
            'url' => route('auth.queue.index')
        ]);
        $data = (object) [
            "queue_id" => "DV1234",
            "queue_name" => "Máy tính xách tay",
            "queue_description" => "Mô tả dịch vụ",
        ];
        return view('pages/queue/edit', [
            'records' => $this->records,
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        // Xử lý cập nhật tài nguyên
    }

    public function show($id)
    {
        array_push($this->records, (object)[
            'name' => 'Danh sách cấp số',
            'url' => route('auth.queue.index')
        ]);
        return view('pages/queue/show', [
            'records' => $this->records,
            'id' => $id
        ]);
    }

    public function destroy($id)
    {
        // Xóa tài nguyên
    }
}
