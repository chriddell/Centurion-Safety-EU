<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage Centurion
 * @since Centurion 1.0
 */

// Get contact and stockists page
// because we need to link to them/
// get their fields
$contact_page 	= get_page_by_path( 'contact', object );

// Get ACF Contact fields
$contact = array(
	'telephone' 	=> get_field( 'contact_telephone', $contact_page->ID ),
	'fax'					=> get_field( 'contact_fax', $contact_page->ID )
);

?>

</div><!-- / .content -->

<footer class="footer footer--site footer--site--tier-one">
	<div class="wrapper">
		<div class="col-sml-4 footer__contact">
			<p class="footer__copy bold"><?php bloginfo( 'name' ); ?></p>
			<p class="footer__contact-detail"><?php _e('Tel:', 'centurion'); echo $contact['telephone']; ?></p>
			<p class="footer__contact-detail"><?php _e('Fax:', 'centurion'); echo $contact['fax']; ?></p>
		</div>

		<div class="col-sml-3">
			<?php 
					wp_nav_menu(array(
						'menu' => 'product categories',
						'menu_class'	=> 'menu menu--footer',
						'container'		=> false
					)); 
				?>
		</div>

		<div class="col-sml-2">
			<nav>
				<?php 
					wp_nav_menu(array(
						'menu' => 'footer',
						'menu_class'	=> 'menu menu--footer',
						'container'		=> false
					)); 
				?>
			</nav>
		</div>

		<div class="col-sml-3">
			<ul class="menu menu--footer">
				<li class="menu__item menu--footer__item">
					<a href="#0"/><span class="icon icon--mail icon--on-left"></span><?php _e('Sign up to our newsletter', 'centurion'); ?>
				</li>
				<li class="menu__item menu--footer__item">
					<a href="<?php echo cntrn_stockists_link(); ?>"/><span class="icon icon--white-pin icon--on-left"></span><?php _e('Find a valued stockist', 'centurion'); ?></a>
				</li>
			</ul>
			<p class="footer__copyright">&copy; <?php echo date('Y'); echo ', '; bloginfo( 'name' ); ?></p>
		</div>
	</div>
</footer>

<footer class="footer footer--site footer--site--tier-two">
	<!-- Logos here -->
</footer>

<?php wp_footer(); ?>

</body>
</html>