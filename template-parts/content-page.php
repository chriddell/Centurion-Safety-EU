<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Centurion
 * @since Centurion 1.0
 */
?>

<article id="post-<?php the_ID(); ?>">
	<header class="header blog__header">
		<?php the_title( '<h2 class="blog__title blog--single__title">', '</h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="wysiwyg-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->