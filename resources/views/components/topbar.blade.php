<div class="topbar">
    <ul class="page-name">
        @if (@isset($records))
            @foreach ($records as $record)
                <li>
                    <a
                    @if (@isset($record->url))
                        href="{{ $record->url }}"
                    @endif
                >
                    {{ $record->name }}
                </a>
                <i class="fas fa-chevron-right"></i>
                </li>
            @endforeach
        @endisset
        <li>
            <a >
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
                    @foreach ($notifications as $item)
                        <a href="{{ route('admin.queue.show', $item->id) }}">
                            <li class="pop-up-item">
                                <p class="pop-up-item-name">
                                    Người dùng: {{ $item->name_user }}
                                </p>
                                <p class="pop-up-item-content">
                                    Thời gian nhận số: {{ date('H\hi d/m/Y', strtotime($item->created_at)) }}
                                </p>
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
        <a href="{{ route("admin.my-profile") }}">
            <div class="infor-user">
                <div class="avatar">
                    <img src="{{ asset("images/" . auth()->user()->image . "") }}" alt="avatar">
                </div>
                <div class="info-user-name">
                    <span>
                        Xin chào
                    </span>
                    <p>
                        {{ auth()->user()->full_name }}
                    </p>
                </div>
            </div>
        </a>
    </div>
</div>