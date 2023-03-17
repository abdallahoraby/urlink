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
								<img src="{{asset('assets/img/background/bg_img_01.jpg')}}" alt="">
								<h3> {{'Admin'}}</h3>
								<a href="{{ url('/user/profile/get') }}"> عرض صفحتي </a>
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
                    <div class="pages-cards">
                        <div class="row">
                            @if(!empty($setting))
                            {{-- {{ url('/admin/setting/edit/'.$item->setting_id) }} --}}
                            <form role="form" class="studentform-section" method="post" action="{{ url('/admin/setting/edit/') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                            <div class="container">
                                <h2>{!!$setting['type']!!}</h2>
                                <table class="table table-hover">

                                <thead>
                                    <tr>
                                    <th>اسم الحقل</th>
                                    <th>البيانات</th>
                                    <th>حفظ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{!!$setting->key!!}</td>
                                        <td>

                                        @if($setting->key == 'header_image' || $setting->key == 'body_image')

                                        <input type="hidden" name="type" value="image">
                                        <img src="{{asset($setting->value)}}" style="width:100px;height:100px;" alt="">
                                        <br><br><br>
                                        <input type="file" name="image" class="form-control" accept="image/*">
                                        @else
                                        <input type="hidden" name="type" value="text">
                                        <textarea class="ckeditor form-control" name="content"> {!!$setting->value!!}</textarea>

                                        @endif
                                        </td>

                                        <td><a href="{{ url('/admin/setting/edit/') }}"><button type="submit" class="btn btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                          </svg></button></a></td>
                                        </td>





                                        </tr>

                                        </tbody>
                                    </table>
                                    <input type="hidden" name="setting_id" value="{{$setting->setting_id}}">
                                </div>
                            </form>
                            @endif
                            </div>




				</div><!-- // Col -->
			</div><!-- // Row -->
		</div><!-- // Container -->
	</div><!-- // Section -->
	<!-- End Profile Pages -->

@extends('includes.footer-links')
@extends('includes.footer')

{{-- <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script> --}}
