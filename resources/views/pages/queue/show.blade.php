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
                    <a href="{{ route('auth.queue.index') }}">
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
                                        Phạm Thị Yên
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
                                        Khám trái tim
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
                                        2001293
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
                                        12:00:00 12/12/2021
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
                                        12:00:00 12/12/2021
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
                                        Kiosk
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
                                        <icon class="fa-solid fa-circle text-green"></icon>
                                        Đang chờ
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
                                        078231233
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
                                        yen@gmail.com
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
