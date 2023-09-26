@extends('admin.layouts.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Додати нову тварину:</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <div class="card-body" bis_skin_checked="1">
            <form action="{{route('pets.store')}}" method="post">
                @csrf
                <div class="row" bis_skin_checked="1">
                    <div class="col-sm-4" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label for="name">Ім'я (кличка)</label>
                            <input type="text" class="form-control" id="name" placeholder="Введідь ім'я (кличку) тварини">
                        </div>
                    </div>
                    <div class="col-sm-4" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label for="species">Виберіть вид тварини</label>
                            <select class="form-control" id="species">
                                <option>Собака</option>
                                <option>Кіт</option>
                                <option>Інше</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label for="age_month">Вік (в місяцях)</label>
                            <input type="number" class="form-control" id="age_month" placeholder="Введідь вік тварини (в місяцях)">
                        </div>
                    </div>
                </div>

                <div class="row" bis_skin_checked="1">
                    <div class="col-sm-6" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label for="breed">Порода</label>
                            <input type="text" class="form-control" id="breed" placeholder="Введідь породу тварини (якщо без - порожнє поле)">
                        </div>
                    </div>
                    <div class="col-sm-6" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label for="color">Колір (окрас)</label>
                            <input type="text" class="form-control" id="color" placeholder="Введідь колір (окрас) тварини">
                        </div>
                    </div>
                </div>

                <div class="row" bis_skin_checked="1">
                        <div class="form-check ml-2 mr-5 mb-2" bis_skin_checked="1">
                            <input class="form-check-input" type="checkbox" id="vaccination">
                            <label class="form-check-label">Вакцинована?</label>
                        </div>
                        <div class="form-check" bis_skin_checked="1">
                            <input class="form-check-input" type="checkbox" id="sterilization">
                            <label class="form-check-label">Стерилізована?</label>
                        </div>
                </div>

                <div class="row" bis_skin_checked="1">
                    <div class="col-sm-6" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label for="city">Місто, в якому знаходиться тварина</label>
                            <input type="text" class="form-control" id="city" placeholder="Введідь місто, в якому знаходиться тварина">
                        </div>
                    </div>
                    <div class="col-sm-6" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label for="phone_number">Номер телефону куратора</label>
                            <input type="text" class="form-control" id="phone_number" maxlength="13" placeholder="Введідь номер телефону куратора (+380ХХХХХХХХХ)">
                        </div>
                    </div>
                </div>

                <div class="row" bis_skin_checked="1">
                    <div class="col-sm-6" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label>Коротка історія тварини</label>
                            <textarea class="form-control" rows="3" placeholder="Коротка історія тварини ..." id="story"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label>Особливості поведінки тварини</label>
                            <textarea class="form-control" rows="3" placeholder="Особливості поведінки тварини ..." id="peculiarities"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row" bis_skin_checked="1">
                    <div class="col-sm-6" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label>Побажання щодо прилаштування</label>
                            <textarea class="form-control" rows="3" placeholder="Побажання щодо прилаштування" id="wishes"></textarea>
                        </div>
                    </div>
                    {{--<div class="col-sm-6" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label>Меценати тварини</label>
                            <textarea class="form-control" rows="2" placeholder="Меценати тварини" id="patrons"></textarea>
                        </div>
                    </div>--}}
                    <div class="form-group col-sm-6" bis_skin_checked="1">
                        <label for="photo">Фото тварини</label>
                        <div class="input-group" bis_skin_checked="1">
                            <div class="custom-file" bis_skin_checked="1">
                                <input type="file" class="custom-file-input" id="photo">
                                <label class="custom-file-label" for="photo">Файл</label>
                            </div>
                            <div class="input-group-append" bis_skin_checked="1">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        <div class="form-check mt-4" bis_skin_checked="1">
                            <input class="form-check-input" type="checkbox" id="adopted">
                            <label class="form-check-label text-red">Тварина вже має дім?</label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Додати тварину</button>
            </form>
        </div>
    </div>
@endsection
