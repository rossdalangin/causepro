<?php
/**
 * The template for displaying the footer
 *
 * @package CausePro
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) : ?>
			<div class="footer-widgets-wrapper">
				<div id="footer-widgets" class="footer-widgets-area container">
					<div class="footer-widget-column">
						<?php if ( is_active_sidebar( 'footer-1' ) ) { dynamic_sidebar( 'footer-1' ); } ?>
					</div>
					<div class="footer-widget-column">
						<?php if ( is_active_sidebar( 'footer-2' ) ) { dynamic_sidebar( 'footer-2' ); } ?>
					</div>
					<div class="footer-widget-column">
						<?php if ( is_active_sidebar( 'footer-3' ) ) { dynamic_sidebar( 'footer-3' ); } ?>
					</div>
				</div><!-- #footer-widgets -->
			</div>
		<?php endif; ?>

		<?php causepro_social_follow_links(); ?>

		<div class="site-info-wrapper">
			<div class="site-info container">
				<?php
				$copyright_text = get_theme_mod( 'causepro_footer_copyright' );
				if ( $copyright_text ) :
					echo wp_kses_post( $copyright_text );
				else :
					echo '&copy; ' . date('Y') . ' ' . esc_html( get_bloginfo( 'name' ) ) . '. All Rights Reserved.';
				endif;
				?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
