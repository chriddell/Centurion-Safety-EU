<?php
/**
 * The template part for displaying content
 * on the homepage (most recent)
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
	'url'			=> get_permalink(),
	'date'		=> get_the_date('j F')
);

?>

<article id="post-<?php the_ID(); ?>" class="blog blog--preview blog--most-recent col-12 col-sml-4">
	<a href="<?php the_permalink(); ?>">
		<div class="col-12 blog--preview__image" style="background-image: url(<?php echo $blogpost['image']['url']; ?>)"></div>
	</a>

	<div class="col-12 blog--preview__container">
		<?php the_title( '<h3 class="blog__title blog--preview__title blog--most-recent__title">', '</h3>' ); ?>
		<p class="blog__author blog--preview__author blog--most-recent__author">
			<?php _e( 'Written by', 'centurion' ); echo ' ' . $blogpost['author']; echo ', '; echo $blogpost['date']; ?>
		</p>
		<a href="<?php echo $blogpost['url']; ?>" class="blog__link blog--preview__link blog--most-recent__link">Read article<span class="icon icon--white-link"></span></a>
	</div>
</article>
