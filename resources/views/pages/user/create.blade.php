@extends('layouts.app')

@section('webName', 'Thêm tài khoản')

@section('css')
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}">
    <style>
        .btn-toggle-password-div {
            position: absolute;
            right: 5px;
            z-index: 999;
        }

        .btn-toggle-password {
            border: none;
            background-color: transparent;
            outline: none;
            height: 36px;
        }
        .input-group {
            position: relative;
            flex-direction: column-reverse !important;
        }
        .icon{
            top: 35% !important;
            right: 28px !important;
        }
    </style>
@endsection

@section('content')
    <div class="content-profile">
        <p class="title">
            Quản lý tài khoản
        </p>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Lỗi!</strong> {{ $errors->first() }}
            </div>
        @endif
        <div class="content-container">
            <div class="content">
                <div class="content-white">
                    <form class="col-md-12 form-search" id="form-submit" method="POST" action="{{ route('system.user.store') }}">
                        <!-- Search section -->
                        @csrf
                        <div class="form-group form-group2">
                            <div class="text-header">
                                Thông tin tài khoản
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fullname">Họ tên: <span style="color: red; font-size: 18px">*</span></label>
                            <input type="text" class="form-control" id="fullname" name="full_name" required placeholder="Nhập họ tên" value="{{ old('full_name') }}">
                        </div>
                        <div class="form-group">
                            <label for="username">Tên đăng nhập: <span style="color: red; font-size: 18px">*</span></label>
                            <input type="text" class="form-control" id="username" name="username" required placeholder="Nhập tên đăng nhập" value="{{ old('username') }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại: <span style="color: red; font-size: 18px">*</span></label>
                            <input type="text" class="form-control" id="phone" name="phone" required placeholder="Nhập số điện thoại" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu: <span style="color: red; font-size: 18px">*</span></label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Mật khẩu">
                                <div class="btn-toggle-password-div">
                                    <button class="btn-toggle-password" type="button" id="togglePassword">
                                        <i class="fa-regular fa-eye icon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email: <span style="color: red; font-size: 18px">*</span></label>
                            <input type="text" class="form-control" id="email" name="email" required placeholder="Nhập email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="device_ip">Nhập lại mật khẩu: <span
                                    style="color: red; font-size: 18px">*</span></label>
                            <div class="input-group">
                                <input type="password" name="comfirm-password" class="form-control" id="comfirm-password"
                                    placeholder="Xác nhận mật khẩu">
                                <div class="btn-toggle-password-div">
                                    <button class="btn-toggle-password" type="button" id="toggleComfirmPassword">
                                        <i class="fa-regular fa-eye icon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="device_type">Vai trò: <span style="color: red; font-size: 18px">*</span></label>
                            <select class="form-control" name="role_id" id="device_type" required>
                                <option disabled selected>Chọn vai trò</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <div class="form-group">
                            <label for="device_type">Tình trạng: <span style="color: red; font-size: 18px">*</span></label>
                            <select class="form-control" name="status" id="device_type">
                                <option value="1">Hoạt Động</option>
                                <option value="0">Ngưng hoạt động</option>
                            </select>
                            <i class="fa-solid fa-caret-down"></i>
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
                    <a href="{{ route('system.user.index') }}">
                        <button class="btn btn-blur">Hủy bỏ</button>
                    </a>
                    <button class="btn btn-bold" onclick="submit()">Thêm</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        function togglePassword(field, button) {
            button.addEventListener("click", function() {
                const type = field.getAttribute("type") === "password" ? "text" : "password";
                field.setAttribute("type", type);
                button.innerHTML = type === "password" ? '<i class="fa-regular icon fa-eye"></i>' :
                    '<i class="fa-regular icon fa-eye-slash"></i>';
            });
        }

        togglePassword(document.getElementById("password"), document.getElementById("togglePassword"));
        togglePassword(document.getElementById("comfirm-password"), document.getElementById("toggleComfirmPassword"));
    </script>
@endsection