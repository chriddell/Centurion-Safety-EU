<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Centurion
 * @since Centurion 1.0
 */

// Get all the fields for the product
$product = array(
	'description' 			=> get_field( 'product_description' ),
	'images'						=> get_field( 'product_images' ),
	'colors'						=> get_field( 'product_color_variations' ),
	'decals'						=> get_field( 'product_decals' ),
	'visibility'				=> get_field( 'product_visibility' ),
	'approved-to'				=> get_field( 'product_approved_to' ),
	'tested-to'					=> get_field( 'product_tested_to' ),
	'downloads'					=> get_field( 'product_downloads' ),
	'featured'					=> get_field( 'product_featured' ),
	'specialism'				=> get_field( 'product_specialism' ),
	'linked-products'		=> get_field( 'product_linked_products' )
);

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php the_title( '<h2>', '</h2>' ); ?>

	<?php echo '<p>' . $product['description'] . '</p>'; ?>

	<?php

	// Check if images
	if ( have_rows( 'product_images') ) {

		// Set an index
		$i = 0;

		// Loop through images
		while ( have_rows( 'product_images' ) ) : the_row();

			// Current image
			$image = get_sub_field( 'product_image');

			// Render the image
			echo '<img src="' . $image['url'] . '"/>';

		endwhile;
	}
	?>

	<?php
	// Check for more colours
	if ( have_rows( 'product_color_variations' ) ) {

		// Title
		echo '<h3>Colours</h3>';
		echo '<ul>';

		// Loop rows of colours
		while ( have_rows( 'product_color_variations' ) ) : the_row();
			echo '<li>';

			// Get the meta for this colour
			$color_object 	= get_sub_field( 'product_color' );
			$color_name 		= $color_object->name;
			$color_hex 			= get_field( 'product_color_hex_code', $color_object );

			// Render color details
			echo $color_name . ' (' . $color_hex . ')';

			// Loop images and show
			while ( have_rows( 'product_color_images' ) ) : the_row();
				$product_image = get_sub_field( 'product_color_image' );
				echo '<img src="' . $product_image['url'] . '"/>';
			endwhile;

			echo '</li>';
		endwhile;

		echo '</ul>';
	}
	?>

	<?php if ( $product['decals'] ) { echo '<h3>Decals</h3><p>' . $product['decals'] . '</p>'; } ?>

	<?php if ( $product['visibility'] ) { echo '<h3>Visibility</h3><p>' . $product['visibility'] . '</p>'; } ?>

	<?php if ( $product['approved-to'] ) { echo '<h3>Approved To</h3><p>' . $product['approved-to'] . '</p>'; } ?>

	<?php if ( $product['tested-to'] ) { echo '<h3>Tested To</h3><p>' . $product['tested-to'] . '</p>'; } ?>

	<?php if ( $product['featured'] ) { echo '<h3>Featured?</h3><p>' . $product['featured'] . '</p>'; } ?>

	<?php 
	// Check for any product_specialisms
	if ( $product['specialism'] ) {

		// Render the name and hex_code
		echo '<h3>Specialism</h3>';
		echo '<p>' . $product['specialism']->name . ' (' . get_field( 'product_specialism_hex_code', $product['specialism']) . ')</p>';
	}
	?>

	<?php
	// Check if downloads
	if ( have_rows( 'product_downloads') ) {

		echo '<h3>Downloads</h3>';
		echo '<ul>';

		$i = 0;
		// Loop through images
		while ( have_rows( 'product_downloads' ) ) : the_row();

			// Current download
			$download = get_sub_field( 'product_download' );

			// Render the image
			echo '<li>';
			echo '<a href="' . $download['url'] . '" target="_blank">' . $download['title'] . '</a>';
			echo '</li>';

		endwhile;

		echo '</ul>';
	}
	?>

	<?php
	// Check if any linked products in CMS
	if ( have_rows( 'product_linked_products') ) {
		echo '<h3>Linked Products</h3>';
		echo '<ul>';
		// Loop through linked-products
		while ( have_rows( 'product_linked_products' ) ) : the_row();
			// Get the linked product post-object
			$linked_product 						= get_sub_field( 'product_linked_product');
			// Get the array of images ACF
			$linked_product_images 			= get_field( 'product_images', $linked_product);
			// Get the first image url
			$linked_product_image_url 	= $linked_product_images[0]['product_image']['url'];
			// Render
			echo '<li>';
			echo '<a href="' . get_permalink($linked_product) . '">';
			echo '<h4>' . $linked_product->post_title . '</h4>';
			echo '<img src="' . $linked_product_image_url . '"/>';
			echo '</a>';
			echo '</li>';
		endwhile;
		echo '</ul>';
	}
	?>
</article>

<?php get_footer(); ?>