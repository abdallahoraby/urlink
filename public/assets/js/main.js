(function ($) {
"use strict";
// scroll navbar
$(function () {
    $(window).on('scroll', function () {
        if ( $(window).scrollTop() > 10 ) {
            $('#nav').addClass('active');
        } else {
            $('#nav').removeClass('active');
        }
    });
});

// Nice Select
$('select').niceSelect();



// -----------------------------
//  Count Up
// -----------------------------
function counter() {
    var oTop;
    if ($('.counterUp').length !== 0) {
        oTop = $('.counterUp').offset().top - window.innerHeight;
    }
    if ($(window).scrollTop() > oTop) {
        $('.counterUp').each(function () {
            var $this = $(this),
                countTo = $this.attr('data-count');
            $({
                countNum: $this.text()
            }).animate({
                countNum: countTo
            }, {
                duration: 4000,
                easing: 'swing',
                step: function () {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function () {
                    $this.text(this.countNum);
                }
            });
        });
    }
};

// $(window).on('scroll', function () {
//     counter();
// });


$(document).ready(function() {
    $('.gallery-imgs').owlCarousel({
        loop:false,
        margin:10,
        nav:false,
        responsiveClass:true,
        rtl: true,
        dots: true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:3,
                nav:false
            },
            1000:{
                items:1,
                nav:false,
                loop:false
            }
        }
    })
});

// intlInputPhone
$(document).ready(function() {
    var phoInput = document.querySelector("#phone");
    window.intlTelInput(phoInput, {
        autoPlaceholder: "on",
        initialCountry: "sa",
        preferredCountries: ["sa", "eg", "ae", "us" ],
        // utilsScript: "js/intlInputPhone/utils.js",
    });
})
// uplload profile image
$(function() {
    $("[type=file]").mnFileInput();
    $(".widthPreview").mnFileInput({
        'preview': '.preview'
    });
    $(".widthPreview2").mnFileInput({
        'preview': '.preview2'
    });
});
// upload images
$(function () {
    $('.input-images-1').imageUploader({
        label: 'اسحب أو اسقط الملفات هنا',
        maxFiles: 1
    });
    $('.input-images-2').imageUploader({
        label: 'أضف جميع صور الاعلان'
    });
    $('.input-images-3').imageUploader({
        label: 'اسحب أو اسقط الملفات هنا',
        maxFiles: 1
    });
});
// Profile Pages ||
$(".mn-opt-btn").click(function(e) {
    e.preventDefault();
    $(this).parent().next().slideToggle();
});




$(document).ready(function() {
	var max_fields      = 10; //maximum input boxes allowed
	var wrapper   		= $(".items_fields_wrap"); //Fields wrapper
	var add_button      = $(".add_field_button"); //Add button ID

	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append('<div><div class="card-item add-soci-card"><button class="btn delete-btn remove_field"> <i class="fi fi-rr-trash"></i> </button><div class="form-group"><label for="">  اختر الحساب </label><select class="form-control select-options" name=""><option value="4"> --  اختر الحساب -- </option><option value="4"> فيسبوك </option><option value="1"> تويتر </option><option value="1"> انستجرام </option><option value="2"> واتساب </option></select></div><div class="form-group"><label for=""> رابط الحســاب </label><input type="text"  class="form-control" placeholder="رابط الحساب"></div></div></div>'); //add input box
		}
	});

	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	});

});

function removeMnDiv() {
    // Implement the click handler here for button of class 'remove'
    $('.remove_field').click(function() {
        $(this).parent().remove();
    });
}
removeMnDiv();







// Share To Social Media
$(document).ready(function() {
let field = document.querySelector(".field"),
    copy = field.querySelector(".copy-link");

    $(".copy-link").click(function(){
        $(".field > input").select();
        document.execCommand('copy');
        field.classList.add("active");
        copy.innerText = "تم النسخ";
        setTimeout(()=>{
            window.getSelection().removeAllRanges(); //remove selection from document
            field.classList.remove("active");
            copy.innerText = "نسخ";
            }, 3000);
    });
});

