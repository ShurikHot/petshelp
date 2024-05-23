@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Новина:</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="card-body" bis_skin_checked="1">
        <form action="{{route('news.send')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row" bis_skin_checked="1">
                <div class="col-sm-6" bis_skin_checked="1">
                    <div class="form-group" bis_skin_checked="1">
                        <label>Текст новини</label>
                        <textarea class="form-control" rows="1" placeholder="Текст новини ..." id="news" name="news"></textarea>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Розіслати новину</button>
        </form>
    </div>


@endsection
@section('title', $cust_title ?? '')
