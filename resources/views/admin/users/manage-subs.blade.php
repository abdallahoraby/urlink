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
                        <h3> <img src="{{asset('assets/img/icons/mng_pages.svg')}}" alt=""> إدارة اشتراكات المستخدم - {{ Illuminate\Support\Str::ucfirst($user_data->full_name) . ' - ' . $user_data->email }}</h3>
                    </div>


                    <div class="row">

                        <div class="container">
                            <div class="divider">
                                <div class="divider-text"> الخطة الحالية </div>
                            </div>

                            @if( !empty( App\Http\Controllers\Users\PlanSubscriptionController::getActiveUserSubs($user_data->user_id) ) )

                                @foreach( App\Http\Controllers\Users\PlanSubscriptionController::getActiveUserSubs($user_data->user_id) as $subscription )
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

                            @if( !empty( App\Http\Controllers\Users\PlanSubscriptionController::getEndedUserSubs($user_data->user_id) ) )

                                @foreach( App\Http\Controllers\Users\PlanSubscriptionController::getEndedUserSubs($user_data->user_id) as $subscription )
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
