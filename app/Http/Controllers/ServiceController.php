<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceStore;
use App\Http\Requests\ServiceUpdate;
use App\Models\service;
use App\Models\ticket;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public $records;
    public function __construct() {
        $this->records = [
            (object)[
                'name' => 'Dịch vụ'
            ],
            (object)[
                'name' => 'Danh sách dịch vụ',
                'url' => route('admin.service.index')
            ],
        ];
    }
    public function index()
    {
        array_pop($this->records);
        $records = service::paginate(10);
        return view('pages/service/index', [
            'data' => $records,
            'records' => $this->records
        ]);
    }

    public function create()
    {
        $min = 1;
        $max = 9999;
        return view('pages/service/create', [
            'records' => $this->records,
            'max' => $max,
            'min' => $min
        ]);
    }

    public function store(ServiceStore $request)
    {
        $prefix = 1;
        $suffix = 9999;
        if ($request->has('pick-prefix') && $request->has('prefix')) {
            $prefix = $request->input('prefix');
        }
        if ($request->has('pick-suffix') && $request->has('suffix')) {
            $suffix = $request->input('suffix');
        }
        // Xử lý lưu tài nguyên
        $newService = new service();
        $newService->id = $request->input('id');
        $newService->name = $request->input('name');
        $newService->description = $request->input('description');
        $newService->prefix = $prefix;
        $newService->suffix = $suffix;
        $newService->reset = $request->input('reset') == 'on' ? 1 : 0;
        $newService->save();
        $this->historyUser("Thêm mới dịch vụ $request->id");
        return redirect()->route('admin.service.index');
    }

    public function edit($id)
    {
        array_push($this->records, (object)[
            'name' => 'Chi tiết',
            'url' => route('admin.service.show', $id)
        ]);
        $min = 1;
        $max = 9999;
        $data = service::find($id);
        return view('pages/service/edit', [
            'data' => $data,
            'id' => $id,
            'min' => $min,
            'max' => $max,
            'records' => $this->records
        ]);
    }

    public function update(ServiceUpdate $request, $id)
    {
        $prefix = 1;
        $suffix = 9999;
        if ($request->has('pick-prefix') && $request->has('prefix')) {
            $prefix = $request->input('prefix');
        }
        if ($request->has('pick-suffix') && $request->has('suffix')) {
            $suffix = $request->input('suffix');
        }
        // Xử lý lưu tài nguyên
        $newService = service::find($id);
        if ($id != $request->input('id')) {
            $check = service::find($request->input('id'));
            if ($check) {
                return redirect()->back()->withErrors(['id' => 'ID đã tồn tại']);
            }
        }
        $newService->id = $request->input('id');
        $newService->name = $request->input('name');
        $newService->description = $request->input('description');
        $newService->prefix = $prefix;
        $newService->suffix = $suffix;
        $newService->reset = $request->input('reset') == 'on' ? 1 : 0;
        $newService->save();
        $this->historyUser("Cập nhật thông tin dịch vụ $request->id");
        return redirect()->route('admin.service.show', $newService->id);
    }

    public function show($id)
    {
        $data = service::find($id);
        $data2 = ticket::where('service_id', $data->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        return view('pages/service/show', [
            'data' => $data,
            'data2' => $data2,
            'id' => $id,
            'records' => $this->records,
        ]);
    }

    public function destroy($id)
    {
        // Xóa tài nguyên
    }
}
