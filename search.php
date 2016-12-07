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

			<div id="content" role="main" class="search-content-wrap">
				<section class="search-content">
				<?php $products = false; $news = false; $advice = false; ?>
				<?php if ( have_posts() ) : ?>
					<div class="search-content-inner">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php 
							if ( $post->post_type == 'product' && !$products ) {
								echo '<h3>Products</h3>';
								$products = true;
							}

							if ( $post->post_type == 'news' && !$news ) {
								echo '<h3>News</h3>';
								$news = true;
							}

							if ( $post->post_type == 'advice' && !$advice ) {
								echo '<h3>Advice</h3>';
								$advice = true;
							}
							?>
							<?php get_template_part( 'template-parts/content', 'search-' . get_post_type() ); ?>
						<?php endwhile; ?>
					</div>

				<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>
				</section>
			</div>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer(); ?>
