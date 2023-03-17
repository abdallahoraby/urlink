@extends('includes.head')

@extends('includes.header-profile')

{{-- @php
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "urlink_fcode_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM Users";
$result = $conn->query($sql);


if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    dd($row);
    echo "id: " . "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
@endphp --}}

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
							<h3> <img src="{{asset('assets/img/icons/mng_pages.svg')}}" alt=""> إدارة صفحاتــي </h3>
						</div>
						<div class="pages-cards">
							<div class="row">
                                @if(!empty($styles))
                                    <div class="container">
                                        <h2>قائمة التصميمات</h2>
                                        <table class="table table-hover">
                                        <thead>
                                            <tr>
                                            <th>اسم التصميم</th>
                                            <th>صورة التصميم</th>
                                            <th>حالة التصميم</th>
                                            <th>نشاط التصميم</th>
                                            <th>التصميم الافتراضي</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                @foreach($styles as $style)
                                            <tr>
                                            <td>{{$style->style_name}}</td>
                                            <td>{{$style->style_image}}</td>
                                            <td>{{$style->style_fee}}</td>
                                            @if($style->status == 1)
                                            <td>نشط</td>
                                            @else
                                            <td>موقوف</td>
                                            @endif
                                            <td>
                                            @if($style->style_default == 1)
                                            <i class="fa-solid fa-key"></i>
                                            @endif
                                            </td>
                                            </tr>
                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
								</div>


                                <br><br>

                            <div class="row">

                                <div class="container">
                                    <h2>تصميم جديد</h2>
                                    <div class="main-form">
                                        <!-- Register Form -->
                                        <form class="main-form row" method="POST" action="{{ route('createNewStyle') }}" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group col-md-12 col-xs-12">

                                                <label>اسم التصميم</label>

                                                <input name="name" type="text" value="{{ old('name') }}" class="form-control" placeholder="English only" required>
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12 col-xs-12">
                                                <select class="form-control" id="" name="fee" style="text-align: right; direction: rtl;
                                                padding-right: 7px;" required>
                                                    <option  value="free" style="direction: rtl;">مجاني</option>
                                                    <option value="fee" style="direction: rtl;">مدفوع</option>
                                                </select>
                                            </div>
                                            <br><br><br>
                                            <div class="form-group col-md-12 col-xs-12">
                                                <select class="form-control" id="" name="status" style="text-align: right; direction: rtl;
                                                padding-right: 7px;" required>
                                                    <option  value="1" style="direction: rtl;">مفعل</option>
                                                    <option value="0" style="direction: rtl;">غير مفعل</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-12 col-xs-12">
                                                <input type="file" name="file" class="form-control">
                                            </div>

                                            <!-- Button -->
                                            <div class="form-group col-12 frm-btn">
                                                <button type="submit" class="btn main-grn-btn primary-btn">انشاء التصميم </button>
                                            </div>
                                        </form>
                                    </div>
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
