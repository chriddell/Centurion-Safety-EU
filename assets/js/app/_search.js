/* ==========================================================================
   Search
   ========================================================================== */

(function($){
	'use strict';

	var searchToggle 	= '#open-search-trigger',
			searchForm		= '#search-form';

	function showSearch() {
		$(searchForm).addClass( 'is-active' );
	}

	$( 'body' ).on( 'click', searchToggle, function(){ showSearch() });

})(jQuery);