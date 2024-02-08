@extends('front.layouts.layout')

@section('content')

    <section id="home-section" class="hero">
        <div class="home-slider owl-carousel">
            @if(isset($sliders))
                @foreach($sliders as $slider)
                    <div class="slider-item" style="background-image: url({{asset('uploads/' . $slider->photo)}});">
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                                <div class="col-md-12 ftco-animate text-center">
                                    <h1 class="mb-2">{{$slider->title}}</h1>
                                    <h2 class="subheading mb-4">{{$slider->tagline}}</h2>
                                    <p><a href="{{route('pets', 'all')}}" class="btn btn-primary">Вперед!</a></p>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                {{--якщо для усіх слайдів виставлений статус НЕАКТИВНИЙ, тоді будуть використовуватися 2 резервні слайда--}}
                <div class="slider-item" style="background-image: url({{asset('assets/front/images/frontpage-02.jpg')}});">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                            <div class="col-md-12 ftco-animate text-center">
                                <h1 class="mb-2">Безліч друзів чекають на тебе...</h1>
                                <h2 class="subheading mb-4">Дайте лапкам шанс на щастя!</h2>
                                <p><a href="{{route('pets', 'all')}}" class="btn btn-primary">Вперед!</a></p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="slider-item" style="background-image: url({{asset('assets/front/images/frontpage-01.jpg')}});">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                            <div class="col-sm-12 ftco-animate text-center">
                                <h1 class="mb-2">Кожна тваринка чекає свою людину!</h1>
                                <h2 class="subheading mb-4">Пухнасте серце віддячить зповна!</h2>
                                <p><a href="{{route('pets', 'all')}}" class="btn btn-primary">Вперед!</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row no-gutters ftco-services">
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-shipped"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Послуга перевезення</h3>
                            <span>Україна/Європа</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon image-prod bg-color-2 d-flex justify-content-center align-items-center mb-2">
                            <img src="{{asset('assets/front/images/icon-pets-w.png')}}" alt="">
{{--                            <span class="flaticon-pet"></span>--}}
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Знайшли дім</h3>
                            <span>{{$already}} {{\App\Models\Pet::plural(['хвостик', 'хвостика', 'хвостиків'], $already)}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon index-icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                            <img src="{{asset('assets/front/images/icon-pets-love-w.png')}}" alt="">
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Внесків від меценатів</h3>
                            <span>4321 платежів</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-customer-service"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Консультації</h3>
                            <span>Допоможемо!</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-category ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 order-md-last align-items-stretch d-flex">
                            <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url({{asset('assets/front/images/category-main.jpg')}});">
                                <div class="text text-center">
                                    <h2>Ваші чотирилапі друзі</h2>
                                    <p>чекають на Вас!</p>
                                    <p><a href="{{route('pets', 'all')}}" class="btn btn-primary">Вперед!</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('pets', 'dog')}}">
                                <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end border-radius-15" style="background-image: url({{asset('assets/front/images/pets02.jpg')}});">
                                    <div class="text px-3 py-1 border-radius-15" >
                                        <h2 class="mb-0">Песики</h2>
                                    </div>
                                </div>
                            </a>
                            <a href="{{route('pets', 'rodent')}}">
                                <div class="category-wrap ftco-animate img d-flex align-items-end border-radius-15" style="background-image: url({{asset('assets/front/images/pets05.jpg')}});">
                                    <div class="text px-3 py-1 border-radius-15">
                                        <h2 class="mb-0">Гризуни</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <a href="{{route('pets', 'cat')}}">
                        <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end border-radius-15" style="background-image: url({{asset('assets/front/images/pets04.jpg')}});">
                            <div class="text px-3 py-1 border-radius-15">
                                <h2 class="mb-0">Котики</h2>
                            </div>
                        </div>
                    </a>
                    <a href="{{route('pets', 'bird')}}">
                        <div class="category-wrap ftco-animate img d-flex align-items-end border-radius-15" style="background-image: url({{asset('assets/front/images/pets06.jpg')}});">
                            <div class="text px-3 py-1 border-radius-15">
                                <h2 class="mb-0">Пташки</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Популярні тваринки</span>
                    <h2 class="mb-4">Наші зірки!</h2>
                    <p>Серед хвостиків також є ті, хто знає, що означає "бути відомим"!</p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @if(isset($frontPets))
                    @foreach($frontPets as $pet)
                        <div class="col-md-6 col-lg-3 ftco-animate">

                            @include('front.layouts.petcard')

                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <section>
        @if(isset($randomPet))
            @foreach($randomPet as $pet)
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-md-4 offset-1 heading-section ftco-animate deal-of-the-day ftco-animate">
                            <?php
                            if (isset($pet->photo)) {
                                $path = asset('/uploads/') . '/' . $pet->photo;
                            } else {
                                $path = asset('/uploads/') . '/' . 'images/nophoto.jpg';
                            }
                            ?>
                        <a href="{{route('single', $pet->id)}}" class="img-prod"><img class="img-fluid border-radius-15" src="{{$path}}" alt="Colorlib Template"></a>
                    </div>
                    <div class="col-md-7 heading-section ftco-animate deal-of-the-day ftco-animate">
                        <span class="subheading">Можливо, сьогодні я знайду дім?..</span>
                        <h2 class="mb-4">Привіт, я йду з тобою?</h2>
                        <p>Саме такі випадковості і створюють непевершені моменти в житті!</p>
                        <h3><a href="{{route('single', $pet->id)}}">{{$pet->name}}</a></h3>
                        <span class="price">вік {{\App\Models\Pet::agePet($pet->age_month)}} (куратор тел. {{$pet->phone_number}})</span>
                        <br>
                        <span class="price">м. {{$pet->city}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </section>

    <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row justify-content-center mb-2 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Про нас</span>
                    <h2 class="mb-4">Наша команда</h2>
                    <p>Люди завдяки яким пухнастики знаходять дім</p>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url({{asset('assets/front/images/person_1.jpg')}})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                      <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Marketing Manager</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url({{asset('assets/front/images/person_2.jpg')}})">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Interface Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url({{asset('assets/front/images/person_3.jpg')}})">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">UI Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url({{asset('assets/front/images/person_1.jpg')}})">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Web Developer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url({{asset('assets/front/images/person_1.jpg')}})">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">System Analyst</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr>

    <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row justify-content-center mb-2 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Партнери</span>
                    <h2 class="mb-4">Наша підтримка</h2>
                    <p>Наші меценати, спонсори і опора</p>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-partners owl-carousel">
                        <?php
                        $directory = public_path() . '/assets/front/images/partners/';
                        $files = scandir($directory);
                        $files = array_diff($files, ['.', '..']);
                        foreach ($files as $file) :
                            ?>
                            <div class="item">
                                <img src="{{asset('/assets/front/images/partners/' . $file)}}" alt="">
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
