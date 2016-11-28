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

// Get the product terms
$terms = get_terms( 'product_category', array( 'hide_empty' => false, 'orderby' => 'name', 'order' => 'ASC' ) );

// If we have terms and there are no errors
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {

	// Set up a list
	$term_list = '<ul>';

	// List the terms
	foreach ( $terms as $term ) {

		// Get the term's image (ACF) [Object]
		$term_image = get_field('product_category_image', $term);

		// Store some DOM
		$term_list .= '<li>';
		$term_list .= '<a href="' . esc_url( get_term_link( $term ) ) . '" title="' . esc_attr( sprintf( __( 'View all %s products', 'my_localization_domain' ), $term->name ) ) . '">';
		$term_list .= '<img src="' . $term_image['url'] . '" alt="' . $term_image['alt'] . '"/>';
		$term_list .= '<h3>' . $term->name . '</h3>';
		$term_list .= '<p>' . $term->description . '</p>';
		$term_list .= '</a>';
		$term_list .= '</li>';
	}

	// Close the list
	$term_list .= '</ul>';

	// Render the list
	echo $term_list;
}

?>

<?php get_footer(); ?>