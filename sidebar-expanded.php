<?php
/**
 * The template for the expanded
 * sidebar
 *
 * @package WordPress
 * @subpackage Centurion
 * @since Centurion 1.0
 */

/**
 * We want to show same content, with
 * slight variations, for both parent
 * and child terms, so we are finding out
 * whether the queried taxonomy term has
 * any parents, and if so, set up a new var 
 * (object) to hold that taxonomy term
 */

// Need to find a better way of doing this
$queried_term_slug 			= get_query_var( 'term' );
$queried_term_taxonomy 	= get_query_var( 'taxonomy' );
$queried_term_object 		= get_term_by( 'slug', $queried_term_slug, $queried_term_taxonomy );
$new_term_object				= ( $queried_term_object->parent == 0 ) ? $queried_term_object : get_term( $queried_term_object->parent, $queried_term_taxonomy );

?>

<div class="sidebar sidebar--grey" id="sidebar" data-sidebar="expanded"><!-- .sidebar -->
	<header class="header--sidebar sidebar__header product-filter__header" id="sidebar-toggle">
		<p class="reset-spacing product-filter__toggle-text" id="sidebar-toggle-text"><?php _e('Collapse Filter', 'centurion'); ?></p>
	</header>
	<div class="sidebar__main">
		<ul class="product-filter__item-list reset-spacing" id="product-filter-controller">
			<?php cntrn_render_term_tree( $new_term_object->taxonomy, $new_term_object->term_id ); ?>
		</ul>
	</div>
</div>