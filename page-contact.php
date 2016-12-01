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

<?php bloginfo( 'name' ); ?>

<p><?php echo $contact['address']; ?></p>
<p>Tel: <?php echo $contact['telephone']; ?></p>
<p>Fax: <?php echo $contact['fax']; ?></p>

<?php
	// Start the loop.
	while ( have_posts() ) : the_post();
		// Show the content
		the_content();
	endwhile;
?>

<?php get_footer(); ?>