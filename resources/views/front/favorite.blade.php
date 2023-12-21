@extends('front.layouts.layout')

@section('content')

    @if(\Illuminate\Support\Facades\Auth::check())
        <section class="ftco-section ftco-degree-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ftco-animate">
                        <h2 class="mb-3">Ваші улюбленці 💙</h2>
                        <div class="cart-list">
                            @if($user->pets)
                                <table class="table">
                                    <tbody>
                                        @foreach($user->pets as $pet)
                                            <tr class="text-center hide-id-{{$pet->id}}">
                                                <td class="product-remove"><a href="#"><span class="ion-ios-close rem-favorite" data-acc="1" data-id="{{$pet->id}}"></span></a></td>
                                                    <?php
                                                    if (isset($pet->photo)) {
                                                        $path = asset('/uploads/') . '/' . $pet->photo;
                                                    } else {
                                                        $path = asset('/uploads/') . '/' . 'images/nophoto.jpg';
                                                    }
                                                    ?>
                                                <td class="image-prod max-width-150">
                                                    <div class="img">
                                                        <a href="{{route('single', $pet->id)}}">
                                                            <img src="{{$path}}" alt="">
                                                        </a>
                                                    </div>
                                                </td>

                                                <td class="product-name">
                                                    <img src="{{\App\Models\Pet::speciesPet($pet->species)}}" alt="">
                                                    <h5><a href="{{route('single', $pet->id)}}">{{$pet->name}}</a></h5>
                                                </td>

                                                <td class="price">м. {{$pet->city}}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @else
                                <div class="">У вас поки немає улюбленців... <a href="{{route('pets', 'all')}}">Знайти друга?</a></div>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4 sidebar ftco-animate">
                        <div class="sidebar-box ftco-animate">
                            <h3 class="heading">Особистий кабінет</h3>
                            <ul class="categories">
                                <li><a href="{{route('account', 'profile')}}">Профіль</a></li>
                                <li><a href="#">Улюбленці <span>({{count($user->pets)}})</span></a></li>
                                <li><a href="#">Щось... <span>(37)</span></a></li>
                                <li><a href="#">Щось 2... <span>(42)</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!-- .section -->
    @else
        <br><br><br>
        <div class="text-center">
            <p><a href="{{route('login.create')}}">Увійдіть</a>, будь ласка, до свого облікового запису або <a href="{{route('register.create')}}">зареєструйтеся</a></p>
        </div>
        <br><br>
    @endif
@endsection
@section('title', $cust_title ?? '')
