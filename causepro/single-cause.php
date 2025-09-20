<?php
/**
 * The template for displaying all single Cause posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CausePro
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
		?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'cause-single' ); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<?php if ( has_post_thumbnail() ) : ?>
				<div class="post-thumbnail">
					<?php the_post_thumbnail( 'causepro-featured-image' ); ?>
				</div><!-- .post-thumbnail -->
				<?php endif; ?>

				<div class="entry-content">
					<?php
					the_content();

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'causepro' ),
							'after'  => '</div>',
						)
					);
					?>
				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<div class="cause-donate-section">
						<?php
						$givewp_form_id = get_post_meta( get_the_ID(), '_cause_givewp_form_id', true );

						// Check if GiveWP is active and a form ID is set for this cause.
						if ( class_exists( 'Give' ) && ! empty( $givewp_form_id ) ) :
							// Display the GiveWP form with its goal.
							echo do_shortcode( '[give_form id="' . absint( $givewp_form_id ) . '" show_goal="true" show_title="false" show_content="none"]' );
						else :
							// Fallback to the default donation button.
							?>
							<h2 class="donate-prompt"><?php esc_html_e( 'Support This Cause', 'causepro' ); ?></h2>
							<p><?php esc_html_e( 'Your contribution can make a real difference. Help us reach our goal.', 'causepro' ); ?></p>
							<?php
							$donation_link = get_theme_mod( 'causepro_donation_link', '#' );
							if ( ! empty( $donation_link ) ) :
							?>
							<a href="<?php echo esc_url( $donation_link ); ?>" class="button button-primary button-large donate-button"><?php esc_html_e( 'Donate to this Cause', 'causepro' ); ?></a>
							<?php
							endif;
						endif;
						?>
					</div>
				</footer><!-- .entry-footer -->
			</article><!-- #post-<?php the_ID(); ?> -->

		<?php
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
