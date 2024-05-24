<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
            <div class="col-md-6">
                <h2 style="font-size: 22px;" class="mb-0">Підпишіться на нашу розсилку</h2>
                <span>Отримуйте інформацію про наші справи та події, звіти нашої роботи та плани на майбутнє</span>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <form class="subscribe-form">
                    <div class="form-group d-flex">
                        @if(auth()->user())
                            <input type="text" class="form-control" placeholder="" value="{{auth()->user()->email ?? ''}}" disabled>
                            <input type="submit" id="subscribe" value="{{auth()->user()->subscribe ? 'Ви підписані!' : 'Підписатися'}}" class="submit px-3"
                                {{auth()->user()->subscribe ? 'disabled' : ''}}>
                        @else
                            <input type="text" class="form-control" id="subscribe" placeholder="Зареєструйтеся або авторизуйтеся для оформлення підписки" disabled>
                            <a href="{{route('register.create')}}" class="submit px-3 align-content-center">Реєстрація</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
