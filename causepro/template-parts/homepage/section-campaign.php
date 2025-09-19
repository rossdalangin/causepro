<?php
/**
 * Template part for displaying the Campaign Feature section on the homepage.
 *
 * @package CausePro
 */

$headline   = get_theme_mod( 'causepro_campaign_headline', __( 'Major Campaign', 'causepro' ) );
$text       = get_theme_mod( 'causepro_campaign_text' );
$goal       = get_theme_mod( 'causepro_campaign_goal', 10000 );
$raised     = get_theme_mod( 'causepro_campaign_raised', 7500 );
$cta_text   = get_theme_mod( 'causepro_campaign_cta_text', __( 'Donate to this Campaign', 'causepro' ) );
$donation_link = get_theme_mod( 'causepro_donation_link', '#' );

// Calculate progress
$percentage = 0;
if ( $goal > 0 ) {
	$percentage = ( $raised / $goal ) * 100;
	if ( $percentage > 100 ) {
		$percentage = 100;
	}
}
?>

<section class="homepage-campaign">
	<div class="container">
		<h2 class="section-title campaign-headline"><?php echo esc_html( $headline ); ?></h2>
		<div class="campaign-content">
			<div class="campaign-text">
				<?php echo wp_kses_post( $text ); ?>
			</div>
			<div class="campaign-progress">
				<div class="progress-bar-wrapper">
					<div class="progress-bar-fill" style="width: <?php echo floatval( $percentage ); ?>%;"></div>
				</div>
				<div class="progress-bar-labels">
					<span class="amount-raised">
						<strong><?php esc_html_e( 'Raised:', 'causepro' ); ?></strong>
						$<?php echo number_format( absint( $raised ) ); ?>
					</span>
					<span class="goal-amount">
						<strong><?php esc_html_e( 'Goal:', 'causepro' ); ?></strong>
						$<?php echo number_format( absint( $goal ) ); ?>
					</span>
				</div>
			</div>
			<?php if ( ! empty( $donation_link ) && ! empty( $cta_text ) ) : ?>
				<a href="<?php echo esc_url( $donation_link ); ?>" class="button campaign-cta"><?php echo esc_html( $cta_text ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</section>
