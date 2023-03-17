<!-- <div id="preloader"></div> -->
<header class="header">
	<nav class="navbar navbar-expand-lg fixed-top" id="nav">
		<div class="container">
			<!-- Logo -->
			<a class="navbar-brand" href="{{ url('/') }}"><img src="{{asset('assets/img/logo/logo.png')}}" alt="logo"></a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fa-solid fa-bars menu-icon"></i>
				<i class="fa-solid fa-xmark close-icon"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					@auth
					<li class="nav-item">
                        @if(Auth::user()->isAdmin == 1)
                        <a href="{{route('admin_get_profile')}}" class="btn main-btn primary-btn" type="button"> لوحة التحكم</a>
                        @else
						<a href="{{ route('get_profile') }}" class="btn main-btn primary-btn" type="button"> الصفحة الشخصية</a>
                        @endif
					</li>
					@endauth
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="{{ url('/') }}"> الرئيسية </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ url('about-us') }}"> عن الموقع </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/contact-us') }}"> تواصل معنا </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/privacy') }}"> الشروط والأحكام </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/terms') }}"> سياسة الخصوصية </a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							نموذج الصفحات
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="landing_page_1.php" target="_blank"> نموذج 1 </a>
							<a class="dropdown-item" href="landing_page_2_without_banner.php" target="_blank"> نموذج 2 </a>
							<a class="dropdown-item" href="landing_page_3_social_out_line.php" target="_blank"> نموذج 3 </a>
							<a class="dropdown-item" href="landing_page_5_social_style_out_line.php" target="_blank"> نموذج 4 </a>
							<a class="dropdown-item" href="landing_page_4_dark_1.php" target="_blank"> نموذج Dark 1 </a>
							<a class="dropdown-item" href="landing_page_4_dark_2.php" target="_blank"> نموذج Dark 2 </a>
						</div>
					</li>
				</ul>
				<!-- hd left -->
				<div class="hd-left">
					<!-- Register & Login Butotns -->
					@guest
					<div class="reg-log-buttons">
						<a href="{{ route('get_register') }}" class="btn main-btn" type="button"> انشاء حساب </a>
						<a href="{{ route('get_login') }}" class="btn main-btn primary-btn" type="button"> تسجيل الدخول </a>
					</div>
					@endguest
					@auth
					<div class="reg-log-buttons">
						<a class="btn main-btn" href="{{ route('logout') }}"
						onclick="event.preventDefault();
									  document.getElementById('logout-form').submit();">
						 تسجيل الخروج
					 </a>

					 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						 @csrf
					 </form>
					{{-- 	<a href="{{ route('logout') }}" class="btn main-btn" type="button"> تسجيل الخروج </a> --}}
						{{-- <a href="{{ route('get_login') }}" class="btn main-btn primary-btn" type="button"> الصفحة الشخصية</a> --}}
					</div>

					@endauth

					{{-- <div class="reg-log-buttons">
						<a href="{{ route('get_register') }}" class="btn main-btn" type="button"> انشاء حساب </a>
						<a href="{{ route('get_login') }}" class="btn main-btn primary-btn" type="button"> تسجيل الدخول </a>
					</div> --}}
				</div>
			</div>
		</div>
	</nav>
</header>
<!-- header end -->
