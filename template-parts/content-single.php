<?php
/**
 * The template part for displaying product content
 *
 * @package WordPress
 * @subpackage Centurion
 * @since Centurion 1.0
 */

// ACF fields
$hero_image = get_field( 'post_hero_image' );

// Get tags of post
$tags = wp_get_post_tags($post->ID);

get_header(); ?>

<article id="post-<?php the_ID(); ?>" class="blog blog--single">

	<span class="hero hero--blog hero--blog--single blog__hero" style="background-image: url(<?php echo $hero_image['url']; ?>);"></span>

	<div class="wrapper wrapper--thin">
		<header class="blog__header clearfix">
			<?php the_title( '<h2 class="blog__title blog--single__title">', '</h2>' ); ?>
			<p class="blog__header-copy blog__author col-12 col-sml-6">Written by <?php the_author(); ?></p>
			<p class="blog__header-copy blog__date col-12 col-sml-6"><?php the_date('j F Y'); ?></p>
		</header>

		<div class="blog__main">
			<?php the_content(); ?>
		</div><!-- .entry-content -->

		<footer class="blog__footer">
			<?php /** Tags **/ ?>
			<?php if ( $tags ) { ?>
				<div class="menu tags tags--with-border blog__tags blog--single__tags">
					<span class="tags__icon blog__tags__icon"></span>
				<?php foreach ( $tags as $tag ) { ?>
					<span class="tags__tag blog__tags__tag blog--preview__tags__tag"><?php echo $tag->name; ?></span>
				<?php	} ?>
				</div>
			<?php } ?>
		</footer>

	</div>
</article>

<?php get_footer(); ?>