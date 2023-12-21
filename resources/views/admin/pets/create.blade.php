@extends('admin.layouts.layout')

@section('content')
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
            <form action="{{route('pets.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row" bis_skin_checked="1">
                    <div class="col-sm-3" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label for="name">Ім'я (кличка)*</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Введідь ім'я (кличку) тварини" value="{{old('name')}}">
                        </div>
                    </div>
                    <div class="col-sm-3" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label for="species">Вид тварини*</label>
                            <select class="form-control @error('species') is-invalid @enderror" id="species" name="species">
{{--                                <option selected disabled>Оберіть вид</option>--}}
                                <option @if(old('species') == "Собака") selected @endif>Собака</option>
                                <option @if(old('species') == "Кіт") selected @endif>Кіт</option>
                                <option @if(old('species') == "Гризун") selected @endif>Гризун</option>
                                <option @if(old('species') == "Пташка") selected @endif>Пташка</option>
                                <option @if(old('species') == "Інше") selected @endif>Інше</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label for="species">Стать тварини*</label>
                            <select class="form-control @error('sex') is-invalid @enderror" id="sex" name="sex">
{{--                                <option selected disabled>Оберіть стать</option>--}}
                                <option @if(old('sex') == "Самець") selected @endif>Самець</option>
                                <option @if(old('sex') == "Самиця") selected @endif>Самиця</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label for="age_month">Вік (в місяцях)*</label>
                            <input type="number" class="form-control @error('age_month') is-invalid @enderror" id="age_month" name="age_month" placeholder="Введідь вік тварини (в місяцях)" value="{{old('age_month')}}">
                        </div>
                    </div>
                </div>

                <div class="row" bis_skin_checked="1">
                    <div class="col-sm-6" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label for="breed">Порода</label>
                            <input type="text" class="form-control @error('breed') is-invalid @enderror" id="breed" name="breed" placeholder="Введідь породу тварини (якщо без - порожнє поле)" value="{{old('breed')}}">
                        </div>
                    </div>
                    <div class="col-sm-6" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label for="color">Колір (окрас)</label>
                            <input type="text" class="form-control @error('color') is-invalid @enderror" id="color" name="color" value="{{old('color')}}" placeholder="Введідь колір (окрас) тварини" >
                        </div>
                    </div>
                </div>

                <div class="row" bis_skin_checked="1">
                    <div class="col-sm-3" bis_skin_checked="1">
                        <div class="form-check ml-2 mr-5 mb-2" bis_skin_checked="1">
                            <input class="form-check-input @error('vaccination') is-invalid @enderror" type="checkbox"
                                   id="vaccination" name="vaccination" @if(old('vaccination')) checked @endif>
                            <label for="vaccination" class="form-check-label">Вакцинована?</label>
                        </div>
                    </div>
                    <div class="col-sm-3" bis_skin_checked="1">
                        <div class="form-check" bis_skin_checked="1">
                            <input class="form-check-input @error('sterilization') is-invalid @enderror" type="checkbox"
                                   id="sterilization" name="sterilization" @if(old('sterilization')) checked @endif>
                            <label for="sterilization" class="form-check-label">Стерилізована?</label>
                        </div>
                    </div>
                    <div class="col-sm-3" bis_skin_checked="1">
                        <div class="form-check" bis_skin_checked="1">
                            <input class="form-check-input @error('special') is-invalid @enderror" type="checkbox"
                                   id="special" name="special" @if(old('special')) checked @endif>
                            <label for="special" class="form-check-label">Особлива?</label>
                        </div>
                    </div>
                    <div class="col-sm-3" bis_skin_checked="1">
                        <div class="form-check" bis_skin_checked="1">
                            <input class="form-check-input @error('guardianship') is-invalid @enderror" type="checkbox"
                                   id="guardianship" name="guardianship" @if(old('guardianship')) checked @endif>
                            <label for="guardianship" class="form-check-label">Під опікою?</label>
                        </div>
                    </div>
                </div>

                <div class="row" bis_skin_checked="1">
                    <div class="col-sm-6" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label for="city">Місто, в якому знаходиться тварина*</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" placeholder="Введідь місто, в якому знаходиться тварина" value="{{old('city')}}">
                        </div>
                    </div>
                    <div class="col-sm-6" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label for="phone_number">Номер телефону куратора*</label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" maxlength="13" placeholder="Введідь номер телефону куратора (+380ХХХХХХХХХ)" value="{{old('phone_number')}}">
                        </div>
                    </div>
                </div>

                <div class="row" bis_skin_checked="1">
                    <div class="col-sm-6" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label>Коротка історія тварини</label>
                            <textarea class="form-control @error('story') is-invalid @enderror" rows="3" placeholder="Коротка історія тварини ..." id="story" name="story">{{old('story')}}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label>Особливості поведінки тварини</label>
                            <textarea class="form-control @error('peculiarities') is-invalid @enderror" rows="3" placeholder="Особливості поведінки тварини ..." id="peculiarities" name="peculiarities">{{old('peculiarities')}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row" bis_skin_checked="1">
                    <div class="col-sm-6" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label>Побажання щодо прилаштування</label>
                            <textarea class="form-control @error('wishes') is-invalid @enderror" rows="3" placeholder="Побажання щодо прилаштування" id="wishes" name="wishes">{{old('wishes')}}</textarea>
                        </div>
                    </div>
                    {{--<div class="col-sm-6" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label>Меценати тварини</label>
                            <textarea class="form-control" rows="2" placeholder="Меценати тварини" id="patrons"></textarea>
                        </div>
                    </div>--}}

                    <div class="form-group col-sm-6" bis_skin_checked="1">
                        <div class="row">
                            <div class="col-6">
                                <label for="photo">Фото тварини</label>
                                <div class="input-group" bis_skin_checked="1">
                                    <div class="custom-file" bis_skin_checked="1">
                                        <label class="label custom-file-upload btn btn-info mt-2" data-toggle="tooltip" title="Додати фото...">
                                            <input type="file" class="d-none" id="photo" name="photo" accept="image/*">
                                            <input type="hidden" class="d-none" id="base64image" name="base64image" accept="image/*">
                                            Додати/змінити фото
                                        </label>
                                    </div>
                                </div>
                                <div class="form-check mt-4" bis_skin_checked="1">
                                    <input class="form-check-input @error('adopted') is-invalid @enderror" type="checkbox" id="adopted" name="adopted" @if(old('adopted')) checked @endif>
                                    <label for="adopted" class="form-check-label text-red text-bold">Тварина вже має дім?</label>
                                </div>
                            </div>
                            <div class="col-6 text-center pet-avatar">
                                    <?php
                                    $path = 'images/nophoto.jpg';
                                    ?>
                                <img src="{{asset('/uploads/') . '/' .  $path}}" alt="" id="avatar" class="right">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Додати тварину</button>
            </form>
        </div>

        <div class="modal fade" id="cropAvatarmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Обрізати фото</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="img-container">
                            <img id="uploadedAvatar" src="https://avatars0.githubusercontent.com/u/3456749">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Відміна</button>
                        <button type="button" class="btn btn-primary" id="crop">Обрізати</button>
                    </div>
                </div>
            </div>
        </div>

    @section('title', $cust_title ?? '')
@endsection
