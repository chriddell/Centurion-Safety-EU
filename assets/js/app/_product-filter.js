/* ==========================================================================
   Sidebar
   ========================================================================== */

(function($){
	'use strict';

	// Global vars for this
	// partial
	var filterCanvas = '#product-filter-canvas',
			filterTerms = [],
			currentlyFiltering = ( $(filterCanvas).length ? $(filterCanvas).attr('data-filtering').split(' ') : false );

	/**
	 * Set a filter input [checkbox]
	 * as checked
	 */
	function markAsChecked( target ) {
		$('.product-filter__item__input[name="filter-' + target + '"]' ).prop('checked', true);
	};

	// Loop array of strings from
	// curentlyFilter var and mark the 
	// relevant input as checked 
	// (make it's associated products visible)
	if ( currentlyFiltering !== false ) {
		$.each(currentlyFiltering, function(i, e){
			markAsChecked(e);
		});
	}


	/**
	 * Return an array of available filter
	 * terms for a given page
	 */ 
	function getFilterTerms() {
		$('#product-filter-canvas > div[data-filter="filterable"]').each( function( i, e ){
			pushFilterTerm( this );
		});
	}

	/**
	 * Return the data-attribute value 
	 * from a given data-attribute
	 */
	function pushFilterTerm( e ) {

		var filterTerm = e.getAttribute( 'data-filter-term' );

		// Check if value in array
		// (jQuery inArray returns -1 if value
		// not present)
		if ( $.inArray( filterTerm, filterTerms ) == -1 ) {
			filterTerms.push( filterTerm );
		}
	}

	/**
	 * Mark 'checkbox' (is actually a span elem)
	 * as checked (change class, works with sprites)
	 */ 
	function markChecked( target ) {

		$( target ).siblings('.icon')
			.removeClass('icon--unchecked-box')
			.addClass('icon--checked-box');
	}

	/**
	 * Mark 'checkbox' (is actually a span elem)
	 * as checked (change class, works with sprites)
	 */ 
	function markUnchecked( target ) {

		$( target ).siblings('.icon')
			.removeClass('icon--checked-box')
			.addClass('icon--unchecked-box');
	}

	/**
	 * Hide/show elements on canvas
	 * 
	 * @param target 	= string; new filter term
	 * @param add 		= boolean; true = add filter, false = remove filter
	 */
	function runFilter( target, add ) {

		// Get the current filter(s)
		var currentFilter = $( filterCanvas ).attr( 'data-filtering' );

		// If we are already showing target, but for some
		// reason we're asked to show it again, don't do
		// anything
		if ( currentFilter.includes( target ) && add === true ) {
			return;
		}

		// Else we're asked to remove a filter
		// and it is currently being shown
		else if ( currentFilter.includes( target ) && add === false ) {

			var newFilterString = currentFilter.replace(target, '');

			// Remove it from data-attribute
			$( filterCanvas ).attr( 'data-filtering', newFilterString );
		}

		else if ( !currentFilter.includes( target ) && add === true ) {

			var newFilterString = currentFilter + ' ' + target;
			$( filterCanvas ).attr( 'data-filtering', newFilterString );	
		}

	}

	$(document).ready(function(){

		// Load our available terms
		getFilterTerms();

		$( 'input.product-filter__item__input' ).on( 'change', function(e){

			// Check whether checked or unchecked
			// and set to variable
			var add = this.checked ? true : false
			var targetTerm = $( this ).attr( 'data-filter-by' );

			if ( add === true ) {
				markChecked( this );
			} else {
				markUnchecked( this );
			}

			runFilter( targetTerm, add )
		})
	});

})(jQuery);