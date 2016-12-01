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
$stockists_page = get_page_by_path( 'stockists', object );

// Get ACF Contact fields
$contact = array(
	'telephone' 	=> get_field( 'contact_telephone', $contact_page->ID ),
	'fax'					=> get_field( 'contact_fax', $contact_page->ID )
);

?>

<footer>
	<div>
		<p><?php bloginfo( 'name' ); ?></p>
		<p><?php echo $contact['telephone']; ?></p>
		<p><?php echo $contact['fax']; ?></p>
	</div>

	<div>
		<?php cntrn_render_top_product_categories(false); ?>
	</div>

	<div>
		<nav>
			<?php 
				wp_nav_menu(array(
					'menu' => 'footer'
				)); 
			?>
		</nav>
	</div>

	<div>
		<ul>
			<li><a href="<?php echo get_page_link($stockists_page->ID); ?>"/>Find a valued stockist</a></li>
		</ul>
		<p>&copy; <?php echo date('Y'); echo ', '; bloginfo( 'name' ); ?></p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>