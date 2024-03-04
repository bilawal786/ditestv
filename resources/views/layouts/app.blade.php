@php
    $setting = \App\Models\Settings::first();
@endphp
    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{$setting->title}}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="{{$setting->name}}">
    <meta name="author" content="{{$setting->name}}">

    <link rel="icon" href="{{asset('images/logo60.png')}}" type="image/x-icon">
    <!-- VENDOR CSS -->
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/color_skins.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    @stack('style')
    <style>
        .block-header {
            padding: 10px;
        }
        .error {
            width: 100%;
            margin-top: 0.25rem;
            font-size: 80%;
            color: #dc3545;
        }

        .logo-login {
            width: 150px;
            height: 80px;
            margin: 0 auto;
        }
        .navbar-fixed-top .navbar-btn .logo {
             width: 62px;
         }
    </style>
</head>
<body class="theme-orange">
<div id="app">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="{{asset('images/loding.png')}}" width="80" height="30" alt="Ditesta">
            </div>
            <p>Attendere Prego...</p>
        </div>
    </div>
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <div id="wrapper">
        @if(!request()->is('login'))
            @include('backend.includes.navigation')
            @include('backend.includes.leftsidebar')
        @endif
        @yield('content')
    </div>
</div>

<script src="{{asset('bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('js/toastr.js')}}"></script>
@stack('script')
<script>
    @if(Session::has('messege'))
    var type = "{{Session::get('alert-type','info')}}"
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('messege') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('messege') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('messege') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('messege') }}");
            break;
    }
    @endif
</script>
</body>
</html>
