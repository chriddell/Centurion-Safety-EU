/* ==========================================================================
   Search
   ========================================================================== */

(function($){
	'use strict';

	var searchToggle 	= '#header-pseudo-submit',
			searchForm		= '#header-search-form';

	function showSearch() {

		$(searchForm).addClass( 'is-active' );
		$(searchForm + ' input[type="search"]').focus();
	}

	$( document ).on( 'click', searchToggle, function(){ showSearch() });

})(jQuery);