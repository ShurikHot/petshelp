@extends('front.layouts.layout')

@section('content')

<section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
                    <?php
                    if (isset($pet->photo)) {
                        $path = asset('/uploads/') . '/' . $pet->photo;
                    } else {
                        $path = asset('/uploads/') . '/' . 'images/nophoto.jpg';
                    }
                    ?>
                    <a href="{{$path}}" class="image-popup"><img class="img-fluid border-radius-15" src="{{$path}}" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <img src="{{\App\Models\Pet::speciesPet($pet->species)}}" alt="" style="width: 30px; height: auto">
                    <span>  @if($pet->adopted) Тварина вже має дім @endif</span>
    				<h3>{{$pet->name}} <small style="color: grey">(id {{$pet->id}})</small></h3>
                    <table class="table table-striped table-warning">
                        <tbody>
                            <tr>
                                <td>Стать</td>
                                <td>{{$pet->sex}}</td>
                            </tr>
                            <tr>
                                <td>Вік</td>
                                <td>{{\App\Models\Pet::agePet($pet->age_month)}}</td>
                            </tr>
                            <tr>
                                <td>Порода</td>
                                <td>@if (!$pet->breed) Без породи @else {{$pet->breed}} @endif</td>
                            </tr>
                            <tr>
                                <td>Колір (окрас)</td>
                                <td>@if (!$pet->color) Не визначений @else {{$pet->color}} @endif</td>
                            </tr>
                            <tr>
                                <td>Вакцинована?</td>
                                <td>@if (!$pet->vaccination) Ні @else Так @endif</td>
                            </tr>
                            <tr>
                                <td>Стерилізована?</td>
                                <td>@if (!$pet->sterilization) Ні @else Так @endif</td>
                            </tr>
                            @if($pet->special)
                                <tr>
                                    <td>Особлива тварина?</td>
                                    <td>Так</td>
                                </tr>
                            @endif
                            <tr>
                                <td>Місто</td>
                                <td>м.{{$pet->city}}</td>
                            </tr>
                            <tr>
                                <td>Номер куратора</td>
                                <td>{{$pet->phone_number}}</td>
                            </tr>
                        </tbody>
                    </table>



                    <div class="text-center">
                        <div class="btn btn-black py-3 px-5 btn-favorite mb-3" data-id="{{$pet->id}}">@if($is_fav) Ваш улюбленець! @else Додати до улюблених @endif</div>
                        @if($is_fav)
                            <span class="btn ml-2 rem-favorite border-radius-15 border" data-id="{{$pet->id}}">Видалити з 💙?</span>
                        @endif
                    </div>

                    <div class="text-center">
                        <div class="btn btn-warning py-3 px-5 give-home">Взяти додому!</div>
                        <div class="btn btn-success py-3 px-5">Підтримати ₴,$</div>
                    </div>
    			</div>
    		</div>

            <div class="modal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <p>За детальною інформацією щодо опікунства </p>
                            <p>над твариною зв'яжіть, будь ласка,</p>
                            <p> з закріпленним куратором за номером</p>
                            <p>{{$pet->phone_number}}</p>
                        </div>
                    </div>
                </div>
            </div>

            @if($pet->story)
            <div class="row d-flex justify-content-around">
                <div class="col-10 border-radius-15 mx-3 mb-4" style="background: #8B4D93; color: white">
                    <div class="text-center">Коротка історія тварини</div>
                        <p style="margin-bottom: 0;">
                            {{$pet->story}}
                        </p>
                </div>
            </div>
            @endif

            <div class="row d-flex justify-content-around">
                @if($pet->peculiarities)
                <div class="col-5 border-radius-15 mx-3" style="background: #DF4E0F; color: white">
                    <div class="text-center">Особливості поведінки тварини</div>
                    <p style="margin-bottom: 0;">
                        {{$pet->peculiarities}}
                    </p>
                </div>
                @endif
                @if($pet->wishes)
                <div class="col-5 border-radius-15 mx-3" style="background: #7ED2F7; color: white">
                    <div class="text-center">Побажання щодо прилаштування</div>
                    <p style="margin-bottom: 0;">
                        {{$pet->wishes}}
                    </p>
                </div>
                @endif
            </div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Ще варіанти...</span>
            <h2 class="mb-4">Друзі цієї тварини</h2>
            <p> Phasellus  eros faucibus tincidunt. Cras varius. Cras dapibus. Vestibulum suscipit nulla quis orci.</p>
          </div>
        </div>
    	</div>
    	<div class="container">
    		<div class="row">
                @if(count($related))
                    @foreach($related as $pet)
                        <div class="col-md-6 col-lg-3 ftco-animate">

                            @include('front.layouts.petcard')

                        </div>
                    @endforeach
                @endif
    		</div>
            <div class="text-right font-weight-bolder mr-3"><a href="{{route('pets', 'all')}}">Дивитися усіх...</a></div>
        </div>
    </section>

@endsection
