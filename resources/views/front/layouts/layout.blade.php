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

@include('front.layouts.header')

@yield('content')

<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
            <div class="col-md-6">
                <h2 style="font-size: 22px;" class="mb-0">Підпишіться на нашу розсилку</h2>
                <span>Отримуйте інформацію про наші справи та події, звіти нашої роботи та плани на майбутнє</span>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <form class="subscribe-form">
                    <div class="form-group d-flex">
                        @if(auth()->user())
                            <input type="text" class="form-control" placeholder="" value="{{auth()->user()->email ?? ''}}" disabled>
                            <input type="submit" id="subscribe" value="{{auth()->user()->subscribe ? 'Ви підписані!' : 'Підписатися'}}" class="submit px-3"
                                {{auth()->user()->subscribe ? 'disabled' : ''}}>
                        @else
                            <input type="text" class="form-control" id="subscribe" placeholder="Зареєструйтеся або авторизуйтеся для оформлення підписки" disabled>
                            <a href="{{route('register.create')}}" class="submit px-3 align-content-center">Реєстрація</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<footer class="ftco-footer ftco-section pbonly10">
    <div class="container">
        <div class="row">
            <div class="mouse">
                <a href="#" class="mouse-icon">
                    <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                </a>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 logo-footer">
                    <img src="{{asset('assets/front/images/ph-logo2.png')}}" alt="">
                    <div class="d-flex justify-content-center">
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <ul class="list-unstyled">
                        <li><a href="{{route('pets', 'all')}}" class="py-2 d-block">Знайти друга</a></li>
                        <li><a href="{{route('guardianship')}}" class="py-2 d-block">Опікунство</a></li>
                        <li><a href="{{route('volunteer')}}" class="py-2 d-block">Волонтерство</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                        <li><a href="{{route('about')}}" class="py-2 d-block">Про нас</a></li>
                        <li><a href="{{route('partners')}}" class="py-2 d-block">Партнери</a></li>
                        <li><a href="{{route('contacts')}}" class="py-2 d-block">Контакти</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Залишились питання?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">просп.Грушевського, 1, м.Кам'янець-Подільський, Хмельницька обл., Україна</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+380987654321</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><?= strtolower(env('MAIL_FROM_ADDRESS')) ?></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>
                    All rights reserved &copy;<?= date('Y') ?> <?= strtoupper(env('MAIL_FROM_ADDRESS') ?>) ?>
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<script src="{{asset('assets/front/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('assets/front/js/popper.min.js')}}"></script>
<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('assets/front/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/front/js/aos.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('assets/front/js/bootstrap-datepicker.j')}}s"></script>
<script src="{{asset('assets/front/js/scrollax.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{asset('assets/front/js/main.js')}}"></script>

</body>
</html>
