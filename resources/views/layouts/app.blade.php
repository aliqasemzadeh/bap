<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ __('bap.direction') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('bap.title', 'BAP') }} @if(isset($title)) - {{ $title }} @endif</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        @wireUiScripts
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-gray-50 text-base pt-14 lg:pl-60"
          x-data="{displayASide: false}"
          x-on:keydown.escape="displayASide = false"
          x-bind:class="{ 'aside-mobile-expanded' : displayASide }"
    >
        <div id="app" class="w-screen transition-all lg:w-auto">
            <nav id="navbar-main" class="navbar is-fixed-top" x-on:click.away="displayASide = false"  x-data="{ displayProfileMenu: false}">
                <div class="navbar-brand">
                    <button class="navbar-item mobile-aside-button" x-on:click="displayASide = !displayASide">
                        <span class="icon"><x-icon name="menu-alt-1" class="h-6 w-6"></x-icon></span>
                    </button>
                    <div class="navbar-item">
                        <div class="control"><input placeholder="{{ __('bap.header_search') }}" class="input"></div>
                    </div>
                </div>
                <div class="navbar-brand is-right">
                    <a class="navbar-item" x-on:click="displayProfileMenu = !displayProfileMenu">
                        <span class="icon"><x-icon name="dots-vertical" class="h-4 w-4" /></span>
                    </a>
                </div>

                    <div class="navbar-end">
                        <div class="navbar-item dropdown has-divider has-user-avatar" x-bind:class="{ 'active' : displayProfileMenu  }" x-on:click.away="displayProfileMenu = false">
                            <a class="navbar-link" x-on:click="displayProfileMenu = !displayProfileMenu" x-ignore>
                                <div class="user-avatar">
                                    <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe" class="rounded-full">
                                </div>
                                <div class="is-user-name"><span>John Doe</span></div>
                                <span class="icon"><x-icon name="dots-vertical" class="h-4 w-4" /></span>
                            </a>
                        </div>
                        <div class="navbar-menu" id="navbar-menu" x-show="displayProfileMenu" x-cloak>
                            <div class="navbar-dropdown">
                                <a href="profile.html" class="navbar-item">
                                    <span class="icon"><x-icon name="user" class="h-4 w-4" /></span>
                                    <span>My Profile</span>
                                </a>
                                <hr class="navbar-divider">
                                <a class="navbar-item">
                                    <span class="icon"><i class="mdi mdi-logout"></i></span>
                                    <span>Log Out</span>
                                </a>
                            </div>
                        </div>
                    </div>

            </nav>
            <aside class="aside is-placed-left is-expanded" x-cloak>
                <div class="aside-tools">
                    <div>
                        {{ config('bap.title', 'BAP') }}
                    </div>
                </div>
                <div class="menu is-menu-main">
                    <p class="menu-label">General</p>
                    <ul class="menu-list">
                        <li class="active">
                            <a href="index.html">
                                <span class="icon"><x-icon name="home" class="w-5 h-5" /></span>
                                <span class="menu-item-label">{{ __('bap.home') }}</span>
                            </a>
                        </li>
                    </ul>
                    <p class="menu-label">Examples</p>
                    <ul class="menu-list">
                        <li class="--set-active-tables-html">
                            <a href="tables.html">
                                <span class="icon"><i class="mdi mdi-table"></i></span>
                                <span class="menu-item-label">Tables</span>
                            </a>
                        </li>
                        <li class="--set-active-forms-html">
                            <a href="forms.html">
                                <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                                <span class="menu-item-label">Forms</span>
                            </a>
                        </li>
                        <li class="--set-active-profile-html">
                            <a href="profile.html">
                                <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                                <span class="menu-item-label">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="login.html">
                                <span class="icon"><i class="mdi mdi-lock"></i></span>
                                <span class="menu-item-label">Login</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown">
                                <span class="icon"><i class="mdi mdi-view-list"></i></span>
                                <span class="menu-item-label">Submenus</span>
                                <span class="icon"><i class="mdi mdi-plus"></i></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="#void">
                                        <span>Sub-item One</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#void">
                                        <span>Sub-item Two</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <p class="menu-label">About</p>
                    <ul class="menu-list">
                        <li>
                            <a href="https://justboil.me" onclick="alert('Coming soon'); return false" target="_blank" class="has-icon">
                                <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
                                <span class="menu-item-label">Premium Demo</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://justboil.me/tailwind-admin-templates" class="has-icon">
                                <span class="icon"><i class="mdi mdi-help-circle"></i></span>
                                <span class="menu-item-label">About</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/justboil/admin-one-tailwind" class="has-icon">
                                <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                                <span class="menu-item-label">GitHub</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
            <section class="section main-section">
                {{ $slot }}
            </section>
            <footer class="footer">
                <div class="flex flex-col md:flex-row items-end justify-between space-y-3 md:space-y-0">
                    <div class="flex items-center justify-start space-x-3">
                        <div>
                            © 2021, {{ config('bap.title') }}
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        @stack('modals')
        @livewireScripts
    </body>
</html>
