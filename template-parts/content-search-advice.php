<?php
/**
 * The template part for displaying 'advice'
 * post-type as a search result
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

<article class="search-result search-result--advice blog blog--preview col-12">
	<a href="<?php the_permalink(); ?>">
		<div class="col-12 col-sml-6 blog--preview__image" style="background-image: url(<?php echo $blogpost['image']['url']; ?>"></div>
	</a>
	<div class="col-12 col-sml-6 blog--preview__container">
		<?php the_title( '<h3 class="blog__title blog--preview__title">', '</h3>' ); ?>
		<?php printf( '<p class="blog__author blog--preview__author">' . __( 'Written by', 'centurion' ) . ' %s, %s' . '</p>', $blogpost['author'], $blogpost['date'] ); ?>
		<a href="<?php echo $blogpost['url']; ?>" class="blog__link blog--preview__link">Read article<span class="icon icon--link"></span></a>
	</div>
</article>