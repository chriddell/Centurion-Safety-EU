<?php
/**
 * The Contact page
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Centurion
 */

// ACF Fields
$contact = array(
	'address' 		=> get_field( 'contact_address' ),
	'telephone'		=> get_field( 'contact_telephone' ),
	'fax'					=> get_field( 'contact_fax' ),
	'hotline'			=> get_field( 'contact_hotline' )
);

get_header(); ?>

<main class="main pos-rel" role="main">
	<div class="wrapper">
		<div class="col-12 col-sml-6 contact border-right">
			<div class="block">
				<?php the_title('<h2 class="contact__title">', '</h2>'); ?>
				<h3 class="contact__title bold">Centurion Safety Products Ltd</h3>

				<div class="col-12 col-sml-6 contact__block">
					<p class="contact__copy contact__address"><?php echo $contact['address']; ?></p>
				</div>

				<div class="col-12 col-sml-6 contact__block">
					<p class="contact__copy contact__tel"><?php _e('Tel:', 'centurion'); echo $contact['telephone']; ?></p>
					<?php if ( $contact['hotline'] ) { ?><p class="contact__copy contact__tel"><?php _e('Hotline: ', 'centurion'); echo $contact['hotline']; ?></p><?php } ?>
					<p class="contact__copy contact__fax"><?php _e('Fax:', 'centurion'); echo $contact['fax']; ?></p>
				</div>

				<div class="contact__page-content clear-both clearfix">
					<?php
						// Start the loop.
						while ( have_posts() ) : the_post();
							// Show the content
							the_content();
						endwhile;
					?>
				</div>
			</div>
		</div>
		<div class="col-12 col-sml-6 contact__map-container map-container disobey-wrapper-mob">
			<?php echo do_shortcode('[wpgmza id="2"]'); ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>