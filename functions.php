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
 * Enqueue scripts and styles
 */
function cntrn_assets() {

	/* Styles
	 ========================================================================== */
	 wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/style.css' );

	 /* Scripts
	 ========================================================================== */
	 wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/app/built/app.min.js', array( 'jquery' ), '1.0.0', true );
	 wp_enqueue_script( 'lib', get_template_directory_uri() . '/assets/js/lib/built/lib.min.js', '', '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'cntrn_assets' );

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
	if ( $query->have_posts() ) { ?>

		<h2>Featured Products</h2>
		<ul>
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>

				<?php
				// Get the fields we need
				$product_image 				= get_field('product_images');
				$product_description 	= get_field('product_description');
				?>
				<li>
					<img src="<?php echo $product_image[0]['product_image']['url']; ?>"/>
					<?php the_title('<h3>', '</h3>'); ?>
					<p><?php echo $product_description; ?></p>
				<a href="<?php the_permalink(); ?>">Read more</a>
				</li>
			<?php endwhile; ?>
		</ul>
	<?php }

	// Restore global data
	wp_reset_query();
}

/**
 * Show most recent advice articles
 *
 * @params
 * - images 		= show category_image, default: false
 * - classname 	= add class(es) to list
 */
function cntrn_render_top_product_categories( $images = false, $classnames = null ) {

	// Set up query args
	$args = array(
		'hide_empty' => false,
		'orderby' 		=> 'name',
		'order' 			=> 'ASC',
		'parent' 			=> 0 
	);

	// Get all product categories
	// (only top-level)
	$terms = get_terms( 'product_category', $args );

	// Only render if we have terms
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {

		// Start a list
		echo '<ul>';

		foreach ( $terms as $term ) {

			// Render DOM
			echo '<li>';
			echo '<a href="' . esc_url( get_term_link( $term ) ) . '" title="' . esc_attr( sprintf( __( 'View all %s products', 'my_localization_domain' ), $term->name ) ) . '">';
			if ( $images ) {
				$term_image = get_field( 'product_category_image', $term );
				echo '<img src="' . $term_image['url'] . '" alt="' . $term_image['alt'] . '"/>';
			}
			echo $term->name;
			echo '</a>';
			echo '</li>';

		}	

		// End list
		echo '</ul>';
	}
}