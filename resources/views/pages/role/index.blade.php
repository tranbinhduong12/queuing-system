@extends('layouts.app')

@section('webName', 'Quản lý vai trò')

@section('css')
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}">
@endsection

@section('content')
    <div class="content-profile">
        <div class="content-container">
            <div class="content">
                <form class="col-md-12 form-search mt-4">
                    <!-- Search section -->
                    <div class="search-left" style="align-items: self-start">
                        <p class="title" style="margin-top: 0">
                            Danh sách vai trò
                        </p>
                    </div>
                    <div class="search-right">
                        <div class="form-group">
                            <label for="keywords">Từ khóa</label>
                            <input type="text" class="form-control" id="keywords" name="keywords"
                                placeholder="Nhập từ khóa">
                            <i class="fa-solid fa-magnifying-glass" style="right: 15px"></i>
                        </div>
                    </div>
                </form>
                <div class="col-md-12" style="margin-top: 16px; position: relative">
                    <!-- Content -->
                    <a href="{{ route('system.role.create') }}">
                        <button class="btn-add">
                            <i class="fa-solid fa-plus"></i>
                            <p>
                                Thêm <br>
                                vai trò
                            </p>
                        </button>
                    </a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tên vai trò</th>
                                <th>Số người dùng</th>
                                <th>Mô tả</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->total }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td><a class="tag-active" href="{{ route('system.role.edit', $item->id) }}">Cập nhập</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-box">

                        {{ $data->links('pagination::bootstrap-4') }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
  
    <script>
        $("#kt_daterangepicker_1").daterangepicker();
    </script>
@endsection
