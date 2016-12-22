/* ==========================================================================
   Lightbox
   ========================================================================== */

(function($){
	'use strict';

	function autoplayVideo() {

		$('.featherlight-inner.hero__video').attr('autoplay', true);
	}

	$(document).on( 'click', '.featherlight-video-trigger', function(){
		autoplayVideo();
	});

})(jQuery);