<?php
/**
 * CausePro Theme Customizer
 *
 * @package CausePro
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function causepro_customize_register( $wp_customize ) {

	// ----------------------------------------------------------------
	// --- Panels -----------------------------------------------------
	// ----------------------------------------------------------------
	$wp_customize->add_panel( 'causepro_theme_options_panel', array(
		'title'    => __( 'Theme Options', 'causepro' ),
		'priority' => 10,
	) );

	$wp_customize->add_panel( 'causepro_homepage_sections_panel', array(
		'title'    => __( 'Homepage Sections', 'causepro' ),
		'priority' => 20,
	) );


	// ----------------------------------------------------------------
	// --- Theme Options Panel Sections & Controls --------------------
	// ----------------------------------------------------------------

	// Section: Donation Link
	$wp_customize->add_section( 'causepro_donation_section', array(
		'title' => __( 'Global Donation Link', 'causepro' ),
		'panel' => 'causepro_theme_options_panel',
	) );
	$wp_customize->add_setting( 'causepro_donation_link', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'causepro_donation_link_control', array(
		'label'    => __( 'Donation URL', 'causepro' ),
		'section'  => 'causepro_donation_section',
		'settings' => 'causepro_donation_link',
		'type'     => 'url',
	) );

	// Section: Colors
	$wp_customize->add_section( 'causepro_colors_section', array(
		'title' => __( 'Colors', 'causepro' ),
		'panel' => 'causepro_theme_options_panel',
	) );
	$wp_customize->add_setting( 'causepro_accent_color', array(
		'default'           => '#3498db',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'causepro_accent_color_control', array(
		'label'    => __( 'Accent Color', 'causepro' ),
		'section'  => 'causepro_colors_section',
		'settings' => 'causepro_accent_color',
	) ) );

	// Section: Footer
	$wp_customize->add_section( 'causepro_footer_section', array(
		'title' => __( 'Footer', 'causepro' ),
		'panel' => 'causepro_theme_options_panel',
	) );
	$wp_customize->add_setting( 'causepro_footer_copyright', array(
		'default'           => '© ' . date('Y') . ' ' . get_bloginfo('name') . '. All Rights Reserved.',
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'causepro_footer_copyright_control', array(
		'label'    => __( 'Footer Copyright Text', 'causepro' ),
		'section'  => 'causepro_footer_section',
		'settings' => 'causepro_footer_copyright',
		'type'     => 'textarea',
	) );


	// ----------------------------------------------------------------
	// --- Homepage Sections Panel Sections & Controls ----------------
	// ----------------------------------------------------------------

	// Section: Section Display Order
	$wp_customize->add_section( 'causepro_homepage_order_section', array(
		'title'       => __( 'Section Display Order', 'causepro' ),
		'panel'       => 'causepro_homepage_sections_panel',
		'priority'    => 10,
		'description' => __( 'Set the display order for homepage sections by assigning a number (e.g., 10, 20, 30). Lower numbers appear first.', 'causepro' ),
	) );
	$sections = ['hero', 'impact', 'causes', 'campaign', 'events'];
	$priority = 10;
	foreach($sections as $section) {
		$wp_customize->add_setting( "causepro_{$section}_section_priority", array(
			'default' => $priority,
			'sanitize_callback' => 'absint',
		));
		$wp_customize->add_control( "causepro_{$section}_section_priority_control", array(
			'label' => __( ucfirst($section) . ' Section Order', 'causepro' ),
			'section' => 'causepro_homepage_order_section',
			'settings' => "causepro_{$section}_section_priority",
			'type' => 'number',
		));
		$priority += 10;
	}


	// Section: Hero
	$wp_customize->add_section( 'causepro_hero_section', array(
		'title' => __( 'Hero Section', 'causepro' ),
		'panel' => 'causepro_homepage_sections_panel',
	) );
	$wp_customize->add_setting( 'causepro_hero_headline', array(
		'default'           => __( 'Your Support Changes Lives. See How.', 'causepro' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'causepro_hero_headline_control', array(
		'label'    => __( 'Headline', 'causepro' ),
		'section'  => 'causepro_hero_section',
		'settings' => 'causepro_hero_headline',
		'type'     => 'text',
	) );
	$wp_customize->add_setting( 'causepro_hero_image', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'causepro_hero_image_control', array(
		'label'    => __( 'Background Image', 'causepro' ),
		'section'  => 'causepro_hero_section',
		'settings' => 'causepro_hero_image',
	) ) );

	// Section: Our Impact
	$wp_customize->add_section( 'causepro_impact_section', array(
		'title' => __( 'Our Impact Section', 'causepro' ),
		'panel' => 'causepro_homepage_sections_panel',
	) );
	$wp_customize->add_setting( 'causepro_impact_headline', array(
		'default'           => __( 'Our Impact', 'causepro' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'causepro_impact_headline_control', array(
		'label'    => __( 'Headline', 'causepro' ),
		'section'  => 'causepro_impact_section',
		'settings' => 'causepro_impact_headline',
	) );
	for ( $i = 1; $i <= 4; $i++ ) {
		$wp_customize->add_setting( "causepro_impact_stat_{$i}_icon", array( 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "causepro_impact_stat_{$i}_icon_control", array(
			'label' => __( "Statistic {$i}: Icon", 'causepro' ),
			'description' => __('Enter a Dashicon class name (e.g., "dashicons-heart").', 'causepro'),
			'section' => 'causepro_impact_section',
			'settings' => "causepro_impact_stat_{$i}_icon",
		) );
		$wp_customize->add_setting( "causepro_impact_stat_{$i}_number", array( 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "causepro_impact_stat_{$i}_number_control", array(
			'label' => __( "Statistic {$i}: Number/Value", 'causepro' ),
			'section' => 'causepro_impact_section',
			'settings' => "causepro_impact_stat_{$i}_number",
		) );
		$wp_customize->add_setting( "causepro_impact_stat_{$i}_text", array( 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "causepro_impact_stat_{$i}_text_control", array(
			'label' => __( "Statistic {$i}: Description", 'causepro' ),
			'section' => 'causepro_impact_section',
			'settings' => "causepro_impact_stat_{$i}_text",
		) );
	}

	// Section: Current Causes
	$wp_customize->add_section( 'causepro_causes_section' , array(
		'title' => __( 'Current Causes Section', 'causepro' ),
		'panel' => 'causepro_homepage_sections_panel',
	));
	$wp_customize->add_setting( 'causepro_causes_headline', array(
		'default'           => __( 'Our Current Causes', 'causepro' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'causepro_causes_headline_control', array(
		'label'    => __( 'Headline', 'causepro' ),
		'section'  => 'causepro_causes_section',
		'settings' => 'causepro_causes_headline',
	) );

	// Section: Campaign Feature
	$wp_customize->add_section( 'causepro_campaign_section', array(
		'title' => __( 'Campaign Feature Section', 'causepro' ),
		'panel' => 'causepro_homepage_sections_panel',
	) );
	$wp_customize->add_setting( 'causepro_campaign_headline', array( 'default' => 'Major Campaign', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'causepro_campaign_headline_control', array( 'label' => 'Headline', 'section' => 'causepro_campaign_section', 'settings' => 'causepro_campaign_headline' ) );
	$wp_customize->add_setting( 'causepro_campaign_text', array( 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'causepro_campaign_text_control', array( 'label' => 'Text', 'section' => 'causepro_campaign_section', 'settings' => 'causepro_campaign_text', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'causepro_campaign_goal', array( 'default' => '10000', 'sanitize_callback' => 'absint' ) );
	$wp_customize->add_control( 'causepro_campaign_goal_control', array( 'label' => 'Goal Amount', 'section' => 'causepro_campaign_section', 'settings' => 'causepro_campaign_goal', 'type' => 'number' ) );
	$wp_customize->add_setting( 'causepro_campaign_raised', array( 'default' => '7500', 'sanitize_callback' => 'absint' ) );
	$wp_customize->add_control( 'causepro_campaign_raised_control', array( 'label' => 'Amount Raised', 'section' => 'causepro_campaign_section', 'settings' => 'causepro_campaign_raised', 'type' => 'number' ) );
	$wp_customize->add_setting( 'causepro_campaign_cta_text', array( 'default' => 'Donate to this Campaign', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'causepro_campaign_cta_text_control', array( 'label' => 'Button Text', 'section' => 'causepro_campaign_section', 'settings' => 'causepro_campaign_cta_text' ) );


	// Section: Upcoming Events
	$wp_customize->add_section( 'causepro_events_section' , array(
		'title' => __( 'Upcoming Events Section', 'causepro' ),
		'panel' => 'causepro_homepage_sections_panel',
	));
	$wp_customize->add_setting( 'causepro_events_headline', array(
		'default'           => __( 'Upcoming Events', 'causepro' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'causepro_events_headline_control', array(
		'label'    => __( 'Headline', 'causepro' ),
		'section'  => 'causepro_events_section',
		'settings' => 'causepro_events_headline',
	) );

}
add_action( 'customize_register', 'causepro_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function causepro_customize_preview_init() {
	wp_enqueue_script( 'causepro-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'causepro_customize_preview_init' );
