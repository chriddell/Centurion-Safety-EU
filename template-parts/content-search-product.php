<?php
/**
 * The template part for displaying product
 * post-type as a search result
 *
 * @package WordPress
 * @subpackage Centurion
 * @since Centurion 1.0
 */
?>

<div class="col-12 col-sml-4">
	<article class="search-result search-result--product product-listing product-listing--centered product-listing--search">
		<div class="product-listing__container">
			<div class="product-listing__image-container">
				<img src="<?php echo get_field('product_images')[0]['product_image']['url']; ?>" class="product-listing__image"/>
			</div>
			<?php the_title('<h3 class="product-listing__title">', '</h3>'); ?>
			<a href="<?php echo get_permalink(); ?>" class="product-listing__link"><?php _e('More info', 'centurion' ); ?><span class="icon icon--link"></a>
		</div>
	</article>
</div>