// ==== Create Your Page Js
// Steps Tabs
$(document).ready(function() {




    $('.btnNextTab').click(function() {
        $('#page-form-steps .active').parent().next().find('a').trigger('click');
    });

    $('.btnPrevTab').click(function() {
        $('#page-form-steps .active').parent().prev().find('a').trigger('click');
    });

    $('#page-form-steps > li > a').click(function() {
        $('.btnPrevTab').show();
        $('.btnNextTab').show();
        $('.submit-form-button').hide();
    });
    $('#page-form-steps > li:last > a').click(function() {
        $('.btnPrevTab').show();
        $('.btnNextTab').hide();
        $('.submit-form-button').show();
    });

    if( $('#page-form-steps > li:first').hasClass('active')){
        $('.btnPrevTab').hide();
        $('.btnNextTab').show();
        $('.submit-form-button').hide();
    } else{
        $('.btnPrevTab').hide();
        $('.btnNextTab').show();
        $('.submit-form-button').hide();
    };
});



// script for tab steps
$('.process-steps a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

    var href = $(e.target).attr('href');
    var $curr = $(".process-steps  a[href='" + href + "']").parent();

    $('.process-steps li').removeClass();

    $curr.addClass("active");
    $curr.prevAll().addClass("done");
});
// end script for tab steps

// Social Accounts
$(document).ready(
    function() {
        var x = 0;
        $("#appendNewRow")
            .click( function() {
                x++;
                var html = '';
                html += '<div class="abc card-item add-soci-card inputFormRow" id="appendedRow' + x + '">';
                html += '<div class="input-group-prepend">';
                html += '<span class="input-spn-text">' +
                x + '</span></div>';
                html += '<div class="input-group input-group-sm mb-3">';

                html += '<div class="form-group">';

                // Label For Option
                html += '<label for="">  اختر الحساب </label>';

                // Options
                html += '<select class="form-control select-options" name="links[][link_name]" required>' +
                            '<option value="" selected> --  اختر الحساب -- </option>' +
                            '<option value="فيسبوك"> فيسبوك </option>' +
                            '<option value="تويتر"> تويتر </option>' +
                            '<option value="انستجرام"> انستجرام </option>' +
                            '<option value="واتساب"> واتساب </option>' +
                        '</select> <div class="invalid-feedback">من فضل اختر الحساب!!  </div>';
                html += '</div>';

                html += '<div class="form-group">';
                // Label For Input
                html += '<label for=""> رابط الحســاب </label>';
                html += '<input type="text" name="links[][link_url]" class="form-control m-input" placeholder="رابط الحساب" autocomplete="off" required> <div class="invalid-feedback">من فضل اختر الحساب!!  </div>';

                html += '</div></div>';

                // Delete Button
                html += '<button id="removeRow" type="button" class="btn delete-btn removeRow"><i class="fi fi-rr-trash"></i></button>';

                $('#newRowGoesHere').append(html);
    });
      //remove
    $(document).on('click', '.removeRow', function() {
        $(this).closest('.abc').remove(); //find closest class
        x--;
        resetValues(); //call function
        });

    function resetValues() {
        counter = 1; //initialze to 1
        //looping through class div -> class abc
        $(".abc").each(function() {
          //getting span where count is display replace with new
        $(this).find('.input-spn-text').text(counter);
          //replce id with new id
            $(this).attr('id', "appendedRow" + counter);
            counter++;
        })
    }
});

