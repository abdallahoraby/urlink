@extends('includes.head')

@extends('includes.header')


	@if( isset($homeContent['section_1']) )
	<!-- Start intro Area -->
	<div class="intro-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 xs-order-2">
					<div class="intro-sec-info">
                        <h3>
							{{$homeContent['section_1']['title'] ?? ''}}
                        </h3>
						<p>
							{{$homeContent['section_1']['description'] ?? ''}}
						</p>
						<div class="intro-sec-info-buttons">
							<a href="{{$homeContent['section_1']['button_1_link'] ?? '#'}}" class="btn main-btn secondary-btn"> {{$homeContent['section_1']['button_1_text'] ?? ''}} </a>
							<a href="{{$homeContent['section_1']['button_2_link'] ?? '#'}}" class="btn main-btn primary-btn"> {{$homeContent['section_1']['button_2_text'] ?? ''}} </a>
						</div>
					</div>
				</div><!-- // Col -->
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 xs-order-1">
					<div class="intro-sec-img">

						<img src="{{ asset($homeContent['section_1']['image']) }}" alt="image">

					</div>
				</div><!-- // Col -->
			</div><!-- // Row -->
		</div><!-- // Container -->
	</div><!-- // Section -->
	<!-- End intro Area -->
	@endif




@extends('includes.footer-links')
@extends('includes.footer')
	<!-- Start   Area -->
	<div class=" -area">
		<div class="container">
			<div class="row">
				<div class="col">

				</div><!-- // Col -->
			</div><!-- // Row -->
		</div><!-- // Container -->
	</div><!-- // Section -->
	<!-- End   Area -->
