<?php
/**
 * Template Name: Contact Page
 *
 * @package CausePro
 */

get_header();

// Get Customizer settings
$phone   = get_theme_mod( 'causepro_contact_phone' );
$email   = get_theme_mod( 'causepro_contact_email' );
$address = get_theme_mod( 'causepro_contact_address' );
$map_url = get_theme_mod( 'causepro_contact_map_url' );
$custom_content = get_theme_mod( 'causepro_contact_page_content' );
?>

<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="page-header">
						<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
					</header><!-- .page-header -->

					<div class="entry-content">
						<div class="contact-page-grid">
							<div class="contact-main-content">
								<?php
								// Display content from the main WordPress editor
								the_content();

								// Display content from the Customizer setting (the form)
								if ( ! empty( $custom_content ) ) {
									echo '<div class="contact-page-form">';
									echo do_shortcode( wp_kses_post( $custom_content ) );
									echo '</div>';
								}
								?>
							</div>
							<aside class="contact-sidebar">
								<div class="contact-details">
									<h3><?php esc_html_e( 'Contact Information', 'causepro' ); ?></h3>
									<ul>
										<?php if ( ! empty( $phone ) ) : ?>
											<li><strong><?php esc_html_e( 'Phone:', 'causepro' ); ?></strong> <?php echo esc_html( $phone ); ?></li>
										<?php endif; ?>
										<?php if ( ! empty( $email ) ) : ?>
											<li><strong><?php esc_html_e( 'Email:', 'causepro' ); ?></strong> <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></li>
										<?php endif; ?>
										<?php if ( ! empty( $address ) ) : ?>
											<li><strong><?php esc_html_e( 'Address:', 'causepro' ); ?></strong><br/><?php echo wp_kses_post( nl2br( $address ) ); ?></li>
										<?php endif; ?>
									</ul>
								</div>
								<?php if ( function_exists('causepro_social_follow_links') ) : ?>
								<div class="contact-social-links">
									<h3><?php esc_html_e( 'Follow Us', 'causepro' ); ?></h3>
									<?php causepro_social_follow_links(); ?>
								</div>
								<?php endif; ?>
							</aside>
						</div>

						<?php if ( ! empty( $map_url ) ) : ?>
						<div class="contact-map-section">
							<h3><?php esc_html_e( 'Our Location', 'causepro' ); ?></h3>
							<div class="map-responsive">
								<iframe src="<?php echo esc_url( $map_url ); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
							</div>
						</div>
						<?php endif; ?>

						<?php
						// FAQ Section
						$faq_query = new WP_Query( array(
							'post_type' => 'faq',
							'posts_per_page' => -1,
							'orderby' => 'menu_order',
							'order' => 'ASC',
						) );

						if ( $faq_query->have_posts() ) :
						?>
						<div class="faq-section">
							<h3><?php esc_html_e( 'Frequently Asked Questions', 'causepro' ); ?></h3>
							<div class="faq-accordion">
								<?php while ( $faq_query->have_posts() ) : $faq_query->the_post(); ?>
									<div class="faq-item">
										<h4 class="faq-question">
											<button aria-expanded="false">
												<?php the_title(); ?>
												<span class="faq-icon"></span>
											</button>
										</h4>
										<div class="faq-answer" hidden>
											<?php the_content(); ?>
										</div>
									</div>
								<?php endwhile; ?>
							</div>
						</div>
						<?php
						endif;
						wp_reset_postdata();
						?>
					</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID(); ?> -->

			<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .container -->

<?php
get_footer();
