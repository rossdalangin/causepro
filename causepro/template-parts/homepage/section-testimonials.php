<?php
/**
 * Template part for displaying the Testimonials section on the homepage.
 *
 * @package CausePro
 */

$headline = get_theme_mod( 'causepro_testimonials_headline', __( 'What People Are Saying', 'causepro' ) );
$subtitle = get_theme_mod( 'causepro_testimonials_subtitle' );
?>

<section class="homepage-testimonials">
	<div class="container">
		<h2 class="section-title testimonials-headline"><?php echo esc_html( $headline ); ?></h2>
		<?php if ( ! empty( $subtitle ) ) : ?>
			<p class="section-subtitle"><?php echo esc_html( $subtitle ); ?></p>
		<?php endif; ?>
		<div class="testimonials-grid">
			<?php
			$args = array(
				'post_type'      => 'testimonial',
				'posts_per_page' => 3,
				'orderby'        => 'date',
				'order'          => 'DESC',
			);
			$testimonials_query = new WP_Query( $args );

			if ( $testimonials_query->have_posts() ) :
				while ( $testimonials_query->have_posts() ) :
					$testimonials_query->the_post();
					$author_name = get_post_meta( get_the_ID(), '_testimonial_author_name', true );
					$author_role = get_post_meta( get_the_ID(), '_testimonial_author_role', true );
			?>
				<article id="testimonial-<?php the_ID(); ?>" class="testimonial-item">
					<div class="testimonial-content">
						<?php the_content(); ?>
					</div>
					<footer class="testimonial-author">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="author-avatar">
								<?php the_post_thumbnail('thumbnail'); ?>
							</div>
						<?php endif; ?>
						<div class="author-info">
							<p class="author-name"><?php echo esc_html( $author_name ); ?></p>
							<?php if ( ! empty( $author_role ) ) : ?>
								<p class="author-role"><?php echo esc_html( $author_role ); ?></p>
							<?php endif; ?>
						</div>
					</footer>
				</article>
			<?php
				endwhile;
				wp_reset_postdata();
			else :
			?>
				<p><?php esc_html_e( 'No testimonials found.', 'causepro' ); ?></p>
			<?php
			endif;
			?>
		</div>
	</div>
</section>
