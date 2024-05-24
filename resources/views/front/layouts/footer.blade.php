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
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><?= strtolower(config('mail.from.address')) ?></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>
                    All rights reserved &copy;<?= date('Y') . ' ' . strtoupper(config('mail.from.address')) ?>
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
