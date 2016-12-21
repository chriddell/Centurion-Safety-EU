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

				<div class="search-results__form clearfix">
					<!-- .search-form -->
					<form action="/" method="GET" class="form form--search form--search--in-page col-12" id="search-form">
						<input type="search" class="form__input form--search--in-page__input form__input--search form--search--in-page__input--search col-12" placeholder="What are you looking for?" value="<?php echo get_search_query(); ?>" name="s">
						<input class="form__input form--search__input--submit form--search--in-page__input form__input--submit form--search--in-page__input--submit" type="submit" id="search-submit" value="" />
					</form>
					<!-- / .search-form -->
				</div>

				<?php if ( !empty( get_search_query() ) && !ctype_space( get_search_query() ) ) { ?>
					<ul class="menu tags tags--with-border">
						<?php cntrn_split_search_query_string('<li class="tags__tag tags--search__tag">%s</li>'); ?>
					</ul>
				<?php } ?>
			</header>

			<section class="search-results__content clearfix">
				<?php $products = false; $news = false; $advice = false; ?>
				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>
						<?php 
						if ( $post->post_type == 'product' && !$products ) {

							printf('<h3 class="search-results__title clear-both col-12">%s</h3>', get_post_type_object('product')->labels->name);
							$products = true;
						}

						if ( $post->post_type == 'news' && !$news ) {

							printf( '<h3 class="search-results__title clear-both col-12">%s</h3>', __( 'News & Events' ) );
							$news = true;
						}

						if ( $post->post_type == 'advice' && !$advice ) {

							printf( '<h3 class="search-results__title clear-both col-12">%s</h3>', get_post_type_object('advice')->labels->name );
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
