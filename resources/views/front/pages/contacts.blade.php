@extends('front.layouts.layout')

@section('content')

<section class="ftco-section">
    <div class="container">
        <h3 class="text-center">Контакти</h3>
        <br>
        <p class="single-page">
            просп.Грушевського, 1, м.Кам'янець-Подільський, Хмельницька обл., Україна
        </p>
        <p class="single-page">
            +380987654321
        </p>
        <p class="single-page">
            info@<?= strtolower(config('app.name')) ?>.com.ua
        </p>
    </div>
</section>

@endsection
@section('title', $cust_title ?? '')
