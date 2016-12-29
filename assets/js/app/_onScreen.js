/* ==========================================================================
   onScreen

   Do things with things when they enter/exit the viewport
   ========================================================================== */

(function($){
	'use strict';

	$(document).ready(function(){

		var os = new OnScreen({
	    tolerance: 200,
	    debounce: 100,
	    container: window
		});
	
		// Do something when an element enters the viewport
		os.on('enter', '.feature-block', function(e){

		  $(e).addClass('in-view');
		});
	});
	

})(jQuery);