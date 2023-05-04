<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mật khẩu mới | {{ config('app.name', 'Laravel') }}
    </title>

    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c71231073e.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('/styles/auth/login.css') }}">
</head>
<style>
    .button-action {
        flex-direction: row;
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
                    <form action="" class="w-100" style="max-width: 400px; margin-top: 70px">
                        <div class="form-label text-center text-bold" style="size: 22px">
                            <strong>
                                Đặt lại mật khẩu mới
                            </strong>
                        </div>
                        <label for="username" class="form-label">
                            Mật khẩu
                            <span style="color: red">
                                *
                            </span>
                        </label>
                        <div class="input-group mb-3" style="position: relative">
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Mật khẩu">
                            <div class="btn-toggle-password-div">
                                <button class="btn-toggle-password" type="button" id="togglePassword">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <label for="username" class="form-label">
                            Nhập lại mật khẩu
                            <span style="color: red">
                                *
                            </span>
                        </label>
                        <div class="input-group mb-3" style="position: relative">
                            <input type="password" name="comfirm-password" class="form-control" id="comfirm-password"
                                placeholder="Xác nhận mật khẩu">
                            <div class="btn-toggle-password-div">
                                <button class="btn-toggle-password" type="button" id="toggleComfirmPassword">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="button-action">
                            <button type="submit" class="btn btn-primary">
                                Xác nhận
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
<script>
    function togglePassword(field, button) {
        button.addEventListener("click", function() {
            const type = field.getAttribute("type") === "password" ? "text" : "password";
            field.setAttribute("type", type);
            button.innerHTML = type === "password" ? '<i class="fa-regular fa-eye"></i>' :
                '<i class="fa-regular fa-eye-slash"></i>';
        });
    }

    togglePassword(document.getElementById("password"), document.getElementById("togglePassword"));
    togglePassword(document.getElementById("comfirm-password"), document.getElementById("toggleComfirmPassword"));
</script>

</html>
