<?php
/**
 * The template for displaying the footer
 *
 * @package CausePro
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<div id="footer-widgets" class="footer-widgets-area">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div><!-- #footer-widgets -->
		<?php endif; ?>

		<div class="site-info">
			<?php
			$copyright_text = get_theme_mod( 'causepro_footer_copyright' );
			if ( $copyright_text ) :
				echo wp_kses_post( $copyright_text );
			else :
				echo '&copy; ' . date('Y') . ' ' . esc_html( get_bloginfo( 'name' ) ) . '. All Rights Reserved.';
			endif;
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
