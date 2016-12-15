/* ==========================================================================
   Search
   ========================================================================== */

(function($){
	'use strict';

	var searchToggle 	= '#pseudo-submit',
			searchForm		= '#search-form';

	function showSearch() {

		$(searchForm).addClass( 'is-active' );
	}

	$( 'body' ).on( 'click', searchToggle, function(){ showSearch() });

})(jQuery);