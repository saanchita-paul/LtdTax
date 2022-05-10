$(document).ready(function(){
//ShowHide in Mobile
$('.AMobileHide').click(function(){$(".MobileShowHide").slideToggle();});

//BackToTop
	$(document).ready(function(){
		$(window).scroll(function () {
			if ($(this).scrollTop() > 50) {
				$('#back_to_top').fadeIn();
			} else {
				$('#back_to_top').fadeOut();
			}
		});
		// scroll body to 0px on click
		$('#back_to_top').click(function () {
			$('#back-to-top').tooltip('hide');
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});

		$('#back_to_top').tooltip('show');

	});
});

$(document).ready(function(){
	$('.customer-logos').slick({
		slidesToShow: 6,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 3000,
		arrows: false,
		dots: true,
		pauseOnHover: false,
		responsive: [{
			breakpoint: 768,
			settings: {
				slidesToShow: 3
			}
		}, {
			breakpoint: 520,
			settings: {
				slidesToShow: 2
			}
		}]
	});
});
