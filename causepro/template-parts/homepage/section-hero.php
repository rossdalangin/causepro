<?php
/**
 * Template part for displaying the hero section on the homepage.
 *
 * @package CausePro
 */

$headline = get_theme_mod( 'causepro_hero_headline', __( 'Your Support Changes Lives. See How.', 'causepro' ) );
$subtitle = get_theme_mod( 'causepro_hero_subtitle' );
$image_url = get_theme_mod( 'causepro_hero_image' );
$donation_link = get_theme_mod( 'causepro_donation_link', '#' );
$sec_button_text = get_theme_mod( 'causepro_hero_secondary_button_text' );
$sec_button_link = get_theme_mod( 'causepro_hero_secondary_button_link' );

$hero_styles = '';
if ( $image_url ) {
	$hero_styles = 'style="background-image: url(' . esc_url( $image_url ) . ');"';
}
?>

<section class="homepage-hero" <?php echo $hero_styles; ?>>
	<div class="hero-overlay"></div>
	<div class="hero-content">
		<h1 class="hero-headline"><?php echo esc_html( $headline ); ?></h1>
		<?php if ( ! empty( $subtitle ) ) : ?>
			<p class="section-subtitle"><?php echo esc_html( $subtitle ); ?></p>
		<?php endif; ?>
		<div class="hero-buttons">
			<?php if ( ! empty( $donation_link ) ) : ?>
				<a href="<?php echo esc_url( $donation_link ); ?>" class="button hero-donate-button"><?php esc_html_e( 'Donate Now', 'causepro' ); ?></a>
			<?php endif; ?>
			<?php if ( ! empty( $sec_button_text ) && ! empty( $sec_button_link ) ) : ?>
				<a href="<?php echo esc_url( $sec_button_link ); ?>" class="button hero-donate-button-secondary"><?php echo esc_html( $sec_button_text ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</section>
