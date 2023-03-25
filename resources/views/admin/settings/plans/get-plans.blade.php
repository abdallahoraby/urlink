@extends('includes.head')

@extends('includes.header')

@include('alert-show')


<!-- Start Plans -->

<div id="generic_price_table" class="get-all-plans">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--PRICE HEADING START-->
                    <div class="divider">
                        <h1 class="divider-text"> ادارة خطط الأسعار  </h1>
                    </div>
                    <!--//PRICE HEADING END-->

                    <div class="d-flex justify-content-start mb-5">
                        <a href="{{route('add-plan')}}" class="btn btn-primary">
                            <i class="fa-solid fa-plus"></i> اضافة خطة جديدة
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            <!--BLOCK ROW START-->
            <div class="row">

                @if( $plans )

                    @foreach( $plans as $plan )

                        @php
                            switch($plan->invoice_interval):
                                case 'day':
                                    $interval = 'يومياً';
                                    break;

                                case 'week':
                                    $interval = 'أسبوعياً';
                                    break;

                                case 'month':
                                    $interval = 'شهرياً';
                                    break;

                                case 'year':
                                    $interval = 'سنوياً';
                                    break;
                                default:
                                    $interval = '';
                                    break;
                            endswitch;
                        @endphp


                        <div class="col-md-4 mb-5">

                            <!--PRICE CONTENT START-->
                            <div class="generic_content clearfix">

                                <!--HEAD PRICE DETAIL START-->
                                <div class="generic_head_price clearfix">

                                    <!--HEAD CONTENT START-->
                                    <div class="generic_head_content clearfix">

                                        <!--HEAD START-->
                                        <div class="head_bg"></div>
                                        <div class="head">
                                            <span>{{$plan->name ?? ''}}</span>
                                        </div>
                                        <!--//HEAD END-->

                                    </div>
                                    <!--//HEAD CONTENT END-->

                                    <!--PRICE START-->
                                    <div class="generic_price_tag clearfix">
                                <span class="price">
                                    <span class="cent">{{ (!empty(explode('.', $plan->price)[1])) ? explode('.', $plan->price)[1] . ' . ' : "" }} </span>
                                    <span class="currency">{{explode('.', $plan->price)[0] ?? ''}}</span>
                                    <span class="sign">{{$plan->currency ?? ''}}</span>
                                    <span class="month">/{{$interval}}</span>
                                </span>
                                    </div>
                                    <!--//PRICE END-->

                                </div>
                                <!--//HEAD PRICE DETAIL END-->

                                <!--FEATURE LIST START-->
                                <div class="generic_feature_list">
                                    <p>{{$plan->description ?? ''}}</p>
                                </div>
                                <!--//FEATURE LIST END-->

                                <!--BUTTON START-->
                                <div class="generic_price_btn clearfix">
                                    <a class="" href="{{route('edit-plan', $plan->id)}}"> تعديل </a>
                                    <a class="btn rounded-pill btn-label-danger" id="delete-plan" href="{{route('delete-plan', $plan->id)}}"> حذف </a>
                                </div>
                                <!--//BUTTON END-->

                            </div>
                            <!--//PRICE CONTENT END-->

                        </div>
                    @endforeach

                @endif

            </div>
            <!--//BLOCK ROW END-->

        </div>
    </section>
</div>

<!-- End Plans -->




@extends('includes.footer-links')
@extends('includes.footer')
