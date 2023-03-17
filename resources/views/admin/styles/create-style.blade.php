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
                                @if(!empty($styles))
                                    <div class="container">
                                        <h2>قائمة التصميمات</h2>
                                        <table class="table table-hover">
                                        <thead>
                                            <tr>
                                            <th>اسم التصميم</th>
                                            <th>صورة التصميم</th>
                                            <th>حالة التصميم</th>
                                            <th>نشاط التصميم</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                @foreach($styles as $style)
                                            <tr>
                                            <td>{{$style->style_name}}</td>
                                            <td>{{$style->style_image}}</td>
                                            <td>{{$style->style_fee}}</td>
                                            @if($style->status == 1)
                                            <td>نشط</td>
                                            @else
                                            <td>موقوف</td>
                                            @endif
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
                                                <th>حالة الاشتراك</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                    @foreach($admins as $admin)
                                                <tr>
                                                <td>{{$admin->full_name}}</td>
                                                <td>{{$admin->email}}</td>
                                                <td>{{$admin->mobile}}</td>
                                                <td>{{$admin->subscription}}</td>
                                                </tr>
                                                <tr>
                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
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
