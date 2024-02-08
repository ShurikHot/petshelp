@extends('admin.layouts.layout')

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Редагування данних про користувача (ID {{$user->id}}):</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <div class="card-body" bis_skin_checked="1">
            <form action="{{route('users.update', $user->id)}}" method="post">
                @csrf
                @method('put')
                <div class="row" bis_skin_checked="1">
                    <div class="col-sm-1" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label for="id">ID</label>
                            <input type="text" class="form-control text-center" id="id" name="id" value="{{$user->id}}" disabled>
                        </div>
                    </div>
                    <div class="col-sm-3" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label for="name">Ім'я*</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Ім'я користувача" value="{{$user->name}}">
                        </div>
                    </div>
                    <div class="col-sm-3" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label for="email">E-mail*</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Е-mail користувача" value="{{$user->email}}">
                        </div>
                    </div>
                    <div class="col-sm-3" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label for="phone_number">Номер телефону</label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" placeholder="Номер телефону користувача" value="{{$user->phone_number}}">
                        </div>
                    </div>
                    <div class="col-sm-3" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label for="favorites">Улюбленці</label>
                            <input type="text" class="form-control @error('favorites') is-invalid @enderror" id="favorites" name="favorites" placeholder="Улюбленці користувача" value="{{$user->pets->pluck('id')->join(',')}}">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Оновити данні</button>
            </form>
        </div>

    @section('title', $cust_title ?? '')
@endsection
