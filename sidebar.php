<?php
/**
 * The template for the sidebar
 *
 * @package WordPress
 * @subpackage Centurion
 * @since Centurion 1.0
 */

?>

<div class="sidebar sidebar--grey" id="sidebar" data-sidebar="collapsed"><!-- .sidebar -->
	<header class="header--sidebar sidebar__header product-filter__header" id="sidebar-toggle">
		<p class="reset-spacing product-filter__toggle-text" id="sidebar-toggle-text">
			<?php _e('Expand Filter', 'centurion'); ?>
		</p>
	</header>
	<div class="sidebar__main">
		<ul class="product-filter__item-list reset-spacing">
			<?php 
			wp_nav_menu(array(
				'menu' 				=> 'sidebar product categories',
				'menu_class'	=> 'product-filter__item-list reset-spacing',
				'container'		=> false
			));
			?>
		</ul>
	</div>
</div>