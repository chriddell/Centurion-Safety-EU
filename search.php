<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<main class="main" role="main">
	<div class="wrapper">
		<div class="block">

			<header>
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'onesocial' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>

			<section class="search-content">
				<?php $products = false; $news = false; $advice = false; ?>
				<?php if ( have_posts() ) : ?>
					<div class="search-content-inner">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php 
							if ( $post->post_type == 'product' && !$products ) {
								printf('<h3>%s</h3>', get_post_type_object('product')->labels->name);
								$products = true;
							}

							if ( $post->post_type == 'news' && !$news ) {
								printf('<h3>%s</h3>', get_post_type_object('news')->labels->name);
								$news = true;
							}

							if ( $post->post_type == 'advice' && !$advice ) {
								printf('<h3>%s</h3>', get_post_type_object('advice')->labels->name);
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
	</div>
</main><!-- .site-main -->

<?php get_footer(); ?>
