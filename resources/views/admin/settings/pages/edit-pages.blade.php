<?php
    use Illuminate\Support\Facades\URL;
?>
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

                    @if( !isset($pages) )

                        <span class="text-center"> لايوجد بيانات </span>

                    @else

                    <!-- table of pages -->
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="thead-dark">
                            <tr>
                                <th> الصفحة </th>
                                <th> النوع </th>
                                <th> عرض </th>
                                <th> تعديل </th>
                            </tr>
                            </thead>
                            <tbody>



                                @foreach( $pages as $page )

                                    <tr>
                                        <td class="text-bold-500"> {{$page->title}} </td>
                                        <td class="text-bold-500"> {{$page->type}} </td>
                                        <td>  
                                            <a target="_blank" href="{{ url('') . '/' . $page->slug ?? '#' }}" class="btn btn-light round mr-1 mb-1"> <i class="fa-solid fa-link"></i> </a>
                                        </td>
                                        <td> <a href="{{ url()->current() . '/' . $page->id  }}" class="btn btn-primary round mr-1 mb-1"> <i class="fa-regular fa-pen-to-square"></i> </a> </td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>

                        @endif

                </div><!-- // Col -->
            </div><!-- // Row -->
        </div><!-- // Container -->
    </div><!-- // Section -->
    <!-- End Profile Pages -->

@extends('includes.footer-links')
@extends('includes.footer')

