@extends('layouts.app')

@section('webName', 'Cập nhập dịch vụ')

@section('css')
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}">
    <style>
        .form-check-input {
            transform: translateY(9px)
        }
    </style>
@endsection

@section('content')
    <div class="content-profile">
        <p class="title">
            Quản lý dịch vụ
        </p>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Lỗi!</strong> {{ $errors->first() }}
            </div>
        @endif
        <div class="content-container">
            <div class="content">
                <div class="content-white">
                    <form class="col-md-12 form-search" id="form-submit" method="POST" action="{{ route('admin.service.update', $id_service) }}">
                        <!-- Search section -->
                        @csrf
                        @method('PUT')
                        <div class="form-group form-group2">
                            <div class="text-header">
                                Thông tin dịch vụ
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" style="max-width: calc(100% - 24px)">
                                <label for="service_id">Mã dịch vụ: <span
                                        style="color: red; font-size: 18px">*</span></label>
                                <input type="text" class="form-control" id="service_id" name="id_service"
                                    placeholder="Nhập mã dịch vụ" value="{{ $data->id_service }}">
                            </div>
                            <div class="form-group" style="max-width: calc(100% - 24px)">
                                <label for="service_name">Tên dịch vụ: <span
                                        style="color: red; font-size: 18px">*</span></label>
                                <input type="text" class="form-control" id="service_name" name="name"
                                    placeholder="Nhập tên dịch vụ" value="{{ $data->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" style="max-width: calc(100% - 24px)">
                                <label for="service_description">Mô tả:</label>
                                <br>
                                <textarea class="form-control" name="description" id="service_description" rows="5"> {{ $data->description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group form-group2">
                            <div class="text-header">
                                Quy tắc cấp số
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input class="form-check-input" type="checkbox" id="auto-range" name="auto-range">
                                <label for="auto-range" style="width: 130px">Tăng tự động từ:</label>
                                <input class="form-control mini-input" type="text" placeholder="0000"
                                    value="{{ $min }}" readonly>
                                <label for="" style="width: 50px">Đến:</label>
                                <input class="form-control mini-input" type="text" placeholder="9999"
                                    value="{{ $max }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input class="form-check-input" type="checkbox" id="Prefix" name="pick-prefix" checked>
                                <label for="Prefix" style="width: 130px">Prefix:</label>
                                <input class="form-control mini-input" type="text" placeholder="0001"
                                    value="{{ $data->prefix }}" name="prefix">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input class="form-check-input" type="checkbox" id="Surfix" name="pick-suffix" checked>
                                <label for="Surfix" style="width: 130px">Surfix:</label>
                                <input class="form-control mini-input" type="text" placeholder="0001"
                                    value="{{ $data->suffix }}" name="suffix">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input class="form-check-input" type="checkbox" id="auto_reset" style="transform: none"
                                    name="reset" @if ($data->reset == 1) checked @endif>
                                <label for="auto_reset" style="width: 130px">Reset mỗi ngày</label>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <p class="text-alert-require">
                                    <span style="color: red; margin-right: 5px; font-size: 18px">*</span> là trường thông
                                    tin bắt buộc
                                </p>
                            </div>
                        </div>
                        <button type="submit" style="display: none" id="btn-submit"></button>

                    </form>
                </div>
                <div class="form-btn">
                    <a href="{{ route('admin.service.index') }}">
                        <button class="btn btn-blur">Hủy bỏ</button>
                    </a>
                    <button class="btn btn-bold" onclick="submit()">Cập nhập</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
