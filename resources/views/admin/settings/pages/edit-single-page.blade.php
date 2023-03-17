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
                            <h3> {{'Admin'}}</h3>
                            <a href="{{ url('/user/profile/get') }}"> عرض صفحتي </a>
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
                <div class="pages-cards">


                    @if(session('success'))
                        <!-- show alert -->
                        <script>
                            window.onload = function() {
                                showAlert('تم حفظ البيانات');
                            }
                        </script>
                    @endif

                    @if(session('errors'))
                        <!-- show alert -->
                        <script>
                            window.onload = function() {
                                showAlert('برجاء مراجعة البيانات', '', false, 3000, 'error', 'center');
                            }
                        </script>
                    @endif

                    @if(!empty($page))


                        <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> {{$page->title}} </h4>
                        </div>

                        @php
                            $page_content = json_decode($page->content);
                        @endphp

                        <div class="card-body">

                            @if($errors->any())
                                {!! implode('', $errors->all('<div>:message</div>')) !!}
                            @endif

                            @if( empty($page->slug) )
                                @include('admin.settings.pages.home_page')
                            @else
                                @include('admin.settings.pages.' . $page->slug)
                            @endif

                        </div>

                    </div>

                    @endif

                </div><!-- // Col -->
            </div><!-- // Row -->
        </div><!-- // Container -->
    </div><!-- // Section -->
    <!-- End Profile Pages -->

@extends('includes.footer-links')
@extends('includes.footer')

