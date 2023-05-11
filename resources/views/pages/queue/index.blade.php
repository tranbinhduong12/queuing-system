@extends('layouts.app')

@section('webName', 'Danh sách cấp số')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/format_css_date_time.css') }}">
    <style>
        .search-list-left .form-group{
            width: 30% !important;
        }
        .search-list-left .form-group .form-control{
            width: 100% !important;
        }
        .search-list-left{
            display: flex;
            justify-content: space-between
        }
        .search-list-right{
            display: flex;
        }
        .search-list-right .form-group{
            width: 45% !important;
            margin-left: 5%
        }
        .search-list-right .form-group .form-control{
            width: 100% !important;
        }
        .form-group i{
            right: 20px;
        }
    </style>
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
                    <div class="col-md-6 search-list-left">
                        <div class="form-group">
                            <label for="active">Tên dịch vụ</label>
                            <select class="form-control" id="active" name="active">
                                <option value="all">Tất cả</option>
                                <option value="yes">Hoạt động</option>
                                <option value="no">Ngưng hoạt động</option>
                            </select>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <div class="form-group">
                            <label for="active">Tình trạng</label>
                            <select class="form-control" id="active" name="active">
                                <option value="all">Tất cả</option>
                                <option value="yes">Hoạt động</option>
                                <option value="no">Ngưng hoạt động</option>
                            </select>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <div class="form-group">
                            <label for="active">Nguồn cấp</label>
                            <select class="form-control" id="active" name="active">
                                <option value="all">Tất cả</option>
                                <option value="yes">Hoạt động</option>
                                <option value="no">Ngưng hoạt động</option>
                            </select>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                    </div>
                    <div class="search-list-right col-md-6">
                        <div class="form-group">
                            <label for="connected_status">Chọn thời gian</label>
                            <input class="form-control form-control-solid" placeholder="Pick date rage"
                                id="kt_daterangepicker_1" />
                        </div>
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
                    <a href="{{ route('admin.queue.create') }}">
                        <button class="btn-add">
                            <i class="fa-solid fa-plus"></i>
                            <p>
                                Cấp<br>số mới
                            </p>
                        </button>
                    </a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên khách hàng</th>
                                <th>Tên dịch vụ</th>
                                <th>Thời gian cấp</th>
                                <th>Hạn sử dụng</th>
                                <th>Trạng thái</th>
                                <th>Nguồn cấp</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td class="text-center">
                                        {{ $item->stt }}    
                                    </td>
                                    <td>
                                        {{ $item->name_user }}
                                    </td>
                                    <td>
                                        {{ $item->service_name }}
                                    </td>
                                    <td>
                                        {{ $item->created_at->format('H:i:m') }} - {{ $item->created_at->format('d/m/Y') }}
                                    </td>
                                    <td>
                                        {{ (new DateTime('@' . strtotime($item->expires_at)))->format('H:i:s') }} - {{ (new DateTime('@' . strtotime($item->expires_at)))->format('d/m/Y') }}
                                    </td>
                                    <td>
                                        <i class="fa-solid fa-circle connected" style="color: {{ $item->status_color() }}"></i>
                                        {{ $item->status() }}
                                    </td>
                                    <td>
                                        {{ $item->device_name }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.queue.show', $item->id) }}" class="tag-active">Chi tiết</a>
                                    </td>
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        $("#kt_daterangepicker_1").daterangepicker();
    </script>
@endsection
