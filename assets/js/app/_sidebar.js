/* ==========================================================================
   Sidebar
   ========================================================================== */

(function($){
	'use strict';

	var sidebar = '#sidebar',
			sidebarTrigger = '#sidebar-toggle',
			sidebarToggleText = '#sidebar-toggle-text';

	// Sidebar toggle
	function sidebarToggle( currentState ) {

		// If currently expanded
		if ( currentState == 'expanded' ) {

			// Tell DOM
			$( sidebar ).attr( 'data-sidebar', 'collapsed' );
			$( sidebarToggleText ).text('Expand Filter');
		}

		// Else current closed
		else {

			// Tell DOM
			$( sidebar ).attr( 'data-sidebar', 'expanded' );
			$( sidebarToggleText ).text('Collapse Filter');
		}
	}

	function checkSidebarState( target ) {

		var currentState = $( target ).attr( 'data-sidebar' );

		sidebarToggle( currentState );
	}

	$( 'body' ).on( 'click', sidebarTrigger, function(){ checkSidebarState( sidebar ) });

})(jQuery);