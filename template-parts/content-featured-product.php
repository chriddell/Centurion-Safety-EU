<?php
/**
 * The template part for displaying a product
 * on the homepage (is featured)
 *
 * @package WordPress
 * @subpackage Centurion
 * @since Centurion 1.0
 */

// ACF Fields
$product_image 				= get_field('product_images');
$product_description 	= get_field('product_description');

?>

<div class="product-listing product-listing--featured col-12 col-sml-6">
	<div class="product-listing__container product-listing--featured__container">
		<span class="product-listing__image-container product-listing--featured__image-container">
			<img src="<?php echo $product_image[0]['product_image']['url']; ?>" class="product-listing__image product-listing--featured__image"/>
		</span>
		<?php the_title('<h3 class="product-listing__title product-listing--featured__title uppercase">', '</h3>'); ?>
		<p class="product-listing__description product-listing--featured__description"><?php echo $product_description; ?></p>
		<a href="<?php the_permalink(); ?>" class="product-listing__link product-listing--featured__link"><?php _e('Visit product page', 'centurion'); ?></a>
	</div>
</div>
