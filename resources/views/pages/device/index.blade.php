@extends('layouts.app')

@section('webName', 'Danh sách thiết bị')

@section('css')
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}">
@endsection

@section('content')
    <div class="content-profile">
        <p class="title">
            @yield('webName')
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
                            <label for="connected_status">Trạng thái kết nối</label>
                            <select class="form-control" name="connected_status" id="connected_status">
                                <option value="all">Tất cả</option>
                                <option value="yes">Kết nối</option>
                                <option value="no">Mất kết nối</option>
                            </select>
                            <i class="fa-solid fa-caret-down"></i>
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
                    <a href="{{ route('auth.device.create') }}">
                        <button class="btn-add">
                            <i class="fa-solid fa-plus"></i>
                            <p>
                                Thêm thiết bị
                            </p>
                        </button>
                    </a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Mã thiết bị</th>
                                <th>Tên thiết bị</th>
                                <th>Địa chỉ IP</th>
                                <th>Trạng thái hoạt động</th>
                                <th>Trạng thái kết nối</th>
                                <th>Sử dụng dịch vụ</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 10; $i++)
                                <tr>
                                    <td>123456</td>
                                    <td>Tên thiết bị 1</td>
                                    <td>192.168.1.1</td>
                                    <td>
                                        @if ($i % 2 == 0)
                                            <i class="fa-solid fa-circle connected"></i>
                                        @else
                                            <i class="fa-solid fa-circle unconnected"></i>
                                        @endif
                                        Trực tuyến
                                    </td>
                                    <td>Có</td>
                                    <td class="view-detail-text">
                                        <span class="text-view">
                                            khám tim mạch, khám mắt...
                                            <br>
                                            <a class="tag-active btn-text-active">Xem thêm</a>
                                        </span>
                                        <span class="text-hidden">
                                            khám tim mạch, khám sản - phụ khoa, khám răng hàm mặt, khám tai mũi họng, khám
                                            hô hấp, khám tổng quan
                                        </span>
                                    </td>
                                    <td><a class="tag-active" href="{{ route('auth.device.show', $i) }}">Chi tiết</a></td>
                                    <td><a class="tag-active" href="{{ route('auth.device.edit', $i) }}">Cập nhập</a></td>
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
    <script>
        var textViews = document.querySelectorAll('.text-view');
        var textHiddens = document.querySelectorAll('.text-hidden');

        function resetE() {
            textViews.forEach(function(textView) {
                textView.style.display = 'block'
            });
            textHiddens.forEach(function(textView) {
                textView.style.display = 'none'
            });
        }
        // Lắng nghe sự kiện khi click vào phần tử có class "btn-text-active"
        document.querySelectorAll('.btn-text-active').forEach(function(btn) {
            btn.addEventListener('click', function() {
                // reset lại tất cả các phần tử có class "text-view"
                resetE();

                // Lấy phần tử cha của nút được click
                var parent = this.parentElement.parentElement;

                // Ẩn phần tử có class "text-view" trong phần tử cha
                parent.querySelector('.text-view').style.display = 'none';

                // Hiển thị phần tử có class "text-hidden" trong phần tử cha
                parent.querySelector('.text-hidden').style.display = 'block';
            });
        });

        // Lắng nghe sự kiện khi click vào bất kỳ phần tử nào trên trang
        document.addEventListener('click', function(event) {
            if (!event.target.matches('.text-hidden, .tag-active, .btn-text-active')) {
                resetE()
            }
        });
    </script>
@endsection
