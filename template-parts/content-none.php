<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package WordPress
 * @subpackage Centurion
 * @since Centurion 1.0
 */
?>

<section class="no-results not-found">
	<?php if ( is_search() ) : ?>

		<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentysixteen' ); ?></p>

	<?php else : ?>

		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentysixteen' ); ?></p>

	<?php endif; ?>
</section><!-- .no-results -->
