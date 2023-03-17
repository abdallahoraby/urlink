
<section id="card-caps">
    <div class="row">
        <div class="col-xl-3 col-md-4 col-sm-12">
            <div class="card">
                <div class="card-img-overlay overlay-dark d-flex justify-content-between flex-column">
                    <div class="overlay-content">
                        <h3> ادارة الصفحات </h3>
                    </div>
                    <div class="overlay-status">
{{--                        <p class="mb-25"><small>Last updated 3 mins ago</small></p>--}}
                        <a href="{{ url('/admin/setting/edit-pages') }}" class="btn btn-light-primary"> تعديل </a>
                    </div>
                </div>
                <img class="card-img img-fluid" src="{{asset('assets/img/background/bg_img_01.jpg')}}" alt="Card image">
            </div>
        </div>


        <div class="col-xl-3 col-md-4 col-sm-12">
            <div class="card">
                <div class="card-img-overlay overlay-dark d-flex justify-content-between flex-column manage-plans">
                    <div class="overlay-content">
                        <h3> ادارة خطط الاسعار </h3>
                    </div>
                    <div class="overlay-status">
                        {{--                        <p class="mb-25"><small>Last updated 3 mins ago</small></p>--}}
                        <a href="{{ url('/admin/setting/edit-plans') }}" class="btn btn-light-primary"> ادارة </a>
                    </div>
                </div>
                <img class="card-img img-fluid" src="{{asset('assets/img/background/bg_img_01.jpg')}}" alt="Card image">
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-sm-12">
            <div class="card">
                <div class="card-img-overlay overlay-dark d-flex justify-content-between flex-column manage-subs">
                    <div class="overlay-content">
                        <h3> ادارة الاشتراكات </h3>
                    </div>
                    <div class="overlay-status">
                        {{--                        <p class="mb-25"><small>Last updated 3 mins ago</small></p>--}}
                        <a href="{{ url('/admin/setting/edit-subcriptions') }}" class="btn btn-light-primary"> ادارة </a>
                    </div>
                </div>
                <img class="card-img img-fluid" src="{{asset('assets/img/background/bg_img_01.jpg')}}" alt="Card image">
            </div>
        </div>

    </div>
</section>


<style>
    .card {
        border: 0;
    }

    .card-img-overlay.overlay-dark.d-flex.justify-content-between.flex-column {
        min-height: 130px;
        border-radius: 10px;
        background-image: linear-gradient(
                199deg,
                hsl(248deg 54% 29%) 0%,
                hsl(248deg 36% 42%) 11%,
                hsl(248deg 29% 46%) 27%,
                hsl(248deg 32% 54% / 54%) 56%,
                hsl(0deg 0% 95% / 0%) 100%
        );
        border: 2px solid #fff;
    }

    .manage-plans{
        background-image: linear-gradient(
                199deg,
                hsl(248deg 54% 29%) 0%,
                hsl(248deg 36% 42%) 11%,
                hsl(248deg 29% 46%) 27%,
                hsl(248deg 32% 54% / 54%) 56%,
                hsl(0deg 0% 95% / 0%) 100%
        );
    }

    .overlay-content h3 {
        color: #fff;
    }

    a.btn {
        border-color: #fff;
        float: left;
        color: #fff !important;
    }

    img.card-img.img-fluid {
        border-radius: 10px;
    }


</style>