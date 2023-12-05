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
                <div class="card-body">
{{--                    Головна сторінка адмінки--}}
                    <style>
                        .weather-widget, .spotify {
                            background-color: #fff;
                            border-radius: 10px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            padding: 20px;
                            text-align: center;
                            margin-bottom: 10px;
                        }

                        .weather-icon {
                            width: 60px;
                            height: 60px;
                        }

                        .temperature {
                            font-size: 24px;
                            margin: 10px 0;
                        }

                        .description {
                            color: #666;
                        }
                    </style>

                    <div class="weather-widget"></div>

                    <div class="spotify">
                        Spotify API
                        <input type="text" id="artist" name="artist" placeholder="Введіть ID артиста">
                        <button type="submit" id="find-button">Знайти</button>
                        <br>
                        наприклад, 0k17h0D3J5VfsdmQ1iZtE9
                        <div class="artist-info"></div>
                    </div>

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
