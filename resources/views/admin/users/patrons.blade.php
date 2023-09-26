@extends('admin.layouts.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Меценати</h1>
                    </div>
                    {{--<div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>--}}
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
                    @if(!empty($users))
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th style="width: 10px">ID</th>
                                <th>Ім'я</th>
                                <th>E-mail</th>
                                <th>Номер телефону</th>
                                <th style="width: 120px">Улюбленці</th>
                                <th style="width: 100px">Дії</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Ssss</td>
                                <td>sss@sss.com</td>
                                <td>+380987654321</td>
                                <td>12,55,88,77</td>
                                <th class="text-center">
                                    <i class="fas fa-pencil-alt"></i> |
                                    <i class="fas fa-user-lock"></i> |
                                    <i class="fas fa-user-slash"></i>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    @else
                        <div>Користувачів поки немає...</div>
                    @endif
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
