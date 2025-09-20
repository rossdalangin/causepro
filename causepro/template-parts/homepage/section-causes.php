<?php
/**
 * Template part for displaying the Current Causes section on the homepage.
 *
 * @package CausePro
 */

$headline = get_theme_mod( 'causepro_causes_headline', __( 'Our Current Causes', 'causepro' ) );
$subtitle = get_theme_mod( 'causepro_causes_subtitle' );
?>

<section class="homepage-causes">
	<div class="container">
		<h2 class="section-title causes-headline"><?php echo esc_html( $headline ); ?></h2>
		<?php if ( ! empty( $subtitle ) ) : ?>
			<p class="section-subtitle"><?php echo esc_html( $subtitle ); ?></p>
		<?php endif; ?>
		<div class="causes-grid">
			<?php
			$args = array(
				'post_type'      => 'cause',
				'posts_per_page' => 3,
				'orderby'        => 'date',
				'order'          => 'DESC',
			);
			$causes_query = new WP_Query( $args );

			if ( $causes_query->have_posts() ) :
				while ( $causes_query->have_posts() ) :
					$causes_query->the_post();
			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'cause-item' ); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="cause-thumbnail">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'medium_large' ); ?>
							</a>
						</div>
					<?php endif; ?>
					<header class="entry-header">
						<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
					</header>
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div>
					<a href="<?php the_permalink(); ?>" class="button learn-more-button"><?php esc_html_e( 'Learn More', 'causepro' ); ?></a>
				</article>
			<?php
				endwhile;
				wp_reset_postdata();
			else :
			?>
				<p><?php esc_html_e( 'No current causes found.', 'causepro' ); ?></p>
			<?php
			endif;
			?>
		</div>
	</div>
</section>
