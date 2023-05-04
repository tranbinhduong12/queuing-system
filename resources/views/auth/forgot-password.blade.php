<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quên mật khẩu | {{ config('app.name', 'Laravel') }}
    </title>

    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c71231073e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/styles/auth/login.css') }}">
</head>
<style>
    .button-action{
        width: 100%;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-around;
        margin-top: 40px
    }
    .center-backgroud img{
        max-width: 711px;
        max-height: 560px;
        height: 100%;
        width: 100%;
        transform: translateX(-30px)
    }

</style>

<body>
    <div class="container-web">
        <div class="row h-100">
            <div class="col-md-5" style="background-color: #F6F6F6">
                <div class="form-action">
                    <div class="image-logo" style="margin-top: 40px">
                        <img class="mt-3" src="{{ asset('images/logo.png') }}"
                            alt="logo {{ config('app.name', 'Laravel') }}"
                            style="width: 170px; max-width: 90%; height: auto">
                    </div>
                    <form action="{{ route('auth.new-password') }}" class="w-100" style="max-width: 400px; margin-top: 70px">
                        <div class="form-label text-center text-bold" style="size: 22px">
                            <strong>
                                Đặt lại mật khẩu
                            </strong>
                        </div>
                        {{-- @csrf --}}
                        <div class="form-label text-center">
                            Vui lòng nhập email để đặt lại mật khẩu của bạn 
                            <span style="color: red">
                                *
                            </span>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Tên đăng nhập" required>
                        </div>
                        <div class="button-action">
                            <a href="{{ route('auth.login') }}">
                                <button type="button" class="btn btn-outline-primary">
                                    Hủy
                                </button>
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Tiếp tục
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-7">
                <div class="center-backgroud">
                    <img src="{{ asset('images/background2.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
