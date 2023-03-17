@extends('includes.head')

@extends('includes.header')

	<!-- Start Privacy Area -->
	<div class="sec-area bg2 padd-50">
		<div class="container">
			<div class="row">
				<div class="col">
                    <div class="sec-div">
                        <div class="prv-sec-title">
                            <h3>
                                @if($privacyData['header_title'])
                                    {!!$privacyData['header_title']!!}
                                @else
                                 هذه صفحة لعرض محتوى وهمي حيث يمكن استخدامها لأكثر من غرض
                                @endif
                                </h3>
                        </div>
                        <p>
                            @if($privacyData['header_content'])
                                {!!$privacyData['header_content']!!}
                            @else
                            نساعدك على بناء صفحة هبوط مميزة تساعدك على عرض جميع البيانات ووسائل التواصل والسوشيال ميديا الخاصة بك وإداراتها بكل سهولة وعرضها على جمهورك نساعدك على بناء صفحة هبوط مميزة تساعدك على عرض جميع البيانات ووسائل التواصل والسوشيال ميديا الخاصة بك وإداراتها بكل سهولة وعرضها على جمهورك نساعدك على بناء صفحة هبوط مميزة تساعدك على عرض جميع البيانات ووسائل التواصل والسوشيال ميديا الخاصة بك وإداراتها بكل سهولة وعرضها على جمهورك
                            @endif
                        </p>
                    </div>
				</div><!-- // Col -->
			</div><!-- // Row -->
		</div><!-- // Container -->
	</div><!-- // Section -->
	<!-- End Privacy Area -->

	<!-- Start Privacy Area -->
	<div class="sec-area padd-50">
		<div class="container">
			<div class="row">
				<div class="col">
                    <div class="sec-div">
                        <div class="prv-sec-title">
                            <h3>
                            @if($privacyData['body_title'])
                                {!!$privacyData['body_title']!!}
                            @else
                                هنا يمكنك عرض المعلومات على هيئة نقاط منظمة
                            @endif
                            </h3>
                        </div>

                        <ul>
                            @if($privacyData['body_content'])
                            {!!$privacyData['body_content']!!}
                            @else
                            <li>
                                <p>
                                    نساعدك على بناء صفحة هبوط مميزة تساعدك على عرض جميع البيانات
                                </p>
                            </li>
                            <li>
                                <p>
                                    يمكنك عرض جميع حساباتك من خلال صفحة واحدة
                                </p>
                            </li>
                            <li>
                                <p>
                                    نساعدك على جذب جمهورك بأسهل الطرق
                                </p>
                            </li>
                            <li>
                                <p>
                                    سهولة تواصل جمهورك معك من أهم اولوياتنا
                                </p>
                            </li>
                            <li>
                                <p>
                                    نساعدك على بناء صفحة هبوط مميزة تساعدك على عرض جميع البيانات
                                </p>
                            </li>
                            @endif
                        </ul>
                    </div>
				</div><!-- // Col -->
			</div><!-- // Row -->
		</div><!-- // Container -->
	</div><!-- // Section -->
	<!-- End Privacy Area -->


@extends('includes.footer-links')
@extends('includes.footer')
