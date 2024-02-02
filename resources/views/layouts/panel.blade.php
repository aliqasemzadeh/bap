<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ __('bap.direction') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if(isset($title)){{ $title }} - @endif{{ config('bap.name', 'BAP') }}</title>

    @include('layouts.global.favicon')


    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">


</head>
<body class="antialiased" x-data="{ darkTheme: $persist(false) }" :data-bs-theme="darkTheme ? '' : 'dark'">
<div class="wrapper">
    <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
        <div class="{{ config('bap.container-panel', 'container') }}">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark">
                <a href="{{ route('home') }}">
                    <img x-show="darkTheme == 'dark'" src="{{ asset('images/logo-dark.svg') }}" width="110" height="32" alt="{{ config('app.name', 'Laravel') }}" class="navbar-brand-image">
                    <img x-show="darkTheme != 'dark'" src="{{ asset('images/logo-light.svg') }}" width="110" height="32" alt="{{ config('app.name', 'Laravel') }}" class="navbar-brand-image">
                </a>
            </h1>
            <div class="navbar-nav flex-row d-lg-none">
                @include('layouts.global.user-navbar')
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="navbar-nav pt-lg-3">

                    <li class="nav-item @if(\Illuminate\Support\Facades\Route::is('panel.dashboard.index')) active @endif">
                        <a class="nav-link" href="{{ route('panel.dashboard.index') }}" >
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
	                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="13" r="2" /><line x1="13.45" y1="11.55" x2="15.5" y2="9.5" /><path d="M6.4 20a9 9 0 1 1 11.2 0z" /></svg>
                                    </span>
                            <span class="nav-link-title">
                                      {{ __('bap.dashboard') }}
                                    </span>
                        </a>
                    </li>
                    @if(config('modules.wallet'))
                    <li class="nav-item @if(\Illuminate\Support\Facades\Route::is('panel.wallet.index')) active @endif">
                        <a class="nav-link" href="{{ route('panel.wallet.index') }}" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="nav-link-icon d-md-none d-lg-inline-block" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12"></path>
                                <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4"></path>
                            </svg>
                            <span class="nav-link-title">
                                      {{ __('bap.wallet') }}
                            </span>
                        </a>
                    </li>
                    @endif
                    @includeIf('layouts.custom.panel')

                        <li class="nav-item dropdown @if(\Illuminate\Support\Facades\Route::is('panel.support.*')) show active @endif">
                            <a class="nav-link dropdown-toggle" href="#navbar-support" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
                                  <span class="nav-link-icon d-md-none d-lg-inline-block">
	                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><path d="M10 16.5l2 -3l2 3m-2 -3v-2l3 -1m-6 0l3 1" /><circle cx="12" cy="7.5" r=".5" fill="currentColor" /></svg>
                                  </span>
                                <span class="nav-link-title">
                                    {{ __('bap.support') }}
                                  </span>
                            </a>
                            <div class="dropdown-menu @if(\Illuminate\Support\Facades\Route::is('panel.support.*')) show @endif " data-bs-popper="none">

                                    <a class="dropdown-item @if(\Illuminate\Support\Facades\Route::is('panel.support.ticket.index')) active @endif @if(\Illuminate\Support\Facades\Route::is('panel.support.ticket.view')) active @endif" href="{{ route('panel.support.ticket.index') }}">
                                        {{ __('bap.tickets') }}
                                    </a>

                                    <a class="dropdown-item @if(\Illuminate\Support\Facades\Route::is('panel.support.ticket.create')) active @endif" href="{{ route('panel.support.ticket.create') }}">
                                        {{ __('bap.create_ticket') }}
                                    </a>

                            </div>
                        </li>

                </ul>
            </div>
        </div>
    </aside>
    @include('layouts.global.header')
    <!-- Page Content -->
    <div class="page-wrapper">
                {{ $slot }}
        @include('layouts.global.footer', ['container' => config('bap.container-panel')])
    </div>
</div>

@include('layouts.global.foot-js')
</body>
</html>
