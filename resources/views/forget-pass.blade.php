@extends('includes.head')

    <section class="forget-pass-page sect-center padd-10">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-xs-12 xs-order-2">
                    <!-- Lt Side -->
                    <div class="reg-main-form">
                        <div class="reg-main-form-logo">
                            <a href="{{url('/')}}"><img src="{{asset('assets/img/logo/logo.png')}}" alt=""></a>
                        </div>
                        <div class="reg-frm-ttl">
                            <h3> !! نسيت كلمة المرور </h3>
                            <h5> أدخل بريدك الإلكتروني المسجل به </h5>
                        </div>
                        <!-- Main Form -->
                        <div class="main-form">
                            <!-- Register Form -->
                            <form class="main-form row">
                                <div class="form-group col-md-12 col-xs-12">
                                    <label> البريد الإلكتروني</label>
                                    <input type="email" class="form-control" placeholder="ادخل البريد الإلكتروني">
                                </div>
                                <!-- Button -->
                                <div class="form-group col-12 frm-btn">
                                    <a href="{{url('/')}}" class="btn main-grn-btn primary-btn" type="button"> تأكيـــد </a>
                                </div>
                            </form>
                        </div>
                    </div><!-- // Lt Side -->
                </div><!-- // Col -->
                <div class="col-lg-5 col-md-6 col-xs-12 padd-l-0 xs-order-1">
                    <!-- Rt-side -->
                    <div class="rt-side forget-pass-img">
                        <!-- Image -->
                        <div class="reg-side-img">
                            <img src="{{asset('assets/img/images/forget_pass.png')}}" alt="img">
                        </div>
                    </div><!-- // Rt-side -->
                </div><!-- // Col -->
            </div>
        </div>
    </section>


@extends('includes.footer')