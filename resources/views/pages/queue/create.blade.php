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
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Lỗi!</strong> {{ $errors->first() }}
            </div>
        @endif
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
                            <label class="label-input" for="services">Dịch vụ khách hàng lựa chọn</label>
                            <select class="form-control" name="services" id="services" required>
                                <option disabled selected>Chọn dịch vụ</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <div class="form-btn">
                            <a href="{{ route('admin.queue.index') }}">
                                <button type="button" class="btn btn-blur">Hủy bỏ</button>
                            </a>
                            <button type="button" class="btn btn-bold" onclick="change_service_id()">Thêm cấp số</button>
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
                        <form class="form-modal" action="{{ route('admin.queue.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="device_id" value="{{ $device_id }}">
                            <input type="hidden" name="service_id" id="service_id">
                            <div class="form-group">
                                <label for="queue_name">Họ và tên: <span
                                        style="color: red; font-size: 18px">*</span></label>
                                <input type="text" class="form-control" id="queue_name" name="name_user"
                                    placeholder="Nhập họ và tên khách hàng" required>
                            </div>

                            <div class="form-group">
                                <label for="queue_phone">Số điện thoại: <span
                                        style="color: red; font-size: 18px">*</span></label>
                                <input type="text" class="form-control" id="queue_phone" name="phone"
                                    placeholder="Nhập số điện thoại khách hàng" required>
                            </div>

                            <div class="form-group">
                                <label for="queue_email">Email: </label>
                                <input type="text" class="form-control" id="queue_email" name="email"
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
        @if (@isset($data))
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
                                {{ $data->stt }}
                            </div>
                            <div class="text-center text-description">
                                DV: {{ $data->service_name }}<b>(tại quầy số 1)</b>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="text-content-footer">
                                <p>Thời gian cấp:</p>
                                <p>
                                    {{ $data->created_at->format('H:i:m') }} - {{ $data->created_at->format('d/m/Y') }}
                                </p>
                            </div>
                            <div class="text-content-footer">
                                <p>Hạn sử dụng:</p>
                                <p>
                                    {{-- {{ $data->expires_at }} --}}
                                    {{ (new DateTime('@' . strtotime($data->expires_at)))->format('H:i:s') }} - {{ (new DateTime('@' . strtotime($data->expires_at)))->format('d/m/Y') }}

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('js')
<script>
    // modal-result open using js no jquery
    function change_service_id(){
        let service_id = document.getElementById('services').value;
        if (service_id == 'Chọn dịch vụ'){
            alert("Vui lòng chọn dịch vụ")
        }else{
            document.getElementById('service_id').value = service_id;
            var ModalOpen = new bootstrap.Modal(document.getElementById('modal-chose-name'), {
                keyboard: false
            })
            ModalOpen.show()
        }
    }
    var myModal = new bootstrap.Modal(document.getElementById('modal-result'), {
        keyboard: false
    })
    @if (@isset($data))
        myModal.show()
    @endif
</script>
@endsection