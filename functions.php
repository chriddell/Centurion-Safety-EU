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
 * Load text domains for mutlilanguage support
 * https://www.smashingmagazine.com/2011/12/internationalizing-localizing-wordpress-theme/
 */
function cntrn_multilang_setup() {

	load_theme_textdomain( 'centurion', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'cntrn_multilang_setup' );

/**
 * Add HTML5 theme support.
 */
function cntrn_html5_support() {
		add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'cntrn_html5_support' );

/**
 * Enqueue scripts and styles
 */
function cntrn_assets() {

	/* Styles
	 ========================================================================== */
	 wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/style.css' );
	 wp_enqueue_style( 'slick', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css' );

	 /* Scripts
	 ========================================================================== */
	 wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/app/built/app.min.js', array( 'jquery' ), '1.0.0', true );
	 wp_enqueue_script( 'lib', get_template_directory_uri() . '/assets/js/lib/built/lib.min.js', '', '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'cntrn_assets' );

/**
 * Remove jQuery Migrate
 * http://aaha.co/2013/08/05/remove-jquery-migrate-wordpress-36/
 */
/*
function cntrn_jquery() {

	if (!is_admin()) {

		// Deregister wp default jQuery
		wp_deregister_script( 'jquery' );

		// Register it from CDN
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', false, '3.1.1');
		wp_enqueue_script('jquery');
	}
}
add_action( 'init', 'cntrn_jquery' );
*/

/**
 * Create custom post type
 * Product
 */
function cntrn_product_init() {

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
 * Create Product Colours taxonomy
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
 * Create custom post type
 * Advice
 */
function cntrn_advice_init() {

	register_post_type( 'advice',

		array(

			'labels' => array(
				'name'            => __( 'Advice' ),
				'singular_name'   => __( 'Advice' )
			),
			'public'        => true,
			'has_archive'   => true,
			'taxonomies'		=> array('post_tag')
		)
	);
}
add_action( 'init', 'cntrn_advice_init' );

/**
 * Create custom post type
 * News
 */
function cntrn_news_init() {

	register_post_type( 'news',

		array(

			'labels' => array(
				'name'            => __( 'News' ),
				'singular_name'   => __( 'News' )
			),
			'public'        => true,
			'has_archive'   => true,
			'taxonomies'		=> array('post_tag')
		)
	);
}
add_action( 'init', 'cntrn_news_init' );

/**
 * Create custom post type
 * Event
 */
function cntrn_event_init() {

	register_post_type( 'event',

		array(

			'labels' => array(
				'name'            => __( 'Events' ),
				'singular_name'   => __( 'Event' )
			),
			'public'        => true,
			'has_archive'   => true,
			'supports' 			=> array( 'title' ) // Disable WSYWIG	
		)
	);
}
add_action( 'init', 'cntrn_event_init' );

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
function cntrn_the_custom_logo() {

	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
add_theme_support( 'custom-logo' );

/**
 * Add class to site logo
 * http://www.mavengang.com/2016/06/02/change-wordpress-custom-logo-class/
 */
function change_logo_class( $html ) {

	$html = str_replace( 'custom-logo', 'header--site__logo', $html );
	return $html;
}
add_filter( 'get_custom_logo', 'change_logo_class' );

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
		echo '<li class="product-filter__item product-filter__item-heading">';
		echo $single_term->name;
		echo '</li>';
	} 

	// Else it is a child
	else {

		echo '<li class="product-filter__item">';
		echo '<a href="' . get_term_link( $single_term ) . '">';
		echo $single_term->name;
		echo '</a>';
		echo '</li>';
	}

	$children = get_term_children( $term_id, $taxonomy );

	if ( $children ) {

		// Sub-list
		echo '<ul class="product-filter__item-list--is-child menu">';

		foreach ( $children as $child ) {

			$child_term = get_term( $child );

			echo '<li class="product-filter__item product-filter__item--has-input">';
			echo '<input type="checkbox" name="filter-' . $child_term->slug . '" class="product-filter__item__input" data-filter-by="' . $child_term->slug . '"/>';
			echo '<label for="filter-' . $child_term->slug . '" class="product-filter__item__label">';
			echo $child_term->name;
			echo '</label>';
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
				echo '<li class="product-filter__item product-filter__item-heading">';
				echo '<a href="' . get_term_link( $sibling ) . '" class="product-filter__item-link">';
				echo $sibling->name;
				echo '</a>';
				echo '</li>';
			}
		}
	}
}

/**
 * Show top level product_category
 * links
 *
 * @param images 			= show category_image; boolean
 * @param classnames 	= add class(es); string
 */
function cntrn_render_splash_blocks( $ul_classnames = '', $li_classnames = '' ) {

	// Set up query args
	$args = array(
		'hide_empty' => false,
		'orderby' 		=> 'count',
		'order' 			=> 'DESC',
		'parent' 			=> 0
	);

	// Get all product categories
	// (only top-level)
	$terms = get_terms( 'product_category', $args );

	// Only render if we have terms
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {

		// Start a list
		echo '<ul class="'; echo $ul_classnames; echo '">';

		foreach ( $terms as $term ) {

			// Get an image
			$term_image = get_field( 'product_category_image', $term );

			// Render DOM
			echo '<li class="'; echo $li_classnames; echo '">';
			echo '<span class="splash-block__container" style="background-image: url(' . $term_image['url'] . ')">';
			echo '<span class="splash-block__content">';
			echo '<h3 class="splash-block__title">' . $term->name . '</h3>';
			echo '<a href="' . esc_url( get_term_link( $term ) ) . '" title="' . esc_attr( sprintf( __( 'View all %s products', 'my_localization_domain' ), $term->name ) ) . '" class="btn splash-block__btn">';
			echo 'Explore our range';
			echo '</a>';
			echo '</span>';
			echo '</span>';
			echo '</li>';
		}

		// End list
		echo '</ul>';
	}
}

/**
 * Echo link to 'Stockists'
 * page.
 *
 */
function cntrn_stockists_link() {

	$stockists_page = get_page_by_path( 'stockists', object );
	$stockists_page_url = get_page_link( $stockists_page->ID );

	// Print the URL
	return $stockists_page_url;
}

/**
 * Add class to to <a> tag in 
 * wp_nav_menu
 * 
 * from http://stackoverflow.com/questions/26180688/how-to-add-class-to-link-in-wp-nav-menu
 */
function cntrn_add_link_class_wp_nav_menu( $ul_class ) {

	return preg_replace('/<a /', '<a class="menu__item__link"', $ul_class);
}
add_filter( 'wp_nav_menu', 'cntrn_add_link_class_wp_nav_menu' );

/**
 * Re-order search results from
 * Relevanssi search plugin
 *
 * Uses 'relevanssi_hits_filter' hook
 * http://www.relevanssi.com/user-manual/relevanssi_hits_filter/
 */
function cntrn_reorder_search_results($hits) {

	$types = array();

	$types['advice'] = array();
	$types['news'] = array();
	$types['product'] = array();

	// Split the post types in array $types
	if (!empty($hits)) {
		foreach ($hits[0] as $hit) {
			// If search returns null for a post_type,
			// define as an array so we get no PHP error
			// Fix from: http://pastebin.com/jmjWZik1 (line 37)
			if (!is_array($types[$hit->post_type])) $types[$hit->post_type] = array();
			array_push($types[$hit->post_type], $hit);
		}
	}

	// Merge back to $hits in the desired order
	$hits[0] = array_merge($types['product'], $types['advice'], $types['news']);
	return $hits;
}
add_filter( 'relevanssi_hits_filter', 'cntrn_reorder_search_results' );

/**
 * Remove archive label from title
 * https://developer.wordpress.org/reference/functions/get_the_archive_title/#user-contributed-notes
 */
function my_theme_archive_title( $title ) {

	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	}
	
	return $title;
}
add_filter( 'get_the_archive_title', 'my_theme_archive_title' );

/**
 * Allow SVG uploads
 */
function cntrn_mime_types( $mimes ) {

  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cntrn_mime_types');

/**
 * Get all posts with post-type 'event'
 */
function cntrn_render_events_posts() {

	// Only events, all of them
	$args = array(
		'post_type' 			=> 'event',
		'posts_per_page' 	=> -1
	);

	$the_query = new WP_Query($args);

	/** Loop our query **/
	if ( $the_query->have_posts() ) {
		echo '<ul class="eventlist menu">';
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			get_template_part( 'template-parts/content', 'event' );
		}
		echo '</ul>';
	}

	/** Restore original post data **/
	wp_reset_postdata();
}

/**
 * Split a query string into multiple
 * strings
 */
function cntrn_split_search_query_string( $wrapper ) {

	$query_string = get_search_query(); 
	$result_array = explode(' ', $query_string);

	foreach ( $result_array as $string ) {
		printf( $wrapper, $string );
	}
}

/**
 * Count no. of individual post_types in
 * a query
 */
function cntrn_count_query_post_types( $query, $type, $wrapper ) {

	// Set var to hold how many 
	// post-types returned
	$num_posts = 0;

	// Find out how many posts in total
	$total_posts = $query->found_posts;

	// Lopp the query to find the posts
	foreach ( $query->posts as $post ) {
		if ( $post->post_type == $type ) $num_posts++;
	}

	// Echo with some HTML
	printf( $wrapper, $num_posts, $total_posts );
}

/**
 * Find out if there are any featured-products
 */ 
function cntrn_get_featured_products() {

	// Get products with featured = true
	$query = new WP_Query(array(
		'posts_per_page'	=> 2,
		'post_type'				=> 'product',
		'meta_key'				=> 'product_featured',
		'meta_value'			=> true
	));

	// If posts returns something
	if ( $query->have_posts() ) { 
		return true;
	}

	else {
		return false;
	}

	// Restore global post data
	wp_reset_query();
}

/**
 * Show 2 featured products
 */ 
function cntrn_render_featured_products() {

	// Get products with featured = true
	$query = new WP_Query(array(
		'posts_per_page'	=> 2,
		'post_type'				=> 'product',
		'meta_key'				=> 'product_featured',
		'meta_value'			=> true
	));

	// If posts returns something
	if ( $query->have_posts() ) { 

		// Echo title
		printf('<h2 class="section-title uppercase text-centered">%s</h2>', __( 'Our Latest Systems' ) );

		while ( $query->have_posts() ) : $query->the_post();

			get_template_part( 'template-parts/content', 'featured-product' );

		endwhile;
	}

	// Restore global data
	wp_reset_query();
}

/**
 * Get latest advice post_type
 * so we can check for them before rendering
 * them
 */
function cntrn_get_latest_advice_posts() {

	// Query advice posts
	$query = new WP_Query(array(
		'posts_per_page'	=> 3,
		'post_type'				=> 'advice',
		'orderby'					=> 'date'
	));

	// If posts returns something
	if ( $query->have_posts() ) { 
		return true;
	}

	else {
		return false;
	}

	// Restore global post data
	wp_reset_query();
}

/**
 * Get latest advice post_type 
 * and render them
 */
function cntrn_render_latest_advice_posts() {

	// Query advice posts
	$query = new WP_Query(array(
		'posts_per_page'	=> 3,
		'post_type'				=> 'advice',
		'orderby'					=> 'date'
	));

	// If posts returns something
	if ( $query->have_posts() ) {

		// Render title
		printf('<h2 class="section-title section-title--light uppercase text-centered">%s</h2>', __( 'Latest Advice' ) );

		while ( $query->have_posts() ) : $query->the_post();
			get_template_part( 'template-parts/content', 'most-recent' );
		endwhile;
	}

	// Restore global post data
	wp_reset_query();
}

/**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
function cntrn_filter_post_type_by_taxonomy() {

	global $typenow;

	$post_type = 'product'; // change to your post type
	$taxonomy  = 'product_category'; // change to your taxonomy

	if ($typenow == $post_type) {

		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);

		wp_dropdown_categories(array(
			'show_option_all' => __("Show All {$info_taxonomy->label}"),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
			'hierarchical'		=> true,
			'depth'						=> 1
		));
	};
}
add_action('restrict_manage_posts', 'cntrn_filter_post_type_by_taxonomy');

/**
 * Filter posts by taxonomy in admin
 * @author  Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
function cntrn_convert_id_to_term_in_query($query) {

	global $pagenow;

	$post_type = 'product'; // change to your post type
	$taxonomy  = 'product_category'; // change to your taxonomy

	$q_vars    = &$query->query_vars;

	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}
add_filter('parse_query', 'cntrn_convert_id_to_term_in_query');

/*
 * Let Editors manage users, and run this only once.
 */
function cntrn_editor_manage_users() {
 
	if ( get_option( 'cntrn_add_cap_editor_once' ) != 'done' ) {
		 
		// let editor manage users
		$edit_editor = get_role('editor'); // Get the user role
		$edit_editor->add_cap('edit_users');
		$edit_editor->add_cap('list_users');
		$edit_editor->add_cap('promote_users');
		$edit_editor->add_cap('create_users');
		$edit_editor->add_cap('add_users');
		$edit_editor->add_cap('delete_users');

		update_option( 'cntrn_add_cap_editor_once', 'done' );
	}
}
add_action( 'init', 'cntrn_editor_manage_users' );

/**
 * Hide Admin from user list
 * because we have Editors managing
 * users
 */
function cntrn_pre_user_query($user_search) {
		$admin_ids = '1'; // REPLACE THESE NUMBERS WITH IDs TO HIDE.
		 
		$user = wp_get_current_user();
		$admin_array = explode($admin_ids, ',');
		if ( ! in_array( $user->ID, $admin_array ) ) {
			global $wpdb;
			$user_search->query_where = str_replace('WHERE 1=1', "WHERE 1=1 AND {$wpdb->users}.ID NOT IN($admin_ids)",$user_search->query_where);
		}
}
add_action( 'pre_user_query', 'cntrn_pre_user_query' );
