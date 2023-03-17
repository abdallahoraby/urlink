@extends('includes.head')

@extends('includes.header')

@include('alert-show')


<!-- Start Plans -->

<div id="generic_price_table">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--PRICE HEADING START-->
                    <div class="price-heading clearfix">
                        <h1> خطط الأسعار </h1>
                    </div>
                    <!--//PRICE HEADING END-->
                </div>
            </div>
        </div>
        <div class="container">

            <!--BLOCK ROW START-->
            <div class="row">

                @if( $plans )

                    @foreach( $plans as $plan )
                        <div class="col-md-4">

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
                                    <span class="cent">{{explode('.', $plan->price)[1] ?? 00}} . </span>
                                    <span class="currency">{{explode('.', $plan->price)[0] ?? ''}}</span>
                                    <span class="sign">{{$plan->currency ?? ''}}</span>
                                    <span class="month">/{{$plan->invoice_interval ?? ''}}</span>
                                </span>
                                    </div>
                                    <!--//PRICE END-->

                                </div>
                                <!--//HEAD PRICE DETAIL END-->

                                <!--FEATURE LIST START-->
                                <div class="generic_feature_list">
                                    <p>{{$plan->description ?? ''}}</p>
{{--                                    <ul>--}}
{{--                                        <li><span>2GB</span> Bandwidth</li>--}}
{{--                                        <li><span>150GB</span> Storage</li>--}}
{{--                                        <li><span>12</span> Accounts</li>--}}
{{--                                        <li><span>7</span> Host Domain</li>--}}
{{--                                        <li><span>24/7</span> Support</li>--}}
{{--                                    </ul>--}}
                                </div>
                                <!--//FEATURE LIST END-->

                                <!--BUTTON START-->
                                <div class="generic_price_btn clearfix">
                                    <a class="" href="{{route('add_subscription', $plan->id)}}"> اشترك </a>
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
