@extends('includes/head')
<section class="register-log-page sect-center padd-10">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <!-- Lt Side -->
                <div class="reg-main-form">
                    <div class="reg-main-form-logo">
                        <a href="{{ url('/') }}"><img src="{{asset('assets/img/logo/logo.png')}}" alt=""></a>
                    </div>
                    <div class="reg-frm-ttl">
                        <h3> امض وقتاً مميزاً وزد من جمهورك </h3>
                        <h5> سجل الدخول الى حسابك </h5>
                        <div class="log-social">
                            <ul>
                                <li>
                                    <button class="btn reg-soc-btn" type="button"> <img src="{{asset('assets/img/icons/google_icon.svg')}}" alt="google"> التسجيل بواسطة جوجل </button>
                                </li>
                            </ul>
                        </div><!-- // log-social -->
                    </div>
                    <!-- Or -->
                    <div class="register-opt-text">
                        <p> أو التسجيل عبر الإيميل </p>
                    </div>
                    <!-- Main Form -->
                    <div class="main-form">
                        <!-- Register Form -->
                        <form class="main-form row" method="POST" action="{{ route('post_login') }}">
                            @csrf
                            <div class="form-group col-md-12 col-xs-12">
                                <label> البريد الإلكتروني</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="ادخل البريد الإلكتروني">
                                @if($errors->any())
                                <div class="alert alert-danger">email or password is invalid</div>
                                @endif
                            </div>
                            <div class="form-group col-md-12 col-xs-12">
                                <label>  كلمة المرور </label>
                                <input type="password" class="form-control" name="password" minlength="8" placeholder="***********" >
                            </div>
                            <div class="form-group col-md-12 col-xs-12">
                            <a href="{{ route('get_forget_pass') }}" class="forget-pass">  نسيت كلمة المرور؟  </a>
                            </div>
                            <!-- Button -->
                            <div class="form-group col-12 frm-btn">
                                <button type="submit" class="btn main-grn-btn primary-btn"> تسجيــل الدخــول </button>
                              {{--   <a href="profile_1_info.php" class="btn main-grn-btn primary-btn" type="button"> تسجيــل الدخــول </a> --}}
                            </div>
                        </form>
                    </div>
                </div><!-- // Lt Side -->
            </div><!-- // Col -->
            <div class="col-lg-5 col-md-6 col-xs-12 padd-l-0">
                <!-- Rt-side -->
                <div class="rt-side">
                    <!-- Image -->
                    <div class="reg-side-img">
                        <img src="{{asset('assets/img/images/login_img.png')}}" alt="img">
                    </div>
                    <div class="reg-img-btn text-center">
                        <div class="reg-img-btn-text">
                            <p>
                                حتى الآن لا تمتلك حساب على منصتنا انشئ حسابك بكل أمان
                            </p>
                            <div class="form-btn main-button">
                                <a href="{{ route('get_register') }}" class="btn main-grn-btn primary-btn" type="button"> انشــاء حساب </a>
                            </div>
                        </div>
                    </div>
                </div><!-- // Rt-side -->
            </div><!-- // Col -->
        </div>
    </div>
</section>
@extends('includes/footer')
