<div class="product border-radius-15">
    <?php
    if (isset($pet->photo)) {
        $path = asset('/uploads/') . '/' . $pet->photo;
    } else {
        $path = asset('/uploads/') . '/' . 'images/nophoto' . rand(1, 3) . '.jpg';
    }
    ?>
    <a href="{{route('single', $pet->id)}}" class="img-prod border-radius-15"><img class="img-fluid" src="{{$path}}" alt="Colorlib Template">
        <span class="status mw82 status-special" @if(!$pet->special)hidden="" @endif>Особливий</span>
        <span class="status mw82 status-guardianship" @if(!$pet->guardianship)hidden="" @endif>Під опікою</span>
        <span class="status" @if(!$pet->adopted)hidden="" @endif>Вже має дім</span>
        <div class="overlay"></div>
    </a>
    <div class="text py-3 pb-4 px-3 text-center border-radius-15 petcard-back">
        <h3><a href="{{route('single', $pet->id)}}">{{$pet->name}}</a></h3>
        <div class="row">
            <div class="col-6 species-logo"><img src="{{$pet->speciesPicture}}" alt=""></div>
            <div class="col-6"><span class="price-sale">{{$pet->genderTitle}}</span></div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="price"><span class="price-sale">вік {{$pet->ageYearMonth}}</span></p>
            </div>
            <div class="col-12 pricing">
                м. {{$pet->city}}
            </div>
        </div>
        <div class="bottom-area d-flex px-3">
            <div class="m-auto d-flex">
                <a href="{{route('single', $pet->id)}}" class="d-flex justify-content-center align-items-center text-center">
                    Познайомимось?
                </a>
            </div>
        </div>
    </div>
</div>
