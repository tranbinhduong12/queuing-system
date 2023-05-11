@extends('layouts.app')

@section('webName', 'Cập nhập vai trò')

@section('css')
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/role.css') }}">
@endsection

@section('content')
    <div class="content-profile">
        <p class="title">
            Quản lý vai trò
        </p>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Lỗi!</strong> {{ $errors->first() }}
            </div>
        @endif
        <div class="content-container">
            <div class="content">
                <div class="content-white">
                    <form class="col-md-12 form-search" id="form-submit" method="post" action="{{ route('system.role.update', $id) }}">
                        <!-- Search section -->
                        {{-- change method put --}}
                        @method('PUT')
                        @csrf
                        <div class="form-group form-group2">
                            <div class="text-header">
                                Thông tin vai trò
                            </div>
                        </div>
                        <div class="col-md-6" style="padding-right: 12px">
                            <div class="form-group">
                                <label for="rolename">Tên vai trò: <span style="color: red; font-size: 18px">*</span></label>
                                <input type="text" class="form-control" id="rolename" name="name" required placeholder="Nhập họ tên" value="{{ $data->name }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Mô tả: <span style="color: red; font-size: 18px">*</span></label>
                                <textarea name="description" class="form-control" id="description" placeholder="Nhập mô tả">{{ $data->description }}</textarea>
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
                                    @foreach ($action_list as $actionList)
                                        <ul>
                                            <div class="text-header">
                                                Nhóm chức năng {{ $actionList[0]->group }}
                                            </div>
                                            <ul>
                                                @foreach ($actionList as $action)
                                                    <li>
                                                        <input type="checkbox" name="action[]" value="{{ $action->id }}" id="action-{{ $action->id }}" {{ $action->checked ? 'checked' : '' }}>
                                                        <label for="action-{{ $action->id }}">{{ $action->name }}</label> 
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </ul>
                                    @endforeach
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
                    <button class="btn btn-bold" onclick="submit()">Cập nhập</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
