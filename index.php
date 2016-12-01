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


<div style="background-image: url(<?php echo $hero['image']['url'] ?>);"><!-- .hero -->
	<h2><?php echo $hero['title']; ?></h2>
	<?php if ( $hero['cta-text'] ) { ?>
		<span><a href=""><?php echo $hero['cta-text']; ?></a></span>
	<?php } ?>
</div><!-- / .hero -->

<?php 

// Show featured products
cntrn_render_featured_products();

// Show product categories
cntrn_render_top_product_categories(true, false);

?>

<?php get_footer(); ?>

<?php if ( $hero['cta-text'] ) { ?>
	<div>
		<video controls>
			<source src="<?php echo $hero['video']['url']; ?>" type="<?php echo $hero['video']['mime_type']; ?>">
		</video>
	</div>
<?php } ?>
