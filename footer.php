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
			<p class="footer__contact-detail">Tel: <?php echo $contact['telephone']; ?></p>
			<p class="footer__contact-detail">Fax: <?php echo $contact['fax']; ?></p>
		</div>

		<div class="col-sml-3">
			<?php cntrn_render_top_product_categories(false, 'menu menu--footer', 'menu__item menu--footer__item'); ?>
		</div>

		<div class="col-sml-2">
			<nav>
				<?php 
					wp_nav_menu(array(
						'menu' => 'footer',
						'menu_class'	=> 'menu menu--main menu--footer',
						'container'		=> false
					)); 
				?>
			</nav>
		</div>

		<div class="col-sml-3">
			<ul class="menu menu--footer">
				<li class="menu__item menu--footer__item"><a href="<?php cntrn_stockists_link(); ?>"/>Find a valued stockist</a></li>
			</ul>
			<p class="footer__copyright">&copy; <?php echo date('Y'); echo ', '; bloginfo( 'name' ); ?></p>
		</div>
	</div>
</footer>

<footer class="footer footer--site footer--site--tier-two">
</footer>

<?php wp_footer(); ?>
</body>
</html>