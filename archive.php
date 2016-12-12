<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Centurion
 * @since Centurion 1.0
 */

get_header(); ?>

<header class="hero hero--blog hero--<?php echo get_post_type(); ?>">
	<div class="wrapper">
		<?php /** Modify title if archive = news **/ ?>
		<?php if ( is_post_type_archive( 'news' ) ) { ?>
			<h1 class="hero__title hero--blog__title"><?php _e( 'News & Events', 'centurion' ); ?></h1>
		<?php } else { ?>
			<h1 class="hero__title hero--blog__title"><?php the_archive_title(); ?></h1>
		<?php } ?>
	</div>
</header>

<main class="main main--blog" role="main">

	<div class="wrapper clearfix">
		<div class="col-12 col-sml-8 main--has-sidebar--right clearfix">
			<div class="block clearfix">

			<?php if ( have_posts() ) : ?>

				<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );

				// End the loop.
				endwhile;

			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

			</div>
		</div>

		<div class="sidebar sidebar--right col-12 col-sml-4 clearfix">
			<div class="block clearfix">
				<?php /** Show Events if on News archive **/ ?>
				<?php if ( is_post_type_archive( 'news' ) ) { ?>
					<h3 class="eventlist__title"><?php _e( 'Upcoming Events', 'centurion' ); ?></h3>
					<?php cntrn_render_events_posts(); ?>
				<?php } ?>
				<h4 class="sidebar__title"><?php _e( 'Stay up to date with our advice pieces with our newsletter', 'centurion' ); ?></h4>
				<a href="" class="btn btn--pink btn--full-width"><?php _e( 'Sign up here', 'centurion' ); ?></a>
			</div>
		</div>
	</div>

</main>

<?php get_footer(); ?>
