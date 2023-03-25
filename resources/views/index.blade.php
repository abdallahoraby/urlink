@extends('includes.head')

@extends('includes.header')


	@if( isset($homeContent['section_1']) )
	<!-- Start intro Area -->
	<div class="intro-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 xs-order-2">
					<div class="intro-sec-info">
                        <h3>
							{{$homeContent['section_1']['title'] ?? ''}}
                        </h3>
						<p>
							{{$homeContent['section_1']['description'] ?? ''}}
						</p>
						<div class="intro-sec-info-buttons">
							<a href="{{$homeContent['section_1']['button_1_link'] ?? '#'}}" class="btn main-btn secondary-btn"> {{$homeContent['section_1']['button_1_text'] ?? ''}} </a>
							<a href="{{$homeContent['section_1']['button_2_link'] ?? '#'}}" class="btn main-btn primary-btn"> {{$homeContent['section_1']['button_2_text'] ?? ''}} </a>
						</div>
					</div>
				</div><!-- // Col -->
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 xs-order-1">
					<div class="intro-sec-img">

						<img src="{{ asset($homeContent['section_1']['image']) }}" alt="image">

					</div>
				</div><!-- // Col -->
			</div><!-- // Row -->
		</div><!-- // Container -->
	</div><!-- // Section -->
	<!-- End intro Area -->
	@endif


	<!-- Start Social Accounts Area -->
	<div class="social-accounts-area bg2 padd-60">
		<div class="container">
			<!-- mian-sec-title -->
			<div class="mian-sec-title whd-30">
				<h3> اضف مجموعة كبيرة من الحسابات الخاصة بك بكل سهولة  </h3>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
					<!-- Logo List -->
					<div class="logos-list">
						<!-- Card -->
						<div class="logo-card">
							<img src="{{asset('assets/img/images/instegram_logo.png')}}" alt="icon">
						</div><!-- // Logo Card -->
						<!-- Card -->
						<div class="logo-card">
							<img src="{{asset('assets/img/images/youtube_logo.png')}}" alt="icon">
						</div><!-- // Logo Card -->
						<!-- Card -->
						<div class="logo-card">
							<img src="{{asset('assets/img/images/whatsapp_logo.png')}}" alt="icon">
						</div><!-- // Logo Card -->
						<!-- Card -->
						<div class="logo-card">
							<img src="{{asset('assets/img/images/twitter_logo.png')}}" alt="icon">
						</div><!-- // Logo Card -->
						<!-- Card -->
						<div class="logo-card">
							<img src="{{asset('assets/img/images/facebook_logo.png')}}" alt="icon">
						</div><!-- // Logo Card -->
					</div>
				</div><!-- // Col -->
			</div><!-- // Row -->
		</div><!-- // Container -->
	</div><!-- // Section -->
	<!-- End Social Accounts Area -->

	<!-- Start About Us Area -->
	<div class="about-section-area padd-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-5 col-md-5 col-xs-12">
					<div class="about-rt-img">
						<img src="{{asset('assets/img/images/about_img.png')}}" alt="">
					</div>
				</div><!-- // Col -->
				<div class="col-lg-6 col-md-6 col-xs-12">
					<div class="head-st-txt">
						<!-- mian-sec-title -->
						<div class="mian-sec-title st2 side-ttl">
							<h6> تعرف علينا </h6>
							<h3> نعمل على تقريب المسافة بينك وبين جمهورك  </h3>
						</div>
						<p>
							نقدم لك ميزة جديدة لجمع كل الحسابات الخاصة بك سواء حسابات شخصية أو شركات حيث نساعدك على بناء
							صفحة هبوط مميزة تساعدك على عرض جميع البيانات ووسائل التواصل والسوشيال ميديا
							الخاصة بك وإداراتها بكل سهولة وعرضها على جمهورك لسرعة التواصل
						</p>
						<a href="{{ url('/about-us') }}" class="btn main-btn secondary-btn" type="button">تعرف علينـا</a>
					</div>
				</div><!-- // Col -->
			</div><!-- // Row -->
		</div><!-- // Container -->
	</div><!-- // Section -->
	<!-- End About Us Area -->

	<!-- Start Page Steps Area -->
	<div class="page-steps-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<!-- mian-sec-title -->
					<div class="mian-sec-title st2 side-ttl bg-wt">
						<h6> خطوات انشاء صفحتك </h6>
						<h3> ابق على مسافة واحدة من جمهورك من خلال ابسط الخطوات لإنشاء صفحتك </h3>
					</div>
				</div><!-- // Col -->
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<!-- mian-sec-title -->
					<div class="stps-cards">
						<!-- 1 -->
						<div class="stp-card-item">
							<!-- img -->
							<div class="stp-img">
								<img src="{{asset('assets/img/images/stp_01_icon.png')}}" alt="">
							</div>
							<div class="card-txt">
								<h3> انشئ حسابك </h3>
								<p> قم بإنشــاء حساب جديد او سجل دخول اذا كنت تمتلك حساب </p>
							</div>
						</div>
						<!-- 2 -->
						<div class="stp-card-item">
							<!-- img -->
							<div class="stp-img">
								<img src="{{asset('assets/img/images/stp_02_icon.png')}}" alt="">
							</div>
							<div class="card-txt">
								<h3> أضف بياناتك </h3>
								<p> اضف بياناتك ووسائل التواصل الخاصة بك </p>
							</div>
						</div>
						<!-- 3 -->
						<div class="stp-card-item">
							<!-- img -->
							<div class="stp-img">
								<img src="{{asset('assets/img/images/stp_03_icon.png')}}" alt="">
							</div>
							<div class="card-txt">
								<h3> شاهد صفحتك </h3>
								<p> يمكنك مشاهدة صفحتك ومشاركتها مع جمهورك بكل سهولة</p>
							</div>
						</div>
					</div>
				</div><!-- // Col -->
			</div><!-- // Row -->
		</div><!-- // Container -->
	</div><!-- // Section -->
	<!-- End Page Steps Area -->

	<!-- Start Statistics Area -->
	<div class="statistics-section-area padd-50">
		<div class="container">
			<!-- mian-sec-title -->
			<div class="mian-sec-title whd-35">
				<h3> إحصائيات مميزة تزيد من فرص اختياراتك لإنشاء صفحتك بكل ثقة  </h3>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
					<div class="stcs-card">
						<div class="stcs-img">
							<img src="{{asset('assets/img/icons/stcs_01.svg')}}" alt="">
						</div>
						<div class="count-box">
							<h3 class="count-num"> <span class="counterUp" data-count="9635"> 0 </span> + </h3>
						</div>
						<h5> عدد المستخدمين </h5>
					</div><!-- // Stcs-card -->
				</div><!-- // Col -->
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
					<div class="stcs-card">
						<div class="stcs-img">
							<img src="{{asset('assets/img/icons/stcs_02.svg')}}" alt="">
						</div>
						<div class="count-box">
							<h3 class="count-num"> <span class="counterUp" data-count="25635"> 0 </span> + </h3>
						</div>
						<h5> صفحات تم انشائها </h5>
					</div><!-- // Stcs-card -->
				</div><!-- // Col -->
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
					<div class="stcs-card">
						<div class="stcs-img">
							<img src="{{asset('assets/img/icons/stcs_03.svg')}}" alt="">
						</div>
						<div class="count-box">
							<h3 class="count-num"> <span class="counterUp" data-count="8951"> 0 </span> + </h3>
						</div>
						<h5> عملاء سعداء </h5>
					</div><!-- // Stcs-card -->
				</div><!-- // Col -->
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
					<div class="stcs-card">
						<div class="stcs-img">
							<img src="{{asset('assets/img/icons/stcs_04.svg')}}" alt="">
						</div>
						<div class="count-box">
							<h3 class="count-num"> <span class="counterUp" data-count="2022"> 0 </span> </h3>
						</div>
						<h5> بداية الموقع </h5>
					</div><!-- // Stcs-card -->
				</div><!-- // Col -->
			</div><!-- // Row -->
		</div><!-- // Container -->
	</div><!-- // Section -->
	<!-- End Statistics Area -->



@extends('includes.footer-links')
@extends('includes.footer')
	<!-- Start   Area -->




