<div class="product border-radius-15">
    <?php
    if (isset($pet->photo)) {
        $path = asset('/uploads/') . '/' . $pet->photo;
    } else {
        $path = asset('/uploads/') . '/' . 'images/nophoto.jpg';
    }
    ?>
    <a href="{{route('single', $pet->id)}}" class="img-prod border-radius-15"><img class="img-fluid" src="{{$path}}" alt="Colorlib Template">
        <span class="status" style="background: #8B4D93; min-width: 82px" @if(!$pet->special) hidden="" @endif>Особливий</span>
        <span class="status" style="background: #DF4E0F; min-width: 82px" @if(!$pet->guardianship) hidden="" @endif>Під опікою</span>
        <span class="status" @if(!$pet->adopted) hidden="" @endif>Вже має дім</span>
        <div class="overlay"></div>
    </a>
    <div class="text py-3 pb-4 px-3 text-center border-radius-15" style="background: #e8ffff">
        <h3><a href="{{route('single', $pet->id)}}" style="font-weight: 700">{{$pet->name}}</a></h3>
        <div class="row">
            <div class="col-6"><img src="{{\App\Models\Pet::speciesPet($pet->species)}}" alt="" style="width: 30px; height: auto"></div>
            <div class="col-6"><span class="price-sale">{{$pet->sex}}</span></div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="price"><span class="price-sale">вік {{\App\Models\Pet::agePet($pet->age_month)}}</span></p>
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