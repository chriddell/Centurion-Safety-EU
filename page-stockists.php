<?php
/**
 * The Stockists page
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Centurion
 */

get_header(); ?>

<main class="main" role="main">
	<div class="map-container">
		<?php echo do_shortcode('[wpgmza id="1"]'); ?>
	</div>
</main>

<?php get_footer(); ?>