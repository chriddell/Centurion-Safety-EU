<?php
/**
 * The Products page
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Centurion
 */

get_header(); ?>

<div class="flex-content"><!-- .flex-content -->
	<?php get_sidebar(); ?>
	<main role="main" class="main main--has-sidebar"><!-- .main -->
		<?php cntrn_render_top_product_categories( true ); ?>
	</main>
</div>

<?php get_footer(); ?>