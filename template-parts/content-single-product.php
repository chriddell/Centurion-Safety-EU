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
	'ratchet'						=> get_field( 'product_ratchet' ),
	'venting'						=> get_field( 'product_venting' ),
	'approved-to'				=> get_field( 'product_approved_to' ),
	'downloads'					=> get_field( 'product_downloads' ),
	'specialism'				=> get_field( 'product_specialism' ),
	'linked-products'		=> get_field( 'product_linked_products' ),
	'key-features'			=> get_field( 'product_key_features' ),
	'attributes'				=> get_field( 'product_attributes' )
);

get_header(); ?>

<article id="product-<?php the_ID(); ?>" class="product clearfix">
	<div class="wrapper">
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

					<?php /** Product attributes **/ ?>
					<?php if ( have_rows( 'product_attributes' ) ) { ?>
						<ul class="product__attributes product__copy">
							<?php while ( have_rows( 'product_attributes' ) ) : the_row(); ?>
								<li class="product__attributes__item"><?php the_sub_field('attribute'); ?></li>
							<?php endwhile; ?>
						</ul>
					<?php } ?>

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
						<a href="mailto:sales@centurionsafety.co.uk" class="product__meta__contact__item col-12 col-sml-6"><?php _e( 'Contact our Sales Team', 'centurion' ); ?><span class="icon icon--link"></span></a>

						<?php /** Hide 'upload logo' link on products which have product_category = 'respiratory' **/ ?>
						<!-- Upload your logo is hidden for now 
						<?php if ( !has_term('respiratory-protection-systems', 'product_category' ) ) { ?>
							<a href="mailto:artwork@centurionsafety.co.uk" class="product__meta__contact__item col-12 col-sml-6"><?php _e( 'Upload your logo', 'centurion' ); ?><span class="icon icon--link"></span></a>
						<?php } ?>
						-->
					</div>

					<?php /** Product ratchet **/ ?>
					<?php if ( $product['ratchet'] ) { ?>

						<?php /** Get the object and value **/ ?>
						<?php $ratchet_object 	= get_field_object('product_ratchet'); ?>
						<?php $ratchet_value 		= $ratchet_object['choices'][$product['ratchet']]; ?>

						<div class="product__meta__item col-12 col-sml-6">
							<?php printf( '<h3 class="product__label inline">%s</h3>', __('Ratchet: ', 'centurion')); ?>
							<p class="product__copy inline"><?php echo $ratchet_value; ?></p>
						</div>
					<?php } ?>

					<?php /** Product venting **/ ?>
					<?php if ( $product['venting'] ) { ?>

						<?php /** Get the object and value **/ ?>
						<?php $venting_object 	= get_field_object('product_venting'); ?>
						<?php $venting_value 		= $venting_object['choices'][$product['venting']]; ?>

						<div class="product__meta__item col-12 col-sml-6">
							<?php printf( '<h3 class="product__label inline">%s</h3>', __('Venting: ', 'centurion')); ?>
							<p class="product__copy inline"><?php echo $venting_value; ?></p>
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

						<?php /** Get the object and value **/ ?>
						<?php $visibility_object 	= get_field_object('product_visibility'); ?>
						<?php $visibility_value 	= $visibility_object['choices'][$product['visibility']]; ?>

						<div class="product__meta__item">
							<?php printf( '<h3 class="product__label inline">%s</h3>', __('Eyewear: ', 'centurion')); ?>
							<p class="product__copy inline"><?php echo $visibility_value; ?></p>
						</div>
					<?php } ?>

					<?php /** Render a tabbed box if we have info for it **/ ?>
					<?php if ( $product['approved-to'] || $product['key-features'] || have_rows('product_downloads') ) { ?>
						<div class="tabs product__tabs"><!-- .tabs -->

							<div class="tabs__header product__tabs__header clearfix">
								<?php if ( ( $product['approved-to'] || $product['key-features'] ) && have_rows('product_downloads') ) { ?>
									<span class="tabs__tab-selector product__tabs__tab-selector is-active" data-tab-id="1">
										<h3 class="tabs__tab-selector__title product__tabs__tab-selector__title">Specification</h3>
									</span>
									<span class="tabs__tab-selector product__tabs__tab-selector" data-tab-id="2">
										<h3 class="tabs__tab-selector__title product__tabs__tab-selector__title">Downloads</h3>
									</span>
								<?php } else if ( !$product['approved-to'] && !$product['key-features'] && $product['downloads'] ) { ?>
									<span class="tabs__tab-selector product__tabs__tab-selector is-active" data-tab-id="2">
										<h3 class="tabs__tab-selector__title product__tabs__tab-selector__title">Downloads</h3>
									</span>
								<?php } else if ( ( $product['approved-to'] || $product['key-features'] ) && !$product['downloads'] ) { ?>
									<span class="tabs__tab-selector product__tabs__tab-selector is-active" data-tab-id="1">
										<h3 class="tabs__tab-selector__title product__tabs__tab-selector__title">Specification</h3>
									</span>
								<?php } ?>
							</div>

							<div class="tabs__main product__tabs__main">

								<?php if ( $product['approved-to'] || $product['key-features'] ) { ?>
									<div class="tabs__tab-content is-active" data-tab-id="1">
										<?php if ( $product['approved-to'] ) { ?>
											<?php printf( '<h4 class="product__label">%s</h4>', __( 'Approved To', 'centurion' ) ); ?>
											<?php printf( '<p class="product__copy">%s</p>', $product['approved-to'] ); ?>
										<?php } ?>
										<?php if ( $product['key-features'] ) { ?>
											<?php printf( '<h4 class="product__label">%s</h4>', __( 'Key Features', 'centurion' ) ); ?>
											<?php while ( have_rows( 'product_key_features' ) ) : the_row(); ?>
												<p class="product__copy"><?php the_sub_field('product_feature_label'); ?>: <?php the_sub_field('product_feature_copy'); ?></p>
											<?php endwhile; ?>
										<?php } ?>
									</div>
								<?php } ?>

								<?php if ( have_rows( 'product_downloads' ) ) { ?>

									<?php /** Make tab active if only tab  **/ ?>

									<?php if ( !$product['key-features'] && !$product['approved-to'] ) { ?>
										<div class="tabs__tab-content is-active" data-tab-id="2"><!-- .tabs__tab-content -->
									<?php } else { ?>
										<div class="tabs__tab-content" data-tab-id="2"><!-- .tabs__tab-content -->
									<?php } ?>

									<?php while ( have_rows( 'product_downloads' ) ) : the_row(); ?>

										<?php /** Technical Downloads **/ ?>
										<?php if ( have_rows( 'technical_downloads' ) ) { ?>

											<div class="col-12 col-sml-6">
												<?php printf( '<h4 class="product__label">%s</h4>', __( 'Technical information', 'centurion' ) ); ?>
												<ul class="menu product__downloads">
													<?php while ( have_rows('technical_downloads') ) : the_row(); ?>
														<?php 
															$technical_downloads = array(
																'instructions' 			=> get_sub_field( 'instructions' ),
																'data-sheet'				=> get_sub_field( 'data_sheet' ),
																'ce-certification'	=> get_sub_field( 'ce_certification' ),
																'barcodes'					=> get_sub_field( 'barcodes' ),
																'how-to-fit-video'	=> get_sub_field( 'how_to_fit_video' )
															);
														?>

														<?php /** Check through all downloads and output if content **/ ?>

														<?php if ( $technical_downloads['instructions'] ) { ?>
															<li class="product__downloads__item">
																<a href="<?php echo $technical_downloads['instructions']; ?>"><?php _e('Instructions', 'centurion' ); ?> (PDF)<span class="icon icon--link"></span></a>
															</li>
														<?php } ?>

														<?php if ( $technical_downloads['data-sheet'] ) { ?>
															<li class="product__downloads__item">
																<a href="<?php echo $technical_downloads['data-sheet']; ?>"><?php _e('Data Sheet', 'centurion' ); ?> (PDF)<span class="icon icon--link"></span></a>
															</li>
														<?php } ?>

														<?php if ( $technical_downloads['ce-certification'] ) { ?>
															<li class="product__downloads__item">
																<a href="<?php echo $technical_downloads['ce-certification']; ?>"><?php _e('CE Certification', 'centurion' ); ?> (PDF)<span class="icon icon--link"></span></a>
															</li>
														<?php } ?>

														<?php if ( $technical_downloads['barcodes'] ) { ?>
															<li class="product__downloads__item">
																<a href="<?php echo $technical_downloads['barcodes']; ?>"><?php _e( 'Barcodes', 'centurion' ); ?> (EPS)<span class="icon icon--link"></span></a>
															</li>
														<?php } ?>

														<?php if ( $technical_downloads['how-to-fit-video'] ) { ?>
															<li class="product__downloads__item">
																<a href="<?php echo $technical_downloads['how-to-fit-video']; ?>"><?php _e( 'How to fit video', 'centurion' ); ?> (MP4)<span class="icon icon--link"></span></a>
															</li>
														<?php } ?>

													<?php endwhile; ?>
												</ul>
											</div>

										<?php } ?>

										<?php if ( have_rows( 'image_downloads' ) || have_rows( 'marketing_downloads' ) ) { ?>

											<div class="col-12 col-sml-6">

												<?php /** Marketing Downloads **/ ?>
												<?php if ( have_rows( 'marketing_downloads' ) ) { ?>

													<?php printf( '<h4 class="product__label">%s</h4>', __( 'Marketing information', 'centurion' ) ); ?>

													<ul class="menu product__downloads">
														<?php while ( have_rows('marketing_downloads') ) : the_row(); ?>
															<?php 
																$marketing_downloads = array(
																	'video' 	=> get_sub_field( 'product_video' ),
																	'leaflet'	=> get_sub_field( 'product_leaflet' )
																);
															?>

															<?php /** Check through all downloads and output if content **/ ?>

															<?php if ( $marketing_downloads['video'] ) { ?>
																<li class="product__downloads__item">
																	<a href="<?php echo $marketing_downloads['video']; ?>"><?php _e('Product Video', 'centurion' ); ?> (MP4)<span class="icon icon--link"></span></a>
																</li>
															<?php } ?>

															<?php if ( $marketing_downloads['leaflet'] ) { ?>
																<li class="product__downloads__item">
																	<a href="<?php echo $marketing_downloads['leaflet']; ?>"><?php _e('Product Leaflet', 'centurion' ); ?> (PDF)<span class="icon icon--link"></span></a>
																</li>
															<?php } ?>

														<?php endwhile; ?>
													</ul>
												<?php } ?>

												<?php /** Imagery Downloads **/ ?>
												<?php if ( have_rows( 'image_downloads' ) ) { ?>

													<?php printf( '<h4 class="product__label">%s</h4>', __( 'Product imagery', 'centurion' ) ); ?>

													<ul class="menu product__downloads">
														<?php while ( have_rows('image_downloads') ) : the_row(); ?>
															<?php 
																$image_downloads = array(
																	'hi-res' 	=> get_sub_field( 'hires_images' ),
																	'low-res'	=> get_sub_field( 'lowres_images' )
																);
															?>

															<?php /** Check through all downloads and output if content **/ ?>

															<?php if ( $image_downloads['hi-res'] ) { ?>
																<li class="product__downloads__item">
																	<a href="<?php echo $image_downloads['hi-res']; ?>"><?php _e('High Res', 'centurion' ); ?> (JPG)<span class="icon icon--link"></span></a>
																</li>
															<?php } ?>

															<?php if ( $image_downloads['low-res'] ) { ?>
																<li class="product__downloads__item">
																	<a href="<?php echo $image_downloads['low-res']; ?>"><?php _e('Low Res', 'centurion' ); ?> (JPG)<span class="icon icon--link"></span></a>
																</li>
															<?php } ?>

														<?php endwhile; ?>
													</ul>
												<?php } ?>

											</div>

										<?php } ?>

									<?php endwhile; ?>


									</div><!-- / .tabs__tab-content -->
								<?php } ?>

							</div><!-- / .tabs__main -->
						</div><!-- / .tabs -->
					<?php } ?>

					</div>
				</div>
			</div><!-- / .block -->
		</div><!-- / .wrapper -->
	</div>

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
						<li class="col-12 col-sml-3">
							<div class="product-listing product-listing--centered">
								<div class="product-listing__container">
									<div class="product-listing__image-container">
										<img src="<?php echo $linked_product_image_url; ?>" class="product-listing__image"/>
									</div>
									<h4 class="product-listing__title"><?php echo apply_filters('the_title', $linked_product->post_title) ?></h4>
									<a href="<?php echo get_permalink($linked_product); ?>" class="product-listing__link"><?php _e('More info', 'centurion' ); ?><span class="icon icon--link"></span></a>
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