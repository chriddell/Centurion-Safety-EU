<?php
/**
 * The template part for displaying product
 * content
 *
 * @package WordPress
 * @subpackage Centurion
 * @since Centurion 1.0
 */

// Get ACF fields
$product = array(
	'image' 					=> get_field( 'product_images' )[0]['product_image']
);

// Get associated terms of this post
$terms = get_the_terms($post, 'product_category');
$term_ids = array();

// Add term IDs to term_ids array
// for a later query
foreach ( $terms as $term ) {
	$term_ids[] = $term->term_id;
}

// Return the child term we need
// by querying the terms of the
// taxonomy and including only the ones associated
// with this post, and omitting ones without 
// parents
$child_term_object = get_terms(array(
	'taxonomy' 	=> 'product_category',
	'include' 	=> $term_ids,
	'childless' => true,
	'number'		=> 1
));

?>

<div class="col-sml-4">
	<article id="post-<?php the_ID(); ?>" class="product-listing product-listing--centered">
		<div class="product-listing__container">
			<span class="product-listing__image-container">
				<img src="<?php echo $product['image']['url'] ?>" class="product-listing__image"/>
			</span>
			<?php the_title( '<h3 class="product-listing__title">', '</h3>' ); ?>
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" class="product-listing__link">
				<?php _e('More info', 'centurion'); ?>
			</a>
		</div>
	</article><!-- #post-## -->
</div>
