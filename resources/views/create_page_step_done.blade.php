@extends('includes.head')

@extends('includes.header-profile')


	<!-- Profile Pages -->
	<div class="profile-pages-area bg2 padd-50">
		<div class="container">
			<div class="row justify-content-center">
                <div class="col-lg-8 col-xs-12">
                    <div class="page-done-box">
                        <img src="{{asset('assets/img/images/complete_img.png')}}" alt="">
                        <h3> تم إنشــاء صفحتك الشخصية بنجاح </h3>
                        <h5> يمكنك الآن مشاركة صفحتك مع جمهورك وصنع المزيد من النجاحات </h5>
                        <div class="btns">
                            <button class="btn primary-btn" type="button"> <i class="fi fi-rr-eye"></i> عرض الصفحة </button>
                            <button class="btn copy-btn" type="button"> <i class="fi fi-rr-copy-alt"></i> نسخ الرابط </button>
                        </div>
                    </div>
                </div><!-- Col -->
            </div>
        </div>
    </div>




    @extends('includes.footer-links')
    @extends('includes.footer')