<?php
/**
 * The products page
 *
 * Lists product categories
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Centurion
 */

get_header(); ?>

<?php

// Get top-level product
// category terms
$terms = get_terms( 'product_category', array( 
	'hide_empty' => false, 
	'orderby' => 'name', 
	'order' => 'ASC', 
	'parent' => 0 
));

// If we have terms and there 
// are no errors
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {

	/**
	 * Filter (sidebar)
	 */
	echo '<ul>';
	echo '<h4>Filter</h4>';

	foreach ( $terms as $term ) {
		// Render DOM
		echo '<li>';
		echo '<a href="' . esc_url( get_term_link( $term ) ) . '" title="' . esc_attr( sprintf( __( 'View all %s products', 'my_localization_domain' ), $term->name ) ) . '">';
		echo $term->name;
		echo '</a>';
		echo '</li>';
	}

	echo '</ul>';

	// Set up a list
	echo '<ul>';
	echo '<h3>Category Listings</h3>';

	// List the terms
	foreach ( $terms as $term ) {

		// Get the term's image (ACF) [Object]
		$term_image = get_field( 'product_category_image', $term );

		// Render DOM
		echo '<li>';
		echo '<a href="' . esc_url( get_term_link( $term ) ) . '" title="' . esc_attr( sprintf( __( 'View all %s products', 'my_localization_domain' ), $term->name ) ) . '">';
		echo '<img src="' . $term_image['url'] . '" alt="' . $term_image['alt'] . '"/>';
		echo '<h3>' . $term->name . '</h3>';
		echo '<p>' . $term->description . '</p>';
		echo '</a>';
		echo '</li>';
	}

	// Close the list
	echo '</ul>';
}

?>

<?php get_footer(); ?>