@extends('front.layouts.layout')

@section('content')

    <section class="ftco-section">
        <div class="container mb-5">
            <form action="{{route('pets', 'all')}}" class="search-form" method="get">
                <div class="form-group">
                    <a href="{{route('pets', 'all')}}"><span class="icon ion-ios-search"></span></a>
                    <input type="text" class="form-control" name="search" id="search" placeholder="Пошук за містом перебування тварини, породою, видом або кличкою...">
                </div>
            </form>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 text-center">
                    <ul class="product-category">
                        <li><a href="{{route('pets', 'all')}}" class="@if ($species == 'all' || !$species) active @endif">Усі</a></li>
                        <li><a href="{{route('pets', 'dog')}}" class="@if ($species == 'dog') active @endif">Песики</a></li>
                        <li><a href="{{route('pets', 'cat')}}" class="@if ($species == 'cat') active @endif">Котики</a></li>
                        <li><a href="{{route('pets', 'rodent')}}" class="@if ($species == 'rodent') active @endif">Гризуни</a></li>
                        <li><a href="{{route('pets', 'bird')}}" class="@if ($species == 'bird') active @endif">Пташки</a></li>
                    </ul>
                </div>
            </div>

            <div class="container text-center mb-4">
                <a href="#" id="filter-link">Показати додаткові фільтри</a>
            </div>

            <div class="container hidden" id="filter-block">
                <form method="get">
                    <div class="row text-center">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sex" class="font-weight-bold">Стать тварини:</label><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="sex_male" name="sex[]" value="Самець"
                                        {{ (request()->has('sex') && request()->input('sex')[0] === 'Самець') ? 'checked' : ''}}>
                                    <label class="form-check-label" for="sex_male">Самець</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="sex_female" name="sex[]" value="Самиця"
                                        {{ (request()->has('sex') && request()->input('sex')[0] === 'Самиця') ? 'checked' : ''}}>
                                    <label class="form-check-label" for="sex_female">Самиця</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Стерилізація / Вакцинація:</label><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sterilization" name="sterilization" value="1" {{ request()->has('sterilization') ? 'checked' : ''}}>
                                    <label class="form-check-label" for="sterilization">Стерилізована</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="vaccination" name="vaccination" value="1" {{ request()->has('vaccination') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="vaccination">Вакцинована</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Додатково:</label><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="special" name="special" value="1" {{ request()->has('special') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="special">Особлива</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="guardianship" name="guardianship" value="1" {{ request()->has('guardianship') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="guardianship">Під опікою</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center mb-5">
                            <button type="submit" class="btn btn-primary">Фільтрувати</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                @if(count($pets))
                    @foreach($pets as $pet)
                        <div class="col-md-6 col-lg-3 ftco-animate">

                            @include('front.layouts.petcard')

                        </div>
                    @endforeach
                @elseif((isset($_GET['search']) || \App\Http\Controllers\PetController::getFilters()) && !count($pets))
                    <div class="col text-center">
                        <h5>За вашим запитом не знайдено жодної тварини...</h5>
                    </div>
                @else
                    <div class="col text-center">
                        <h5>Ура! Усі тварини даного роду знайшли дім!</h5>
                    </div>
                @endif
            </div>

            <div class="row mt-3">
                <div class="col text-center">
                    <div class="block-27">
                        {{$pets->links('vendor.pagination.bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('title', $cust_title ?? '')
