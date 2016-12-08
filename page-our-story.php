<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Centurion
 */

// ACF Fields
$hero = array(
	'image' 		=> get_field( 'hero_image' ),
	'title' 		=> get_field( 'hero_title' ),
	'cta-text' 	=> get_field( 'hero_cta_text' ),
	'video'			=> get_field( 'hero_video' )
);

get_header(); ?>

<main class="main" role="main">
	<div class="hero" style="background-image: url(<?php echo $hero['image']['url'] ?>);"><!-- .hero -->
		<div class="wrapper">
			<h2 class="hero__title"><?php echo $hero['title']; ?></h2>
			<?php if ( $hero['cta-text'] ) { ?>
			<a href="" class="hero__cta btn btn--centered"><?php echo $hero['cta-text']; ?></a>
			<?php } ?>
		</div>
	</div><!-- / .hero -->
	</div>
</main>

<?php get_footer(); ?>

<?php if ( $hero['cta-text'] ) { ?>
	<div>
		<video controls>
			<source src="<?php echo $hero['video']['url']; ?>" type="<?php echo $hero['video']['mime_type']; ?>">
		</video>
	</div>
<?php } ?>
