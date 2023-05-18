<div class="navbar">
    <div class="navbar-logo">
        <a href="">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </a>
    </div>
    <ul class="navbar-menu">
        <a href="{{ route('admin.dashboard') }}">
            <li class="item{{ request()->routeIs('admin.dashboard') ? ' item-active' : '' }}">
                {{-- icon Dashboard --}}
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </li>
        </a>
        <a href="{{ route('admin.device.index') }}">
            <li class="item{{ request()->routeIs('admin.device.*') ? ' item-active' : '' }}">
                <i class="fa-solid fa-display"></i>
                thiết bị
            </li>
        </a>
        <a href="{{ route('admin.service.index') }}">
            <li class="item{{ request()->routeIs('admin.service.*') ? ' item-active' : '' }}">
                <i class="fa-regular fa-comments"></i>
                dịch vụ
            </li>
        </a>
        <a href="{{ route('admin.queue.index') }}">
            <li class="item{{ request()->routeIs('admin.queue.*') ? ' item-active' : '' }}">
                <i class="fa-solid fa-layer-group"></i>
                cấp số
            </li>
        </a>
        <a href="{{ route('admin.report.index') }}">
            <li class="item{{ request()->routeIs('admin.report.index') ? ' item-active' : '' }}">
                <i class="fa-regular fa-file-lines"></i>
                báo cáo
            </li>
        </a>
        <li href="" class="item item-func{{ request()->routeIs('system.*') ? ' item-active' : '' }}">
            <i class="fa-solid fa-gear"></i>
            cài đặt hệ thống
            <i class="fa-solid fa-ellipsis-vertical" style="width: 5px; margin-left: 8px"></i>
            <ul class="sub-nav">
                <a href="{{ route('system.role.index') }}">
                    <li class="item{{ request()->routeIs('system.role.*') ? ' item-active' : '' }}">
                        Quản lý vài trò
                    </li>
                </a>
                <a href="{{ route('system.user.index') }}">
                    <li class="item{{ request()->routeIs('system.user.*') ? ' item-active' : '' }}">
                        Quản lý tài khoản
                    </li>
                </a>
                <a href="{{ route('system.history_user') }}">
                    <li class="item{{ request()->routeIs('system.history_user') ? ' item-active' : '' }}">
                        nhật kí người dùng
                    </li>
                </a>
            </ul>
        </li>
        <a href="{{ route('admin.logout') }}">
            <li class="item item-end">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </li>
        </a>
    </ul>
</div>