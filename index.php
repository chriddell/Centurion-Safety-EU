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

get_header(); ?>

<?php 

// Show featured products
cntrn_render_featured_products();

// Show product categories
cntrn_render_top_product_categories(true, false);

?>

<?php get_footer(); ?>