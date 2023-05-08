@extends('layouts.app')

@section('webName', 'Lập báo cáo')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/format_css_date_time.css') }}">
@endsection

@section('content')
    <div class="content-profile">
        <div class="content-container">
            <div class="content">
                <form class="col-md-12 form-search">
                    <!-- Search section -->
                    <div class="search-left">
                        <div class="form-group">
                            <label for="connected_status">Chọn thời gian</label>

                            <input class="form-control form-control-solid" placeholder="Pick date rage"
                                id="kt_daterangepicker_1" />
                        </div>
                    </div>
                </form>
                <div class="col-md-12" style="margin-top: 16px; position: relative">
                    <!-- Content -->
                    <a href="{{ route('auth.service.create') }}">
                        <button class="btn-add">
                            <i class="fa-solid fa-file-arrow-down"></i>
                            <p>
                                Tải về
                            </p>
                        </button>
                    </a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Số thứ tự</th>
                                <th>Tên dịch vụ</th>
                                <th>Thời gian cấp</th>
                                <th>Tình trạng</th>
                                <th>Nguồn cấp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 10; $i++)
                                <tr>
                                    <td>123456</td>
                                    <td>Tên thiết dịch vụ</td>
                                    <td>
                                        20/10/2021
                                    </td>
                                    <td>
                                        @if ($i % 2 == 0)
                                            <i class="fa-solid fa-circle connected"></i>
                                            Hoạt động
                                        @else
                                            <i class="fa-solid fa-circle unconnected"></i>
                                            Ngưng hoạt động
                                        @endif
                                    </td>
                                    <td>
                                        Tim em
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
@endsection

@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    
    <script>
        $("#kt_daterangepicker_1").daterangepicker();
    </script>
@endsection
