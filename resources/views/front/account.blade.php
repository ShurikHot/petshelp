@extends('front.layouts.layout')

@section('content')

    @if(\Illuminate\Support\Facades\Auth::check())
        <form action="{{route('users.update', $user->id)}}" method="post">
            @csrf
            @method('put')
            <section class="ftco-section ftco-degree-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 ftco-animate">
                            <h2 class="mb-3">Ваші рєестраційні данні</h2>
                            <div class="col-sm-8 offset-2" bis_skin_checked="1">
                                <div class="form-group" bis_skin_checked="1">
                                    <label for="name">Ім'я*</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Ім'я користувача" value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="col-sm-8 offset-2" bis_skin_checked="1">
                                <div class="form-group" bis_skin_checked="1">
                                    <label for="email">E-mail*</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Е-mail користувача" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="col-sm-8 offset-2" bis_skin_checked="1">
                                <div class="form-group" bis_skin_checked="1">
                                    <label for="phone_number">Номер телефону</label>
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" placeholder="Номер телефону користувача" value="{{$user->phone_number}}">
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" type="submit">Оновити данні</button>
                            </div>
                        </div> <!-- .col-md-8 -->

                        <div class="col-lg-4 sidebar ftco-animate">
                            <div class="sidebar-box ftco-animate">
                                <h3 class="heading">Особистий кабінет</h3>
                                <ul class="categories">
                                    <li><a href="#">Профіль</a></li>
                                    <li><a href="{{route('account', 'favorite')}}">Улюбленці <span>({{count($user->pets)}})</span></a></li>
                                    <li><a href="#">Щось... <span>(37)</span></a></li>
                                    <li><a href="#">Щось 2... <span>(42)</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section> <!-- .section -->
        </form>
    @else
        <br><br><br>
        <div class="text-center">
            <p><a href="{{route('login.create')}}">Увійдіть</a>, будь ласка, до свого облікового запису або <a href="{{route('register.create')}}">зареєструйтеся</a></p>
        </div>
        <br><br>
    @endif
@endsection
@section('title', $cust_title ?? '')
