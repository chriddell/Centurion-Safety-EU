<?php
/**
 * The template for displaying taxonomy pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Centurion
 * @since Centurion 1.0
 */

/**
 * We want to show same content, with
 * slight variations, for both parent
 * and child terms, so we are finding out
 * whether the queried taxonomy term has
 * any parents, and if so, set up a new var 
 * (object) to hold that taxonomy term
 */

$queried_term_slug 			= get_query_var( 'term' );
$queried_term_taxonomy 	= get_query_var( 'taxonomy' );
$queried_term_object 		= get_term_by( 'slug', $queried_term_slug, $queried_term_taxonomy );
$new_term_object				= ( $queried_term_object->parent == 0 ) ? $queried_term_object : get_term( $queried_term_object->parent, $queried_term_taxonomy );

get_header(); ?>

	<div>
		<main role="main">
			<header id="main-header">
				<?php
					// Show taxonomy term (or it's parent) name and description
					echo '<h2>'; echo $new_term_object->name; echo '</h2>';
					echo '<p>'; echo $new_term_object->description; echo '</p>';
				?>
			</header>

			<header id="sidebar">
				<h3>Filter</h3>
				<ul>
					<?php
					/**
					 * Render all taxonomy terms
					 * to use as a filter
					 *
					 * Render child terms under their 
					 * relative parent
					 */
					cntrn_render_term_tree( $new_term_object->taxonomy, $new_term_object->term_id );

					?>
				</ul>
			</header>

			<?php
			/**
			 * Get all the posts (products) associated
			 * with the current taxonomy term and return
			 * them
			 */
			$terms = get_terms( 'product_category', array( 
				'parent' => $new_term_object->term_id
			));

			foreach ( $terms as $term ) {

				wp_reset_query();

				$args = array(
					'post_type' => 'product',
					'tax_query' => array(
						array(
							'taxonomy' => 'product_category',
							'field' => 'slug',
							'terms' => $term->slug,
						),
					),
				);

				$loop = new WP_Query($args);

				if ( $loop->have_posts() ) {

					echo '<h2>' . $term->name . '</h2>';

					while( $loop->have_posts() ) : $loop->the_post() ;
						// Include the single post content template.
						get_template_part( 'template-parts/content' );
					endwhile;
				}
			}

			?>
		</main>
	</div>

<?php get_footer(); ?>
