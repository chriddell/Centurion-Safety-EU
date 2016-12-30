/* ==========================================================================
   Newsletter
   ========================================================================== */

(function($){
	'use strict';

	function showNewsletter() {
		$('.newsletter').addClass('is-active');

		$('.newsletter form li:first-of-type input').focus();
	}

	$(document).on( 'click', '#show-newsletter-form', function(){

		showNewsletter();
	});

})(jQuery);