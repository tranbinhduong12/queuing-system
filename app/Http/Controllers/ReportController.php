<?php

namespace App\Http\Controllers;

use App\Models\history_user;
use App\Models\ticket;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report() {
        $data = ticket::select('tickets.*', 'services.name as service_name', 'devices.name as device_name')
                ->join('services', 'services.id', '=', 'tickets.service_id')
                ->join('devices', 'devices.id', '=', 'tickets.device_id')
                ->orderBy('tickets.stt', 'asc')
                ->paginate(10);
        $records = [
            (object)[
                'name' => 'Báo cáo'
            ]
        ];
        return view('pages/report/index',[
            'records' => $records,
            'data' => $data
        ]);
    }

    public function history_user() {
        $records = [
            (object)[
                'name' => 'Cài đặt hệ thống'
            ]
        ];
        $data = history_user::select('history_users.*', 'users.username')
                ->join('users', 'users.id', '=', 'history_users.user_id')
                ->orderBy('history_users.id', 'desc')
                ->paginate(10);
        return view('pages/report/history_user', [
            'records' => $records,
            'data' => $data
        ]);
    }
}
