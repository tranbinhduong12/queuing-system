@extends('layouts.app')

@section('webName', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('calendar/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/Dashboard.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.26.0/dist/apexcharts.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
    <div class="content-profile">
        <p class="title">
            Biểu đồ cấp số
        </p>
        <div class="content-container">
            <div class="content col-md-12" style="padding: 0">
                <div class="col-md-9">
                    <div class="col-md-12 box-list">
                        <div class="box-list-item">
                            <a href="{{ route('admin.queue.index') }}">
                                <div class="title-item">
                                    <div class="item-icon icon-color-blue">
                                        <i class="fa-regular fa-calendar"></i>
                                    </div>
                                    <div class="item-tile">
                                        Số thứ tự đã cấp
                                    </div>
                                </div>
                                <div class="title-item2">
                                    <div class="item-tile2">
                                        4.221
                                    </div>
                                    <div class="bgare-icon">
                                        <div class="bgare-content">
                                            <i class="fa-solid fa-down-long"></i> 32,41%
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="box-list-item">
                            <a href="{{ route('admin.queue.index') }}">

                                <div class="title-item">
                                    <div class="item-icon icon-color-green">
                                        <i class="fa-regular fa-calendar-check"></i>
                                    </div>
                                    <div class="item-tile">
                                        Số thứ tự đã sử dụng
                                    </div>
                                </div>
                                <div class="title-item2">
                                    <div class="item-tile2">
                                        4.221
                                    </div>
                                    <div class="bgare-icon">
                                        <div class="bgare-content">
                                            <i class="fa-solid fa-down-long"></i> 32,41%
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="box-list-item">
                            <a href="{{ route('admin.queue.index') }}">

                                <div class="title-item">
                                    <div class="item-icon icon-color-orange">
                                        <i class="fa-solid fa-phone-flip"></i>
                                    </div>
                                    <div class="item-tile">
                                        Số thứ tự đang chờ
                                    </div>
                                </div>
                                <div class="title-item2">
                                    <div class="item-tile2">
                                        4.221
                                    </div>
                                    <div class="bgare-icon">
                                        <div class="bgare-content">
                                            <i class="fa-solid fa-down-long"></i> 32,41%
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="box-list-item">
                            <a href="{{ route('admin.queue.index') }}">

                                <div class="title-item">
                                    <div class="item-icon icon-color-red">
                                        <i class="fa-regular fa-bookmark"></i>
                                    </div>
                                    <div class="item-tile">
                                        Số thứ tự đã bỏ qua
                                    </div>
                                </div>
                                <div class="title-item2">
                                    <div class="item-tile2">
                                        4.221
                                    </div>
                                    <div class="bgare-icon">
                                        <div class="bgare-content">
                                            <i class="fa-solid fa-down-long"></i> 32,41%
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                    <div class="chart-container">
                        <div class="header-chart">
                            <div class="header-1">
                                <h3>
                                    Bảng thống kê theo ngày
                                </h3>
                                <p>
                                    Tháng 11/2021
                                </p>
                            </div>
                            <div class="header-2">
                                <label for="">Xem theo</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Ngày</option>
                                    <option value="">Tháng</option>
                                    <option value="">Năm</option>
                                </select>
                            </div>
                        </div>
                        <div id="apexcharts-area"></div>
                    </div>
                </div>
                <div class="main-content-left">
                    <div class="container-left">
                        <p class="title">
                            Tổng quan
                        </p>
                        <div class="box-service">
                            <div class="content-left">
                                <div class="border-circle">
                                    70%
                                </div>
                                <div class="text-content-left">
                                    <div class="text-1">
                                        4.221
                                    </div>
                                    <div class="text-2">
                                        <i class="fa-regular fa-comments"></i>
                                        Thiết bị
                                    </div>
                                </div>
                            </div>
                            <div class="content-right">
                                <p>
                                    <i class="fa-solid fa-circle" style="color: #FFD130"></i> Đang hoạt động:
                                    <span>3.799</span>
                                </p>
                                <p>
                                    <i class="fa-solid fa-circle" style="color: #7E7D88"></i> Ngưng hoạt động
                                    <span>3.799</span>
                                </p>
                            </div>
                        </div>
                        <div class="box-service">
                            <div class="content-left">
                                <div class="border-circle" style="border-color: #4277FF">
                                    70%
                                </div>
                                <div class="text-content-left">
                                    <div class="text-1">
                                        4.221
                                    </div>
                                    <div class="text-2" style="color: #4277FF">
                                        <i class="fa-regular fa-comments"></i>
                                        Dịch vụ
                                    </div>
                                </div>
                            </div>
                            <div class="content-right">
                                <p>
                                    <i class="fa-solid fa-circle" style="color: #4277FF"></i> Đang hoạt động:
                                    <span>3.799</span>
                                </p>
                                <p>
                                    <i class="fa-solid fa-circle" style="color: #7E7D88"></i> Ngưng hoạt động
                                    <span>3.799</span>
                                </p>
                            </div>
                        </div>
                        <div class="box-service">
                            <div class="content-left">
                                <div class="border-circle" style="border-color: #35C75A">
                                    70%
                                </div>
                                <div class="text-content-left">
                                    <div class="text-1">
                                        4.221
                                    </div>
                                    <div class="text-2" style="color: #35C75A">
                                        <i class="fa-solid fa-layer-group"></i>
                                        Cấp số
                                    </div>
                                </div>
                            </div>
                            <div class="content-right">
                                <p>
                                    <i class="fa-solid fa-circle" style="color: #35C75A"></i> Đang chờ: <span>3.799</span>
                                </p>
                                <p>
                                    <i class="fa-solid fa-circle" style="color: #7E7D88"></i> Đã sử dụng
                                    <span>3.799</span>
                                </p>
                                <p>
                                    <i class="fa-solid fa-circle" style="color: #F178B6"></i> Bỏ qua <span>3.799</span>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="calendar calendar-first" id="calendar_first">
                                    <div class="calendar_header">
                                        <button class="switch-month switch-left"> <i
                                                class="fa fa-chevron-left"></i></button>
                                        <h2></h2>
                                        <button class="switch-month switch-right"> <i
                                                class="fa fa-chevron-right"></i></button>
                                    </div>
                                    <div class="calendar_weekdays"></div>
                                    <div class="calendar_content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('js')
        <script src="{{ asset('js/Dashboard.js') }}"></script>
        <script src="{{ asset('calendar/js/jquery.min.js') }}"></script>
        <script src="{{ asset('calendar/js/popper.js') }}"></script>
        <script src="{{ asset('calendar/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('calendar/js/main.js') }}"></script>
    @endsection
