
        <!-- all js here -->
		<!-- jQuery -->
		<script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
		<!-- bootstrap js -->
		<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
		<!-- owl Carousel js -->
		<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
		<!-- IntlInputPhone -->
		<script src="{{asset('assets/js/intlInputPhone/intlTelInput.js')}}"></script>
		<!-- upload images -->
		<script src="{{asset('assets/js/upload_img/image-uploader.js')}}"></script>
		<!-- Upload Profile Image -->
		<script src="{{asset('assets/js/upload_img/jquery.mn-file.js')}}"></script>
		<!-- select options -->
		<script src="{{asset('assets/js/jquery.nice-select.js')}}"></script>
		<!-- Accordion -->
		<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

		<!-- frest scripts -->
		<script src="{{asset('assets/frest/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js')}}"></script>
		<script src="{{asset('assets/frest/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js')}}"></script>
		<script src="{{asset('assets/frest/fonts/LivIconsEvo/js/LivIconsEvo.min.js')}}"></script>
		<script src="{{asset('assets/frest/js/core/app-menu.min.js')}}"></script>
		<script src="{{asset('assets/frest/js/core/app.min.js')}}"></script>
		<script src="{{asset('assets/frest/js/scripts/components.min.js')}}"></script>
		<script src="{{asset('assets/frest/js/scripts/forms/validation/jquery.validate.min.js')}}"></script>
		<script src="{{asset('assets/frest/js/scripts/forms/validation/form-validation.js')}}"></script>
		<script src="{{asset('assets/frest/js/scripts/extensions/sweet-alerts.js')}}"></script>
		<script src="{{asset('assets/frest/js/scripts/extensions/sweetalert2.all.min.js')}}"></script>



		<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
		<script src="{{asset('assets/js/jquery.lineProgressbar.js')}}"></script>

		<!-- main js -->
        <script src="{{asset('assets/js/main.js')}}"></script>
        {{-- Steps js --}}
        <script src="{{asset('assets/js/steps.js')}}"></script>
        {{-- // steps js --}}

        <!-- CKEditor Package
        <script src="{{asset('assets/packages/ckeditor/ckeditor.js')}}"></script>
        <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
        </script> -->
		
		@if(Route::is('get_register'))
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#reg_form").validate();
			});
		</script>
		@endif

	</body>
</html>
