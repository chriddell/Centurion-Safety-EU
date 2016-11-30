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
	'image' => get_field( 'product_images' )[0]['product_image']
);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_title( '<h3>', '</h3>' ); ?>
	<img src="<?php echo $product['image']['url'] ?>"/>
	<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">Read more</a>
</article><!-- #post-## -->
