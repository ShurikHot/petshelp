@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Усі слайди</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body" bis_skin_checked="1">

                <a href="{{route('sliders.create')}}"><button class="btn btn-primary mb-2">Додати слайд</button></a>

                @if(!empty($sliders))
                    <table class="table table-bordered">
                        <thead>
                        <tr class="text-center">
                            <th style="width: 10px">ID</th>
                            <th>Назва</th>
                            <th>Заголовок</th>
                            <th>Слоган</th>
                            <th style="width: 65px">Фото</th>
                            <th style="width: 105px">Активний?</th>
                            <th style="width: 90px">Дії</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($sliders as $slider)
                            <tr>
                                <td class="text-center">{{$slider->id}}</td>
                                <td>{{$slider->name}}</td>
                                <td>{{$slider->title}}</td>
                                <td>{{$slider->tagline}}</td>
                                <td class="text-center">@if ($slider->photo) <i class="fas fa-check"></i> @endif</td>
                                <td class="text-center">@if ($slider->is_active) <i class="fas fa-check"></i> @endif</td>
                                <th class="justify-content-center" style="display: flex">
                                    <a href="{{route('sliders.edit', $slider->id)}}"><button><i class="fas fa-pencil-alt"></i></button></a>
                                    <form action="{{route('sliders.destroy', $slider->id)}}" method="post">
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
                    <div>Слайдів поки немає...</div>
                @endif
            </div>
            <!-- /.card-body -->
            <div class="card-footer mb-2">
{{--                {{$sliders->links('vendor.pagination.bootstrap-5')}}--}}
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection

@section('title', $customTitle ?? '')
