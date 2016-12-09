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
	'fax'					=> get_field( 'contact_fax' )
);

get_header(); ?>

<main class="main" role="main">
	<div class="wrapper">
		<div class="block">
			<?php bloginfo( 'name' ); ?>

			<p><?php echo $contact['address']; ?></p>
			<p><?php _e('Tel:', 'centurion'); echo $contact['telephone']; ?></p>
			<p><?php _e('Fax:', 'centurion'); echo $contact['fax']; ?></p>

			<?php
				// Start the loop.
				while ( have_posts() ) : the_post();
					// Show the content
					the_content();
				endwhile;
			?>
		</div>
	</div>
</main>

<?php get_footer(); ?>