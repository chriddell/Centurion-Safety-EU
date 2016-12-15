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
	<div class="wrapper wrapper--thin">
		<div class="block clearfix">

			<header>
				<h1 class="section-title"><?php printf( __( 'Your search has returned %s results', 'centurion' ), '<span class="highlight-color">' . $wp_query->found_posts . '</span>' ); ?></h1>
				<?php if ( !empty( get_search_query() ) && !ctype_space( get_search_query() ) ) { ?>
					<ul class="menu tags tags--search">
						<?php cntrn_split_search_query_string('<li class="tags__tag tags--search__tag">%s</li>'); ?>
					</ul>
				<?php } ?>
			</header>

			<section class="search-content clearfix">
				<?php $products = false; $news = false; $advice = false; ?>
				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>
						<?php 
						if ( $post->post_type == 'product' && !$products ) {

							printf('<h3 class="search-result__title clear-both col-12">%s</h3>', get_post_type_object('product')->labels->name);
							$products = true;
						}

						if ( $post->post_type == 'news' && !$news ) {

							printf( '<h3 class="search-result__title clear-both col-12">%s</h3>', __( 'News & Events' ) );
							$news = true;
						}

						if ( $post->post_type == 'advice' && !$advice ) {

							printf( '<h3 class="search-result__title clear-both col-12">%s</h3>', get_post_type_object('advice')->labels->name );
							$advice = true;
						}
						?>
						<?php get_template_part( 'template-parts/content', 'search-' . get_post_type() ); ?>
					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>
			</section>

		</div>
	</div>
</main><!-- .site-main -->

<?php get_footer(); ?>
