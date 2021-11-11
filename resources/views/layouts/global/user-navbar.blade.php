<div class="navbar-nav flex-row order-md-last">
    @auth
    <div class="nav-item dropdown me-3">
        <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
            <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
            <span class="badge bg-red"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-card">
            <div class="card">
                <div class="card-body">
                    Notification Come Here.
                </div>
            </div>
        </div>
    </div>
    @endauth
    <div class="nav-item dropdown">
        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
            <span class="avatar avatar-sm">
	            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
            </span>
        </a>

        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            @auth
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
