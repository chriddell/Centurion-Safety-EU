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
	'downloads'					=> get_field( 'product_downloads' ),
	'specialism'				=> get_field( 'product_specialism' ),
	'linked-products'		=> get_field( 'product_linked_products' ),
	'key-features'			=> get_field( 'product_key_features' )
);

get_header(); ?>

<article id="product-<?php the_ID(); ?>" class="product clearfix">
	<div class="block clearfix">
		<div class="col-12 col-sml-6">
			<div class="gallery product__image-gallery">

				<?php /** Image Gallery **/ ?>
				<?php if ( have_rows( 'product_images') ) { ?>

					<?php /** Main viewport first **/ ?>
					<div class="carousel carousel__main gallery__main">
						<?php 
							// Set an index
							$i = 0;

							// Find out how many rows of content
							// -1 because we set index of 0 (not 1)
							$max_i = count( get_field('product_images') ) - 1;

							// Loop through images
							while ( have_rows( 'product_images' ) ) : the_row();

								// Current image
								$image = get_sub_field( 'product_image');
								
								// Render
								echo '<div class="carousel__item carousel__main__item gallery__item gallery__main__item">';
									echo '<img src="' . $image['url'] . '" class="gallery__main__image"/>';
								echo '</div>';

							endwhile;
						?>
					</div>

					<?php /** Smaller gallery items **/ ?>
					<div class="carousel carousel__nav gallery__nav">
						<?php 

							// Set an index
							$i = 0;

							// Find out how many rows of content
							// -1 because we set index of 0 (not 1)
							$max_i = count( get_field('product_images') ) - 1;

							// Loop through images
							while ( have_rows( 'product_images' ) ) : the_row();

								// Current image
								$image = get_sub_field( 'product_image');
								
								// Render
								echo '<div class="carousel__item carousel__nav__item gallery__item gallery__nav__item">';
									echo '<div class="gallery__nav__item-container">';
										echo '<img src="' . $image['url'] . '" class="gallery__nav__image"/>';
									echo '</div>';
								echo '</div>';

							endwhile;

						?>
					</div>

				<?php } ?>
			</div>
		</div>

		<div class="col-12 col-sml-6">
			<div class="product__meta">

				<?php the_title( '<h2 class="product__title">', '</h2>' ); ?>
				<?php echo '<p class="product__copy product__description">' . $product['description'] . '</p>'; ?>
				<?php
				// Check for more colours
				if ( have_rows( 'product_color_variations' ) ) {

					// Title
					printf( '<h3 class="product__label">%s</h3>', __('Colours', 'centurion') );
					echo '<ul class="menu product__colours">';

					// Loop rows of colours
					while ( have_rows( 'product_color_variations' ) ) : the_row();
						echo '<li class="product__colours__colour">';

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
					<?php printf( '<h3 class="product__label">%s</h3>', __('Decals', 'centurion')); ?>
					<?php printf( '<p class="product__copy">%s</p>', $product['decals'] ); ?>
				<?php } ?>

				<?php if ( $product['visibility'] ) { ?>
					<?php printf( '<h3 class="product__label">%s</h3>', __('Visibility', 'centurion')); ?>
					<?php printf( '<p class="product__copy">%s</p>', $product['visibility'] ); ?>
				<?php } ?>

				<?php /** Render a tabbed box if we have info for it **/ ?>
				<?php if ( $product['approved-to'] || $product['downloads'] ) { ?>
					<div class="tabs product__tabs"><!-- .tabs -->

						<div class="tabs__header product__tabs__header clearfix">
							<?php if ( $product['approved-to'] || $product['key_features'] ) { ?>
								<span class="tabs__tab-selector product__tabs__tab-selector is-active" data-tab-id="1">
									<h3 class="tabs__tab-selector__title product__tabs__tab-selector__title">Specification</h3>
								</span>
							<?php } ?>
							<?php if ( $product['downloads'] ) { ?>
								<span class="tabs__tab-selector product__tabs__tab-selector" data-tab-id="2">
									<h3 class="tabs__tab-selector__title product__tabs__tab-selector__title">Downloads</h3>
								</span>
							<?php } ?>
						</div>

						<div class="tabs__main product__tabs__main">

							<?php if ( $product['approved-to'] || $product['key-features'] ) { ?>
								<div class="tabs__tab-content is-active" data-tab-id="1">
									<?php if ( $product['approved-to'] ) { ?>
										<?php printf( '<h4 class="product__label">%s</h4>', __('Approved To', 'centurion')); ?>
										<?php printf( '<p class="product__copy">%s</p>', $product['approved-to'] ); ?>
									<?php } ?>
									<?php /** ADD KEY FEATURES HERE **/ ?>
								</div>
							<?php } ?>

							<?php if ( have_rows( 'product_downloads') ) { ?>

								<?php if ( have_rows( 'product_downloads') && ( $product['key-features'] || $product['approved-to'] ) ) { ?>
									<div class="tabs__tab-content" data-tab-id="2">
								<?php } else { ?>
									<div class="tabs__tab-content is-active" data-tab-id="2">
								<?php } ?>

									<?php printf( '<h4 class="product__label">%s</h4>', __('Downloads', 'centurion') ); ?>
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
								</div>
							<?php } ?>

						</div><!-- / .tabs__main -->
					</div><!-- / .tabs -->
				<?php } ?>

			</div>
		</div>
	</div><!-- / .block -->

	<?php if ( have_rows( 'product_linked_products') ) { ?>
	<div class="block">
		<div class="product__linked-products">
			<div class="col-12">
				<div class="block">
					<?php printf( '<h3>%s</h3>', __('Expand your system', 'centurion') ); ?>
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
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

</article>

<?php get_footer(); ?>