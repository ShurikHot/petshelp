@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редагування слайду (ID {{$slider->id}}):</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="card-body" bis_skin_checked="1">
        <form action="{{route('sliders.update', $slider->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row" bis_skin_checked="1">
                <div class="col-sm-1" bis_skin_checked="1">
                    <div class="form-group" bis_skin_checked="1">
                        <label for="id">ID</label>
                        <input type="text" class="form-control text-center" id="id" name="id" value="{{$slider->id}}" disabled>
                    </div>
                </div>
                <div class="col-sm-6" bis_skin_checked="1">
                    <div class="form-group" bis_skin_checked="1">
                        <label for="name">Назва*</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Введідь назву слайда" value="{{$slider->name}}">
                    </div>
                </div>
            </div>
            <div class="row" bis_skin_checked="1">
                <div class="col-sm-12" bis_skin_checked="1">
                    <div class="form-group" bis_skin_checked="1">
                        <label for="title">Заголовок</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Введідь заголовок слайда" value="{{$slider->title}}">
                    </div>
                </div>
            </div>
            <div class="row" bis_skin_checked="1">
                <div class="col-sm-12" bis_skin_checked="1">
                    <div class="form-group" bis_skin_checked="1">
                        <label for="tagline">Слоган</label>
                        <input type="text" class="form-control" id="tagline" name="tagline" placeholder="Введідь слоган слайда" value="{{$slider->tagline}}">
                    </div>
                </div>
            </div>
            <div class="row" bis_skin_checked="1">
                <div class="form-group col-sm-6" bis_skin_checked="1">
                    <div class="row">
                        <div class="col-6">
                            <label for="photo">Фото слайду</label>
                            <div class="input-group" bis_skin_checked="1">
                                <div class="custom-file" bis_skin_checked="1">
                                    <label class="label custom-file-upload btn btn-info mt-2" data-toggle="tooltip" title="Додати фото...">
                                        <input type="file" class="d-none" id="photo" name="photo" accept="image/*" value="{{$slider->photo}}">
                                        <input type="hidden" class="d-none" id="base64image" name="base64image" accept="image/*" value="{{$slider->photo}}">
                                        <p class="d-none" id="slider_crop" name="slider_crop" hidden="">_</p>
                                        Додати/змінити фото
                                    </label>
                                </div>
                            </div>
                            <div class="form-check mt-4" bis_skin_checked="1">
                                <input class="form-check-input" type="checkbox"
                                       id="is_active" name="is_active" @if($slider->is_active) checked @endif>
                                <label for="is_active" class="form-check-label">Активний?</label>
                            </div>
                        </div>
                        <div class="col-6 text-center">
                                <?php
                                if ($slider->photo && is_file(public_path('uploads/' . $slider->photo))) {
                                    $path = $slider->photo;
                                } else {
                                    $path = 'images/nophoto.jpg';
                                }
                                ?>
                            <img src="{{asset('/uploads') . '/' .  $path}}" alt="" id="avatar" style="width: 180px; height: 120px;" class="right">
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Оновити слайд</button>
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
                        <img id="uploadedAvatar" src="https://avatars0.githubusercontent.com/u/3456749" alt="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Відміна</button>
                    <button type="button" class="btn btn-primary" id="crop">Обрізати</button>
                </div>
            </div>
        </div>
    </div>

    @section('title', $customTitle ?? '')
@endsection
