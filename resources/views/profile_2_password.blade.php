@extends('includes.head')

@extends('includes.header')

	<!-- Profile Pages -->
	<div class="profile-pages-area bg2 padd-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-3 col-xs-12">
					<div class="mn-profile-side">
						<div class="prof-top-sec">
							<div class="prof-img-bg">
								<img src="{{asset('assets/img/background/bg_img_01.jpg')}}" alt="">
							</div>
							<div class="prof-img-name">
								<img src="{{asset('assets/img/users/user_01.png')}}" alt="">
								<h3> آدم محمــود ابراهـــيم </h3>
								<a href="landing_page_1.php"> عرض صفحتي </a>
							</div>
						</div>
						<!-- Profile Links -->
						<div class="prof-links">
							<ul>
								<li>
									<a href="{{ url('/user/profile/get') }}" class="prof-link"> <img src="{{asset('assets/img/icons/prof_user_icon.svg')}}" alt=""> معلومــات الحســاب </a>
								</li>
								<li>
									<a href="{{ url('/user/profile/password') }}" class="prof-link active"> <img src="{{asset('assets/img/icons/prof_pass_icon.svg')}}" alt=""> تغيير كلمة المرور</a>
								</li>
								<li>
									<a href="{{ url('/user/profile/pages') }}" class="prof-link"> <img src="{{asset('assets/img/icons/prof_sett_icon.svg')}}" alt=""> إدارة صفحاتــي </a>
								</li>
								<li>
									<a href="{{ route('logout') }}" class="prof-link"> <img src="{{asset('assets/img/icons/prof_logout_icon.svg')}}" alt=""> تسجــيل الخروج</a>
								</li>
							</ul>
						</div>
					</div>
				</div><!-- // Col -->
				<div class="col-lg-9 col-xs-12">
					<div class="card-box profile-section">
						<div class="mian-card-box-title">
							<h3> <img src="{{asset('assets/img/icons/pass_icon.svg')}}" alt=""> تغيير كلمة المرور</h3>
						</div>
						<div class="profile-info-form">
                            <form class="main-form row justify-content-center frm-ipt-bg" method="POST" action="{{ route('update_password') }}">
                                @csrf
                                @method('PUT')
							{{-- <form class="main-form row justify-content-center frm-ipt-bg" novalidate=""> --}}
								<div class=" col-md-6 col-xs-12">
									<!-- Password -->
									<div class="form-group">
										<label for="">ادخل كلمة المرور الحالية </label>
										<input type="password" class="form-control" name="old_password" minlength="8" placeholder="***********" required>
									</div>
									<!-- Password -->
									<div class="form-group">
										<label for=""> ادخل كلمة المرور الجديدة</label>
										<input type="password" class="form-control" name="password" minlength="8" placeholder="***********" required>
									</div>
									<!-- Password -->
									<div class="form-group">
										<label for=""> تأكيد كلمة المرور</label>
										<input type="password" class="form-control" name="password_confirmation" minlength="8" placeholder="***********" required>
									</div>
									<!-- Password -->
									<div class="form-group form-btns">
										<button class="btn main-btn primary-btn" type="submit"> حفظ التعديلات</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div><!-- // Col -->
			</div><!-- // Row -->
		</div><!-- // Container -->
	</div><!-- // Section -->
	<!-- End Profile Pages -->

    @extends('includes.footer-links')
    @extends('includes.footer')