// Upload Multiple
jQuery(document).ready(function () {
    ImgUpload();
    });

    function ImgUpload() {
    var imgWrap = "";
    var imgArray = [];

    $('.upload__inputfile').each(function () {
        $(this).on('change', function (e) {
        imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
        var maxLength = $(this).attr('data-max_length');

        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
        var iterator = 0;
        filesArr.forEach(function (f, index) {

            if (!f.type.match('image.*')) {
            return;
            }

            if (imgArray.length > maxLength) {
            return false
            } else {
            var len = 0;
            for (var i = 0; i < imgArray.length; i++) {
                if (imgArray[i] !== undefined) {
                len++;
                }
            }
            if (len > maxLength) {
                return false;
            } else {
                imgArray.push(f);

                var reader = new FileReader();
                reader.onload = function (e) {
                var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                imgWrap.append(html);
                iterator++;
                }
                reader.readAsDataURL(f);
            }
            }
        });
        });
    });

    $('body').on('click', ".upload__img-close", function (e) {
        var file = $(this).parent().data("file");
        for (var i = 0; i < imgArray.length; i++) {
        if (imgArray[i].name === file) {
            imgArray.splice(i, 1);
            break;
        }
        }
        $(this).parent().parent().remove();
    });
};




// Checkbox Requierd Inputs
$( document ).ready(function() {

    $('input[type=checkbox]').on('click',function(){
        var myDataform = $('div[data-id='+$(this).data('target')+']')
        var curFormInouts = myDataform.find("input,select[type='select'],textarea");
        var currOnlyInputs = Array.from(curFormInouts);

        if(this.checked){
            myDataform.addClass('block');
            currOnlyInputs.forEach(curFormInouts => {
                for(var i = 0; i < currOnlyInputs.length; i++)
                {
                    currOnlyInputs[i].setAttribute("required", "");
                    currOnlyInputs[i].removeAttribute("disabled");
                }
            });
        }else{
            myDataform.removeClass('block');
            currOnlyInputs.forEach(curFormInouts => {
                for(var i = 0; i < currOnlyInputs.length; i++)
                {
                    currOnlyInputs[i].removeAttribute("required");
                    currOnlyInputs[i].setAttribute("disabled" , "");
                }
            });
        }

    });
});





})(jQuery);

// K Tasks Code
// Function To Rename Links Inputs name
function renameLinksInputs(){
    let socialCArds = $('#step-3 .add-soci-card');
    if(!socialCArds.length){
        return;
    }
    for(let i=0;i<socialCArds.length;i++){
        let socialCardInputs = socialCArds.eq(i).find('input,textarea,select');
        for(let j=0;j<socialCardInputs.length;j++){
            let newInputNameVlue = socialCardInputs.eq(j).attr('name').slice(0,socialCardInputs.eq(j).attr('name').indexOf('[')+1) + i + socialCardInputs.eq(j).attr('name').slice(socialCardInputs.eq(j).attr('name').indexOf(']'));
            socialCardInputs.eq(j).attr('name',newInputNameVlue);
        }
    }
}
// Function To Rename Sections Inputs name
function renameSectionsInputs(){
   let sections = $('.page-add-section input:checkbox:checked');
   if(!sections.length){
    return;
   }
   for(let i=0;i<sections.length;i++){
    let sectionInputs = sections.eq(i).parent().parent().find('input,textarea,select');
    for(let j=0;j<sectionInputs.length;j++){
        let newInputNameVlue = sectionInputs.eq(j).attr('name').slice(0,sectionInputs.eq(j).attr('name').indexOf('[')+1) + i + sectionInputs.eq(j).attr('name').slice(sectionInputs.eq(j).attr('name').indexOf(']'));
        sectionInputs.eq(j).attr('name',newInputNameVlue);
    }
   }
}


// Custom Delet hundler
$(".customDelete").click(function(){
    $('.preview2').eq(0).remove();
    $('.defaultPreview').removeClass('d-none');
    $('.customDelete').addClass('d-none');
    $('#deleted_banner').val(true)
});

// Custom Slider Images Delete Hundler
let deletedImages = [];
$('.customSliderDelete').click(function(){
    deletedImages.push(Number($(this).attr('id')));
    $(this).parent().remove();
    $('#sliderDeletedImages').val(JSON.stringify(deletedImages));
});
