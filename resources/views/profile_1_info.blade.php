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
								<img src="{{asset('assets/img/background/bg_img_01.jpg')}}" alt="">
							</div>
							<div class="prof-img-name">
								<img src="{{asset($dataOfUser->avatar)}}" alt="">
								<h3> {{$dataOfUser->full_name}}</h3>
								<a href="{{ url('/user/profile/get') }}"> عرض صفحتي </a>
							</div>
						</div>
						<!-- Profile Links -->
						<div class="prof-links">
							<ul>
								<li>
									<a href="{{ url('/user/profile/get') }}" class="prof-link active"> <img src="{{asset('assets/img/icons/prof_user_icon.svg')}}" alt=""> معلومــات الحســاب </a>
								</li>
								<li>
									<a href="{{ url('/user/profile/password') }}" class="prof-link"> <img src="{{asset('assets/img/icons/prof_pass_icon.svg')}}" alt=""> تغيير كلمة المرور</a>
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
							<h3> <img src="{{asset('assets/img/icons/user_icon.svg')}}" alt=""> معلومــات الحســاب </h3>
						</div>
						<div class="profile-info-form">

							<form class="main-form row justify-content-center frm-ipt-bg" novalidate="" method="POST" action="{{ route('update_profile') }}" enctype="multipart/form-data">
								@csrf
								@method('PUT')
								<!-- Img -->
								<div class="form-group col-md-12 up-profile-img">
									<div class="upload-img-item">
										@error('avatar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    	@enderror
										<div class="previewContainer preview-p-img">
											<img class="preview" src="{{asset($dataOfUser->avatar)}}" alt="Image preview..." />
										</div>
										<div class="customFile" data-controlMsg="تحميل صورة">
											<img src="{{asset('assets/img/icons/camera_icon.svg')}}" alt="">
											<input type="file" name="avatar" class=" widthPreview">
										</div>
									</div>
								</div>
								<!-- First Name -->
								<div class="form-group col-md-5 col-xs-12">
									<label for=""> الأسم الأول </label>
									<input type="text" name="first_name" class="form-control" placeholder="الأسم الأول" required="" value="{{$dataOfUser->first_name}}">
									@error('first_name')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<!-- Last Name -->
								<div class="form-group col-md-5 col-xs-12">
									<label for=""> الأسم الأخير </label>
									<input type="text" name="last_name" class="form-control" placeholder="الأسم الأخير" required="" value="{{$dataOfUser->last_name}}">
									@error('last_name')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<!-- Email -->
								<div class="form-group col-md-5 col-xs-12">
									<label for=""> البريد الالكتروني </label>
									<input type="text" class="form-control" placeholder="البريد الالكتروني" required="" value="{{$dataOfUser->email}}"readonly="readonly">
								</div>
								<!-- Phone Number -->
								<div class="form-group col-md-5 col-xs-12">
									<label for=""> رقم الجوال (اختياري) </label>
									<input class="form-control" type="number" name="mobile" id="phone" name="phone" type="tel" placeholder="xxx xxx xxx" value="{{$dataOfUser->mobile}}">
									@error('mobile')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<!-- Submit Button -->
								<div class="col-md-10 form-btns">
									<button class="btn main-btn primary-btn" type="submit"> تعديل بيانات الحساب </button>
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

