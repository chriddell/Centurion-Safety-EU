/* ==========================================================================
   Gallery (+ carousel)

   -- 
   ========================================================================== */

(function($){
	'use strict';

	/**
	 * Intialize slick
	 */
	$(document).ready(function(){

		// Main carousel
		$('.gallery__main').slick({
			centerMode: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			centerPadding: '0',
			asNavFor: '.gallery__nav',
			focusOnSelect: true,
      fade: true,
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
		$('.gallery__nav').slick({
  		slidesToShow: 3,
  		slidesToScroll: 1,
  		asNavFor: '.gallery__main',
  		infinite: false,
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