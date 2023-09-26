@extends('admin.layouts.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Усі тварини</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Title</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body" bis_skin_checked="1">

                    <a href="{{route('pets.create')}}"><button class="btn btn-primary mb-2">Додати тварину</button></a>

                    @if(!empty($pets))
{{--                    @if(count($pets))--}}
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th style="width: 10px">ID</th>
                                <th>Ім'я</th>
                                <th>E-mail</th>
                                <th>Номер телефону</th>
                                <th style="width: 120px">Улюбленці</th>
                                <th style="width: 140px">Дії</th>
                            </tr>
                            </thead>

                            <tbody>
                            {{--@foreach($pets as $pet)
                                <tr>
                                    <td class="text-center">{{$pet->id}}</td>
                                    <td>{{$pet->name}}</td>
                                    <td>{{$pet->email}}</td>
                                    <td>{{$pet->phone_number}}</td>
                                    <td>{{$pet->favorites}}</td>
                                    <th class="justify-content-center" style="display: flex">
                                        <a href="{{route('users.edit', $pet->id)}}"><button><i class="fas fa-pencil-alt"></i></button></a>
                                        <form action="{{route('users.lock', $pet->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button><i class="fas fa-user-lock"></i></button>
                                        </form>
                                        <form action="{{route('users.destroy', $pet->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button><i class="fas fa-user-slash"></i></button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach--}}
                            </tbody>
                        </table>
                    @else
                        <div>Тварин поки немає...</div>
                    @endif
                </div>
                <!-- /.card-body -->
                <div class="card-footer mb-2">
{{--                    {{$pets->links()}}--}}
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
