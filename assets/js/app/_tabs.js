/* ==========================================================================
   Tabs

   -- Get the id of the clicked tab-head
   -- Find that id
   -- Add class to that id
   -- Remove class from other ids
   -- Remove class from other tab-head
   ========================================================================== */

(function($){
	'use strict';

	var tabSwitcher = '.tabs__tab-selector:not(.is-active)';

	function toggleTabs( clicked ) {

		// Find the target tab data-tab-id
		var targetTabId = $(clicked).data('tab-id');
		
		// Toggle active class on tab headers
		$(clicked).addClass('is-active');
		$(clicked).siblings().removeClass('is-active');

		// Toggle active class on tab content
		$(clicked)
			.parent('.tabs__header')
			.siblings('.tabs__main')
			.children('.tabs__tab-content')
			.toggleClass('is-active');
	}

	$( 'body' ).on( 'click', tabSwitcher, function(){ toggleTabs( this ) });

})(jQuery);