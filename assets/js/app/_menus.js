/* ==========================================================================
   Menus
   ========================================================================== */

(function($){
	'use strict';

	// Toggle mobile menu
	function toggleMobileMenu( trigger ) {

		var mainNavEl 	= '#main-nav',
				subNavEl		= '#sub-nav',
				activeClass = 'is-active';

		if ( $( trigger ).hasClass( activeClass ) ) {

			// Transform hamburger
			$( trigger ).removeClass( activeClass );

			// Hide nav
			$( mainNavEl + ', ' + subNavEl ).css('height', '0');
		}

		else {

			// Transform hamburger
			$( trigger ).addClass( activeClass );

			// Show nav
			$( mainNavEl + ', ' + subNavEl ).css('height', 'auto');
		}
	}
	$( document ).on( 'click', '#nav-main-trigger', function(){
		toggleMobileMenu( this ) });

	// Show lang selector
	function toggleLangSelector( trigger ) {

		var hiddenEls 		= '.menu--lang-selector__item:not(:first-of-type)',
				container 		= $(trigger).parent('.menu'),
				activeClass 	= 'is-active'

		container.toggleClass( activeClass );
	}
	$( document ).on( 'click', '.menu--lang-selector__item:first-of-type', function(){
		toggleLangSelector( this );
	});

	// Prevent link follow on current language
	// in language selector
	$( document ).on('click', '.menu--lang-selector__item:first-of-type', function(e){
		e.preventDefault();
	});

})(jQuery);