@extends('front.layouts.layout')

@section('content')

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 mb-5 text-center">
                    <ul class="product-category">
                        <li><a href="{{route('pets', 'all')}}" class="@if ($species == 'all' || !$species) active @endif">Усі</a></li>
                        <li><a href="{{route('pets', 'dog')}}" class="@if ($species == 'dog') active @endif">Песики</a></li>
                        <li><a href="{{route('pets', 'cat')}}" class="@if ($species == 'cat') active @endif">Котики</a></li>
                        <li><a href="{{route('pets', 'rodent')}}" class="@if ($species == 'rodent') active @endif">Гризуни</a></li>
                        <li><a href="{{route('pets', 'bird')}}" class="@if ($species == 'bird') active @endif">Пташки</a></li>
                    </ul>
                </div>
            </div>


            <div class="row">
                @if(count($pets))
                    @foreach($pets as $pet)
                        <div class="col-md-6 col-lg-3 ftco-animate">

                            @include('front.layouts.petcard')

                        </div>
                    @endforeach
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
