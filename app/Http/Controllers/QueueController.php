<?php

namespace App\Http\Controllers;

use App\Models\device;
use App\Models\service;
use App\Models\ticket;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    public $records;
    public function __construct() {
        $this->records = [
            (object)[
                'name' => 'Cấp số',
                'url' => route('admin.queue.index')
            ]
        ];
    }
    public function index()
    {
        array_pop($this->records);
        $data = ticket::select('tickets.*', 'services.name as service_name', 'devices.name as device_name')
            ->join('services', 'services.id', '=', 'tickets.service_id')
            ->join('devices', 'devices.id', '=', 'tickets.device_id')
            ->orderBy('tickets.stt', 'asc')
            ->paginate(10);
        return view('pages/queue/index', [
            'records' => $this->records,
            'data' => $data
        ]);
    }

    public function create()
    {
        $services = service::all();
        $devices = device::all();
        $device_id = $devices->random()->id;
        // check if session has success
        $ticket = null;
        if(session()->has('success')){
            $id = session()->get('success');
            $ticket = ticket::select('tickets.*', 'services.name as service_name', 'devices.name as device_name')
                ->where('tickets.id', $id)
                ->join('services', 'services.id', '=', 'tickets.service_id')
                ->join('devices', 'devices.id', '=', 'tickets.device_id')
                ->first();
        }

        return view('pages/queue/create', [
            'records' => $this->records,
            'services' => $services,
            'device_id' => $device_id,
            'data' => $ticket
        ]);
    }

    public function store(Request $request){
        // config message
        $messages = [
            'name_user.required' => 'Vui lòng nhập tên người dùng',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.regex' => 'Số điện thoại không hợp lệ',
            'phone.min' => 'Số điện thoại không hợp lệ',
        ];
        // validate
        $request->validate([
            'name_user' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ], $messages);

        $newTicket = new ticket();
        
        $newTicket->service_id = $request->service_id;
        $newTicket->device_id = $request->device_id;
        $newTicket->name_user = $request->name_user;
        $newTicket->phone = $request->phone;
        $newTicket->email = $request->email;
        $newTicket->stt = ticket::where('device_id', $request->device_id)->max('stt') + 1;
        $newTicket->expires_at = date('Y-m-d 18:00:00');
        $newTicket->save();
        return redirect()->route('admin.queue.create')->with('success', $newTicket->id);
    }

    public function show($id)
    {
        array_push($this->records, (object)[
            'name' => 'Danh sách cấp số',
            'url' => route('admin.queue.index')
        ]);
        $data = ticket::select('tickets.*', 'services.name as service_name', 'devices.name as device_name')
                ->where('tickets.id', $id)
                ->join('services', 'services.id', '=', 'tickets.service_id')
                ->join('devices', 'devices.id', '=', 'tickets.device_id')
                ->first();
        return view('pages/queue/show', [
            'records' => $this->records,
            'id' => $id,
            'data' => $data
        ]);
    }

    public function destroy($id)
    {
        // Xóa tài nguyên
    }
}
