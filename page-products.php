<?php
/**
 * The Products page
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Centurion
 */

get_header(); ?>

<div class="flex-content fill-height"><!-- .flex-content -->
	<?php get_sidebar(); ?>
	<main role="main" class="main main--has-sidebar"><!-- .main -->
		<?php cntrn_render_splash_blocks( 'menu splash-blocks disobey-wrapper', 'splash-block splash-block--full col-12' ); ?>
	</main>
</div>

<?php get_footer(); ?>