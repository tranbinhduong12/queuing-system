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
                    <a href="{{ route('admin.service.create') }}">
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
                            @foreach ($data as $item)
                                <tr>
                                    <td class="text-center">
                                        {{ $item->stt }}    
                                    </td>
                                    <td>
                                        {{ $item->service_name }}
                                    </td>
                                    <td>
                                        {{ $item->created_at->format('H:i:m') }} - {{ $item->created_at->format('d/m/Y') }}
                                    </td>
                                    <td>
                                        <i class="fa-solid fa-circle connected" style="color: {{ $item->status_color() }}"></i>
                                        {{ $item->status() }}
                                    </td>
                                    <td>
                                        {{ $item->device_name }}
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
@endsection

@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    
    <script>
        $("#kt_daterangepicker_1").daterangepicker();
    </script>
@endsection
