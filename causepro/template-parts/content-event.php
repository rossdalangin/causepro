<?php
/**
 * Template part for displaying a single event in lists.
 *
 * @package CausePro
 */

$location = get_post_meta( get_the_ID(), '_event_location', true );
$datetime = get_post_meta( get_the_ID(), '_event_datetime', true );
$link     = get_post_meta( get_the_ID(), '_event_link', true );
$event_date = ! empty( $datetime ) ? new DateTime( $datetime ) : null;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'event-list-item' ); ?>>
	<div class="event-list-item-wrapper">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="event-thumbnail">
				<a href="<?php echo ! empty( $link ) ? esc_url( $link ) : the_permalink(); ?>">
					<?php the_post_thumbnail( 'thumbnail' ); ?>
				</a>
			</div>
		<?php endif; ?>

		<div class="event-details">
			<?php if ( $event_date ) : ?>
				<div class="event-date-and-time">
					<span class="event-date"><?php echo $event_date->format( 'F j, Y' ); ?></span>
					<span class="event-time"> at <?php echo $event_date->format( 'g:i A' ); ?></span>
				</div>
			<?php endif; ?>

			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>

			<div class="event-meta">
				<?php if ( ! empty( $location ) ) : ?>
					<span class="event-location"><strong><?php esc_html_e( 'Location:', 'causepro' ); ?></strong> <?php echo esc_html( $location ); ?></span>
				<?php endif; ?>
			</div>

			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div>
		</div>

		<div class="event-link">
			<a href="<?php echo ! empty( $link ) ? esc_url( $link ) : the_permalink(); ?>" class="button"><?php esc_html_e( 'More Info', 'causepro' ); ?></a>
		</div>
	</div>
</article>
