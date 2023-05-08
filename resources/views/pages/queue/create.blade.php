@extends('layouts.app')

@section('webName', 'Cấp số mới')

@section('css')
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/queue_create.css') }}">
@endsection

@section('content')
    <div class="content-profile">
        <p class="title">
            Quản lý cấp số
        </p>
        <div class="content-container">
            <div class="content">
                <div class="content-white">
                    <div class="col-md-12 form-add-number" id="form-submit">
                        <!-- Search section -->
                        <div class="form-group form-group2">
                            <div class="text-header-center">
                                Cấp số mới
                            </div>
                        </div>

                        <div class="form-group-select">
                            <label class="label-input" for="queue_service">Dịch vụ khách hàng lựa chọn</label>
                            <select class="form-control" name="queue_service" id="queue_service">
                                @foreach ($queue_service as $service)
                                    <option value="{{ $service->service_id }}">{{ $service->service_name }}</option>
                                @endforeach
                            </select>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <div class="form-btn">
                            <a href="{{ route('auth.queue.index') }}">
                                <button type="button" class="btn btn-blur">Hủy bỏ</button>
                            </a>
                            <button type="button" class="btn btn-bold" data-bs-toggle="modal"
                                data-bs-target="#modal-chose-name">Thêm cấp số</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-chose-name" tabindex="-1" aria-labelledby="modal-chose-nameTitle"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-modal-header">
                            Điền thông tin của bạn
                        </div>
                        <form class="form-modal" action="">
                            @csrf
                            <div class="form-group">
                                <label for="queue_name">Họ và tên: <span
                                        style="color: red; font-size: 18px">*</span></label>
                                <input type="text" class="form-control" id="queue_name" name="queue_name"
                                    placeholder="Nhập họ và tên khách hàng">
                            </div>

                            <div class="form-group">
                                <label for="queue_phone">Số điện thoại: <span
                                        style="color: red; font-size: 18px">*</span></label>
                                <input type="text" class="form-control" id="queue_phone" name="queue_phone"
                                    placeholder="Nhập số điện thoại khách hàng">
                            </div>

                            <div class="form-group">
                                <label for="queue_email">Email: </label>
                                <input type="text" class="form-control" id="queue_email" name="queue_email"
                                    placeholder="Nhập email khách hàng">
                            </div>
                            <div class="form-group">
                                <p class="text-alert-require">
                                    <span style="color: red; margin-right: 5px; font-size: 18px">*</span> là trường thông
                                    tin bắt buộc
                                </p>
                            </div>

                            <div class="form-btn" style="margin-top: 50px">
                                <button type="button" class="btn btn-blur" data-bs-dismiss="modal">Hủy bỏ</button>

                                <button type="submit" class="btn btn-bold">Xác nhận</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-result" tabindex="-1" aria-labelledby="modal-resultTitle" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-modal-header">
                            Số thứ tự được cấp
                        </div>
                        <div class="text-center text-result">
                            2001201
                        </div>
                        <div class="text-center text-description">
                            DV: Khám răng hàm mặt <b>(tại quầy số 1)</b>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="text-content-footer">
                            <p>Thời gian cấp:</p>
                            <p>09:30 11/10/2021</p>
                        </div>
                        <div class="text-content-footer">
                            <p>Hạn sử dụng:</p>
                            <p>17:30 11/10/2021</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    // modal-result open using js no jquery
    var myModal = new bootstrap.Modal(document.getElementById('modal-result'), {
        keyboard: false
    })
    myModal.show()
</script>
@endsection