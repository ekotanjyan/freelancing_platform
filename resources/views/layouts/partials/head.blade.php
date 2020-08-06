@section('head')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="{{ env('APP_DESCRIPTION') }}">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="{{ asset(Helper::getSiteFavicon()) }}" type="image/x-icon">
@endsection

@section('headcss')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type='text/css'>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/normalize-min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/fontawesome-all.min.css') }}" rel="stylesheet">
@endsection