@extends('includes.head')

@extends('includes.header')


<!-- Start Privacy Area -->
<div class="sec-area bg2 padd-50">
    <div class="container">

        @if( !empty($plan) )
            <div class="row justify-content-center">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card invoice-preview-card">


                        <div class="table-responsive">
                            <table class="table border-top m-0">
                                <thead>
                                <tr>
                                    <th>الخطة</th>
                                    <th>الوصف</th>
                                    <th>السعر</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-nowrap"> {{$plan->name}} </td>
                                    <td class="text-nowrap"> {{$plan->description}} </td>
                                    <td> {{$plan->price}} </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="align-top px-4 py-5">
                                        <p class="mb-2">
                                            <span> مراجعة طلبك </span>
                                        </p>
                                    </td>
                                    <td class="text-end px-4 py-5">
                                        <p class="mb-0">الاجمالي:</p>
                                    </td>
                                    <td class="px-4 py-5">
                                        <p class="fw-semibold mb-0"> {{$plan->price}}  {{$plan->currency}} </p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>

                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card mb-4">
                        <!-- Billing Address -->
                        <h5 class="card-header"> أكمال الدفع </h5>
                        <div class="card-body">
                            <form method="post" action="{{ route('complete-checkout') }}" id="checkout-form" class="fv-plugins-bootstrap5 fv-plugins-framework" >
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-sm-6 fv-plugins-icon-container">
                                        <label for="charge-customer-name" class="form-label">الاسم</label>
                                        <input type="text" id="charge-customer-name" name="charge-customer-name" class="form-control" placeholder="الاسم" required>
                                        <div class="fv-plugins-message-container invalid-feedback"> من فضلك ادخل الاسم </div>
                                    </div>

                                    <div class="form-group mb-3 col-sm-6 fv-plugins-icon-container">
                                        <label for=""> رقم جوال التواصل <span class="imp-inp"> * </span> </label>
                                        <input class="form-control" id="charge-phone" name="charge-phone" type="tel" onclick="this.setSelectionRange(0, this.value.length)" placeholder="xxx xxx xxx" value="+" required>
                                        <div class="invalid-feedback"> من فضلك ادخل رقم جوال التواصل   !! </div>
                                    </div>
                                    <div class="form-group mb-3 col-sm-6 fv-plugins-icon-container">
                                        <label for=""> البريد الإلكترونـي <span class="imp-inp"> * </span></label>
                                        <input type="email" class="form-control" placeholder=" مثال : name@example.com" name="charge-email">
                                        <div class="invalid-feedback"> من فضلك أدخل البريد الإلكتروني بشكل صحيح    !! </div>
                                    </div>


                                    <div class="form-group mb-3 col-sm-6 fv-plugins-icon-container">
                                        <label for=""> اختر الدولة <span class="imp-inp"> * </span> </label>
                                        <select class="form-control select-options" name="charge-country" id="charge-country" required>
                                            <option selected value=""> -- اختر الدولة -- </option>
                                            <option value='السعودية'>
                                                السعودية
                                            </option>
                                            <option value="مصر">
                                                مصر
                                            </option>
                                            <option value="قطر">
                                                قطر
                                            </option>
                                            <option value="الإمارات">
                                                الإمارات
                                            </option>
                                        </select>
                                        <div class="invalid-feedback">  فضلا اختار الدولة !! </div>
                                    </div>
                                    <div class="form-group mb-3 col-sm-6 fv-plugins-icon-container">
                                        <label for=""> حدد المدينة <span class="imp-inp"> * </span> </label>
                                        <select class="form-control select-options" name="charge-city" id="charge-city"  required>
                                            <option selected value=""> -- حدد المدينة -- </option>
                                            <option value="الرياض">
                                                الرياض
                                            </option>
                                            <option value="جدة">
                                                جدة
                                            </option>
                                            <option value="المدينة">
                                                المدينة
                                            </option>
                                            <option value="مكة">
                                                مكة
                                            </option>
                                        </select>
                                        <div class="invalid-feedback">  فضلا اختار المدينة !! </div>
                                    </div>

                                    <div class="mb-3 col-sm-6 fv-plugins-icon-container">
                                        <label for="charge-customer-address" class="form-label">العنوان</label>
                                        <input type="text" id="charge-customer-address" name="charge-customer-address" class="form-control" placeholder="العنوان">
                                        <div class="fv-plugins-message-container invalid-feedback"> من فضلك ادخل العنوان </div>
                                    </div>

                                    <input type="hidden" value="payment for plan: {{$plan->name}}" name="charge-description">
                                    <input type="hidden" value="{{$plan->id}}" name="charge-plan-id">
                                    <input type="hidden" value="{{$plan->price}}" name="charge-amount">
                                    <input type="hidden" value="" name="charge_country_code" id="charge_country_code">
                                    <input type="hidden" value="" name="charge_phone_num" id="charge_phone_num">

                                </div>
                                <div class="mt-5 mb-3 d-flex justify-content-center align-items-center gap-5">
                                    <button type="submit" class="btn btn-primary me-2"> اكمال عملية الدفع </button>
                                    <a href="{{route('plans-page')}}" class="btn btn-label-secondary"> العودة لخطط الأسعار </a>
                                </div>
                            </form>
                        </div>
                        <!-- /Billing Address -->
                    </div>
                </div><!-- // Col -->
            </div><!-- // Row -->
        @else
            <div class="row" style="min-height: 50vh">
                <div class="justify-content-center col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h3 class="text-center"> برجاء اختيار خطة للمتابعة </h3>
                    <a href="{{route('plans-page')}}" class="btn btn-primary mx-auto"> العودة لخطط الأسعار </a>
                </div>
            </div>
        @endif

    </div><!-- // Container -->
</div><!-- // Section -->
<!-- End Privacy Area -->


@extends('includes.footer-links')
@extends('includes.footer')