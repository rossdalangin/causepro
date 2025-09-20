<?php
/**
 * Template Name: Contact Page
 *
 * @package CausePro
 */

get_header();
?>

<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();
			?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="page-header">
						<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
					</header><!-- .page-header -->

					<div class="entry-content">
						<?php
						// Display content from the main WordPress editor
						the_content();

						// Display content from the Customizer setting
						$custom_content = get_theme_mod( 'causepro_contact_page_content' );
						if ( ! empty( $custom_content ) ) {
							echo '<div class="contact-page-custom-content">';
							// Execute shortcodes
							echo do_shortcode( wp_kses_post( $custom_content ) );
							echo '</div>';
						}
						?>
					</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID(); ?> -->

			<?php
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .container -->


<?php
get_footer();
