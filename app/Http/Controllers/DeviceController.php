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
        $newDevice->id_device = $request->id_device;
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
        $this->historyUser("Thêm mới thiết bị $request->id_device");
        return redirect()->route('admin.device.show', $request->id_device);
    }

    public function edit($id)
    {
        $data = device::select('*')->where('id_device', $id)->first();
        $services = service::all();
        return view('pages/device/edit', [
            'data' => $data,
            'services' => $services,
            'id_device' => $id,
            'records' => $this->records
        ]);
    }

    public function update(DeviceUpdate $request, $id)
    {
        $newDevice = device::select('*')->where('id_device', $id)->first();
        if ($id != $request->id_device) {
            // check id is unique
            $check = device::select('*')->where('id_device', $request->id_device)->first();
            if ($check) {
                return redirect()->back()->withErrors(['id' => 'ID đã tồn tại']);
            }
        }
        $newDevice->id_device = $request->id_device;
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
        $this->historyUser("Cập nhật thông tin thiết bị $request->id_device");
        return redirect()->route('admin.device.show', $request->id_device);
    }

    public function show($id)
    {
        $data = device::select('*')->where('id_device', $id)->first();
        return view('pages/device/show', [
            'data' => $data,
            'id_device' => $id,
            'records' => $this->records
        ]);
    }

    public function destroy($id)
    {
        // Xóa tài nguyên
    }
}
