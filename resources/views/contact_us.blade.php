@extends('includes.head')

@extends('includes.header')

	<!-- Start Contact Us Area -->
	<div class="contact-page bg2">
		<div class="container">
			<div class="row justify-content-center row-bg">
				<!-- mian-sec-title -->
				<div class="mian-sec-title">
                    @guest
					<h3> كن دائمــاً على تواصل مباشر معنا </h3>
                    @else
                     <h3> كن دائمــاً على تواصل مباشر معنا <span style="color:blue"><b>{{ Auth::user()->full_name }}</b></span></h3>
                    @endguest
				</div>
				<div class="col-lg-5 col-md-5 col-xs-12">
					<div class="contact-mn-img">
						<img src="{{asset('assets/img/images/contact_img.png')}}" alt="">
					</div>
				</div><!-- // Col -->
				<div class="col-lg-7 col-md-5 col-xs-12">
					<!-- Main Form -->
					<div class="main-form contact-form-style">
						<!-- Register Form -->
                        <form role="form" class="row" method="post" action="{{ route('post_contact_us') }}">
                            @csrf
							<div class="col-lg-6 col-xs-12">
								<div class="form-group">
									<label> الإسـم بالكامل <span class="imp-inp"> * </span> </label>
									<input type="text" name="name" class="form-control" placeholder="اكتب الإسم كاملاً">
								</div>
								<div class="form-group">
									<label> البريد الإلكتروني <span class="imp-inp"> * </span> </label>
									<input type="email" name="email" class="form-control" placeholder="ادخل البريد الإلكتروني">
								</div>
							</div>
							<div class="col-lg-6 col-xs-12">
								<div class="form-group">
									<label> تفاصيل الرسالة <span class="imp-inp"> * </span> </label>
									<div class="icon-input">
										<textarea class="form-control" name="content" rows="5"></textarea>
									</div>
								</div>
							</div>
							<div class="form-btn">
								<button class="btn main-btn primary-btn" type="submit"> <span> إرســال </span></button>
							</div>
						</form>
					</div>
					<div class="contact-opt">
						<ul>
							<li class="list-inline-item">
								<div class="contc-dv">
									<img src="{{asset('assets/img/icons/phone_call_icon.svg')}}" alt="">
									<a href="tel:+1234567890" target="_blank"> +966 012 345 67 890 </a>
									<a href="tel:+1234567890" target="_blank"> +966 012 345 67 890 </a>
								</div>
							</li>
							<li class="list-inline-item">
								<div class="contc-dv">
									<img src="{{asset('assets/img/icons/email_icon.svg')}}" alt="">
									<a href="mailto: abc@example.com" target="_blank"> support@sitename.com </a>
								</div>
							</li>
						</ul>
					</div>
				</div><!-- // Col -->
			</div><!-- // Row -->
		</div><!-- // Container -->
	</div><!-- // Section -->
	<!-- End Contact Us Area -->

@extends('includes.footer-links')
@extends('includes.footer')
