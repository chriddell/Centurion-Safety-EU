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

<article class="search-result search-result--product">
	<?php the_title( sprintf( '<h3><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
	<img src="<?php echo get_field('product_images')[0]['product_image']['url']; ?>" width="150" height="auto"/>
</article><!-- #post-## -->
