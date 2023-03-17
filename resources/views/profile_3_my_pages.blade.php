@extends('includes.head')

@extends('includes.header-profile')

	@include('alert-show')

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
								<img src="{{url($userData->avatar)}}" alt="">
								<h3> {{$userData->full_name}} </h3>
								<a href="landing_page_1.php"> عرض صفحتي </a>
							</div>
						</div>
						<!-- Profile Links -->
						<div class="prof-links">
							<ul>
								<li>
									<a href="{{ url('/user/profile/get') }}" class="prof-link"> <img src="{{asset('assets/img/icons/prof_user_icon.svg')}}" alt=""> معلومــات الحســاب </a>
								</li>
								<li>
									<a href="{{ url('/user/profile/password') }}" class="prof-link"> <img src="{{asset('assets/img/icons/prof_pass_icon.svg')}}" alt=""> تغيير كلمة المرور</a>
								</li>
								<li>
									<a href="{{ url('/user/profile/pages') }}" class="prof-link active"> <img src="{{asset('assets/img/icons/prof_sett_icon.svg')}}" alt=""> إدارة صفحاتــي </a>
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

{{--						check if user has active sub first--}}

						<div class="divider">
							<div class="divider-text"> الخطة الحالية </div>
						</div>

						@if( !empty( App\Http\Controllers\Users\PlanSubscriptionController::getActiveUserSubs() ) )

							@foreach( App\Http\Controllers\Users\PlanSubscriptionController::getActiveUserSubs() as $subscription )
								<div class="alert bg-rgba-primary alert-dismissible mb-2" role="alert">
									<div class="d-flex align-items-center justify-content-between">
										<div class="left-sec">
											<strong> {{$subscription->name}} </strong>
											<p><span> ينتهي الاشتراك في  </span> <strong> {{ date('d-m-Y', strtotime($subscription->ends_at) ) }} </strong></p>
										</div>

										<div class="center-sec">
											{{ $subscription->price }} {{ $subscription->currency }} / {{$subscription->invoice_interval}}
										</div>

										<div class="right-sec">
											<a href="{{ route('remove_subscription', $subscription->id)  }}" class="btn btn-light-danger mr-1 mb-1"> الغاء الاشتراك </a>
										</div>
									</div>
								</div>
							@endforeach

						@else
							<span class="text-center d-block"> لاتوجد خطط مفعلة حاليا </span>
						@endif

						<div class="divider">
							<div class="divider-text"> الخطط السابقة </div>
						</div>

						@if( !empty( App\Http\Controllers\Users\PlanSubscriptionController::getEndedUserSubs() ) )

							@foreach( App\Http\Controllers\Users\PlanSubscriptionController::getEndedUserSubs() as $subscription )
								<div class="alert bg-rgba-secondary alert-dismissible mb-2" role="alert">
									<div class="d-flex align-items-center justify-content-between">
										<div class="left-sec">
											<strong> {{$subscription->name}} </strong>
											<p> {{$subscription->description}} </p>
										</div>

										<div class="center-sec">
											{{ $subscription->price }} {{ $subscription->currency }} / {{$subscription->invoice_interval}}
										</div>

										<div class="right-sec">
											<span> تم الالغاء في: </span> <strong> {{ date('d-m-Y', strtotime($subscription->canceled_at) ) }} </strong>
										</div>
									</div>
								</div>
							@endforeach
						@else
							<span class="text-center d-block"> لاتوجد خطط سابقة حاليا </span>
						@endif

						<div class="d-flex justify-content-center align-items-center mt-3 mb-3">
							<a href="{{ route('plans-page')  }}" class="btn btn-light-primary mr-1 mb-1">عرض خطط الاسعار </a>
						</div>


						<div class="pages-cards">
							<div class="row">
                                @if(!empty($data))
                                @foreach($data as $landingPage)
                                    <div class="col-lg-4 col-xs-12 padd-8px">
                                        <div class="sm-page-card">
                                            <div class="lndg-page-sections">
                                                <!-- Landing Top Section -->
                                                <div class="lndg-main-top-sec" style="background-image: @if($landingPage->page_profile_banner) url({{asset($landingPage->page_profile_banner)}}); @else url({{'http://localhost/urlink-fcode/public/assets/img/background/bg_img_02.jpg'}}); @endif">
                                                    <div class="user-card bg-img">
                                                        <img src="{{asset($landingPage->page_profile_icon)}}" alt="">
                                                    </div>
                                                    <button class="btn mn-opt-btn" type="button"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                                </div><!-- // Landing Top Section -->
                                                <!--  -->
                                                <div class="opt-links-show">
                                                    <ul>
                                                        <li>
                                                            <button class="btn share-btn" onclick='openShareModal("{{ $landingPage->page_url }}")' data-bs-toggle="modal" data-bs-target="#shareModalModal" type="type"> <i class="fi fi-rr-share"></i> مشاركة </button>
                                                        </li>
                                                        <li>
                                                            <button class="btn copy-link" type="type" onclick="copyToClipboard('{{ $landingPage->page_url }}',event)"> <i class="fi fi-rr-copy-alt"></i> نسخ الرابط </button>
                                                        </li>
                                                        <li>
                                                            <button class="btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deletePage('{{route('delete_landing_page',['page_id' => $landingPage->landing_page_id ])}}')" type="type"> <i class="fi fi-rr-trash"></i> حذف الصفحة  </button>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <!-- Confirm Delete Modal -->
                                                <div class="modal fade share-box " id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <header class="bg-danger text-white d-flex justify-content-between align-items-center p-3 rounded">
                                                                <span> هل تريد بالفعل حذف هذه الصفحة؟</span>
                                                                <div class="close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></div>
                                                            </header>
                                                            <div class="content">
                                                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" aria-label="Close" > الغاء </button>
                                                                <a href="#" class="btn btn-danger copy-link" id="confirmPageDelete" type="button"> حذف</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Details List -->
                                                <div class="page-dt-info">
                                                    <div class="page-dt-list">
                                                        <ul>
                                                            <li>
                                                                <div class="page-dt-item">
                                                                    <h5> اسم الصفحة </h5>
                                                                    <h3>{{$landingPage->page_name}}</h3>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="page-dt-item">
                                                                    <h5> الحسابات المربوطة بالحساب </h5>
                                                                    <h3> 2 </h3>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="page-dt-item">
                                                                    <h5> آخـر تعديل </h5>
                                                                    <h3> {{$landingPage->updated_at->format('m/d/Y')}}</h3>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div><!-- // page-dt-list -->
                                                    <!-- Buttons -->
                                                    <div class="page-mng-btns">
                                                        <a href="{{ $landingPage->page_url }}" target="_blank" class="btn view-btn" type="button"><i class="fi fi-rr-eye"></i> عرض </a>
                                                        <a href="{{ route('UPDATE_get_landing_page',['page_id' => $landingPage->landing_page_id ]) }}" class="btn edit-btn" type="button"><i class="fi fi-rr-edit"></i> تعديل </a>
                                                        {{-- <a href="{{ route('UPDATE_get_style',['page_id' => $landingPage->landing_page_id ]) }}" class="btn edit-btn" type="button"><i class="fi fi-rr-edit"></i> تغيير التصميم </a> --}}
                                                        <a href="{{ route('GET_statistics',['page_id' => $landingPage->landing_page_id ]) }}" class="btn view-sts-btn" type="button"><i class="fi fi-rr-stats"></i> عرض إحصائيات الصفحة </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- 1 -->
                                    </div>
                                @endforeach
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
