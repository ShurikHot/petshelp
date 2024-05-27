@extends('admin.layouts.layout')

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            @if(isset($species))
                                @if($species == 'dog')Усі собаки
                                @elseif($species == 'cat')Усі коти
                                @elseif($species == 'other')Усі інші тварини
                                @endif
                            @elseУсі тварини
                            @endif
                        </h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-body" bis_skin_checked="1">

                    <a href="{{route('pets.create')}}"><button class="btn btn-primary mb-2">Додати тварину</button></a>

                    @if(!empty($pets))
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th class="w10">ID</th>
                                <th>Ім'я (кличка)</th>
                                <th>Вид</th>
                                <th class="w90"><i class="fas fa-venus-mars"></i></th>
                                <th>Вік</th>
                                <th>Порода</th>
                                <th class="w90">Меценати</th>
                                <th><i class="fas fa-cut"></i></th>
                                <th><i class="fas fa-syringe"></i></th>
                                <th><i class="fas fa-camera"></i></th>
                                <th><i class="fas fa-house-user"></i></th>
                                <th class="w90">Дії</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($pets as $pet)
                                <tr>
                                    <td class="text-center">{{$pet->id}}</td>
                                    <td>{{$pet->name}}</td>
                                    <td>{{$pet->species}}</td>
                                    <td>{{$pet->genderTitle}}</td>
                                    <td>{{$pet->age_month}}</td>
                                    <td>{{$pet->breed}}</td>
                                    <td>{{$pet->patrons}}</td>
                                    <td class="text-center">@if ($pet->sterilization) <i class="fas fa-check"></i> @endif</td>
                                    <td class="text-center">@if ($pet->vaccination) <i class="fas fa-check"></i> @endif</td>
                                    <td class="text-center">@if ($pet->photo) <i class="fas fa-check"></i> @endif</td>
                                    <td class="text-center">@if ($pet->adopted) <i class="fas fa-check"></i> @endif</td>
                                    <th class="justify-content-center d-flex">
                                        <a href="{{route('pets.edit', $pet->id)}}"><button><i class="fas fa-pencil-alt"></i></button></a>
                                        <form action="{{route('pets.destroy', $pet->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Підтвердіть видалення')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div>Тварин поки немає...</div>
                    @endif
                </div>
                <!-- /.card-body -->
                <div class="card-footer mb-2">
                    {{$pets->links('vendor.pagination.bootstrap-5')}}
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->

    @section('title', $cust_title ?? '')
@endsection
