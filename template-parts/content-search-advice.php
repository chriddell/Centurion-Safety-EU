<?php
/**
 * The template part for displaying 'advice'
 * post-type as a search result
 *
 * @package WordPress
 * @subpackage Centurion
 * @since Centurion 1.0
 */
?>

<article class="search-result search-result--advice">
	<?php the_title( sprintf( '<h3><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
	<?php the_excerpt(); ?>
</article><!-- #post-## -->
