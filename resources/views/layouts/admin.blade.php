<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ __('bap.direction') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if(isset($title)){{ $title }} - @endif{{ config('bap.name', 'BAP') }}</title>

    @include('layouts.global.favicon')
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles



</head>
<body class="antialiased" x-data="{ darkTheme: $persist(false) }" :class="darkTheme ? '' : 'theme-dark'">
<div class="wrapper">
    <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
        <div class="{{ config('bap.container-admin', 'container') }}">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo-dark.svg') }}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
                </a>
            </h1>
            <div class="navbar-nav flex-row d-lg-none">
                @include('layouts.global.user-navbar')
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="navbar-nav pt-lg-3">
                    @can('admin_dashboard_index')
                    <li class="nav-item @if(\Illuminate\Support\Facades\Route::is('admin.dashboard.index')) active @endif">
                        <a class="nav-link" href="{{ route('admin.dashboard.index') }}" >
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
	                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="13" r="2" /><line x1="13.45" y1="11.55" x2="15.5" y2="9.5" /><path d="M6.4 20a9 9 0 1 1 11.2 0z" /></svg>
                                    </span>
                            <span class="nav-link-title">
                                      {{ __('bap.dashboard') }}
                                    </span>
                        </a>
                    </li>
                    @endcan
                    @can('admin_user_management')
                    <li class="nav-item dropdown @if(\Illuminate\Support\Facades\Route::is('admin.user.*')) show @endif">
                        <a class="nav-link dropdown-toggle" href="#navbar-user" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
                          <span class="nav-link-icon d-md-none d-lg-inline-block">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="7" r="4" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                          </span>
                            <span class="nav-link-title">
                            {{ __('bap.user_management') }}
                          </span>
                        </a>
                        <div class="dropdown-menu @if(\Illuminate\Support\Facades\Route::is('admin.user.*')) show @endif " data-bs-popper="none">
                            @can('admin_user_index')
                            <a class="dropdown-item @if(\Illuminate\Support\Facades\Route::is('admin.user.index')) active @endif" href="{{ route('admin.user.index') }}">
                                {{ __('bap.users') }}
                            </a>
                            @endcan
                                @can('admin_user_teams')
                                    <a class="dropdown-item @if(\Illuminate\Support\Facades\Route::is('admin.user.team.index')) active @endif" href="{{ route('admin.user.team.index') }}">
                                        {{ __('bap.teams_word') }}
                                    </a>
                                @endcan
                                @can('admin_user_roles')
                            <a class="dropdown-item @if(\Illuminate\Support\Facades\Route::is('admin.user.role.index')) active @endif" href="{{ route('admin.user.role.index') }}">
                                {{ __('bap.roles_word') }}
                            </a>
                                @endcan
                                    @can('admin_user_permissions')
                            <a class="dropdown-item @if(\Illuminate\Support\Facades\Route::is('admin.user.permission.index')) active @endif" href="{{ route('admin.user.permission.index') }}">
                                {{ __('bap.permissions_word') }}
                            </a>
                                    @endcan
                        </div>
                    </li>
                    @endcan
                        @can('admin_content_management')
                            <li class="nav-item dropdown @if(\Illuminate\Support\Facades\Route::is('admin.content.*')) show @endif">
                                <a class="nav-link dropdown-toggle" href="#navbar-user" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
                                  <span class="nav-link-icon d-md-none d-lg-inline-block">
	                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><line x1="8" y1="8" x2="12" y2="8" /><line x1="8" y1="12" x2="12" y2="12" /><line x1="8" y1="16" x2="12" y2="16" /></svg>
                                  </span>
                                    <span class="nav-link-title">
                                    {{ __('bap.content_management') }}
                                  </span>
                                </a>
                                <div class="dropdown-menu @if(\Illuminate\Support\Facades\Route::is('admin.content.*')) show @endif " data-bs-popper="none">
                                    @can('admin_article_index')
                                        <a class="dropdown-item @if(\Illuminate\Support\Facades\Route::is('admin.content.article.index')) active @endif" href="{{ route('admin.content.article.index') }}">
                                            {{ __('bap.articles') }}
                                        </a>
                                    @endcan
                                        @can('admin_faq_index')
                                            <a class="dropdown-item @if(\Illuminate\Support\Facades\Route::is('admin.content.faq.index')) active @endif" href="{{ route('admin.content.faq.index') }}">
                                                {{ __('bap.faqs') }}
                                            </a>
                                        @endcan

                                        @can('admin_carousel_index')
                                            <a class="dropdown-item @if(\Illuminate\Support\Facades\Route::is('admin.content.carousel.index')) active @endif" href="{{ route('admin.content.carousel.index') }}">
                                                {{ __('bap.carousels') }}
                                            </a>
                                        @endcan
                                </div>
                            </li>
                        @endcan
                        @can('admin_setting_management')
                            <li class="nav-item dropdown @if(\Illuminate\Support\Facades\Route::is('admin.setting.*')) show @endif">
                                <a class="nav-link dropdown-toggle" href="#navbar-user" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
                                  <span class="nav-link-icon d-md-none d-lg-inline-block">
	                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><circle cx="12" cy="12" r="3" /></svg>
                                  </span>
                                            <span class="nav-link-title">
                                    {{ __('bap.setting_management') }}
                                  </span>
                                </a>
                                <div class="dropdown-menu @if(\Illuminate\Support\Facades\Route::is('admin.setting.*')) show @endif " data-bs-popper="none">
                                    @can('admin_category_index')
                                        <a class="dropdown-item @if(\Illuminate\Support\Facades\Route::is('admin.setting.category.index')) active @endif" href="{{ route('admin.setting.category.index') }}">
                                            {{ __('bap.categories') }}
                                        </a>
                                    @endcan
                                </div>
                            </li>
                        @endcan

                        @can('admin_support_management')
                            <li class="nav-item dropdown @if(\Illuminate\Support\Facades\Route::is('admin.support.*')) show @endif">
                                <a class="nav-link dropdown-toggle" href="#navbar-user" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
                                  <span class="nav-link-icon d-md-none d-lg-inline-block">
	                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><path d="M10 16.5l2 -3l2 3m-2 -3v-2l3 -1m-6 0l3 1" /><circle cx="12" cy="7.5" r=".5" fill="currentColor" /></svg>
                                  </span>
                                    <span class="nav-link-title">
                                    {{ __('bap.support_management') }}
                                  </span>
                                </a>
                                <div class="dropdown-menu @if(\Illuminate\Support\Facades\Route::is('admin.support.*')) show @endif " data-bs-popper="none">
                                        @can('admin_ticket_index')
                                            <a class="dropdown-item @if(\Illuminate\Support\Facades\Route::is('admin.support.ticket.index')) active @endif" href="{{ route('admin.support.ticket.index') }}">
                                                {{ __('bap.tickets') }}
                                            </a>
                                        @endcan
                                        @can('admin_ticket_archive')
                                            <a class="dropdown-item @if(\Illuminate\Support\Facades\Route::is('admin.support.ticket.archive')) active @endif" href="{{ route('admin.support.ticket.archive') }}">
                                                {{ __('bap.archive') }}
                                            </a>
                                        @endcan
                                </div>
                            </li>
                        @endcan
                </ul>
            </div>
        </div>
    </aside>
    @include('layouts.global.header')
    <!-- Page Content -->
    <div class="page-wrapper">
        <main class="{{ config('bap.container', 'container-fluid') }}">
            @if(isset($pretitle))
                <div class="page-pretitle">
                    {{ $pretitle }}
                </div>
            @endif
            @if(isset($title))
                <div class="page-header d-print-none">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                {{ $title }}
                            </h2>
                            @if(isset($breadcrumb))
                                {{ $breadcrumb }}
                            @endif
                        </div>
                        @if(isset($actions))
                            {{ $actions }}
                        @endif
                    </div>
                </div>
            @endif
            <div class="page-body">

                {{ $slot }}
            </div>
        </main>
        @include('layouts.global.footer', ['container' => config('bap.container-admin')])
    </div>
</div>

@include('layouts.global.foot-js')
</body>
</html>
