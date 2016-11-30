<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Centurion
 * @since Centurion 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_title( sprintf( '<h3><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
</article><!-- #post-## -->
