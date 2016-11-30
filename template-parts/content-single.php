<?php
/**
 * The template part for displaying product content
 *
 * @package WordPress
 * @subpackage Centurion
 * @since Centurion 1.0
 */

// Get ACF fields
$hero_image = get_field('post_hero_image');

// Setup author and tags as var for ease
$author = get_the_author();
$tags		= get_the_tags();

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header>
		<img src="<?php echo $hero_image['url']; ?>"/>
		<p>Written by <?php echo $author; ?></p>
		<p><?php the_date('j F Y'); ?></p>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<?php if ( $tags ) { ?>
		<footer>
			<h4>Tags</h4>
			<ul>
				<?php foreach ( $tags as $tag ) { ?>
					<li>
						<?php echo $tag->name; ?>
					</li>
				<?php } ?>
			</ul>
		</footer>
	<?php } ?>

</article>

<?php get_footer(); ?>