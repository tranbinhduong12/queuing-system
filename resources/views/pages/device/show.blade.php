@extends('layouts.app')

@section('webName', 'Cập nhật thiết bị')

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
                    <!-- Content -->
                    <a href="{{ route('admin.device.edit', $data->id_device) }}">
                        <button class="btn-add">
                            <i class="fa-solid fa-pen"></i>
                            <p>
                                Cập nhập thiết bị
                            </p>
                        </button>
                    </a>
                    <div class="col-md-12 form-search">
                        <!-- Search section -->
                        <div class="form-group form-group2">
                            <div class="text-header">
                                Thông tin thiết bị
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">
                                <span style="width: 122px; display: inline-block">
                                    Mã Thiết bị:
                                </span>
                                <span class="span-data">
                                    {{ $data->id_device }}
                                </span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="">
                                <span style="width: 122px; display: inline-block">
                                    Loại thiết bị:
                                </span>
                                <span class="span-data">
                                    {{ $data->type }}
                                </span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="">
                                <span style="width: 122px; display: inline-block">
                                    Tên thiết bị:
                                </span>
                                <span class="span-data">
                                    {{ $data->name }}
                                </span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="">
                                <span style="width: 122px; display: inline-block">
                                    Tên đăng nhập:
                                </span>
                                <span class="span-data">
                                    {{ $data->username }}
                                </span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="">
                                <span style="width: 122px; display: inline-block">
                                    Địa chỉ ip:
                                </span>
                                <span class="span-data">
                                    {{ $data->ip }}
                                </span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="">
                                <span style="width: 122px; display: inline-block">
                                    Mật khẩu:
                                </span>
                                <span class="span-data">
                                    {{ $data->password }}
                                </span>
                            </label>
                        </div>
                        <div class="form-group form-group2">
                            <label for="">
                                <span style="width: 122px; display: inline-block">
                                    Dịch vụ sử dụng:
                                </span>
                                <br>
                                <span class="span-data" style="margin-top: 5px">
                                    {{ $data->services()[0] }}
                                </span>
                            </label>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
