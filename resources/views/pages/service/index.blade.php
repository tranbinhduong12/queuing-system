@extends('layouts.app')

@section('webName', 'Danh sách dịch vụ')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/format_css_date_time.css') }}">
@endsection

@section('content')
    <div class="content-profile">
        <p class="title">
            Quản lý dịch vụ
        </p>
        <div class="content-container">
            <div class="content">
                <form class="col-md-12 form-search">
                    <!-- Search section -->
                    <div class="search-left">
                        <div class="form-group">
                            <label for="active">Trạng thái hoạt động</label>
                            <select class="form-control" id="active" name="active">
                                <option value="all">Tất cả</option>
                                <option value="yes">Hoạt động</option>
                                <option value="no">Ngưng hoạt động</option>
                            </select>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <div class="form-group">
                            <label for="connected_status">Chọn thời gian</label>
                            {{-- <select class="form-control" name="connected_status" id="connected_status">
                                <option value="all">Tất cả</option>
                                <option value="yes">Kết nối</option>
                                <option value="no">Mất kết nối</option>
                            </select> --}}
                            <input class="form-control form-control-solid" placeholder="Pick date rage"
                                id="kt_daterangepicker_1" />
                        </div>
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
                    <a href="{{ route('auth.service.create') }}">
                        <button class="btn-add">
                            <i class="fa-solid fa-plus"></i>
                            <p>
                                Thêm <br>
                                dịch vụ
                            </p>
                        </button>
                    </a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Mã dịch vụ</th>
                                <th>Tên dịch vụ</th>
                                <th>Mô tả</th>
                                <th>Trạng thái hoạt động</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 10; $i++)
                                <tr>
                                    <td>123456</td>
                                    <td>Tên thiết dịch vụ</td>
                                    <td>Mô tả dịch vụ</td>
                                    <td>
                                        @if ($i % 2 == 0)
                                            <i class="fa-solid fa-circle connected"></i>
                                            Hoạt động
                                        @else
                                            <i class="fa-solid fa-circle unconnected"></i>
                                            Ngưng hoạt động
                                        @endif
                                    </td>
                                    <td><a class="tag-active" href="{{ route('auth.service.show', $i) }}">Chi tiết</a></td>
                                    <td><a class="tag-active" href="{{ route('auth.service.edit', $i) }}">Cập nhập</a></td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                    <div class="pagination-box">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <i class="fa-solid fa-caret-left"></i>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <i class="fa-solid fa-caret-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    
    <script>
        $("#kt_daterangepicker_1").daterangepicker();
    </script>
@endsection
