@extends('layouts.app')

@section('webName', 'Chi tiết')

@section('css')
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}">
@endsection

@section('content')
    <div class="content-profile">
        <p class="title">
            Quản lý cấp số
        </p>
        <div class="content-container">
            <div class="content">
                <div class="content-white">
                    <!-- Content -->
                    <a href="{{ route('admin.queue.index') }}">
                        <button class="btn-add">
                            <i class="fa-solid fa-rotate-left"></i>
                            <p>
                                Quay lại
                            </p>
                        </button>
                    </a>
                    <div class="col-md-12 form-search">
                        <!-- Search section -->
                        <div class="form-group form-group2">
                            <div class="text-header">
                                Thông tin cấp số
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group2">
                                <label for="">
                                    <span style="width: 122px; display: inline-block">
                                        Họ Tên: 
                                    </span>
                                    <br>
                                    <span class="span-data" style="margin-top: 5px">
                                        {{ $data->name_user }}
                                    </span>
                                </label>
                            </div>
                            <div class="form-group form-group2">
                                <label for="">
                                    <span style="width: 122px; display: inline-block">
                                        Tên dịch vụ:
                                    </span>
                                    <br>
                                    <span class="span-data" style="margin-top: 5px">
                                        {{ $data->service_name }}
                                    </span>
                                </label>
                            </div>
                            <div class="form-group form-group2">
                                <label for="">
                                    <span style="width: 122px; display: inline-block">
                                        Sô thứ tự:
                                    </span>
                                    <br>
                                    <span class="span-data" style="margin-top: 5px">
                                        {{ $data->stt }}
                                    </span>
                                </label>
                            </div>
                            <div class="form-group form-group2">
                                <label for="">
                                    <span style="width: 122px; display: inline-block">
                                        Thời gian cấp:
                                    </span>
                                    <br>
                                    <span class="span-data" style="margin-top: 5px">
                                        {{ $data->created_at->format('H:i:m') }} - {{ $data->created_at->format('d/m/Y') }}
                                    </span>
                                </label>
                            </div>
                            <div class="form-group form-group2">
                                <label for="">
                                    <span style="width: 122px; display: inline-block">
                                        Hạn sử dụng: 
                                    </span>
                                    <br>
                                    <span class="span-data" style="margin-top: 5px">
                                        {{ (new DateTime('@' . strtotime($data->expires_at)))->format('H:i:s') }} - {{ (new DateTime('@' . strtotime($data->expires_at)))->format('d/m/Y') }}
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group2">
                                <label for="">
                                    <span style="width: 122px; display: inline-block">
                                        Nguồn cấp: 
                                    </span>
                                    <br>
                                    <span class="span-data" style="margin-top: 5px">
                                        {{ $data->device_name }}
                                    </span>
                                </label>
                            </div>
                            <div class="form-group form-group2">
                                <label for="">
                                    <span style="width: 122px; display: inline-block">
                                        Trạng thái:
                                    </span>
                                    <br>
                                    <span class="span-data" style="margin-top: 5px">
                                        <icon class="fa-solid fa-circle connected" style="color: {{ $data->status_color() }}"></icon>
                                        {{ $data->status() }}
                                    </span>
                                </label>
                            </div>
                            <div class="form-group form-group2">
                                <label for="">
                                    <span style="width: 122px; display: inline-block">
                                        Số điện thoại:
                                    </span>
                                    <br>
                                    <span class="span-data" style="margin-top: 5px">
                                        {{ $data->phone }}
                                    </span>
                                </label>
                            </div>
                            <div class="form-group form-group2">
                                <label for="">
                                    <span style="width: 122px; display: inline-block">
                                        Địa chỉ Email:
                                    </span>
                                    <br>
                                    <span class="span-data" style="margin-top: 5px">
                                        {{ $data->email }}
                                    </span>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
