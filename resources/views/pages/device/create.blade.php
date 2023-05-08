@extends('layouts.app')

@section('webName', 'Thêm thiết bị')

@section('css')
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}">
@endsection

@section('content')
    <div class="content-profile">
        <p class="title">
            Quản lý thiết bị
        </p>
        <div class="content-container">
            <div class="content">
                <div class="content-white">
                    <form class="col-md-12 form-search" id="form-submit">
                        <!-- Search section -->
                        <div class="form-group form-group2">
                            <div class="text-header">
                                Thông tin thiết bị
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="device_id">Mã Thiết bị: <span style="color: red; font-size: 18px">*</span></label>
                            <input type="text" class="form-control" id="device_id" name="device_id" placeholder="Nhập mã Thiết bị">
                        </div>
                        <div class="form-group">
                            <label for="device_type">Loại thiết bị:</label>
                            <select class="form-control" name="device_type" id="device_type">
                                <option value="all">Tất cả</option>
                                <option value="connected">Kết nối</option>
                                <option value="disconnected">Mất kết nối</option>
                            </select>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <div class="form-group">
                            <label for="device_name">Tên thiết bị:</label>
                            <input type="text" class="form-control" id="device_name" name="device_name" placeholder="Nhập tên thiết bị">
                        </div>
                        <div class="form-group">
                            <label for="device_username">Tên đăng nhập:</label>
                            <input type="text" class="form-control" id="device_username" name="device_username" placeholder="Nhập tài khoản">
                        </div>
                        <div class="form-group">
                            <label for="device_ip">Địa chỉ ip:</label>
                            <input type="text" class="form-control" id="device_ip" name="device_ip" placeholder="Nhập địa chỉ IP">
                        </div>
                        <div class="form-group">
                            <label for="device_password">Mật khẩu:</label>
                            <input type="text" class="form-control" id="device_password" name="device_password" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="form-group form-group2">
                            <label for="service">Dịch vụ sử dụng:</label>
                            <input type="text" class="form-control" id="service" name="service" placeholder="Nhập dịch vụ sử dụng">
                        </div>
                        <div class="form-group">
                            <p class="text-alert-require">
                                <span style="color: red; margin-right: 5px; font-size: 18px">*</span> là trường thông tin bắt buộc
                            </p>
                        </div>
                        <button type="submit" style="display: none" id="btn-submit"></button>

                    </form>                    
                </div>
                <div class="form-btn">
                    <a href="{{ route('auth.device.index') }}">
                        <button class="btn btn-blur">Hủy</button>
                    </a>
                    <button class="btn btn-bold" onclick="submit()">Thêm thiết bị</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
