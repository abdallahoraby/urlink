@extends('includes.head')

	<!-- Landing Page -->
	<div class="landing-page-area bg2 no-top-mrg padd-50 dark-2">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-xs-12">
					<div class="lndg-main-logo">
						<a href="{{ url('/') }}"><img src="{{asset('assets/img/logo/logo_wt.png')}}" alt=""></a>
					</div>
                    <div class="lndg-page-sections">
						<!-- Landing Top Section -->
						<div class="lndg-main-top-sec " >
							<div class="user-card bg-img">
								<img src="{{url($data['page_profile_icon'])}}" alt="">
								<div class="user-ttl-nm">
									<h3 class="lng-user-name"> {{$data['page_name']}}</h3>
									<h5 class="lng-user-title">{{$data['page_title']}} </h5>
									<h6 class="lng-city"> <i class="fa-solid fa-location-dot"></i> {{$data['page_city']}} ، {{$data['page_country']}}</h6>
								</div>
							</div>
						</div>
						<div class="landing-content">
                            @if(! $data['links']->isEmpty())
							<!-- Social Accounts Section -->
							<div class="lndg-sec lndg-social-sec bg-rond">
								<ul>
                                    @foreach($data['links'] as $link)

                                                @php
                                                if ( strpos( $link['link_url'], 'https://' ) === false && strpos( $link['link_url'], 'http://' ) === false) {
                                                    $link['link_url'] = "//" . $link['link_url'];
                                                }
                                                @endphp
                                                <!-- Faceboock -->
                                                @if($link['link_name'] == "فيسبوك")
                                                <li class="list-inline-item">
                                                    <div class="social-item">
                                                        <a href="{{$link['link_url']}}" class="facebook-link" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                                                    </div>
                                                </li>
                                                <!-- Twitter -->
                                                @elseif($link['link_name'] == "تويتر")
                                                <li class="list-inline-item">
                                                    <div class="social-item">
                                                        <a href="{{$link['link_url']}}" class="twitter-link" target="_blank"> <i class="fa-brands fa-twitter"></i></a>
                                                    </div>
                                                </li>
                                                <!-- Insta -->
                                                @elseif($link['link_name'] == "انستجرام")
                                                <li class="list-inline-item">
                                                    <div class="social-item">
                                                        <a href="{{$link['link_url']}}" class="insta-link" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                                    </div>
                                                </li>
                                                <!-- Whatsapp -->
                                                @elseif($link['link_name'] == "واتساب")
                                                <li class="list-inline-item">
                                                    <div class="social-item">
                                                        <a href="{{$link['link_url']}}" class="whatsapp-link" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                                                    </div>
                                                </li>
                                                @endif

                                    @endforeach

								</ul>
							</div>
                            @endif

                            @if( $data->sections)
                                @foreach($data->sections as $section)
                                        @if($section['section_type'] == 'text')
                                        <!-- About Section -->
							<div class="lndg-sec lndg-about-sec bg3 padd-30">
								<div class="lndg-main-title-sec">
									<h6> نبذه عني </h6>
									<h3> {{$section['section_title']}}</h3>
								</div>
								<div class="sec-card-content">
									<p>
                                        {{$section['section_content']}}
									</p>
								</div>
							</div>

                            @elseif($section['section_type'] == 'image')
							<!-- Image Section -->
							<div class="lndg-sec lndg-one-img bg1 padd-30">
								<div class="lndg-main-title-sec">
									<h6> صورة </h6>
									<h3>{{$section['section_title']}}</h3>
								</div>
								<div class="sec-card-content">
									<img src="{{asset($section['section_url'])}}" alt="">
								</div>
							</div>

                            @elseif($section['section_type'] == 'slider')
							<!-- Gallery Images Section -->
							<div class="lndg-sec lndg-gallery-imgs bg3 padd-30">
								<div class="lndg-main-title-sec">
									<h6> صورة </h6>
									<h3>{{$section['section_title']}}</h3>
								</div>
								<div class="sec-card-content">
									<div class="owl-carousel owl-theme gallery-imgs">
										@foreach($section['section_url'] as $url)
                                            <div class="item">
                                                <div class="gl-img">
                                                    <img src="{{asset($url)}}" alt="">
                                                </div>
                                            </div>
                                        @endforeach

									</div>
								</div>
							</div>

                            @elseif($section['section_type'] == 'vimeo' || $section['section_type'] == 'youtube')
							<!-- Video Section -->
							<div class="lndg-sec lndg-video-sec bg1 padd-30">
								<div class="lndg-main-title-sec">
									<h6> فيديــو </h6>
									<h3>{{$section['section_title']}}</h3>
								</div>
								<div class="sec-card-content">
									<iframe width="100%" height="315" src="{{$section['section_url']}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div>
							</div>

                            @elseif($section['section_type'] == 'soundcloud' )
							<!-- SoundCloud Section -->
							<div class="lndg-sec lndg-soundcloud bg3 padd-30">
								<div class="lndg-main-title-sec">
									<h6> استمع </h6>
									<h3> {{$section['section_title']}}</h3>
								</div>
								<div class="sec-card-content">
									<iframe width="100%" height="166" scrolling="no" frameborder="no" allow="autoplay" src="{{$section['section_url']}}"></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"><a href="https://soundcloud.com/amr-ismail-10" title="Amr Ismail" target="_blank" style="color: #cccccc; text-decoration: none;">Amr Ismail</a> · <a href="https://soundcloud.com/amr-ismail-10/gazaga" title="البلياتشو - عمدان النور - Gazaga -" target="_blank" style="color: #cccccc; text-decoration: none;">البلياتشو - عمدان النور - Gazaga -</a></div>
								</div>
							</div>
                            @endif
                        @endforeach
                    @endif
							<!-- Contact Me Section -->
							<div class="lndg-sec lndg-contact-me padd-30">
								<div class="contact-buttons">
								<a href="mailto: {{$data['page_contact_email']}}" class="btn outline-btn" type="button"> <i class="fi fi-rr-envelope"></i> راسلني </a>
								<a href="tel: {{$data['page_contact_phone']}}" class="btn solid-btn" type="button"> <i class="fi fi-rr-phone-call"></i> اتصل بي </a>
								</div>
							</div>
						</div><!-- // landing content Sections -->
                    </div><!-- // Lndg Page Sections -->
					<div class="lndg-footet">
						<div class="co-ft-links">
							<h4> جميع الحقوق محفوظة لدي <a href="{{ url('/') }}"> يورلينك </a> © 2022 </h4>
						</div>
					</div>
				</div><!-- // Col -->
			</div><!-- // Row -->
		</div><!-- // Container -->
	</div><!-- // Section -->
	<!-- End Landing Page -->

@extends('includes.footer')
