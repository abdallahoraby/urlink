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
								<h3> Admin </h3>
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
							<h3> <img src="{{asset('assets/img/icons/mng_pages.svg')}}" alt=""> إدارة صفحاتــي </h3>
						</div>
						<div class="pages-cards">
							<div class="row">
                                @if(!empty($users))
                                    <div class="container">
                                        <h2>قائمة الأعضاء</h2>
                                        <table class="table table-hover">
                                        <thead>
                                            <tr>
                                            <th>الاسم الكامل</th>
                                            <th>البريدالإلكتروني</th>
                                            <th>الموبايل</th>
                                            <th>حالة الاشتراك</th>
                                            <th>حالة الحساب</th>
                                            <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                @foreach($users as $user)
                                            <tr>
                                            <td>{{$user->full_name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->mobile}}</td>
                                            <td>{{$user->subscription}}</td>
                                            @if($user->status == 1)
                                            <td>نشط</td>
                                            <td><a href="{{ url('/admin/users/operations/activity/' . $user->user_id . '/0') }}" >
                                                    <button type="button" class="btn btn-secondary">إيقاف الحساب</button>
                                                </a></td>

                                            @else
                                            <td>موقوف</td>
                                            <td><a href="{{ url('/admin/users/operations/activity/' . $user->user_id . '/1') }}" >
                                                    <button type="button" class="btn btn-primary">تفعيل الحساب</button>
                                                </a></td>
                                            @endif
                                            <td><a href="{{ url('/admin/users/operations/rule/' . $user->user_id . '/1') }}" >
                                                <button type="button" class="btn btn-primary">وضع مسؤول</button>
                                            </a></td>

                                            </tr>

                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
								</div>

                                <div class="row">
                                    @if(!empty($admins))
                                        <div class="container">
                                            <h2>قائمة المديرين</h2>
                                            <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                <th>الاسم الكامل</th>
                                                <th>البريدالإلكتروني</th>
                                                <th>الموبايل</th>
                                                <th>حالة الحساب</th>
                                                <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                    @foreach($admins as $admin)
                                                <tr>
                                                <td>{{$admin->full_name}}</td>
                                                <td>{{$admin->email}}</td>
                                                <td>{{$admin->mobile}}</td>
                                                @if($admin->status == 1)
                                                <td>نشط</td>
                                                <td><a href="{{ url('/admin/users/operations/activity/' . $admin->user_id . '/0') }}" >
                                                        <button type="button" class="btn btn-secondary">إيقاف الحساب</button>
                                                    </a></td>

                                                @else
                                                <td>موقوف</td>
                                                <td><a href="{{ url('/admin/users/operations/activity/' . $admin->user_id . '/1') }}" >
                                                        <button type="button" class="btn btn-primary">تفعيل الحساب</button>
                                                    </a></td>
                                                @endif
                                                <td><a href="{{ url('/admin/users/operations/rule/' . $admin->user_id . '/0') }}" >
                                                    <button type="button" class="btn btn-primary">وضع عضو</button>
                                                </a></td>
                                                </tr>
                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                    </div>
							</div><!-- // Row -->

                            <div class="row">

                                    <div class="container">
                                        <h2>تسجيل مستخدم جديد</h2>
                                        <div class="main-form">
                                            <!-- Register Form -->
                                            <form class="main-form row" method="POST" action="{{ route('createNewUser') }}">
                                                @csrf
                                                <label for="">الصلاحية</label>
                                                <select class="form-control" id="" name="rule">
                                                <option  value="0">عضو</option>
                                                <option value="1">مسؤول</option>

                                                </select>
                                                <div class="form-group col-md-12 col-xs-12">

                                                    <label> الإسـم كاملاً </label>

                                                    <input name="name" type="text" value="{{ old('name') }}" class="form-control" placeholder="مثال : آدم محمود ابراهيم" required>
                                                    @error('name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-12 col-xs-12">
                                                    <label> البريد الإلكتروني</label>
                                                    <input name="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="ادخل البريد الإلكتروني" required>
                                                    @error('email')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-12 col-xs-12">
                                                    <label> انشئ كلمة المرور </label>
                                                    <input type="password" class="form-control" name="password" {{-- value="{{ old('password') }}" --}} minlength="8" placeholder="***********" required>
                                                    @error('password')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-12 col-xs-12">
                                                    <label> تأكيد كلمة المرور </label>
                                                    <input type="password" class="form-control" name="password_confirmation"  minlength="8" placeholder="***********" required>
                                                </div>
                                                <!-- Button -->
                                                <div class="form-group col-12 frm-btn">
                                                    <button type="submit" class="btn main-grn-btn primary-btn">انشاء الحساب </button>
                                                    {{-- <a href="profile_1_info.php" class="btn main-grn-btn primary-btn" type="button"> انشاء الحساب </a> --}}
                                                </div>
                                            </form>
                                        </div>
                                    </div>


                        </div><!-- // Row -->

						</div>
					</div>
				</div><!-- // Col -->
			</div><!-- // Row -->
		</div><!-- // Container -->
	</div><!-- // Section -->
	<!-- End Profile Pages -->

<!-- Share Modal -->
<div class="modal fade share-box " id="shareModalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<header>
				<span> مشاركة على حسابات التواصل </span>
				<div class="close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></div>
			</header>
			<div class="content">
				<p> شارك من خلال </p>
				<ul class="icons">
					<a href="" target='_blank' id="fbShare"><i class="fab fa-facebook-f"></i></a>
					<a href="" target='_blank'  id="twitterShare"><i class="fab fa-twitter"></i></a>
					<a href="" target='_blank' id="whatsShare"><i class="fab fa-whatsapp"></i></a>
					<a href="" target='_blank' id="telegramShare"><i class="fab fa-telegram-plane"></i></a>
				</ul>
				<p> او انسخ الرابط </p>
				<div class="field">
					<!-- <i class="url-icon uil uil-link"></i> -->
					<i class="fa-solid fa-link"></i>
                    <input type="text" id="pageLinkInputView" readonly value="">
					<button class="btn copy-link" onclick="copyToClipboard('',event)" type="button"> نسخ </button>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	// Function to open share modal
	function openShareModal(pageLink){
		document.getElementById('fbShare').href = `https://www.facebook.com/sharer/sharer.php?u=${pageLink}`;
		document.getElementById('twitterShare').href = `https://twitter.com/share?url=${pageLink}`;
		document.getElementById('whatsShare').href = `https://wa.me/?text=${pageLink}`;
		document.getElementById('telegramShare').href = `https://telegram.me/share/url?url=${pageLink}`;
		document.getElementById('pageLinkInputView').value = `${pageLink}`;

	}
	// Function To Copy Page URL On ClipBoard
	function copyToClipboard(pageLink,event){
		if(!pageLink){
			navigator.clipboard.writeText(event.srcElement.previousElementSibling.value);
		}
		else{
			navigator.clipboard.writeText(pageLink);
			event.path[3].style.display = 'none';
		}
	}


    // Function To Set Delete Page URl
    function deletePage(link){
        document.getElementById('confirmPageDelete').setAttribute("href", link);
    }

</script>

@extends('includes.footer-links')
@extends('includes.footer')
