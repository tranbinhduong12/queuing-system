@extends('layouts.app')

@section('webName', 'Danh sách dịch vụ')

@section('css')
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}">
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
                            <input type="text" id="daterange" name="daterange" class="form-control">
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


<script>
    $(function() {
        $('#daterange').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });

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
