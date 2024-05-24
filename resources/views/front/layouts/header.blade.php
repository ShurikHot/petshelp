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
                        <span class="text"><?= strtolower(config('mail.from.address')) ?></span>
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
    <div class="container logo-img">
        <img src="{{asset('assets/front/images/ph-logo3.png')}}" alt="">
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
                        <a class="dropdown-item" href="{{route('guardianship')}}">Опікунство</a>
                        <a class="dropdown-item" href="{{route('volunteer')}}">Волонтерство</a>
                    </div>
                </li>
                <li class="nav-item"><a href="{{route('about')}}" class="nav-link">Про нас</a></li>
                <li class="nav-item"><a href="{{route('partners')}}" class="nav-link">Партнери</a></li>
                <li class="nav-item"><a href="{{route('contacts')}}" class="nav-link">Контакти</a></li>
                @if(Route::currentRouteName() !== 'login.create' && Route::currentRouteName() !== 'register.create')
                    <li class="nav-item"><a href="{{route('account', 'profile')}}" class="nav-link account-icon"><img src="{{asset('assets/front/images/user_b.png')}}" alt=""></a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
