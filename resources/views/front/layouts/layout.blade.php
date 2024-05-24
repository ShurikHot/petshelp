@php
    use Illuminate\Support\Facades\Cache;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name') }}@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/front/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">

</head>
<body class="goto-here">

@php
    $header = Cache::remember('header', 18000, function () {
        return view('front.layouts.header')->render();
    });
@endphp
{!! $header !!}

@yield('content')

@php
    $subscribe = Cache::remember('subscribe', 18000, function () {
        return view('front.layouts.subscribe')->render();
    });
@endphp
{!! $subscribe !!}

@php
    $footer = Cache::remember('footer', 18000, function () {
        return view('front.layouts.footer')->render();
    });
@endphp
{!! $footer !!}
