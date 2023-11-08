<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{config('app.name')}}</title>
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
<div class="py-1 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <span class="text">+380987654321</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                        <span class="text">info@<?= strtolower(config('app.name')) ?>.com.ua</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text">Ресурс для допомоги безпритульним тваринам</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <img src="{{asset('assets/front/images/ph-logo3.png')}}" alt="" style="width: 50px; height: auto; margin-right: 10px; margin-bottom: 5px;">
        <a class="navbar-brand" href="{{route('home')}}">{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{route('home')}}" class="nav-link">Головна</a></li>
                <li class="nav-item active"><a href="{{route('pets', 'all')}}" class="nav-link">Знайти друга</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Допомога</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="#">Опікунство</a>
                        <a class="dropdown-item" href="#">Волонтерство</a>
                    </div>
                </li>
                <li class="nav-item"><a href="#" class="nav-link">Про нас</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Партнери</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Контакти</a></li>
                <li class="nav-item"><a href="{{route('account', 'profile')}}" class="nav-link"><img src="{{asset('assets/front/images/user_b.png')}}" alt="" style="width: 12px; height: auto"></a></li>


            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

@yield('content')

{{--<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
            <div class="col-md-6">
                <h2 style="font-size: 22px;" class="mb-0">Підпишіться на нашу розсилку</h2>
                <span>Отримуйте інформацію про наші справи та події, звіти нашої роботи та плани на майбутнє</span>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                        <input type="text" class="form-control" placeholder="Введіть email адресу">
                        <input type="submit" value="Підписатися" class="submit px-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>--}}

<footer class="ftco-footer ftco-section" style="padding-bottom: 10px!important;">
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
                <div class="ftco-footer-widget mb-4">
{{--                    <h2 class="ftco-heading-2">{{config('app.name')}}</h2>--}}
                    <img src="{{asset('assets/front/images/ph-logo2.png')}}" alt="" style="width: 100%; height: auto">
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
{{--                    <h2 class="ftco-heading-2">Menu</h2>--}}
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Знайти друга</a></li>
                        <li><a href="#" class="py-2 d-block">Опікунство</a></li>
                        <li><a href="#" class="py-2 d-block">Волонтерство</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
{{--                    <h2 class="ftco-heading-2">Help</h2>--}}
                    <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                        <li><a href="#" class="py-2 d-block">Про нас</a></li>
                        <li><a href="#" class="py-2 d-block">Партнери</a></li>
                        <li><a href="#" class="py-2 d-block">Контакти</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Залишились питання?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">{{__('просп.Грушевського, 1, м.Кам\'янець-Подільський, Хмельницька обл., Україна')}}</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+380987654321</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@<?= strtolower(config('app.name')) ?>.com.ua</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>
                    All rights reserved &copy;<script>document.write(new Date().getFullYear());</script> <?= strtoupper(config('app.name') . '.com.ua') ?>
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
{{--<script src="{{asset('assets/front/js/google-map.js')}}"></script>--}}
<script src="{{asset('assets/front/js/main.js')}}"></script>

</body>
</html>
