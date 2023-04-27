<div class="navbar">
    <div class="navbar-logo">
        <a href="">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </a>
    </div>
    <ul class="navbar-menu">
        <a href="">
            <li class="item">
                {{-- icon Dashboard --}}
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </li>
        </a>
        <a href="{{ route('auth.device.index') }}">
            <li class="item{{ request()->routeIs('auth.device.*') ? ' item-active' : '' }}">
                <i class="fa-solid fa-display"></i>
                thiết bị
            </li>
        </a>
        <a href="{{ route('auth.service.index') }}">
            <li class="item{{ request()->routeIs('auth.service.*') ? ' item-active' : '' }}">
                <i class="fa-regular fa-comments"></i>
                dịch vụ
            </li>
        </a>
        <a href="">
            <li class="item">
                <i class="fa-solid fa-layer-group"></i>
                cấp số
            </li>
        </a>
        <a href="">
            <li class="item">
                <i class="fa-regular fa-file-lines"></i>
                báo cáo
            </li>
        </a>
        <li href="" class="item item-func">
            <i class="fa-solid fa-gear"></i>
            cài đặt hệ thống
            <i class="fa-solid fa-ellipsis-vertical" style="width: 5px; margin-left: 8px"></i>
            <ul class="sub-nav">
                <a href="">
                    <li class="item">
                        Quản lý vài trò
                    </li>
                </a>
                <a href="">
                    <li class="item">
                        Quản lý tài khoản
                    </li>
                </a>
                <a href="">
                    <li class="item">
                        nhật kí người dùng
                    </li>
                </a>
            </ul>
        </li>
        <a href="">
            <li class="item item-end">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </li>
        </a>
    </ul>
</div>