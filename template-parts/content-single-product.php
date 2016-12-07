<?php
/**
 * The template part for displaying product content
 *
 * @package WordPress
 * @subpackage Centurion
 * @since Centurion 1.0
 */

// Get ACF fields
$product = array(
	'description' 			=> get_field( 'product_description' ),
	'images'						=> get_field( 'product_images' ),
	'colors'						=> get_field( 'product_color_variations' ),
	'decals'						=> get_field( 'product_decals' ),
	'visibility'				=> get_field( 'product_visibility' ),
	'approved-to'				=> get_field( 'product_approved_to' ),
	'tested-to'					=> get_field( 'product_tested_to' ),
	'downloads'					=> get_field( 'product_downloads' ),
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
		printf( '<h3>%s</h3>', __('Colours', 'centurion') );
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

	<?php if ( $product['decals'] ) { ?>
		<?php printf( '<h3>%s</h3>', __('Decals', 'centurion')); ?>
		<?php printf( '<p>%s</p>', $product['decals'] ); ?>
	<?php } ?>

	<?php if ( $product['visibility'] ) { ?>
		<?php printf( '<h3>%s</h3>', __('Visibility', 'centurion')); ?>
		<?php printf( '<p>%s</p>', $product['visibility'] ); ?>
	<?php } ?>

	<?php if ( $product['approved-to'] ) { ?>
		<?php printf( '<h3>%s</h3>', __('Approved To', 'centurion')); ?>
		<?php printf( '<p>%s</p>', $product['approved-to'] ); ?>
	<?php } ?>

	<?php if ( $product['tested-to'] ) { ?>
		<?php printf( '<h3>%s</h3>', __('Tested To', 'centurion')); ?>
		<?php printf( '<p>%s</p>', $product['tested-to'] ); ?>
	<?php } ?>

	<?php if ( $product['specialism'] ) { ?>
		<?php printf( '<h3>%s</h3>', __('Specialism', 'centurion') ); ?>
		<?php echo '<p>' ?>
		<?php echo $product['specialism']->name; ?>
		<?php echo ' ('; echo get_field( 'product_specialism_hex_code', $product['specialism']); echo ')'; ?>
		<?php echo '</p>'; ?>
	<?php } ?>

	<?php if ( have_rows( 'product_downloads') ) { ?>
		<?php printf( '<h3>%s</h3>', __('Downloads', 'centurion') ); ?>
		<?php echo '<ul>'; ?>
		<?php
		// Set index to 0
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
		?>
	<?php } ?>

	<?php if ( have_rows( 'product_linked_products') ) { ?>
		<?php printf( '<h3>%s</h3>', __('Linked Products', 'centurion') ); ?>
		<?php echo '<ul>'; ?>
		<?php
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
		?>
		<?php echo '</ul>'; ?>
	<?php } ?>
</article>

<?php get_footer(); ?>