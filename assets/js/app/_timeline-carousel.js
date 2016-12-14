/* ==========================================================================
   Timeline Carousel

   Uses slick.js (in ../lib)
   ========================================================================== */

(function($){
	'use strict';

	/**
	 * Intialize slick
	 */
	$(document).ready(function(){

		// Main carousel
		$('.timeline__main').slick({
			centerMode: true,
			slidesToShow: 3,
			slidesToScroll: 1,
			centerPadding: '0',
			asNavFor: '.timeline__nav',
			focusOnSelect: true,
			responsive: [
				{
      		breakpoint: 768,
    			settings: {
      			slidesToShow: 1
    			}
      	}
      ]
		});

		// Nav carousel
		$('.timeline__nav').slick({
  		slidesToShow: 7,
  		slidesToScroll: 1,
  		asNavFor: '.timeline__main',
  		centerMode: true,
  		centerPadding: '0',
  		focusOnSelect: true,
  		responsive: [
				{
      		breakpoint: 768,
    			settings: {
      			slidesToShow: 3
    			}
      	}
      ]
		});

	});

})(jQuery);