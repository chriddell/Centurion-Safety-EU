<?php
/**
 * The template part for displaying 'event' content
 *
 * @package WordPress
 * @subpackage Centurion
 * @since Centurion 1.0
 */

// ACF Fields
$eventpost = array(
	'date' 			=> new DateTime(get_field( 'event_date' )),
	'url' 			=> get_field( 'event_url' ),
	'location'	=> get_field( 'event_location' )
);

?>

<li class="event event-list__item menu__item">
	<?php the_title('<h4 class="event__title">', '</h4>'); ?>
	<p class="event__text event__text--date"><?php echo $eventpost['date']->format('j F Y'); ?></p>
	<p class="event__text event__text--location"><?php echo $eventpost['location']; ?></p>
	<?php if ( $eventpost['url'] ) { ?>
		<a href="<?php echo $eventpost['url']; ?>" class="event__link" target="_blank">Visit website</a>
	<?php } ?>
</li>
