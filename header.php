<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Centurion
 * @since Centurion 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page" class="site">
		<div class="site-inner">

			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>

			<header>
				<h1>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php 
							bloginfo( 'name' ); 
							the_custom_logo();
						?>
					</a>
				</h1>

				<?php 
					$description = get_bloginfo( 'description', 'display' );
					if ( $description ) {
						echo '<p>' . $description . '</p>';
					}
				?>

				<nav>
					<h2>Main Nav</h2>
					<?php 
						wp_nav_menu(array(
							'menu' => 'main'
						));
					?>
				</nav>
			</header>

			<div id="content" class="site-content">
				<?php
				if ( $post->post_parent == 0 && !is_tax() && get_post_type() !== 'product' ) {
					the_title('<h2>', '</h2>');
				}
				?>
