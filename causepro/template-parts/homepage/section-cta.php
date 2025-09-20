<?php
/**
 * Template part for displaying the Call to Action section on the homepage.
 *
 * @package CausePro
 */

$headline = get_theme_mod( 'causepro_cta_headline', __( 'Make a Difference Today', 'causepro' ) );
$subtitle = get_theme_mod( 'causepro_cta_subtitle' );
$shortcode = get_theme_mod( 'causepro_cta_shortcode', '[give_form id="217"]' );
?>

<section class="homepage-cta">
	<div class="container">
		<h2 class="section-title cta-headline"><?php echo esc_html( $headline ); ?></h2>
		<?php if ( ! empty( $subtitle ) ) : ?>
			<p class="section-subtitle"><?php echo esc_html( $subtitle ); ?></p>
		<?php endif; ?>
		<div class="cta-shortcode-wrapper">
			<?php
			if ( ! empty( $shortcode ) ) {
				echo do_shortcode( $shortcode );
			}
			?>
		</div>
	</div>
</section>
