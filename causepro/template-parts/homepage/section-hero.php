<?php
/**
 * Template part for displaying the hero section on the homepage.
 *
 * @package CausePro
 */

$headline = get_theme_mod( 'causepro_hero_headline', __( 'Your Support Changes Lives. See How.', 'causepro' ) );
$image_url = get_theme_mod( 'causepro_hero_image' );
$donation_link = get_theme_mod( 'causepro_donation_link', '#' );

$hero_styles = '';
if ( $image_url ) {
	$hero_styles = 'style="background-image: url(' . esc_url( $image_url ) . ');"';
}
?>

<section class="homepage-hero" <?php echo $hero_styles; ?>>
	<div class="hero-overlay"></div>
	<div class="hero-content">
		<h1 class="hero-headline"><?php echo esc_html( $headline ); ?></h1>
		<?php if ( ! empty( $donation_link ) ) : ?>
			<a href="<?php echo esc_url( $donation_link ); ?>" class="button hero-donate-button"><?php esc_html_e( 'Donate Now', 'causepro' ); ?></a>
		<?php endif; ?>
	</div>
</section>
