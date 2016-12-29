/* ==========================================================================
   onScreen

   Do things with things when they enter/exit the viewport
   ========================================================================== */

(function($){
	'use strict';

	$(document).ready(function(){

		var osOne = new OnScreen({
	    tolerance: 200,
	    debounce: 100,
	    container: window
		});

		var osTwo = new OnScreen({
	    tolerance: 0,
	    debounce: 100,
	    container: window
		});
	
		// Do something when an element enters the viewport
		osOne.on('enter', '.feature-block', function(e){

		  $(e).addClass('in-view');
		});

		// Do something when an element leaves the viewport
		osTwo.on('leave', '.feature-block', function(e){

		  $(e).removeClass('in-view');
		});
	});
	

})(jQuery);