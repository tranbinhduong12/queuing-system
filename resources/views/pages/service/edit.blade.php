@extends('layouts.app')

@section('webName', 'Cập nhập dịch vụ')

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
                <div class="content-white">
                    <form class="col-md-12 form-search" id="form-submit">
                        <!-- Search section -->
                        <div class="form-group form-group2">
                            <div class="text-header">
                                Thông tin dịch vụ
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" style="max-width: calc(100% - 24px)">
                                <label for="service_id">Mã dịch vụ: <span style="color: red; font-size: 18px">*</span></label>
                                <input type="text" class="form-control" id="service_id" name="service_id" placeholder="Nhập mã dịch vụ" value="{{ $data->service_id }}">
                            </div>
                            <div class="form-group" style="max-width: calc(100% - 24px)">
                                <label for="service_name">Tên dịch vụ: <span style="color: red; font-size: 18px">*</span></label>
                                <input type="text" class="form-control" id="service_name" name="service_name" placeholder="Nhập tên dịch vụ" value="{{ $data->service_name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" style="max-width: calc(100% - 24px)">
                                <label for="service_description">Mô tả:</label>
                                <br>
                                <textarea  class="form-control" name="service_description" id="service_description" rows="5"> {{ $data->service_description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group form-group2">
                            <div class="text-header">
                                Quy tắc cấp số
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label for="service_description" style="width: 130px">Tăng tự động từ:</label>
                                <input class="form-control mini-input" type="text" value="" id="" placeholder="0001">
                                <label for="service_description" style="width: 50px">Đến:</label>
                                <input class="form-control mini-input" type="text" value="" id="" placeholder="9999">                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label for="service_description" style="width: 130px">Prefix:</label>
                                <input class="form-control mini-input" type="text" value="" id="" placeholder="0001">
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label for="service_description" style="width: 130px">Surfix:</label>
                                <input class="form-control mini-input" type="text" value="" id="" placeholder="0001">
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label for="service_description" style="width: 130px">Reset mỗi ngày</label>
                                
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <p class="text-alert-require">
                                    <span style="color: red; margin-right: 5px; font-size: 18px">*</span> là trường thông tin bắt buộc
                                </p>
                            </div>
                        </div>
                    </form>                    
                </div>
                <div class="form-btn">
                    <a href="{{ route('auth.service.index') }}">
                        <button class="btn btn-blur">Hủy bỏ</button>
                    </a>
                    <button class="btn btn-bold" onclick="submit()">Cập nhập</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    function submit(){
        document.getElementById('form-submit').submit();
    }
</script>
@endsection
