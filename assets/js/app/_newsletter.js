/* ==========================================================================
   Newsletter
   ========================================================================== */

(function($){
	'use strict';

	function showNewsletter() {
		$('.newsletter').addClass('is-active');
	}

	$(document).on( 'click', '#show-newsletter-form', function(){

		showNewsletter();
	});

})(jQuery);