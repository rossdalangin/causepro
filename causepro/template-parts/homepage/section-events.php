<?php
/**
 * Template part for displaying the Upcoming Events section on the homepage.
 *
 * @package CausePro
 */

$headline = get_theme_mod( 'causepro_events_headline', __( 'Upcoming Events', 'causepro' ) );
?>

<section class="homepage-events">
	<div class="container">
		<h2 class="section-title events-headline"><?php echo esc_html( $headline ); ?></h2>
		<div class="events-list">
			<?php
			$today = date( 'Y-m-d H:i:s' );
			$args  = array(
				'post_type'      => 'event',
				'posts_per_page' => 3,
				'meta_key'       => '_event_datetime',
				'orderby'        => 'meta_value',
				'order'          => 'ASC',
				'meta_query'     => array(
					array(
						'key'     => '_event_datetime',
						'value'   => $today,
						'compare' => '>=',
						'type'    => 'DATETIME',
					),
				),
			);
			$events_query = new WP_Query( $args );

			if ( $events_query->have_posts() ) :
				while ( $events_query->have_posts() ) :
					$events_query->the_post();
					$location = get_post_meta( get_the_ID(), '_event_location', true );
					$datetime = get_post_meta( get_the_ID(), '_event_datetime', true );
					$link     = get_post_meta( get_the_ID(), '_event_link', true );
					$event_date = ! empty( $datetime ) ? new DateTime( $datetime ) : null;
			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'event-item' ); ?>>
					<div class="event-details">
						<?php if ( $event_date ) : ?>
							<div class="event-date">
								<span class="month"><?php echo $event_date->format( 'M' ); ?></span>
								<span class="day"><?php echo $event_date->format( 'd' ); ?></span>
							</div>
						<?php endif; ?>
						<div class="event-info">
							<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
							<div class="event-meta">
								<?php if ( $event_date ) : ?>
									<span class="event-time"><?php echo $event_date->format( 'g:i A' ); ?></span>
								<?php endif; ?>
								<?php if ( ! empty( $location ) ) : ?>
									<span class="event-location"><?php echo esc_html( $location ); ?></span>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="event-link">
						<a href="<?php echo ! empty( $link ) ? esc_url( $link ) : the_permalink(); ?>" class="button"><?php esc_html_e( 'View Event', 'causepro' ); ?></a>
					</div>
				</article>
			<?php
				endwhile;
				wp_reset_postdata();
			else :
			?>
				<p><?php esc_html_e( 'No upcoming events found.', 'causepro' ); ?></p>
			<?php
			endif;
			?>
		</div>
	</div>
</section>
