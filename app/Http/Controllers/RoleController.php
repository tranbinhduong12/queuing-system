<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleStore;
use App\Http\Requests\RoleUpdate;
use App\Models\action;
use App\Models\role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public $records;
    public function __construct() {
        $this->records = [
            (object)[
                'name' => 'Cài đặt hệ thống'
            ],
            (object)[
                'name' => 'Quản lý vai trò',
                'url' => route('system.role.index')
            ],
        ];
    }
    public function index()
    {
        array_pop($this->records);
        $records = DB::table('roles')
            ->leftJoin('users', 'users.role_id', '=', 'roles.id')
            ->select('roles.*', DB::raw('COUNT(users.id) AS total'))
            ->groupBy('roles.id')
            ->paginate(10);

        return view('pages/role/index',[
            'records' => $this->records,
            'data' => $records
        ]);
    }

    public function create()
    {
        $action_list = action::orderBy('group')->get();
        $action_list = $action_list->groupBy('group');
    
        return view('pages/role/create', [
            'action_list' => $action_list,
            'records' => $this->records
        ]);
    }

    // store
    public function store(RoleStore $request)
    {
        // Xử lý lưu dữ liệu
        // lưu dữ liệu vảo bảng roles
        $role = new role();
        $role->name = $request->name;
        $role->description = $request->description;
        $action_ids = '';
        foreach ($request->action as $action_id) {
            $action_ids .= $action_id . ',';
        }
        $action_ids = substr($action_ids, 0, -1);
        $role->action_ids = $action_ids;
        $role->save();
        // chuyển hướng về trang danh sách
        return redirect()->route('system.role.index');
    }

    public function edit($id)
    {
        $data = role::find($id);
        $action_ids = explode(',', $data->action_ids);

        $action_list = action::orderBy('group')->get();

        for ($i = 0; $i < count($action_list); $i++) {
            $action_list[$i]->setAttribute('checked', false);
            foreach ($action_ids as $id_ac) {
                if ($action_list[$i]->id == (int)$id_ac) {
                    $action_list[$i]->setAttribute('checked', true);
                    break;
                }
            }
        }
        $action_list = $action_list->groupBy('group');
        return view('pages/role/edit', [
            'data' => $data,
            'action_list' => $action_list,
            'id' => $id,
            'records' => $this->records
        ]);
    }

    public function update(RoleUpdate $request, $id)
    {
        // lưu dữ liệu vảo bảng roles
        $role = role::find($id);

        $role->name = $request->name;
        $role->description = $request->description;
        $action_ids = '';
        foreach ($request->action as $action_id) {
            $action_ids .= $action_id . ',';
        }
        $action_ids = substr($action_ids, 0, -1);
        $role->action_ids = $action_ids;
        $role->save();
        // chuyển hướng về trang danh sách
        return redirect()->route('system.role.edit', $id);
    }

    public function destroy($id)
    {
        // Xóa tài nguyên
    }
}
