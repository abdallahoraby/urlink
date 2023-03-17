@extends('includes.head')

@extends('includes.header-profile')


	<!-- Profile Pages -->
	<div class="profile-pages-area bg2 padd-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-3 col-xs-12">
					<div class="mn-profile-side">
						<div class="prof-top-sec">
							<div class="prof-img-bg">
								<img src="img/background/bg_img_01.jpg" alt="">
							</div>
							<div class="prof-img-name">
								<img src="img/users/user_01.png" alt="">
								<h3> آدم محمــود ابراهـــيم </h3>
								<a href="landing_page_1.php"> عرض صفحتي </a>
							</div>
						</div>
						<!-- Profile Links -->
						<div class="prof-links">
							<ul>
								<li>
									<a href="{{ url('/admin/profile') }}" class="prof-link active"> <img src="{{asset('assets/img/icons/prof_user_icon.svg')}}" alt=""> معلومــات الحســاب </a>
								</li>
								<li>
									<a href="{{ url('/user/profile/password') }}" class="prof-link"> <img src="{{asset('assets/img/icons/prof_pass_icon.svg')}}" alt=""> تغيير كلمة المرور</a>
								</li>
								<li>
									<a href="{{ url('/admin/users/get') }}" class="prof-link"> <img src="{{asset('assets/img/icons/prof_sett_icon.svg')}}" alt=""> إدارة الأعضاء </a>
								</li>
                                <li>
									<a href="{{ url('/admin/styles/get') }}" class="prof-link"> <img src="{{asset('assets/img/icons/prof_sett_icon.svg')}}" alt=""> إدارة الاستايل </a>
								</li>
                                <li>
									<a href="{{ route('setting') }}" class="prof-link"> <img src="{{asset('assets/img/icons/prof_sett_icon.svg')}}" alt=""> الاعدادات</a>
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
							<h3> <img src="img/icons/stcs_icon.svg" alt=""> تفاصيل و إحصائيات الصفحة </h3>
						</div>
						<div class="profile-stc-page">
							<div class="pg-user-info">
								<div class="pg-user-info-img">
									<img src="img/users/user_01.png" alt="">
									<div class="page-mng-btns">
										<a href="landing_page_1.php" class="btn view-btn" type="button"><i class="fi fi-rr-eye"></i> عرض </a>
										<a href="#" class="btn edit-btn" type="button"><i class="fi fi-rr-edit"></i> تعديل </a>
									</div>
								</div>
								<div class="pg-user-info-stc-list">
									<ul>
										<li class="list-inline-item">
											<div class="pg-stc-item">
												<h6> اسم الصفحة </h6>
												<h3> آدم محمـود ابراهيم </h3>
											</div>
										</li>
										<li class="list-inline-item">
											<div class="pg-stc-item">
												<h6> تاريخ الإنشاء </h6>
												<h3> 20 يناير 2022 </h3>
											</div>
										</li>
										<li class="list-inline-item">
											<div class="pg-stc-item">
												<h6> الحسابات المربوطة بالحساب </h6>
												<h3> 12 حسـاب</h3>
											</div>
										</li>
										<li class="list-inline-item">
											<div class="pg-stc-item">
												<h6> اخر تعديل </h6>
												<h3> 29 مايـو 2022 </h3>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<!-- QR Code -->
							<div class="qr-code">
								<img src="img/images/QrCode.png" alt="">
							</div><!-- // QR Code -->
						</div><!--// profile-stc-page -->
					</div>
					<div class="card-box">
						<div class="mian-sec-title">
							<h3> إحصائيات إجمالي الزيارات على صفحتك </h3>
						</div>
						<div class="row">
							<div class="col-lg-4 col-xs-6">
								<div class="stc-card-item">
									<div class="stc-img-icon">
										<img src="img/icons/stc_icon.png" alt="">
									</div>
									<div class="stc-dt-info">
										<h3> 136 </h3>
										<h5> عدد الزيارات اليوم </h5>
									</div>
								</div>
							</div><!-- // col -->
							<div class="col-lg-4 col-xs-6">
								<div class="stc-card-item">
									<div class="stc-img-icon">
										<img src="img/icons/stc_icon.png" alt="">
									</div>
									<div class="stc-dt-info">
										<h3> 8630 </h3>
										<h5> عدد الزيارات هذا الشهر </h5>
									</div>
								</div>
							</div><!-- // col -->
							<div class="col-lg-4 col-xs-6">
								<div class="stc-card-item">
									<div class="stc-img-icon">
										<img src="img/icons/stc_icon.png" alt="">
									</div>
									<div class="stc-dt-info">
										<h3> 136 </h3>
										<h5> عدد الزيارات جميع الأوقات </h5>
									</div>
								</div>
							</div><!-- // col -->
						</div>
					</div>
					<div class="card-box">
						<div class="mian-sec-title">
							<h3> إحصائيات لمصادر الزيارات المختلفة لصفحتك </h3>
						</div>
						<div class="social-stcs">
							<div class="social-stcs-item">
								<span> فيسبوك </span>
								<div line-progressbar data-percentage="45" data-animation="true" data-progress-color="#462CFF">  </div>
							</div>
							<div class="social-stcs-item">
								<span> تويتر </span>
								<div line-progressbar data-percentage="86" data-animation="true" data-progress-color="#462CFF"></div>
							</div>
							<div class="social-stcs-item">
								<span> لينكد ان </span>
								<div line-progressbar data-percentage="64" data-animation="true" data-progress-color="#462CFF"></div>
							</div>
							<div class="social-stcs-item">
								<span> تيك توك </span>
								<div line-progressbar data-percentage="35" data-animation="true" data-progress-color="#462CFF"></div>
							</div>
							<div class="social-stcs-item">
								<span> انستجرام </span>
								<div line-progressbar data-percentage="45" data-animation="true" data-progress-color="#462CFF"></div>
							</div>
							<div class="social-stcs-item">
								<span> مصادر اخرى </span>
								<div line-progressbar data-percentage="15" data-animation="true" data-progress-color="#462CFF"></div>
							</div>

						</div><!-- // Social Stcs -->
					</div>
				</div><!-- // Col -->
			</div><!-- // Row -->
		</div><!-- // Container -->
	</div><!-- // Section -->
	<!-- End Profile Pages -->


@extends('includes.footer-links')
@extends('includes.footer')
