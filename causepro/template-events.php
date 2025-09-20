<?php
/**
 * Template Name: Events Page
 *
 * This template displays all upcoming events, with filtering by event type.
 *
 * @package CausePro
 */

get_header(); ?>

<!--div id="primary" class="content-area"-->

<div class="container">
	<div class="site-content-wrapper">
	
	<main id="main" class="site-main">

		<header class="page-header">
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
		</header><!-- .page-header -->

		<div class="event-filters">
			<ul class="event-type-filters">
				<li><a href="<?php the_permalink(); ?>" class="<?php echo !isset($_GET['event_type_filter']) ? 'active' : ''; ?>"><?php esc_html_e('All', 'causepro'); ?></a></li>
				<?php
				$terms = get_terms( array( 'taxonomy' => 'event_type', 'hide_empty' => true ) );
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
					foreach ( $terms as $term ) {
						$active_class = ( isset($_GET['event_type_filter']) && $_GET['event_type_filter'] === $term->slug ) ? 'active' : '';
						echo '<li><a href="' . esc_url( add_query_arg( 'event_type_filter', $term->slug ) ) . '" class="' . $active_class . '">' . esc_html( $term->name ) . '</a></li>';
					}
				}
				?>
			</ul>
		</div>

		<div class="events-archive-list">
			<?php
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$today = date( 'Y-m-d H:i:s' );
			$args  = array(
				'post_type'      => 'event',
				'posts_per_page' => 10,
				'paged'          => $paged,
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

			// Check for taxonomy filter
			if ( isset( $_GET['event_type_filter'] ) && !empty($_GET['event_type_filter']) ) {
				$args['tax_query'] = array(
					array(
						'taxonomy' => 'event_type',
						'field'    => 'slug',
						'terms'    => sanitize_text_field($_GET['event_type_filter']),
					),
				);
			}

			$events_query = new WP_Query( $args );

			if ( $events_query->have_posts() ) :
				while ( $events_query->have_posts() ) :
					$events_query->the_post();
					get_template_part( 'template-parts/content', 'event' ); // We'll create a new content part for events
				endwhile;

				the_posts_pagination();

				wp_reset_postdata();
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
		</div>

	</main><!-- #main -->
</div></div><!-- #primary -->

<?php get_footer();
