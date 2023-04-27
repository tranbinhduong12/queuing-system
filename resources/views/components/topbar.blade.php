<div class="topbar">
    <ul class="page-name">
        {{-- <li>
            <a href="">
                test
            </a>
            <i class="fas fa-chevron-right"></i>
        </li>
        <li>
            <a href="">
                test
            </a>
            <i class="fas fa-chevron-right"></i>

        </li> --}}
        <li>
            <a href="">
                @yield('webName')
            </a>
            <i class="fas fa-chevron-right"></i>
        </li>
    </ul>
    <div class="user-profile">
        <div class="bell-alert">
            <div class="fa-solid fa-bell"></div>
            <div class="pop-up-alert">
                <div class="header-pop-up">
                    <p>
                        Thông báo
                    </p>
                </div>
                <ul class="pop-up-content">
                    @for ($i = 0; $i <= 10; $i++)
                        <li class="pop-up-item">
                            <p class="pop-up-item-name">
                                Người dùng: Nguyễn Thị Thùy Dung
                            </p>
                            <p class="pop-up-item-content">
                                Thời gian nhận số: 12h20 ngày 30/11/2021
                            </p>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
        <a href="{{ route("auth.my-profile") }}">
            <div class="infor-user">
                <div class="avatar">
                    <img src="{{ asset('images/avatar.jpg') }}" alt="avatar">
                </div>
                <div class="info-user-name">
                    <span>
                        Xin chào
                    </span>
                    <p>
                        Trần Bình Dương
                    </p>
                </div>
            </div>
        </a>
    </div>
</div>