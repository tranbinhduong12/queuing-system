@extends('layouts.app')

@section('webName', 'Thêm vai trò')

@section('css')
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/role.css') }}">
@endsection

@section('content')
    <div class="content-profile">
        <p class="title">
            Quản lý vai trò
        </p>
        <div class="content-container">
            <div class="content">
                <div class="content-white">
                    <form class="col-md-12 form-search" id="form-submit">
                        <!-- Search section -->
                        <div class="form-group form-group2">
                            <div class="text-header">
                                Thông tin vai trò
                            </div>
                        </div>
                        <div class="col-md-6" style="padding-right: 12px">
                            <div class="form-group">
                                <label for="rolename">Tên vai trò: <span style="color: red; font-size: 18px">*</span></label>
                                <input type="text" class="form-control" id="rolename" name="fullname" required placeholder="Nhập họ tên">
                            </div>
                            <div class="form-group">
                                <label for="description">Mô tả: <span style="color: red; font-size: 18px">*</span></label>
                                <textarea name="description" class="form-control" id="description" placeholder="Nhập mô tả"></textarea>
                            </div>
                            <div class="form-group">
                                <p class="text-alert-require">
                                    <span style="color: red; margin-right: 5px; font-size: 18px">*</span> là trường thông tin bắt buộc
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6" style="padding-left: 12px">
                            <div class="form-group">
                                <label for="fullname">Phân quyền chức năng: <span style="color: red; font-size: 18px">*</span></label>
                                <div class="list-action">
                                    <ul>
                                        <div class="text-header">
                                            Nhóm chức năng A
                                        </div>
                                        <ul>
                                            <li> <input type="checkbox"> Tất cả </li>
                                            <li> <input type="checkbox"> Chức năng A </li>
                                            <li> <input type="checkbox"> Chức năng B </li>
                                            <li> <input type="checkbox"> Chức năng C </li>
                                        </ul>
                                    </ul>
                                    <ul>
                                        <div class="text-header">
                                            Nhóm chức năng B
                                        </div>
                                        <ul>
                                            <li> <input type="checkbox"> Tất cả </li>
                                            <li> <input type="checkbox"> Chức năng A </li>
                                            <li> <input type="checkbox"> Chức năng B </li>
                                            <li> <input type="checkbox"> Chức năng C </li>
                                        </ul>
                                    </ul>
                                    <ul>
                                        <div class="text-header">
                                            Nhóm chức năng C
                                        </div>
                                        <ul>
                                            <li> <input type="checkbox"> Tất cả </li>
                                            <li> <input type="checkbox"> Chức năng A </li>
                                            <li> <input type="checkbox"> Chức năng B </li>
                                            <li> <input type="checkbox"> Chức năng C </li>
                                        </ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <button type="submit" style="display: none" id="btn-submit"></button>

                    </form>                    
                </div>
                <div class="form-btn">
                    <a href="{{ route('system.role.index') }}">
                        <button class="btn btn-blur">Hủy bỏ</button>
                    </a>
                    <button class="btn btn-bold" onclick="submit()">Thêm</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
