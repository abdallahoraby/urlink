@include('includes/head')
    <section class="register-log-page sect-center padd-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <!-- Lt Side -->
                    <div class="reg-main-form">
                        <div class="reg-main-form-logo">
                            <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                        <div class="reg-frm-ttl">
                            <h3> دعنا نساعدك في تأسيس عالمك الخاص </h3>
                            <h5> أنشئ حسابك وتمتع بكل مميزات موقعنا </h5>
                            <div class="log-social">
                                <ul>
                                    <li>
                                        <button class="btn reg-soc-btn" type="button"> <img src="assets/img/icons/google_icon.svg" alt="google"> التسجيل بواسطة جوجل </button>
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
                            <form name="myForm" id="reg_form" class="main-form row" method="POST" action="{{ route('post_register') }}">
                                
                                <div class="form-group col-md-12 col-xs-12">
                                    <label> الإسـم كاملاً </label>

                                    <input name="name" type="text" value="{{ old('name') }}" class="form-control" placeholder="مثال : آدم محمود ابراهيم" required minlength="8">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12 col-xs-12">
                                    <label> البريد الإلكتروني</label>
                                    <input required data-rule-required="true" data-rule-email="true" data-msg-required="Please enter your email address" data-msg-email="Please enter a valid email address" name="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="ادخل البريد الإلكتروني" >
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12 col-xs-12">
                                    <label> انشئ كلمة المرور </label>
                                    <input type="password" class="form-control" name="password" placeholder="***********">
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12 col-xs-12">
                                    <label> تأكيد كلمة المرور </label>
                                    <input type="password" class="form-control" name="password_confirmation"  placeholder="***********" >
                                </div>
                                <!-- Button -->
                                <div class="form-group col-12 frm-btn">
                                    <button type="submit" class="btn main-grn-btn primary-btn">انشاء الحساب </button>
                                </div>
								
								@csrf
                            </form>
                        </div>
                    </div><!-- // Lt Side -->
                </div><!-- // Col -->
                <div class="col-lg-5 col-md-6 col-xs-12 padd-l-0">
                    <!-- Rt-side -->
                    <div class="rt-side">
                        <!-- Image -->
                        <div class="reg-side-img">
                            <img src="assets/img/images/register_img.png" alt="img">
                        </div>
                        <div class="reg-img-btn text-center">
                            <div class="reg-img-btn-text">
                                <p>
                                    اذا لديك حساب بالفعل على منصتنا يمكنك التسجيل بكل سهولة
                                </p>
                                <div class="form-btn main-button">
                                    <a href="{{ route('get_login') }}" class="btn main-grn-btn primary-btn" type="button"> تسجـيل الدخــول </a>
                                </div>
                            </div>
                        </div>
                    </div><!-- // Rt-side -->
                </div><!-- // Col -->
            </div>
        </div>
    </section>


@include('includes/footer')
