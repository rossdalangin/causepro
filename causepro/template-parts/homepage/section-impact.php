<?php
/**
 * Template part for displaying the Impact section on the homepage.
 *
 * @package CausePro
 */

$headline = get_theme_mod( 'causepro_impact_headline', __( 'Our Impact', 'causepro' ) );
?>

<section class="homepage-impact">
	<div class="container">
		<h2 class="section-title impact-headline"><?php echo esc_html( $headline ); ?></h2>
		<div class="impact-stats-grid">
			<?php
			for ( $i = 1; $i <= 4; $i++ ) :
				$icon   = get_theme_mod( "causepro_impact_stat_{$i}_icon" );
				$number = get_theme_mod( "causepro_impact_stat_{$i}_number" );
				$text   = get_theme_mod( "causepro_impact_stat_{$i}_text" );

				// Only display the stat if it has some content
				if ( ! empty( $number ) || ! empty( $text ) ) :
			?>
				<div class="stat-item">
					<?php if ( ! empty( $icon ) ) : ?>
						<span class="stat-icon dashicons <?php echo esc_attr( $icon ); ?>"></span>
					<?php endif; ?>
					<?php if ( ! empty( $number ) ) : ?>
						<p class="stat-number"><?php echo esc_html( $number ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $text ) ) : ?>
						<p class="stat-text"><?php echo esc_html( $text ); ?></p>
					<?php endif; ?>
				</div>
			<?php
				endif;
			endfor;
			?>
		</div>
	</div>
</section>
