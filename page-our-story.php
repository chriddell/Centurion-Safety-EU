<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Centurion
 */

// ACF Fields
$hero = array(
	'image' 		=> get_field( 'hero_image' ),
	'title' 		=> get_field( 'hero_title' ),
	'cta-text' 	=> get_field( 'hero_cta_text' ),
	'video'			=> get_field( 'hero_video' )
);

get_header(); ?>

<main class="main" role="main">

	<div class="hero" style="background-image: url(<?php echo $hero['image']['url'] ?>);"><!-- .hero -->
		<div class="wrapper">
			<a class="btn btn--play"><span class="sr-only">Play Video</span></a>
		</div>
	</div><!-- / .hero -->

	<div class="feature-block feature-block--one feature-block--is-split clearfix">
		<div class="feature-block__half feature-block--has-bg feature-block--half--has-bg feature-block--one--has-bg col-sml-6"></div>
		<div class="wrapper">
			<div class="feature-block__content feature-block--one__content feature-block--half feature-block--half__content col-12 col-sml-6">
				<h2 class="feature-block__title feature-block--one__title">Why we're here</h2>
				<p class="feature-block__copy">We're here to protect the judgement and creativity that shape our world.</p>
				<p class="feature-block__copy">We give workers the confidence to think clearly and deliver their best.</p>
				<p class="feature-block__copy">We've been doing it for over a hundred years.</p>
			</div>
		</div>
	</div>

	<div class="feature-block feature-block--two text-centered clearfix">
		<div class="wrapper">
			<div class="feature-block__content feature-block--two__content">
				<h3 class="feature-block__title feature-block--two__title">Experts in head protection since the 19th century</h3>

				<!-- slick.js slider -->
				<div class="timeline" id="slick">
					<div class="timeline__elem timeline__elem--one">
						<img src="<?php echo get_template_directory_uri() . '/assets/img/timeline/tank-helmet-1942.png'; ?>" class="timeline__elem__image"/>
						<h4 class="timeline__elem__title">Miners' Helmet</h4>
						<p class="timeline__elem__copy">Worn by thousands of miners across the world, including royalty</p>
					</div>
					<div class="timeline__elem timeline__elem--two">
						<img src="<?php echo get_template_directory_uri() . '/assets/img/timeline/tank-helmet-1942.png'; ?>" class="timeline__elem__image"/>
						<h4 class="timeline__elem__title">Tank Helmet</h4>
						<p class="timeline__elem__copy">Adaptations of the miners hat - even used for "Manning" dummy gun emplacements</p>
					</div>
					<div class="timeline__elem timeline__elem--three">
						<img src="<?php echo get_template_directory_uri() . '/assets/img/timeline/tank-helmet-1942.png'; ?>" class="timeline__elem__image"/>
						<h4 class="timeline__elem__title">Motorcycle Helmet</h4>
						<p class="timeline__elem__copy">Motorcycle helmets moved from two layers of pulp to Fibreglass in 1950’s</p>
					</div>
					<div class="timeline__elem timeline__elem--four">
						<img src="<?php echo get_template_directory_uri() . '/assets/img/timeline/tank-helmet-1942.png'; ?>" class="timeline__elem__image"/>
						<h4 class="timeline__elem__title">Motorcycle Helmet</h4>
						<p class="timeline__elem__copy">First injection moulded motorcycle helmet launched 1973, by 1978 the “Sprint” was the biggest selling helmet in UK</p>
					</div>
					<div class="timeline__elem timeline__elem--five">
						<img src="<?php echo get_template_directory_uri() . '/assets/img/timeline/tank-helmet-1942.png'; ?>" class="timeline__elem__image"/>
						<h4 class="timeline__elem__title">Spartan</h4>
						<p class="timeline__elem__copy">Like Centurions past, the Spartan quickly became the head gear of choice on site for many industrial workforces</p>
					</div>
					<div class="timeline__elem timeline__elem--six">
						<img src="<?php echo get_template_directory_uri() . '/assets/img/timeline/tank-helmet-1942.png'; ?>" class="timeline__elem__image"/>
						<h4 class="timeline__elem__title">Concept</h4>
						<p class="timeline__elem__copy">The lightest safety helmet (up to 20% known before) launched on the market, conforming to EN397 &amp; ANSI</p>
					</div>
					<div class="timeline__elem timeline__elem--seven">
						<img src="<?php echo get_template_directory_uri() . '/assets/img/timeline/tank-helmet-1942.png'; ?>" class="timeline__elem__image"/>
						<h4 class="timeline__elem__title">Nexus</h4>
						<p class="timeline__elem__copy">Modern style, mixed with industrial practicality</p>
					</div>
				</div>

				<div class="timeline__nav">
					<div class="timeline__nav__elem timeline__nav__elem--one">1900</div>
					<div class="timeline__nav__elem timeline__nav__elem--two">1942</div>
					<div class="timeline__nav__elem timeline__nav__elem--three">1957</div>
					<div class="timeline__nav__elem timeline__nav__elem--four">1980</div>
					<div class="timeline__nav__elem timeline__nav__elem--five">1990</div>
					<div class="timeline__nav__elem timeline__nav__elem--six">2004</div>
					<div class="timeline__nav__elem timeline__nav__elem--seven">2016</div>
				</div>
			</div>
		</div>
	</div>

	<div class="feature-block feature-block--three feature-block--has-bg feature-block--three--has-bg clearfix">
		<div class="wrapper">
			<div class="feature-block__content feature-block--three__content col-12 col-sml-6">
				<h2 class="feature-block__title feature-block--three__title">Our vision</h2>
				<p class="feature-block__copy feature-block--three__copy">To be the global experts in total head safety at work</p>
			</div>
		</div>
	</div>

	<div class="feature-block feature-block--four feature-block--has-bg feature-block--four--has-bg clearfix">
		<div class="wrapper">
			<div class="feature-block__content feature-block--four__content col-12 col-sml-6 float-right">
				<h2 class="feature-block__title feature-block--four__title">What we believe</h2>
				<p class="feature-block__copy feature-block--four__copy">That the users we serve shape the world we live in and the way we live in it</p>
				<p class="feature-block__copy feature-block--four__copy">That judgement and creativity are only possible with a clear head</p>
				<p class="feature-block__copy feature-block--four__copy">That protecting the head means protecting every bit of it</p>
				<p class="feature-block__copy feature-block--four__copy">That truly integrated head protection demands unrivalled understanding of our users</p>
				<p class="feature-block__copy feature-block--four__copy">That our independence is a valuable asset – enabling us to strive for what’s right, not what’s easy</p>
			</div>
		</div>
	</div>

	<div class="feature-block feature-block--five feature-block--has-bg feature-block--five--has-bg clearfix">
		<div class="wrapper">
			<div class="feature-block__content feature-block--five__content col-12 col-sml-6">
				<h2 class="feature-block__title feature-block--five__title">What we believe</h2>
				<p class="feature-block__copy feature-block--five__copy">That the users we serve shape the world we live in and the way we live in it</p>
			</div>
		</div>
	</div>

	<div class="block block--last">
		<div class="wrapper">
			<?php cntrn_render_splash_blocks( 'menu splash-blocks disobey-wrapper-mob clearfix', 'splash-block splash-block__homepage col-12 col-sml-6' ); ?>
		</div>
	</div>

</main>

<?php get_footer(); ?>

