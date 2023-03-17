<style>
    .file-input {
        display: flex;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 1rem;
        cursor: pointer;
    }
</style>

<form id="jquery-val-form" method="post" action="{{ url('/admin/setting/update-page') }}" novalidate="novalidate" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label class="form-label" for="page_title">اسم الصفحة </label>
        <input type="text" class="form-control" id="page_title" name="page_title" value="{{$page->title ?? ''}}" placeholder="Page Title">
    </div>

    <hr>

    <!-- Start intro Area -->
    <div class="intro-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 xs-order-2">
                    <div class="intro-sec-info">
                        <h3>
                            <textarea class="form-control" rows="3" name="section_1[title]"> {{$page_content->section_1->title}} </textarea>
                        </h3>
                        <p>
                            <textarea class="form-control" cols="40" rows="5" name="section_1[description]">  {{$page_content->section_1->description}} </textarea>
                        </p>
                        <div class="intro-sec-info-buttons">
                            <a href="{{$page_content->section_1->button_1_link}}" class="btn main-btn secondary-btn"> {{$page_content->section_1->button_1_text}} </a>
                            <a href="{{$page_content->section_1->button_1_link}}" class="btn main-btn primary-btn"> {{$page_content->section_1->button_2_text}} </a>
                        </div>

                        <br>

                        <fieldset class="form-group">
                            <input type="text" class="form-control" value="{{$page_content->section_1->button_1_text}}" placeholder="button one text" name="section_1[button_1_text]">
                            <input type="text" class="form-control" value="{{$page_content->section_1->button_1_link}}" placeholder="button one link" name="section_1[button_1_link]">
                        </fieldset>
                        <br>
                        <fieldset class="form-group">
                            <input type="text" class="form-control" value="{{$page_content->section_1->button_2_text}}" placeholder="button two text" name="section_1[button_2_text]">
                            <input type="text" class="form-control" value="{{$page_content->section_1->button_2_link}}" placeholder="button two link" name="section_1[button_2_link]">
                        </fieldset>


                    </div>
                </div><!-- // Col -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 xs-order-1">
                    <div class="intro-sec-img">
                        <img src="{{$page_content->section_1->image ?? ''}}" alt="image">
                    </div>

                    <fieldset>
                        <div class="input-group file-input">

                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="" name="section_1[image]" accept="image/*">
                            </div>

                            @if(!empty($page_content->section_1->image))
                                <form action="">
                                    @csrf
                                    <input type="text" name="image_name_to_delete" value="{{$page_content->section_1->image}}">
                                    <input type="text">
                                    <button type="submit" class="btn btn-light-danger mr-1 mb-1">
                                        <span class="ml-25"> حذف الصورة </span>
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            @endif

                        </div>
                    </fieldset>

                </div><!-- // Col -->
            </div><!-- // Row -->
        </div><!-- // Container -->
    </div>
    <!-- End intro Area -->

    <!-- Start Social Accounts Area -->
    <div class="social-accounts-area bg2 padd-60">
        <div class="container">
            <!-- mian-sec-title -->
            <div class="mian-sec-title whd-30">
                <h3>
                    <textarea class="form-control" rows="3" name="section_2[title]"> {{$page_content->section_2->title ?? ''}} </textarea>
                </h3>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                    <!-- Logo List -->
                    <div class="logos-list">

                        

                        <!-- Card -->
                        <div class="logo-card">
                            <img src="{{asset('assets/img/images/instegram_logo.png')}}" alt="icon">
                        </div><!-- // Logo Card -->
                        <!-- Card -->
                        <div class="logo-card">
                            <img src="{{asset('assets/img/images/youtube_logo.png')}}" alt="icon">
                        </div><!-- // Logo Card -->
                        <!-- Card -->
                        <div class="logo-card">
                            <img src="{{asset('assets/img/images/whatsapp_logo.png')}}" alt="icon">
                        </div><!-- // Logo Card -->
                        <!-- Card -->
                        <div class="logo-card">
                            <img src="{{asset('assets/img/images/twitter_logo.png')}}" alt="icon">
                        </div><!-- // Logo Card -->
                        <!-- Card -->
                        <div class="logo-card">
                            <img src="{{asset('assets/img/images/facebook_logo.png')}}" alt="icon">
                        </div><!-- // Logo Card -->
                    </div>
                </div><!-- // Col -->
            </div><!-- // Row -->
        </div><!-- // Container -->
    </div><!-- // Section -->
    <!-- End Social Accounts Area -->



    <input type="hidden" value="{{$page->id}}" name="page_id" >

    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary" name="submit" value="Submit"> حفظ </button>
        </div>
    </div>

</form>