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
		'Facebook' => array(
			'url' => 'https://www.facebook.com/sharer/sharer.php?u=' . $post_url,
			'icon' => 'dashicons-facebook-alt',
		),
		'Twitter'  => array(
			'url' => 'https://twitter.com/intent/tweet?text=' . $post_title . '&amp;url=' . $post_url,
			'icon' => 'dashicons-twitter',
		),
		'LinkedIn' => array(
			'url' => 'https://www.linkedin.com/shareArticle?mini=true&url=' . $post_url . '&amp;title=' . $post_title,
			'icon' => 'dashicons-linkedin',
		),
	);

	// Check if dashicons-linkedin exists, otherwise fallback. WordPress added it in 5.8.
	$linkedin_icon = ( wp_style_is( 'dashicons', 'registered' ) && strpos( file_get_contents( ABSPATH . WPINC . '/css/dashicons.css' ), '.dashicons-linkedin' ) !== false ) ? 'dashicons-linkedin' : 'dashicons-admin-links';
	$social_sites['LinkedIn']['icon'] = $linkedin_icon;


	echo '<div class="social-sharing">';
	echo '<h3 class="social-sharing-title">' . esc_html__( 'Share This Story', 'causepro' ) . '</h3>';
	echo '<ul>';

	foreach ( $social_sites as $network => $data ) {
		if ( get_theme_mod( 'causepro_share_on_' . $network, true ) ) {
			echo '<li><a href="' . esc_url( $data['url'] ) . '" target="_blank" rel="noopener noreferrer"><span class="screen-reader-text">' . esc_html( $network ) . '</span><span class="dashicons ' . esc_attr($data['icon']) . '"></span></a></li>';
		}
	}

	echo '</ul>';
	echo '</div>';
}
endif;

if ( ! function_exists( 'causepro_social_follow_links' ) ) :
/**
 * Displays social follow links.
 */
function causepro_social_follow_links() {
	$social_networks = ['Facebook', 'Twitter', 'LinkedIn', 'Instagram'];
	$has_links = false;

	// Check if any link is set
	foreach( $social_networks as $network ) {
		if ( get_theme_mod( "causepro_social_follow_url_{$network}" ) ) {
			$has_links = true;
			break;
		}
	}

	if ( ! $has_links ) {
		return;
	}

	echo '<div class="social-follow-links">';
	echo '<ul>';

	$icon_map = array(
		'Facebook' => 'dashicons-facebook-alt',
		'Twitter' => 'dashicons-twitter',
		'LinkedIn' => 'dashicons-linkedin', // Assuming it exists, with fallback below
		'Instagram' => 'dashicons-instagram',
	);

	// Fallback for LinkedIn icon
	if ( ! ( wp_style_is( 'dashicons', 'registered' ) && strpos( file_get_contents( ABSPATH . WPINC . '/css/dashicons.css' ), '.dashicons-linkedin' ) !== false ) ) {
		$icon_map['LinkedIn'] = 'dashicons-admin-links';
	}


	foreach( $social_networks as $network ) {
		$url = get_theme_mod( "causepro_social_follow_url_{$network}" );
		if ( ! empty( $url ) ) {
			echo '<li><a href="' . esc_url( $url ) . '" target="_blank" rel="noopener noreferrer"><span class="screen-reader-text">' . esc_html( $network ) . '</span><span class="dashicons ' . esc_attr($icon_map[$network]) . '"></span></a></li>';
		}
	}

	echo '</ul>';
	echo '</div>';
}
endif;
