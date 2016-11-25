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
add_action( 'init', 'cntrn_product_colours_init' );

/**
 * Fix 'rows' not working on
 * ACF textarea
 *
 * See: http://bit.ly/2fvTUmI
 */
function acf_textarea_fix() {
	echo '<style type="text/css">.acf_postbox .field textarea {min-height:0 !important;}</style>';
}
add_filter('admin_head','acf_textarea_fix');
