<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="page-header dir-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'onesocial' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php get_search_form(); ?>
			</header>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer(); ?>
