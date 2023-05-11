<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeviceStore;
use App\Http\Requests\DeviceUpdate;
use App\Models\device;
use App\Models\service;
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
                'url' => route('admin.device.index')
            ],
        ];
    }
    public function index()
    {
        array_pop($this->records);
        $data = device::paginate(10);
        return view('pages/device/index',[
            'records' => $this->records,
            'data' => $data,
        ]);
    }

    public function create()
    {
        // get all service
        $services = service::all();
        // get my ip
        $clientIP = request()->ip();

        return view('pages/device/create', [
            'services' => $services,
            'records' => $this->records,
            'clientIP' => $clientIP,
        ]);
    }

    public function store(DeviceStore $request)
    {
        $newDevice = new device();
        $newDevice->id = $request->id;
        $newDevice->name = $request->name;
        $newDevice->username = $request->username;
        $newDevice->password = $request->password;
        $newDevice->ip = $request->ip;
        $newDevice->type = $request->type;
        $service_ids = '';
        foreach ($request->service_ids as $service_id) {
            $service_ids .= $service_id . ',';
        }
        $newDevice->service_ids = $service_ids;
        $newDevice->save();
        $this->historyUser("Thêm mới thiết bị $request->id");
        return redirect()->route('admin.device.show', $request->id);
    }

    public function edit($id)
    {
        $data = device::find($id);
        $services = service::all();
        return view('pages/device/edit', [
            'data' => $data,
            'services' => $services,
            'id' => $id,
            'records' => $this->records
        ]);
    }

    public function update(DeviceUpdate $request, $id)
    {
        $newDevice = device::find($id);
        if ($id != $request->id) {
            // check id is unique
            $check = device::find($request->id);
            if ($check) {
                return redirect()->back()->withErrors(['id' => 'ID đã tồn tại']);
            }
        }
        $newDevice->id = $request->id;
        $newDevice->name = $request->name;
        $newDevice->username = $request->username;
        $newDevice->password = $request->password;
        $newDevice->ip = $request->ip;
        $newDevice->type = $request->type;
        $service_ids = '';
        foreach ($request->service_ids as $service_id) {
            $service_ids .= $service_id . ',';
        }
        $newDevice->service_ids = $service_ids;
        $newDevice->save();
        $this->historyUser("Cập nhật thông tin thiết bị $request->id");
        return redirect()->route('admin.device.show', $request->id);
    }

    public function show($id)
    {
        $data = device::find($id);
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
