@extends('layouts.app')

@section('webName', 'Thông tin cá nhân')

@section('css')
<link rel="stylesheet" href="{{ asset('styles/auth/myprofile.css') }}">
@endsection

@section('content')
    <div class="content-profile">
        <div class="preview-avatar">
            <div class="show-avatar">
                <img src="{{ asset('images/avatar.jpg') }}" alt="avatar">
                <label for="" class="icon-change-avatar">
                    <i class="fa-solid fa-camera"></i>
                </label>
            </div>
            <div class="show-name">
                <p>
                    Trần Bình Dương
                </p>
            </div>
        </div>
        <form class="form-profile">
            <div class="form-group">
                <label for="name" class="form-label">Tên người dùng</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="username" class="form-label">Tên đăng nhập</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $data->username }}" readonly>
            </div>
            <div class="form-group">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $data->phone }}" readonly>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ $data->password }}" readonly>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}" readonly>
            </div>
            <div class="form-group">
                <label for="role" class="form-label">Chức vụ</label>
                <input type="text" class="form-control" id="role" name="role" value="{{ $data->role }}" readonly>
            </div>
            
        </form>
    </div>
@endsection