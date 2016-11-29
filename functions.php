<?php
/**
 * Centurion functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Centurion
 * @since Centurion 1.0
 */

/**
 * Create custom post types
 */
function cntrn_product_init() {

	/* Quotes
	 ========================================================================== */
	register_post_type( 'product',

		array(

			'labels' => array(
				'name'            => __( 'Products' ),
				'singular_name'   => __( 'Product' )
			),
			'public'        => true,
			'has_archive'   => true,
			'supports' 			=> array( 'title' ) // Disable WSYWIG
		)
	);
}
add_action( 'init', 'cntrn_product_init' );

/**
 * Create Product Category taxonomy
 */
function cntrn_product_category_init() {

	// labels across the admin
	$labels = array(
    'name'              => 'Product Categories',
    'singular_name'     => 'Product Category',
    'search_items'      => 'Search Product Categories',
    'all_items'         => 'All Product Categories',
    'parent_item'       => 'Parent Product Category',
    'parent_item_colon' => 'Parent Product Category:',
    'edit_item'         => 'Edit Product Category',
    'update_item'       => 'Update Product Category',
    'add_new_item'      => 'Add New Product Category',
    'new_item_name'     => 'New Product Category Name',
    'menu_name'         => 'Product Categories',
  );

	// create a new taxonomy
	register_taxonomy(
		'product_category',
		'product',

		// list it's capabilites
		array(

			'labels' => $labels,
			'hierarchical' => true,
			'rewrite' => array( 'slug' => 'products', 'hierarchical' => true ),
			'capabilities'      => array(
      	'manage_terms'  => 'edit_posts', 
      	'edit_terms'    => 'edit_posts',
      	'delete_terms'  => 'edit_posts',
      	'assign_terms'  => 'edit_posts'  // means administrator', 'editor', 'author', 'contributor'
    	)
		)
	);
}
add_action( 'init', 'cntrn_product_category_init' );

/**
 * Create Product Category taxonomy
 */
function cntrn_product_colours_init() {

	// labels across the admin
	$labels = array(
    'name'              => 'Product Colours',
    'singular_name'     => 'Product Colour',
    'search_items'      => 'Search Product Colours',
    'all_items'         => 'All Product Colours',
    'parent_item'       => 'Parent Product Colour',
    'parent_item_colon' => 'Parent Product Colour:',
    'edit_item'         => 'Edit Product Colour',
    'update_item'       => 'Update Product Colour',
    'add_new_item'      => 'Add New Product Colour',
    'new_item_name'     => 'New Product Colour Name',
    'menu_name'         => 'Product Colours',
  );

	// create a new taxonomy
	register_taxonomy(
		'product_colour',
		'product',

		// list it's capabilites
		array(

			'labels' => $labels,
			'rewrite' => array( 'slug' => 'products', 'hierarchical' => false ),
			'capabilities'      => array(
      	'manage_terms'  => 'edit_posts', 
      	'edit_terms'    => 'edit_posts',
      	'delete_terms'  => 'edit_posts',
      	'assign_terms'  => 'edit_posts'  // means administrator', 'editor', 'author', 'contributor'
    	)
		)
	);
}
add_action( 'init', 'cntrn_product_colours_init' );

/**
 * Create Product Specialism taxonomy
 */
function cntrn_product_specialisms_init() {

	// labels across the admin
	$labels = array(
    'name'              => 'Product Specialisms',
    'singular_name'     => 'Product Specialism',
    'search_items'      => 'Search Product Specialisms',
    'all_items'         => 'All Product Specialisms',
    'parent_item'       => 'Parent Product Specialism',
    'parent_item_colon' => 'Parent Product Specialism:',
    'edit_item'         => 'Edit Product Specialism',
    'update_item'       => 'Update Product Specialism',
    'add_new_item'      => 'Add New Product Specialism',
    'new_item_name'     => 'New Product Specialism Name',
    'menu_name'         => 'Product Specialisms',
  );

	// create a new taxonomy
	register_taxonomy(
		'product_specialism',
		'product',

		// list it's capabilites
		array(

			'labels' => $labels,
			'rewrite' => array( 'slug' => 'products', 'hierarchical' => true ),
			'capabilities'      => array(
      	'manage_terms'  => 'edit_posts', 
      	'edit_terms'    => 'edit_posts',
      	'delete_terms'  => 'edit_posts',
      	'assign_terms'  => 'edit_posts'  // means administrator', 'editor', 'author', 'contributor'
    	)
		)
	);
}
add_action( 'init', 'cntrn_product_specialisms_init' );

/**
 * Fix 'rows' not working on
 * ACF textarea
 *
 * See: http://bit.ly/2fvTUmI
 */
function acf_textarea_fix() {
	// Echo a style fix
	echo '<style type="text/css">.acf_postbox .field textarea {min-height:0 !important;}</style>';
}
add_filter( 'admin_head','acf_textarea_fix' );

/**
 * Add site logo support
 * https://codex.wordpress.org/Theme_Logo
 */
add_theme_support( 'custom-logo' );
function cntrn_the_custom_logo() {

	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}

/**
 * Get all terms of a taxonomy
 * and render as a tree
 */ 
function cntrn_render_term_tree( $taxonomy, $term_id ){

	// Get the requested term
	$single_term = get_term( $term_id, $taxonomy );

	// If term is parent
	if ( $single_term->parent == 0 ) {

		// Then it is not an input
		echo '<li>';
		echo $single_term->name;
		echo '</li>';
	} 

	// Else it is a child
	else {

		echo '<li>';
		echo '<a href="' . get_term_link( $single_term ) . '">';
		echo $single_term->name;
		echo '</a>';
		echo '</li>';
	}

	$children = get_term_children( $term_id, $taxonomy );

	if ( $children ) {

		// Sub-list
		echo '<ul>';

		foreach ( $children as $child ) {

			$child_term = get_term( $child );

			echo '<li>';
			echo $child_term->name;
			echo '</li>';				
		}

		// Close sub-list
		echo '</ul>';	
	}

	// Get sibling terms of top parent
	if ( $single_term->parent == 0 ) {
		$siblings = get_terms( array( 'taxonomy' => $taxonomy, 'exclude_tree' => $term_id ) );
	}
	else {
		$siblings = get_terms( array( 'taxonomy' => $taxonomy, 'exclude_tree' => $single_term->parent ) );
	}

	// If term has siblings
	if ( $siblings ) {

		// List them out
		foreach ( $siblings as $sibling ) {

			// Only show parents
			if ( $sibling->parent == 0 ) {
				echo '<li>';
				echo '<a href="' . get_term_link( $sibling ) . '">';
				echo $sibling->name;
				echo '</a>';
				echo '</li>';
			}
		}
	}
}