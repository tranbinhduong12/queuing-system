@extends('layouts.app')

@section('webName', 'Chi tiết')

@section('css')
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="{{ asset('styles/format_css_date_time.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/show_service.css') }}">
@endsection

@section('content')
    <div class="content-profile">
        <p class="title">
            Quản lý dịch vụ
        </p>
        <div class="content-container">
            <div class="content row" style="max-width: 1150px">
                <a href="{{ route('auth.service.edit', $id) }}">
                    <button class="btn-add">
                        <i class="fa-solid fa-pen"></i>
                        <p>
                            Cập nhập <br>
                            danh sách
                        </p>
                    </button>
                </a>
                <a href="{{ route('auth.service.index') }}">
                    <button class="btn-add" style="transform:translateY(100px)">
                        <i class="fa-solid fa-rotate-left"></i>
                        <p>
                            Quay lại
                        </p>
                    </button>
                </a>
                <div class="col-md-4">
                    <div class="content-white">
                        <!-- Content -->
                        
                        <div class="col-md-4 form-search">
                            <!-- Search section -->
                            <div class="form-group form-group2">
                                <div class="text-header">
                                    Thông tin dịch vụ
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">
                                    <span style="width: 122px; display: inline-block">
                                        Mã dịch vụ:
                                    </span>
                                    <span class="span-data">
                                        {{ $data->service_id }}
                                    </span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="">
                                    <span style="width: 122px; display: inline-block">
                                        Tên dịch vụ:
                                    </span>
                                    <span class="span-data">
                                        {{ $data->service_name }}
                                    </span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="">
                                    <span style="width: 122px; display: inline-block">
                                        Mô tả:
                                    </span>
                                    <span class="span-data">
                                        {{ $data->service_description }}
                                    </span>
                                </label>
                            </div>
                           
                            <div class="form-group form-group2">
                                <div class="text-header">
                                    Quy tắc cấp số
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="auto-range" style="width: 130px">Tăng tự động từ:</label>
                                    <input class="form-control mini-input" type="text" value="" id=""
                                        placeholder="0000">
                                    <label for="" style="width: 50px">Đến:</label>
                                    <input class="form-control mini-input" type="text" value="" id=""
                                        placeholder="9999">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Prefix" style="width: 130px">Prefix:</label>
                                    <input class="form-control mini-input" type="text" value="" id=""
                                        placeholder="0001">
    
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Surfix" style="width: 130px">Surfix:</label>
                                    <input class="form-control mini-input" type="text" value="" id=""
                                        placeholder="0001">
    
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="auto_reset" style="width: 130px">Reset mỗi ngày</label>
                                    <p>
                                        Ví dụ: 201-2001
                                    </p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-md-8 flex-content">
                    <div class="content-table">
                        <form class="col-md-12 form-search">
                            <!-- Search section -->
                            <div class="col-md-8 search-flex">
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
                            <div class="col-md-4">
                                <div class="form-group search-keyword">
                                    <label for="keywords">Từ khóa</label>
                                    <input type="text" class="form-control" id="keywords" name="keywords"
                                        placeholder="Nhập từ khóa">
                                    <i class="fa-solid fa-magnifying-glass" style="right: 15px"></i>
                                </div>
                            </div>
                        </form>
                        <div class="col-md-12" style="margin-top: 16px; position: relative">
                            <!-- Content -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="col-md-6">Sô thứ tự</th>
                                        <th class="col-md-6">Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < 10; $i++)
                                        <tr>
                                            <td class="col-md-6">{{ $i + 1 }}</td>
                                            <td class="col-md-6">
                                                @if ($i % 2 == 0)
                                                    <i class="fa-solid fa-circle unconnected" style="color: #6C7585"></i>
                                                    Vắng
                                                @elseif( $i % 3 == 0)
                                                    <i class="fa-solid fa-circle connected"></i>
                                                    Đã hoàn thành
                                                @else 
                                                    <i class="fa-solid fa-circle connected" style="color: blue"></i>
                                                    Đang thực hiện
                                                @endif 
                                            </td>
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
