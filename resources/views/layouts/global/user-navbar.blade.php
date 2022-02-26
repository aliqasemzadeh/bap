<div class="navbar-nav flex-row order-md-last">
    <div class="nav-item dropdown me-3">
        <svg x-show="!darkTheme" x-on:click="darkTheme = ! darkTheme" xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="4" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
        <svg x-show="darkTheme" x-on:click="darkTheme = ! darkTheme" xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
    </div>
    @auth
    <div class="nav-item dropdown me-3">
        <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
            <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
            @if(auth()->user()->unreadNotifications->count())
                <span class="badge bg-red"></span>
            @endif
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-card">
            @if(auth()->user()->unreadNotifications->count() == 0)
                <div class="card">
                    <div class="card-body">
                        {{ __('bap.no_notifications') }}
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('bap.unread_notifications') }}</h3>
                    </div>
                    <div class="list-group list-group-flush list-group-hoverable">
                        @foreach(auth()->user()->unreadNotifications as $notification)
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto"><span class="status-dot d-block"></span></div>
                                <div class="col text-truncate">
                                    <a href="{{ route('notification.view', [$notification->id]) }}" class="text-body d-block">{{ $notification->data['title'] }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    @endauth
    <div class="nav-item dropdown">
        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">

            @auth
                <span class="avatar avatar-sm" style="background-image: url({{ auth()->user()->gravatar }})"></span>
                <div class="d-none d-xl-block ps-2">
                    <div>{{ auth()->user()->name }}</div>
                    <div class="mt-1 small text-muted">{{ auth()->user()->title }}</div>
                </div>
            @endauth
            @guest
                <span class="avatar avatar-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                </span>
            @endguest
        </a>

        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            @auth
                <a href="{{ route('user.verify') }}" class="dropdown-item">{{ __('bap.account_verify') }}</a>
                <a href="{{ route('user.mobile') }}" class="dropdown-item">{{ __('bap.mobile') }}</a>
                <a href="{{ route('profile.show') }}" class="dropdown-item">{{ __('bap.profile') }}</a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item">{{ __('bap.logout') }}</a>
            @endauth
            @guest
                    <a href="{{ route('register') }}" class="dropdown-item">{{ __('bap.register') }}</a>
                    <a href="{{ route('login') }}" class="dropdown-item">{{ __('bap.login') }}</a>
            @endguest
        </div>

    </div>
</div>
