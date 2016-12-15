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
	'decals'						=> get_field_object( 'product_decals' )['value'],
	'visibility'				=> get_field( 'product_visibility' ),
	'ratchet'						=> get_field( 'product_ratchet' ),
	'venting'						=> get_field( 'product_venting' ),
	'approved-to'				=> get_field( 'product_approved_to' ),
	'downloads'					=> get_field( 'product_downloads' ),
	'specialism'				=> get_field( 'product_specialism' ),
	'linked-products'		=> get_field( 'product_linked_products' ),
	'key-features'			=> get_field( 'product_key_features' )
);

get_header(); ?>

<article id="product-<?php the_ID(); ?>" class="product clearfix">
	<div class="block clearfix">
		<div class="col-12 col-sml-6 product__col product__col--one">
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

		<div class="col-12 col-sml-6 product__col product__col--two">
			<div class="product__meta">

				<?php /** Product title & description **/ ?>
				<?php the_title( '<h2 class="product__title">', '</h2>' ); ?>
				<?php echo '<p class="product__copy product__description">' . $product['description'] . '</p>'; ?>

				<?php /** Product colours **/ ?>
				<?php if ( have_rows( 'product_color_variations' ) ) { ?>

				<?php
					echo '<ul class="menu product__colours">';

					// Loop rows of colours
					while ( have_rows( 'product_color_variations' ) ) : the_row();

						// Get the meta for this colour
						$color_object 	= get_sub_field( 'product_color' );
						$color_name 		= $color_object->slug;
						$color_hex 			= get_field( 'product_color_hex_code', $color_object );

						echo '<li class="product__colours__item product__colours__item--' . $color_name . '" style="background-color: ' . $color_hex . '"></li>';
					endwhile;

					echo '</ul>';
				?>
				<?php } ?>

				<?php /** Contact Links **/ ?>
				<div class="product__meta__item product__meta__contact clearfix">
					<a href="" class="product__meta__contact__item col-12 col-sml-6"><?php _e( 'Contact our Sales Team', 'centurion' ); ?></a>
					<a href="" class="product__meta__contact__item col-12 col-sml-6"><?php _e( 'Upload your logo', 'centurion' ); ?></a>
				</div>

				<?php /** Product ratchet **/ ?>
				<?php if ( $product['ratchet'] ) { ?>
					<div class="product__meta__item col-12 col-sml-6">
						<?php printf( '<h3 class="product__label inline">%s</h3>', __('Ratchet: ', 'centurion')); ?>
						<p class="product__copy inline"><?php echo get_field_object( 'product_ratchet' )['choices'][$product['ratchet']] ?></p>
					</div>
				<?php } ?>

				<?php /** Product venting **/ ?>
				<?php if ( $product['venting'] ) { ?>
					<div class="product__meta__item col-12 col-sml-6">
						<?php printf( '<h3 class="product__label inline">%s</h3>', __('Venting: ', 'centurion')); ?>
						<p class="product__copy inline"><?php echo get_field_object( 'product_venting' )['choices'][$product['venting']]; ?></p>
					</div>
				<?php } ?>

				<?php /** Product decals **/ ?>
				<?php if ( $product['decals'] ) { ?>
					<div class="product__meta__item">
						<?php printf( '<h3 class="product__label inline">%s</h3>', __('Decals: ', 'centurion')); ?>
						<p class="product__copy inline product__decals">
							<?php 
								_e('Reflective decals in ' . count($product['decals']) . ' colours: ', 'centurion');

								// Capitalise those strings!
								$capitalised_decals_array = array_map('ucfirst', $product['decals']);
								echo implode(', ', $capitalised_decals_array);
							?>
						</p>
					</div>
				<?php } ?>

				<?php /** Product visibility **/ ?>
				<?php if ( $product['visibility'] ) { ?>
					<div class="product__meta__item">
						<?php printf( '<h3 class="product__label inline">%s</h3>', __('Visibility: ', 'centurion')); ?>
						<p class="product__copy inline"><?php echo get_field_object( 'product_visibility' )['choices'][$product['visibility']]; ?></p>
					</div>
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
	</div><!-- / .wrapper -->

	<?php if ( have_rows( 'product_linked_products') ) { ?>
	<div class="block block--light-bg clearfix">
		<div class="wrapper">
			<div class="product__linked-products">
				<div class="col-12">
					<?php printf( '<h3 class="section-title mb-reset">%s</h3>', __('Expand your system', 'centurion') ); ?>
					<ul class="menu">
					<?php while ( have_rows( 'product_linked_products' ) ) : the_row(); ?>
					<?php
						// Get the linked product post-object
						$linked_product 						= get_sub_field( 'product_linked_product');
						// Get the array of images ACF
						$linked_product_images 			= get_field( 'product_images', $linked_product);
						// Get the first image url
						$linked_product_image_url 	= $linked_product_images[0]['product_image']['url'];
						// Render
					?>
						<li class="col-3">
							<div class="product-listing product-listing--centered">
								<div class="product-listing__container">
									<div class="product-listing__image-container">
										<img src="<?php echo $linked_product_image_url; ?>" class="product-listing__image"/>
									</div>
									<h4 class="product-listing__title"><?php echo $linked_product->post_title; ?></h4>
									<a href="<?php echo get_permalink($linked_product); ?>" class="product-listing__link"><?php _e('More info', 'centurion' ); ?></a>
								</div>
							</div>
						</li>
					<?php endwhile; ?>
					<?php echo '</ul>'; ?>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

</article>

<?php get_footer(); ?>