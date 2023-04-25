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
    <body class="border-top-wide border-primary d-flex flex-column" x-data="{ darkTheme: $persist(false) }" :class="darkTheme ? '' : 'theme-dark'">
    <div class="page page-center">
        {{ $slot }}
    </div>

    @include('layouts.global.foot-js')
    </body>
</html>
