<?php
/**
 * The Products page
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Centurion
 */

get_header(); ?>

<?php

// Show category title
// and link
echo '<h4>Filter</h4>';
cntrn_render_top_product_categories();

// Show categories with description
// and image
echo '<h3>Category Listings</h3>';
cntrn_render_top_product_categories(true, true);

?>

<?php get_footer(); ?>