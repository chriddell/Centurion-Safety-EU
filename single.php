<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Centurion
 * @since Centurion 1.0
 */

get_header(); ?>

<main class="main" role="main">
	<div class="wrapper">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			if ( get_post_type() == 'product' ) {

				// Include the single product content template.
				get_template_part( 'template-parts/content', 'single-product' );
			}

			else {

				// Include the single post content template.
				get_template_part( 'template-parts/content', 'single' );
			}

			// End of the loop.
		endwhile;
		?>
	</div>
</main>

<?php get_footer(); ?>
