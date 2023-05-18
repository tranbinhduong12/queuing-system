@extends('layouts.app')

@section('webName', 'Thêm thiết bị')

@section('css')
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.6/select2-bootstrap.css">
    <style>

        pre {
            margin-top: 20px;
        }
        .select2-selection__choice{
            padding: 2px 5px !important;
            margin: 0 5px !important;
            margin-right: 0px !important;
        }
        .select2-selection--multiple{
            padding: 6px 0 !important;
            padding-bottom: 0 !important;
        }
    </style>
@endsection

@section('content')
    <div class="content-profile">
        <p class="title">
            Quản lý thiết bị
        </p>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Lỗi!</strong> {{ $errors->first() }}
            </div>
        @endif
        <div class="content-container">
            <div class="content">
                <div class="content-white">
                    <form class="col-md-12 form-search" id="form-submit" method="POST" action="{{ route('admin.device.store') }}">
                        <!-- Search section -->
                        @csrf
                        <div class="form-group form-group2">
                            <div class="text-header">
                                Thông tin thiết bị
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="device_id">Mã Thiết bị: <span style="color: red; font-size: 18px">*</span></label>
                            <input type="text" class="form-control" id="device_id" name="id_device"
                                placeholder="Nhập mã Thiết bị" value="{{ old('id_device') }}">
                        </div>
                        <div class="form-group">
                            <label for="device_type">Loại thiết bị:</label>
                            <select class="form-control" name="type" id="device_type">
                                <option value="Kiosk">Kiosk</option>
                                <option value="Display counter">Display counter</option>
                            </select>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <div class="form-group">
                            <label for="device_name">Tên thiết bị:</label>
                            <input type="text" class="form-control" id="device_name" name="name"
                                placeholder="Nhập tên thiết bị" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="device_username">Tên đăng nhập:</label>
                            <input type="text" class="form-control" id="device_username" name="username"
                                placeholder="Nhập tài khoản" value="{{ old('username') }}">
                        </div>
                        <div class="form-group">
                            <label for="device_ip">Địa chỉ ip:</label>
                            <input type="text" class="form-control" id="device_ip" name="ip"
                                placeholder="Nhập địa chỉ IP" value="{{ $clientIP }}">
                        </div>
                        <div class="form-group">
                            <label for="device_password">Mật khẩu:</label>
                            <input type="text" class="form-control" id="device_password" name="password"
                                placeholder="Nhập mật khẩu" value="{{ old('password') }}">
                        </div>
                        <div class="form-group form-group2">
                            <label for="service">Dịch vụ sử dụng:</label>
                            {{-- <input type="text" class="form-control" id="service" name="service"
                                placeholder="Nhập dịch vụ sử dụng"> --}}
                                <div id="app">
                                    <multiple-select inline-template>
                                            <select-2 :options="options" name="service_ids[]" v-model="selected" multiple=true></select-2>
                                    </multiple-select>
                                </div>
                        </div>
                        <div class="form-group">
                            <p class="text-alert-require">
                                <span style="color: red; margin-right: 5px; font-size: 18px">*</span> là trường thông tin
                                bắt buộc
                            </p>
                        </div>
                        <button type="submit" style="display: none" id="btn-submit"></button>

                    </form>
                </div>
                <div class="form-btn">
                    <a href="{{ route('admin.device.index') }}">
                        <button class="btn btn-blur">Hủy</button>
                    </a>
                    <button class="btn btn-bold" onclick="submit()">Thêm thiết bị</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.1/vue.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="{{ asset('js/setupVue.js') }}"></script>
    <script>
    
        const options = {
            @foreach ($services as $service)
                {{ $service->id }}: '{{ $service->name }}',
            @endforeach
        }

        const multiSelect = Vue.component('multiple-select', {
            data() {
                return {
                    options: options,
                    selected: []
                }
            }
        })

        const app = new Vue({
            el: '#app',
        })
    </script>
@endsection
