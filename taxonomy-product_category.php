<?php
/**
 * The template for displaying taxonomy pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Centurion
 * @since Centurion 1.0
 */

/**
 * We want to show same content, with
 * slight variations, for both parent
 * and child terms, so we are finding out
 * whether the queried taxonomy term is
 * the parent or the child.
 *
 * If the term is a child, not a parent,
 * then we turn that child into it's parent
 * by creating a new term object to query
 */
$queried_term_slug 			= get_query_var( 'term' );
$queried_term_object 		= get_term_by( 'slug', $queried_term_slug, 'product_category' );
$new_term_object				= ( $queried_term_object->parent == 0 ) ? $queried_term_object : get_term( $queried_term_object->parent, 'product_category' );

/**
 * There is a filter on this page, powered by JS
 * which shows/hides products based on the 
 * 'data-filtering' attribute of #product-filter-canvas.
 *
 * When a user lands on a product_cat taxonomy page,
 * whichever term they are on should be visible at the 
 * outset. In order to do this, we need to populate
 * said attribute with whichever page we are currently on.
 *
 * If that page is the parent term, we need to display all
 * child terms.
 */

// Get term slugs of child terms
$child_term_ids = ( $queried_term_object->parent == 0 ) ? get_term_children( $new_term_object->term_id, 'product_category') : $queried_term_object->term_id;

// Empty var (string)
$slugs_for_filter = '';

// Check whether array of IDs
if ( !is_array( $child_term_ids ) ) {

	// We can just use the single slug if not an array
	$slugs_for_filter = get_term($child_term_ids, 'product_category')->slug;
	
} else {

	// Loop them
	foreach ( $child_term_ids as $child_term_id ) {

		// Get the slugs
		$slug = get_term($child_term_id, 'product_category')->slug;

		// Add them to var
		$slugs_for_filter .= ' ';
		$slugs_for_filter .= $slug;
	}
}

get_header(); ?>
	
	<div class="flex-content fill-height"><!-- .flex-content -->
		<?php get_sidebar('expanded'); ?>
		<main role="main" class="main main--has-sidebar main--with-padding"><!-- .main -->
			<div class="wrapper">
				<header id="main-header">
					<?php
						// Show taxonomy term (or it's parent) name and description
						echo '<h2 class="product-listing__category-title">'; echo $new_term_object->name; echo '</h2>';
						echo '<p class="product-listing__description">'; echo $new_term_object->description; echo '</p>';
					?>
				</header>

				<!-- #product-filter-canvas -->
				<div id="product-filter-canvas" class="clearfix" data-filtering="all">
					<?php
					/**
					 * Get all the posts (products) associated
					 * with the current taxonomy term and return
					 * them
					 */
					$args = array(
						'parent' 		=> $new_term_object->term_id,
						'orderby'		=> 'id'
					);

					$terms = get_terms( 'product_category', $args );

					foreach ( $terms as $term ) {

						wp_reset_query();

						$args = array(
							'post_type' => 'product',
							'tax_query' => array(
								array(
									'taxonomy' => 'product_category',
									'field' => 'slug',
									'terms' => $term->slug,
								),
							)
						);

						$loop = new WP_Query($args);

						if ( $loop->have_posts() ) {

							echo '<div class="product-listing__category-container clearfix" data-filter="filterable" data-filter-term="' . $term->slug . '">';
								echo '<h3 class="product-listing__sub-category-title">' . $term->name . '</h3>';

								while( $loop->have_posts() ) : $loop->the_post() ;
									// Include the single post content template.
									get_template_part( 'template-parts/content-product' );
								endwhile;

							echo '</div>';
						}
					}

					?>
				</div><!-- / #product-filter-canvas -->
			</div><!-- .wrapper -->
		</main><!-- / .main -->
	</div><!-- / .flex-content -->

<?php get_footer(); ?>
