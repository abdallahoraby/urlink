@extends('includes.head')

@extends('includes.header-profile')

<div class="profile-pages-area bg2 padd-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="mian-sec-title">
                <h3> ملئ بيانات صفحة الكيان أو الشركة</h3>
                <h5> يرجى ملئ جميع الحقول لإنشاء صفحة هبوط مميزة تثير إهتمام جمهورك </h5>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="main_tabs_box tabs-links card-box main-form ">
                    <form role="form" class="studentform-section" method="post" action="{{ route('UPDATE_put_landing_page', ['page_id' => $page_id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Steps -->
                        <div class="stepForm">
                            <div class="stepForm-row setup-panel">
                                <div class="stepForm-step">

                                    <!-- K-Notes : To open speciefic setup page  -->
                                    <!-- K-Notes : you must add class btn-stp-active instead its class btn-default for it only and remove disabled="disabled"
                                         from its a tag -->
                                    <a href="#step-1" class="btn btn-stp-active btn-circle"> </a>
                                    <div class="clearfix"></div>
                                    <h4> نوع الحساب </h4>
                                </div>
                                <div class="stepForm-step">
                                    <a href="#step-2" class="btn btn-default btn-circle" disabled="disabled"> </a>
                                    <div class="clearfix"></div>
                                    <h4> البيانات</h4>
                                </div>
                                <div class="stepForm-step">
                                    <a href="#step-3" class="btn btn-default btn-circle" disabled="disabled"> </a>
                                    <div class="clearfix"></div>
                                    <h4> حسابات التواصل </h4>
                                </div>
                                <div class="stepForm-step">
                                    <a href="#step-4" class="btn btn-default btn-circle" disabled="disabled"> </a>
                                    <div class="clearfix"></div>
                                    <h4> الإضافات </h4>
                                </div>
                                <div class="stepForm-step">
                                    <a href="#step-5" class="btn btn-default btn-circle" disabled="disabled"> </a>
                                    <div class="clearfix"></div>
                                    <h4>  تأكيد  </h4>
                                </div>
                            </div>
                        </div>
                        <!-- // Steps -->

                        <!-- step 1-->
                        <div class="setup-content" id="step-1">
                            <!-- K-Notes : To Show Any Alert On Any Setup Page Just Add Class Show On Alert Element -->
                            <!-- K-Notes : alert hidden by default but you will add if conditon if there error on this page
                                you will add class show and write alert message in laravel blade-->

                            <!-- alert style -->
                            <div class="alert alert-danger alert-dismissible fade" role="alert">
                                <strong>نموج عرض التنبيه</strong> هذا نموذج لعرض تنبيه معين
                                <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div><!-- // alert style -->

                            <div class="select-acc">
                                <div class="form-group">
                                    <div class="page-type">
                                        <div class="inputGroup">
                                            <input id="radio1" name="account_type" type="radio" value="individual" required
                                            @php
                                            if($data->page_account_type == 'individual'){
                                                echo 'checked';
                                            }
                                            @endphp/>
                                            <label for="radio1" class="selc-item">
                                                <div class="selc-img">
                                                    <img src="{{asset('assets/img/images/selc_acc_01.png')}}" alt="">
                                                </div>
                                                <h3> صفحة شخصية </h3>
                                            </label>
                                        </div>
                                        <div class="inputGroup">
                                            <input id="radio2" name="account_type" type="radio" value="organization" required
                                            @php
                                            if($data->page_account_type == 'organization'){
                                                echo 'checked';
                                            }
                                            @endphp/>
                                            <label for="radio2" class="selc-item">
                                                <div class="selc-img">
                                                    <img src="{{asset('assets/img/images/selc_acc_02.png')}}" alt="">
                                                </div>
                                                <h3> كيـان / شركـة </h3>
                                            </label>
                                        </div>
                                        <div class="invalid-feedback"> من فضلك حدد نوع الصفحة التي تريد إنشائها </div>
                                    </div>

                                    <div class="form-btns">
                                        <button type="button" class="btn main-btn main-btn secondary-btn nextBtn"> حفظ واستكمال </button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- step 2 -->
                        <div class="setup-content " id="step-2">
                            <div class="main-form row justify-content-center frm-ipt-bg">
                                <div class="col-md-9 col-xs-12">
                                    <div class="main-step-title ">
                                        <h3> تصميم الصفحة الشخصية </h3>
                                    </div>

                                    @if(! $data['styles']->isEmpty())
                                    <div class="form-group">

                                        <label for=""> أختر التصميم</label>

                                        <select class="form-control select-options" name="design" id="design" required>

                                            <option value=""> -- أختر التصميم -- </option>
                                            @foreach($data['styles'] as $style)
                                            <option value='{{$style->style_id}}' @if($style->style_id == $data->style_id) selected @endif >

                                                {{$style->style_name}}

                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif
                                    <!-- alert style -->

                                    <div class="main-step-title ">
                                        <h3> بيانات الصفحة الشخصية </h3>
                                    </div>
                                    <!-- alert style -->
                                    <div class="alert alert-danger alert-dismissible fade d-none" role="alert">
                                        <strong>نموج عرض التنبيه</strong> هذا نموذج لعرض تنبيه معين
                                        <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div><!-- // alert style -->
                                    <div class="form-group">
                                        <label for=""> الإسم كاملاً <span class="imp-inp"> * </span></label>
                                        <input type="text" class="form-control" value="{{$data->page_name}}" placeholder=" مثال : آدم محمود ابراهيم " name="page_name" required>
                                        <div class="invalid-feedback">من فضل ادخل  الاسم صحيح!!  </div>
                                    </div>
                                    <div class="form-group">
                                        <label for=""> المسمى الوظيفي <span class="imp-inp"> * </span></label>
                                        <input type="text" class="form-control" value="{{$data->page_title}}" placeholder=" مثال : مصمم جرافيك" name="page_title" required>
                                        <div class="invalid-feedback">من فضل ادخل المسمى الوظيفي صحيح!!  </div>
                                    </div>
                                    <div class="form-group">
                                        <label for=""> اختر الدولة <span class="imp-inp"> * </span> </label>
                                        <select class="form-control select-options" name="country" id="state" required>
                                            <option selected value=""> -- اختر الدولة -- </option>

                                            <option value='السعودية' @if($data->page_country == 'السعودية') selected="selected" @endif>
                                                السعودية
                                            </option>
                                            <option value="مصر" @if($data->page_country == 'مصر') selected="selected" @endif>
                                                 مصر
                                            </option>
                                            <option value="قطر" @if($data->page_country == 'قطر') selected="selected" @endif>
                                                قطر
                                            </option>
                                            <option value="الإمارات" @if($data->page_country == 'الإمارات') selected="selected" @endif>
                                                 الإمارات
                                            </option>
                                        </select>
                                        <div class="invalid-feedback">  فضلا اختار الدولة !! </div>
                                    </div>
                                    <div class="form-group">
                                        <label for=""> حدد المدينة <span class="imp-inp"> * </span> </label>
                                        <select class="form-control select-options" name="city" id="city"  required>
                                            <option selected value=""> -- حدد المدينة -- </option>
                                            <option value="الرياض" @if($data->page_city == 'الرياض') selected="selected" @endif>
                                                 الرياض
                                            </option>
                                            <option value="جدة" @if($data->page_city == 'جدة') selected="selected" @endif>
                                                 جدة
                                            </option>
                                            <option value="المدينة" @if($data->page_city == 'المدينة') selected="selected" @endif>
                                                المدينة
                                            </option>
                                            <option value="مكة" @if($data->page_city == 'مكة') selected="selected" @endif>
                                                 مكة
                                            </option>
                                        </select>
                                        <div class="invalid-feedback">  فضلا اختار المدينة !! </div>
                                    </div>
                                    <!-- Img -->
                                    <div class="form-group">
                                        <label for=""> الصورة الشخصية <span class="imp-inp"> * </span> </label>
                                        <div class="upload-img-item upload-sm-img">
                                            <div class="previewContainer preview-p-img">
                                                <img class="preview" src="{{asset($data->page_profile_icon)}}"
                                                    alt="Image preview..." />
                                            </div>
                                            <div class="customFile" data-controlMsg="تحميل صورة">
                                                <img src="{{asset('assets/img/icons/camera_icon.svg')}}" alt="">
                                                <input type="file" name="page_profile_icon" class="widthPreview" >
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">  فضل ارفق صورة شخصية !! </div>
                                    </div>
                                    <!-- Img -->
                                    <div class="form-group">
                                        <label for=""> صورة البنر </label>
                                        <div class="upload-img-item upload-sm-img upload-bannar-img">
                                            <div class="previewContainer preview-p-img">
                                                <img class="preview2" src="@if($data->page_profile_banner != null) {{asset($data->page_profile_banner)}} @else {{asset('assets/img/banner.png')}}@endif"  alt="Image preview..." />
                                                <img class="preview2 defaultPreview d-none" src="{{asset('assets/img/banner.png')}}"  alt="Image preview..." />
                                            </div>
                                            <div class="customFile" data-controlMsg="تحميل صورة">
                                                <img src="{{asset('assets/img/icons/camera_icon.svg')}}" alt="">
                                                <input type="file" name="page_profile_banner" class="widthPreview2">
                                            </div>
                                            <div class="customFile customDelete bg-danger"  data-controlMsg="حذف صورة">
                                                <img style="height: 75%;" src="{{asset('assets/img/icons/delete.png')}}" alt="">
                                                <input id="deleted_banner" type="hidden" value="false" name="deleted_banner">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for=""> رقم جوال التواصل <span class="imp-inp"> * </span> </label>
                                        <input class="form-control" id="phone" name="page_contact_phone" type="tel" onclick="this.setSelectionRange(0, this.value.length)" placeholder="xxx xxx xxx" value="{{$data->page_contact_phone}}" required>
                                        <div class="invalid-feedback"> من فضلك ادخل رقم جوال التواصل   !! </div>
                                    </div>
                                    <div class="form-group">
                                        <label for=""> البريد الإلكترونـي <span class="imp-inp"> * </span></label>
                                        <input type="email" class="form-control" placeholder=" مثال : name@example.com" value={{$data->page_contact_email}} name="page_contact_email" required>
                                        <div class="invalid-feedback"> من فضلك أدخل البريد الإلكتروني بشكل صحيح    !! </div>
                                    </div>
                                </div>
                                <div class="form-btns">
                                    <button type="button" class="btn main-btn secondary-btn nextBtn"> حفظ واستكمال </button>
                                </div>
                            </div>
                        </div>
                        <!-- // step 2 -->

                        <!-- step 3 -->
                        <div class="setup-content" id="step-3">
                            <div class="main-form row justify-content-center">
                                <h4 class="mn-frm-ttl"> 👈 قم بإضافة حسابات التواصل الخاصة بك </h4>
                                <div class="col-md-8 col-xs-12">
                                    <div id="newRowGoesHere"></div>
                                    @if(! $data['links']->isEmpty())
                                    @foreach($data['links'] as $link)
                                        <div class="abc card-item add-soci-card inputFormRow" id="appendedRow">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="form-group">
                                                    <label for="">  اختر الحساب </label>
                                                    <select class="form-control select-options" name="links[][link_name]" required>
                                                        <option value=""> --  اختر الحساب -- </option>
                                                        <option value="فيسبوك" @if($link['link_name'] == 'فيسبوك') selected @endif> فيسبوك </option>
                                                        <option value="تويتر" @if($link['link_name'] == 'تويتر') selected @endif> تويتر </option>
                                                        <option value="انستجرام" @if($link['link_name'] == 'انستجرام') selected @endif> انستجرام </option>
                                                        <option value="واتساب" @if($link['link_name'] == 'واتساب') selected @endif> واتساب </option>
                                                    </select>
                                                    <div class="invalid-feedback">من فضل اختر الحساب!!  </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for=""> رابط الحســاب </label>
                                                    <input type="text" name="links[][link_url]" value="{{$link['link_url']}}" class="form-control m-input" placeholder="رابط الحساب" autocomplete="off" required> <div class="invalid-feedback">من فضل اختر الحساب!!  </div>
                                                </div>
                                            </div>
                                            <button id="removeRow" type="button" class="btn delete-btn removeRow"><i class="fi fi-rr-trash"></i></button>
                                        </div>
                                    @endforeach
                                    @endif
                                    <button id="appendNewRow" type="button" class="btn add_field_button main-btn secondary-btn">
                                        <i class="fi fi-rr-add"></i> إضافة حساب
                                    </button>
                                </div>
                                <div class="form-btns">
                                    <button type="button" class="btn main-btn secondary-btn nextBtn" onclick="renameLinksInputs()"> حفظ واستكمال </button>
                                </div>
                            </div>
                        </div>
                        <!-- // step 3 -->

                        <!-- step 4-->
                        <div class="setup-content" id="step-4">
                            <!-- Form -->
                            <div class="main-form row justify-content-center">
                                <div class="col-md-9 col-xs-12">
                                    <div class="main-step-title">
                                        <h3> إضافات الصفحة </h3>
                                    </div>
                                    <div class="page-add-section">

                                        @if(isset($data->text))
                                        <div class="acc-mn-box">
                                            <div class="accordion-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" data-target="1" id="chek01" name="sections[][section_type]" value="text" checked>
                                                    <label class="form-check-label" for="chek01">
                                                        نبذة عنك
                                                    </label>
                                                </div>
                                                <div class="page-inputs-form block" data-id="1">
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label for=""> اكتب عنوان مميز <span class="imp-inp"> * </span></label>
                                                            <input type="text" class="form-control" placeholder=" اكتب عنوان مميز " name="sections[][section_title]" value="{{$data->text['section_title']}}">
                                                            <div class="invalid-feedback"> اكتب عنوان مميز </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for=""> نبذة عنك <span class="imp-inp"> * </span></label>
                                                            <textarea type="text" cols="30" rows="10" class="form-control" placeholder=" نبذه عنك " name="sections[][section_content]">{{$data->text['section_content']}}</textarea>
                                                            <div class="invalid-feedback"> اكتب نبذه عنك </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="acc-mn-box">
                                            <div class="accordion-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" data-target="1" id="chek01" name="sections[][section_type]" value="text">
                                                    <label class="form-check-label" for="chek01">
                                                        نبذة عنك
                                                    </label>
                                                </div>
                                                <div class="page-inputs-form" data-id="1">
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label for=""> اكتب عنوان مميز <span class="imp-inp"> * </span></label>
                                                            <input type="text" class="form-control" placeholder=" اكتب عنوان مميز " name="sections[][section_title]" disabled>
                                                            <div class="invalid-feedback"> اكتب عنوان مميز </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for=""> نبذة عنك <span class="imp-inp"> * </span></label>
                                                            <textarea type="text" cols="30" rows="10" class="form-control" placeholder=" نبذه عنك " name="sections[][section_content]" disabled></textarea>
                                                            <div class="invalid-feedback"> اكتب نبذه عنك </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        @if(isset($data->image))
                                        <div class="acc-mn-box">
                                            <div class="accordion-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" data-target="2" id="chek02" name="sections[][section_type]" value="image" checked>
                                                    <label class="form-check-label" for="chek02">
                                                        أضف صورة
                                                    </label>
                                                </div>
                                                <div class="page-inputs-form block" data-id="2">
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label for=""> اكتب عنوان مميز </label>
                                                            <input type="text" class="form-control" placeholder=" اكتب عنوان مميز " name="sections[][section_title]"  value="{{$data->image['section_title']}}">
                                                            <div class="invalid-feedback"> اكتب عنوان مميز </div>
                                                        </div>

                                                        <div class="upload-img-item upload-sm-img">
                                                            <div class="previewContainer preview-p-img">
                                                                <img class="preview" src="{{asset($data->image['image_url'])}}"
                                                                    alt="Image preview..." />
                                                            </div>
                                                            <div class="customFile" data-controlMsg="تحميل صورة">
                                                                <img src="{{asset('assets/img/icons/camera_icon.svg')}}" alt="">
                                                                <input type="file" name="sections[][section_image]" class="widthPreview" >
                                                            </div>
                                                        </div>

                                                       {{--  <div class="form-group">
                                                            <div class="upload__box">
                                                                <div class="upload__btn-box">
                                                                    <label class="upload__btn">
                                                                        <p> اضف صورة </p>

                                                                        <input type="file" data-max_length="0" class="upload__inputfile" name="sections[][section_image]">
                                                                    </label>
                                                                </div>
                                                                <div class="upload__img-wrap"></div>
                                                            </div>
                                                            <div class="invalid-feedback"> يجب إضاقة صورة </div>
                                                        </div> --}}
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="acc-mn-box">
                                            <div class="accordion-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" data-target="2" id="chek02" name="sections[][section_type]" value="image">
                                                    <label class="form-check-label" for="chek02">
                                                        أضف صورة
                                                    </label>
                                                </div>
                                                <div class="page-inputs-form" data-id="2">
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label for=""> اكتب عنوان مميز </label>
                                                            <input type="text" class="form-control" placeholder=" اكتب عنوان مميز " name="sections[][section_title]" disabled>
                                                            <div class="invalid-feedback"> اكتب عنوان مميز </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="upload__box">
                                                                <div class="upload__btn-box">
                                                                    <label class="upload__btn">
                                                                        <p> اضف صورة </p>
                                                                        <input type="file" data-max_length="0" class="upload__inputfile" name="sections[][section_image]" disabled>
                                                                    </label>
                                                                </div>
                                                                <div class="upload__img-wrap"></div>
                                                            </div>
                                                            <div class="invalid-feedback"> يجب إضاقة صورة </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        @if(isset($data->slider))
                                        <div class="acc-mn-box">
                                            <div class="accordion-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" data-target="3" id="chek03" name="sections[][section_type]" value="slider" checked>
                                                    <label class="form-check-label" for="chek03">
                                                        اضف مجموعة صور
                                                    </label>
                                                </div>
                                                <div class="page-inputs-form block" data-id="3">
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label for=""> اكتب عنوان مميز </label>
                                                            <input type="text" class="form-control" placeholder=" اكتب عنوان مميز" name="sections[][section_title]" value="{{$data->slider['section_title']}}">
                                                            <div class="invalid-feedback"> اكتب عنوان مميز </div>
                                                        </div>

                                                      <div class="form-group" style="display: flex; justify-content: center; flex-wrap: wrap">
                                                        @foreach($data->slider_images as $image)
                                                                <div class="position-relative" style="width: 40%; height: 100%; margin: 10px;">
                                                                    <img src="{{asset($image['image_url'])}}"
                                                                    alt="Image preview..." />

                                                                    <div id="{{$image->slide_image_id}}" class="customSliderDelete bg-danger"  data-controlMsg="حذف صورة">
                                                                        <img style="height: 75%;" src="{{asset('assets/img/icons/delete.png')}}" alt="">

                                                                    </div>

                                                                </div>
                                                                    @endforeach
                                                      </div>


                                                        <div class="form-group">
                                                            <div class="upload__box">
                                                                <div class="upload__btn-box">
                                                                    <label class="upload__btn">
                                                                    <p> اضف مجموعة صور  </p>
                                                                    <input type="file" multiple="" data-max_length="20" class="upload__inputfile" name="sections[][section_slider_images][]">
                                                                    </label>
                                                                </div>
                                                                <div class="upload__img-wrap"></div>
                                                            </div>
                                                            <div class="invalid-feedback"> يجب إضافة الصور </div>
                                                        </div>
                                                        <input id="sliderDeletedImages" type="hidden" name="sliderDeletedImages">
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="acc-mn-box">
                                            <div class="accordion-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" data-target="3" id="chek03" name="sections[][section_type]" value="slider">
                                                    <label class="form-check-label" for="chek03">
                                                        اضف مجموعة صور
                                                    </label>
                                                </div>
                                                <div class="page-inputs-form" data-id="3">
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label for=""> اكتب عنوان مميز </label>
                                                            <input type="text" class="form-control" placeholder=" اكتب عنوان مميز" name="sections[][section_title]" disabled>
                                                            <div class="invalid-feedback"> اكتب عنوان مميز </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="upload__box">
                                                                <div class="upload__btn-box">
                                                                    <label class="upload__btn">
                                                                    <p> اضف مجموعة صور  </p>
                                                                    <input type="file" multiple="" data-max_length="20" class="upload__inputfile" name="sections[][section_slider_images][]" disabled>
                                                                    </label>
                                                                </div>
                                                                <div class="upload__img-wrap"></div>
                                                            </div>
                                                            <div class="invalid-feedback"> يجب إضافة الصور </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        @if(isset($data->vimeo))
                                        <div class="acc-mn-box">
                                            <div class="accordion-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" data-target="4" id="chek04" name="sections[][section_type]" value="vimeo" checked>
                                                    <label class="form-check-label" for="chek04">
                                                        اضف فيديو
                                                    </label>
                                                </div>
                                                <div class="page-inputs-form block" data-id="4">
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label for=""> اكتب عنوان مميز </label>
                                                            <input type="text" class="form-control" placeholder=" اكتب عنوان مميز " name="sections[][section_title]" value="{{$data->vimeo['section_title']}}" required>
                                                            <div class="invalid-feedback"> اكتب عنوان مميز </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for=""> رابط او لينك الفيديو </label>
                                                            <input type="text" class="form-control" placeholder=" رابط الفيديو" name="sections[][section_url]" value="{{$data->vimeo['vimeo_url']}}" required>
                                                            <div class="invalid-feedback"> يجب إضافة رابط فيديو </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="acc-mn-box">
                                            <div class="accordion-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" data-target="4" id="chek04" name="sections[][section_type]" value="vimeo">
                                                    <label class="form-check-label" for="chek04">
                                                        اضف فيديو
                                                    </label>
                                                </div>
                                                <div class="page-inputs-form" data-id="4">
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label for=""> اكتب عنوان مميز </label>
                                                            <input type="text" class="form-control" placeholder=" اكتب عنوان مميز " name="sections[][section_title]" required disabled>
                                                            <div class="invalid-feedback"> اكتب عنوان مميز </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for=""> رابط او لينك الفيديو </label>
                                                            <input type="text" class="form-control" placeholder=" رابط الفيديو" name="sections[][section_url]" required disabled>
                                                            <div class="invalid-feedback"> يجب إضافة رابط فيديو </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        @if(isset($data->soundcloud))
                                        <div class="acc-mn-box">
                                            <div class="accordion-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" data-target="5" id="chek05" name="sections[][section_type]" value="soundcloud" checked>
                                                    <label class="form-check-label" for="chek05">
                                                        أضف ساوندكلاود
                                                    </label>
                                                </div>
                                                <div class="page-inputs-form block" data-id="5">
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label for=""> اكتب عنوان مميز </label>
                                                            <input type="text" class="form-control" placeholder=" اكتب عنوان مميز " required name="sections[][section_title]" value="{{$data->soundcloud['section_title']}}" >
                                                            <div class="invalid-feedback"> اكتب عنوان مميز </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for=""> رابط او لينك الفيديو </label>
                                                            <input type="text" class="form-control" placeholder="embedded رابط ساوند كلاود" required name="sections[][section_url]" value="{{$data->soundcloud['soundcloud_url']}}" >
                                                            <div class="invalid-feedback"> يجب إضافة رابط ساوندكلاود <b>embedded</b> </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @else
                                <div class="acc-mn-box">
                                    <div class="accordion-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" data-target="5" id="chek05" name="sections[][section_type]" value="soundcloud">
                                            <label class="form-check-label" for="chek05">
                                                أضف ساوندكلاود
                                            </label>
                                        </div>
                                        <div class="page-inputs-form" data-id="5">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label for=""> اكتب عنوان مميز </label>
                                                    <input type="text" class="form-control" placeholder=" اكتب عنوان مميز " required name="sections[][section_title]" disabled>
                                                    <div class="invalid-feedback"> اكتب عنوان مميز </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for=""> رابط او لينك الفيديو </label>
                                                    <input type="text" class="form-control" placeholder="embedded رابط ساوند كلاود" required name="sections[][section_url]" disabled>
                                                    <div class="invalid-feedback"> يجب إضافة رابط ساوندكلاود <b>embedded</b> </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                                @endif

                                <div class="form-btns">
                                    <button class="btn main-btn primary-btn nextBtn" onclick="renameSectionsInputs()" type="button"> انشاء </button>
                                </div>
                            </div>
                        </div>
                        <!-- // step 4 -->

                        <!-- step 5-->
                        <div class="setup-content" id="step-5">
                            <div class="page-done-item">
                                <div class="">
                                    <img src="{{asset('assets/img/done.gif')}}" alt="">
                                    <h4> انت على وشك إطلاق صفحتك بنجاح</h4>
                                </div>
                                <div class="form-btns">
                                    <button class="btn main-btn primary-btn" type="submit" > تأكيد تعديل الصفحة </button>
                                </div>
                            </div>
                        </div>
                        <!-- // step 5 -->
                    </form>
                </div>
            </div>

        </div><!-- // container -->


    </div><!-- // container -->
</div>










@extends('includes.footer')
