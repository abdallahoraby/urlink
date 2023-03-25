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
                        <h1 class="divider-text"> تعديل خطة الأسعار  </h1>
                    </div>
                    <!--//PRICE HEADING END-->
                </div>
            </div>
        </div>
        <div class="container">

            <!--BLOCK ROW START-->
            <div class="row">

                @if( $plan )

                    <div class="row">
                        <div class="col-xl">
                            <div class="card mb-4">


                                <div class="card-body">
                                    <form method="post" action="{{ url('/admin/setting/update-plan') }}">
                                        @csrf
                                        @method('PUT')

                                        @php
                                            if( $plan->is_active == true ):
                                                $is_active = 'checked';
                                            else:
                                                $is_active = '';
                                            endif;

                                        @endphp

                                        <div class="is_active_switch">
                                            <div class="switch">
                                                <input type="checkbox" id="switch1" class="switch__input" name="plan_is_active" {{$is_active}}>
                                                <label for="switch1" class="switch__label"> مفعلة  </label>
                                            </div>
                                            <span> غير مفعلة </span>
                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label" for="plan_name"> اسم الخطة </label>
                                            <input type="text" class="form-control" id="plan_name" name="plan_name" placeholder="اسم الخطة" value="{{$plan->name ?? ''}}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="plan_description"> وصف الخطة </label>
                                            <textarea id="plan_description" name="plan_description" class="form-control" placeholder="وصف الخطة"> {{$plan->description ?? ''}} </textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="plan_price"> سعر الخطة </label>
                                            <input type="text" class="form-control" id="plan_price" name="plan_price" placeholder="سعر الخطة" value="{{$plan->price ?? 0}}">
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label" for="plan_period"> مدة التفعيل </label>
                                                <input type="number" class="form-control" id="plan_period" name="plan_period" placeholder="مدة التفعيل" value="{{$plan->invoice_period ?? 0}}">
                                            </div>
                                            <div class="col-md-6">

                                                <label class="form-label" for="plan_interval"> تجدد كل </label>
                                                <div class="invoice_interval">
                                                    <select id="plan_interval" name="plan_interval" class="form-select" aria-hidden="true">
                                                        <option value="day" {{ $plan->invoice_interval === 'day' ? "selected" : "" }} > يومي </option>
                                                        <option value="week" {{ $plan->invoice_interval === 'week' ? "selected" : "" }}> أسبوعي </option>
                                                        <option value="month" {{ $plan->invoice_interval === 'month' ? "selected" : "" }}> شهري </option>
                                                        <option value="year" {{ $plan->invoice_interval === 'year' ? "selected" : "" }}> سنوي </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" value="{{$plan->id}}" name="plan_id">
                                        <button type="submit" class="btn btn-primary"> تعديل </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif

            </div>
            <!--//BLOCK ROW END-->


        </div>
    </section>
</div>

<!-- End Plans -->




@extends('includes.footer-links')
@extends('includes.footer')
