@extends('includes.head')

@extends('includes.header')

	<!-- Start About Us Area -->
	<div class="about-section-area padd-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-5 col-md-5 col-xs-12">
					<div class="about-rt-img">
                        @if($aboutUsData['header_image'])
                        <img src="{{asset($aboutUsData['header_image'])}}" alt="image">
                        @else
						<img src="{{asset('assets/img/images/about_img.png')}}" alt="">
                        @endif
					</div>
				</div><!-- // Col -->
				<div class="col-lg-6 col-md-6 col-xs-12">
					<div class="head-st-txt">
						<!-- mian-sec-title -->
						<div class="mian-sec-title st2 side-ttl">
							<h6> تعرف علينا </h6>
                            <h3>
                            @if($aboutUsData['header_title'])
							    {!!$aboutUsData['header_title']!!}
                            @else
                            نعمل على تقريب المسافة بينك وبين جمهورك
                            @endif
                            </h3>
						</div>
						<p>
                        @if($aboutUsData['header_content'])
                            {!!$aboutUsData['header_content']!!}
                        @else
							نسهل عليك آلية إنشاء الفواتير وتسجيلها واستلامها لغير الخبراء بالمجال المحاسبي وتوفير الوقت والجهد على غير المختصين وتأمين الوقت اللازم لهم لتطوير أعمالهم نسهل عليك آلية إنشاء الفواتير وتسجيلها واستلامها لغير الخبراء بالمجال المحاسبي وتوفير الوقت والجهد على غير المختصين وتأمين الوقت اللازم لهم لتطوير أعمالهم نسهل عليك آلية إنشاء الفواتير وتسجيلها واستلامها لغير الخبراء بالمجال المحاسبي
							وتوفير الوقت والجهد على غير المختصين وتأمين الوقت اللازم لهم لتطوير أعمالهم
						@endif
                        </p>
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
							<img src="{{asset('/assets/img/icons/stcs_04.svg')}}" alt="">
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
