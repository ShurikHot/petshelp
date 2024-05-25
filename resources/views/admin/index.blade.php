@extends('admin.layouts.layout')

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Blank Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-body">
{{--                    Головна сторінка адмінки--}}
                    <div class="weather-widget"></div>

                    {{--<div class="spotify">
                        Spotify API
                        <input type="text" id="artist" name="artist" placeholder="Введіть ID артиста">
                        <button type="submit" id="find-button">Знайти</button>
                        <br>
                        наприклад, 0k17h0D3J5VfsdmQ1iZtE9
                        <div class="artist-info"></div>
                    </div>--}}

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
@endsection
