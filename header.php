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

	<a class="skip-link sr-only" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>

	<header class="header--site">
		<div class="wrapper">
			<h1 class="reset-spacing zero-line-height">
				<span class="sr-only"><?php bloginfo( 'name' ); ?></span>
				<?php the_custom_logo(); ?>
			</h1>

			<button class="hamburger hamburger--boring nav--main__trigger header__button" type="button" id="nav-main-trigger">
  			<span class="hamburger-box">
    			<span class="hamburger-inner"></span>
  			</span>
			</button>
		</div>

			<nav class="nav--main" id="main-nav">
				<div class="wrapper">
					<?php 
						$args = array(
							'menu' 				=> 'main',
							'menu_class'	=> 'menu menu--main menu--header',
							'container'		=> false
						);
						wp_nav_menu( $args );
					?>
				</div>
			</nav>

			<div class="nav--secondary" id="sub-nav">
				<div class="wrapper">
					<ul class="menu menu--drop-down menu--lang-selector menu--header" id="language-selector">
						<li class="menu__item menu--header__item menu--lang-selector__item"><a href="" class="hover-underline">English</a></li>
						<li class="menu__item menu--header__item menu--lang-selector__item"><a href="" class="hover-underline">Français</a></li>
						<li class="menu__item menu--header__item menu--lang-selector__item"><a href="" class="hover-underline">Deutsch</a></li>
						<li class="menu__item menu--header__item menu--lang-selector__item"><a href="" class="hover-underline">Español</a></li>
					</ul>
					<ul class="menu menu--header">
						<li class="menu__item menu--header__item header__custom-link">
							<a href="<?php echo cntrn_stockists_link(); ?>" class="hover-underline">Find a valued stockist</a>
						</li>
					</ul>
				</div>
			</div>

		</div>
	</header>

	<div id="content" class="site-content">
