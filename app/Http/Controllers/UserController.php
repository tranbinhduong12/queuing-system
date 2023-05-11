<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStore;
use App\Http\Requests\UserUpdate;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $records;
    public function __construct() {
        $this->records = [
            (object)[
                'name' => 'Cài đặt hệ thống'
            ]
        ];
    }
    public function index()
    {
        // get all user from database and join with role get role name
        $users = User::join('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.*', 'roles.name as role_name')
            ->paginate(10);
        $roles = role::all();
        return view('pages/user/index',[
            'records' => $this->records,
            'data' => $users,
            'roles' => $roles
        ]);
    }

    public function create()
    {
        array_push($this->records, (object)[
            'name' => 'Quản Lý Tài Khoản',
            'url' => route('system.user.index')
        ]);
        // role list
        $roles = role::all();
        return view('pages/user/create', [
            'roles' => $roles,
            'records' => $this->records
        ]);
    }
    // store    
    public function store(UserStore $request)
    {
        // Tạo tk mới từ dữ liệu trong $request và lưu users
        $user = new User();
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->role_id = $request->role_id;
        $user->status = $request->status;
        $user->save();
        $this->historyUser("Thêm mới tài khoản $request->username");
        return redirect()->route('system.user.index');
    }
    public function edit($id)
    {
        array_push($this->records, (object)[
            'name' => 'Quản Lý Tài Khoản',
            'url' => route('system.user.index')
        ]);
        $data = User::find($id);
        $roles = role::all();
        return view('pages/user/edit', [
            'data' => $data,
            'id' => $id,
            'roles' => $roles,
            'records' => $this->records
        ]);
    }

    public function update(UserUpdate $request, $id)
    {
        // message
        $user = User::find($id);
        if ($user->email != $request->email){
            $request->validate([
                'email' => 'unique:users,email'
            ]);
        }
        if ($user->username != $request->username){
            $request->validate([
                'username' => 'unique:users,username'
            ]);
        }
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->role_id = $request->role_id;
        $user->status = $request->status;
        $user->save();
        $this->historyUser("Cập nhật thông tin tài khoản $request->username");
        return redirect()->route('system.user.edit', $id);
    }

    public function destroy($id)
    {
        // Xóa tài nguyên
    }
}
