<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package CausePro
 */

if ( ! function_exists( 'causepro_social_sharing_buttons' ) ) :
/**
 * Displays social sharing buttons.
 */
function causepro_social_sharing_buttons() {
	if ( ! get_theme_mod( 'causepro_enable_social_sharing', true ) ) {
		return;
	}

	$post_url   = urlencode( get_permalink() );
	$post_title = urlencode( get_the_title() );

	$social_sites = array(
		'Facebook' => 'https://www.facebook.com/sharer/sharer.php?u=' . $post_url,
		'Twitter'  => 'https://twitter.com/intent/tweet?text=' . $post_title . '&amp;url=' . $post_url,
		'LinkedIn' => 'https://www.linkedin.com/shareArticle?mini=true&url=' . $post_url . '&amp;title=' . $post_title,
	);

	echo '<div class="social-sharing">';
	echo '<h3 class="social-sharing-title">' . esc_html__( 'Share This Story', 'causepro' ) . '</h3>';
	echo '<ul>';

	foreach ( $social_sites as $network => $link ) {
		if ( get_theme_mod( 'causepro_share_on_' . $network, true ) ) {
			echo '<li><a href="' . esc_url( $link ) . '" target="_blank" rel="noopener noreferrer"><span class="screen-reader-text">' . esc_html( $network ) . '</span><span class="dashicons dashicons-share-alt2"></span></a></li>';
		}
	}

	echo '</ul>';
	echo '</div>';
}
endif;
