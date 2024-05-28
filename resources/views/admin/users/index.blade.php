@extends('admin.layouts.layout')

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Усі користувачі</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-body" bis_skin_checked="1">
                    @if(count($users))
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th class="w10">ID</th>
                                <th>Ім'я</th>
                                <th>E-mail</th>
                                <th>Номер телефону</th>
                                <th class="w120">Улюбленці</th>
                                <th class="w140">Дії</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="text-center">{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td>
                                    <?php
                                        $favorites = $user->pets->pluck('id')->all();
                                        foreach ($favorites as $k => $v) :
                                            ?>
                                                <a href="{{route('pets.edit', $v)}}">{{$v . (count($favorites) !== $k+1 ? ',' : '')}}</a>
                                            <?php
                                        endforeach;
                                    ?>
                                    </td>
                                    <th class="justify-content-center d-flex">
                                        <a href="{{route('users.edit', $user->id)}}">
                                            <button><i class="fas fa-pencil-alt"></i></button>
                                        </a>
                                        <a href="{{route('users.lock', $user->id)}}">
                                            <button><i class="fas fa-user-lock"></i></button>
                                        </a>

                                        <form action="{{route('users.destroy', $user->id)}}" method="post">
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
                        <div>Користувачів поки немає...</div>
                    @endif

                </div>
                <!-- /.card-body -->
                <div class="card-footer mb-2">
                    {{$users->links('vendor.pagination.bootstrap-5')}}
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    @section('title', $customTitle ?? '')
@endsection
