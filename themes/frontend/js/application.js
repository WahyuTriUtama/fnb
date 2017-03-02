$(document).ready(function() {
	$('.tips').tooltip();
	$('.popover-menu').popover();
	$('.hasDate').datepick({dateFormat: 'yyyy-mm-dd'});

	$('.slider-inner').bxSlider({
		nextSelector: '.nav-next._3rd',
		prevSelector: '.nav-prev._3rd',
		prevText: '<i class="fa fa-chevron-left"></i>',
		nextText: '<i class="fa fa-chevron-right"></i>',
		slideWidth: 2000,
		minSlides: 1,
		maxSlides: 1,
		auto: true,
		pause: 12000,
		pager:false
	});


	$("a[rel^='prettyPhoto']").prettyPhoto({
		theme: 'light_rounded', 
		slideshow:5000,
		deeplinking: false, 
		autoplay_slideshow:false,
		social_tools: false
	});

	if (window.matchMedia('(max-width: 480px)').matches) {
		$('.feature-slide').bxSlider({
			nextSelector: '.nav-next._1st',
			prevSelector: '.nav-prev._1st',
			prevText: '<i class="fa fa-chevron-left"></i>',
			nextText: '<i class="fa fa-chevron-right"></i>',
			slideWidth: 2000,
			minSlides: 1,
			maxSlides: 1,
			auto: true,
			pause: 12000,
			pager:false
		});

		$('.others-slide').bxSlider({
			nextSelector: '.nav-next._4th',
			prevSelector: '.nav-prev._4th',
			prevText: '<i class="fa fa-chevron-left"></i>',
			nextText: '<i class="fa fa-chevron-right"></i>',
			slideWidth: 2000,
			minSlides: 1,
			maxSlides: 1,
			auto: true,
			pause: 12000,
			pager:false
		});
	} 
	else if (window.matchMedia('(max-width: 767px)').matches) {

	} 
	else if (window.matchMedia('(max-width: 991px)').matches) {
		$('.feature-slide').bxSlider({
			nextSelector: '.nav-next._1st',
			prevSelector: '.nav-prev._1st',
			prevText: '<i class="fa fa-chevron-left"></i>',
			nextText: '<i class="fa fa-chevron-right"></i>',
			slideWidth: 2000,
			minSlides: 2,
			maxSlides: 2,
			auto: true,
			pause: 12000,
			pager:false
		});

		$('.new-slide').bxSlider({
			nextSelector: '.nav-next-sm._1st',
			prevSelector: '.nav-prev-sm._1st',
			prevText: '<i class="fa fa-chevron-left"></i>',
			nextText: '<i class="fa fa-chevron-right"></i>',
			slideWidth: 2000,
			minSlides: 2,
			maxSlides: 2,
			auto: true,
			pause: 9000,
			pager:false
		});

		$('.others-slide').bxSlider({
			nextSelector: '.nav-next._4th',
			prevSelector: '.nav-prev._4th',
			prevText: '<i class="fa fa-chevron-left"></i>',
			nextText: '<i class="fa fa-chevron-right"></i>',
			slideWidth: 2000,
			minSlides: 3,
			maxSlides: 3,
			auto: true,
			pause: 12000,
			pager:false
		});
	}
	else {
		$('.feature-slide').bxSlider({
			nextSelector: '.nav-next._1st',
			prevSelector: '.nav-prev._1st',
			prevText: '<i class="fa fa-chevron-left"></i>',
			nextText: '<i class="fa fa-chevron-right"></i>',
			slideWidth: 2000,
			minSlides: 3,
			maxSlides: 3,
			auto: true,
			pause: 12000,
			pager:false
		});

		$('.others-slide').bxSlider({
			nextSelector: '.nav-next._4th',
			prevSelector: '.nav-prev._4th',
			prevText: '<i class="fa fa-chevron-left"></i>',
			nextText: '<i class="fa fa-chevron-right"></i>',
			slideWidth: 2000,
			minSlides: 4,
			maxSlides: 4,
			auto: true,
			pause: 12000,
			pager:false
		});

		$('.new-slide').bxSlider({
			nextSelector: '.nav-next-sm._1st',
			prevSelector: '.nav-prev-sm._1st',
			prevText: '<i class="fa fa-chevron-left"></i>',
			nextText: '<i class="fa fa-chevron-right"></i>',
			slideWidth: 2000,
			minSlides: 1,
			maxSlides: 1,
			auto: true,
			pause: 9000,
			pager:false
		});
	}
});

$(document).ready(function() {
	var offset = 220;
	var duration = 500;

	jQuery('.back-to-top').click(function(event) {
		event.preventDefault();
		jQuery('html, body').animate({scrollTop: 0}, duration);
		return false;
	});

	var iqty = $("#input_qty").val();
	jQuery('#btn-add').click(function(event) {
		iqty = parseFloat(iqty)+1;
		$("#input_qty").val(iqty);
	});
	jQuery('#btn-min').click(function(event) {
		if (iqty > 1) {
			iqty = parseFloat(iqty)-1;
			$("#input_qty").val(iqty);
		} else {
			alert("Maaf Jumlah Item minimal 1");
			$("#input_qty").focus();
		}
	});

	//$("#pay-ibank").show("slow");$("#pay-icard").hide("fast");$("#pay-itransfer").hide("fast");

	$('input[type=radio][name=optshippingmethode]').change(function() {
		if (this.value == 'ibank') {
			//alert("Allot Thai Gayo pay-ibank");
			$("#pay-ibank").show("slow");$("#pay-icard").hide("fast");$("#pay-itransfer").hide("fast");
			$(".payment-method-section > li").removeClass("selected");
			$(this).parents().eq(2).addClass("selected");
		}
		else if (this.value == 'icard') {
			//alert("Transfer Thai pay-icard");
			$("#pay-ibank").hide("fast");$("#pay-icard").show("slow");$("#pay-itransfer").hide("fast");
			$(".payment-method-section > li").removeClass("selected");
			$(this).parents().eq(2).addClass("selected");
		}
		else if (this.value == 'itransfer') {
			//alert("Transfer Thai pay-itransfer");
			$("#pay-ibank").hide("fast");$("#pay-icard").hide("fast");$("#pay-itransfer").show("slow");
			$(".payment-method-section > li").removeClass("selected");
			$(this).parents().eq(2).addClass("selected");
		}
	});

	$("#main-category-list .navbar-nav li").hover(
		function(){ $(this).addClass('hover') },
		function(){ $(this).removeClass('hover') }
		)
});
