$(document).ready(function() {
	$('#scroll-top a').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});

	$("a[rel^='prettyPhoto']").prettyPhoto({
		theme: 'facebook', 
		slideshow:5000,
		deeplinking: false, 
		autoplay_slideshow:false,
		social_tools: false
	});
});

