<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Centurion
 * @since Centurion 1.0
 */

// ACF Fields
$blogpost = array(
	'image' 	=> get_field('post_hero_image'),
	'author' 	=> get_the_author(),
	'tags'		=> wp_get_post_tags($post->ID),
	'url'			=> get_permalink()
);

?>

<article id="post-<?php the_ID(); ?>" class="blog blog--preview clearfix">
	<div class="col-12 col-sml-6 blog--preview__image" style="background-image: url(<?php echo $blogpost['image']['url']; ?>)"></div>

	<div class="col-12 col-sml-6 blog--preview__container">
		<?php the_title( '<h3 class="blog__title blog--preview__title">', '</h3>' ); ?>
		<p class="blog__author blog--preview__author">
			<?php _e( 'Written by', 'centurion' ); echo ' ' . $blogpost['author']; echo ', '; the_date('j F'); ?>
		</p>
		<a href="<?php echo $blogpost['url']; ?>" class="blog__link blog--preview__link">Read article<span class="icon icon--link"></span></a>

		<?php /** Tags **/ ?>
		<?php if ( $blogpost['tags'] ) { ?>
			<div class="tags blog__tags blog--preview__tags">
				<span class="tags__icon blog__tags__icon"></span>
			<?php foreach ( $blogpost['tags'] as $tag ) { ?>
				<span class="tags__tag blog__tags__tag blog--preview__tags__tag"><?php echo $tag->name; ?></span>
			<?php	} ?>
			</div>
		<?php } ?>
	</div>
</article>
