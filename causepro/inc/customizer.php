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

	// Section: Header Colors
	$wp_customize->add_section( 'causepro_header_colors_section', array(
		'title' => __( 'Header Colors', 'causepro' ),
		'panel' => 'causepro_theme_options_panel',
	) );
	$wp_customize->add_setting( 'causepro_header_bg_color', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'causepro_header_bg_color_control', array(
		'label' => __( 'Background Color', 'causepro' ), 'section' => 'causepro_header_colors_section', 'settings' => 'causepro_header_bg_color',
	) ) );
	$wp_customize->add_setting( 'causepro_header_text_color', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'causepro_header_text_color_control', array(
		'label' => __( 'Text Color', 'causepro' ), 'section' => 'causepro_header_colors_section', 'settings' => 'causepro_header_text_color',
	) ) );
	$wp_customize->add_setting( 'causepro_header_link_color', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'causepro_header_link_color_control', array(
		'label' => __( 'Link Color', 'causepro' ), 'section' => 'causepro_header_colors_section', 'settings' => 'causepro_header_link_color',
	) ) );
	$wp_customize->add_setting( 'causepro_header_link_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'causepro_header_link_hover_color_control', array(
		'label' => __( 'Link Hover Color', 'causepro' ), 'section' => 'causepro_header_colors_section', 'settings' => 'causepro_header_link_hover_color',
	) ) );

	// Section: Footer Colors
	$wp_customize->add_section( 'causepro_footer_colors_section', array(
		'title' => __( 'Footer Colors', 'causepro' ),
		'panel' => 'causepro_theme_options_panel',
	) );
	$wp_customize->add_setting( 'causepro_footer_bg_color', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'causepro_footer_bg_color_control', array(
		'label' => __( 'Background Color', 'causepro' ), 'section' => 'causepro_footer_colors_section', 'settings' => 'causepro_footer_bg_color',
	) ) );
	$wp_customize->add_setting( 'causepro_footer_text_color', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'causepro_footer_text_color_control', array(
		'label' => __( 'Text Color', 'causepro' ), 'section' => 'causepro_footer_colors_section', 'settings' => 'causepro_footer_text_color',
	) ) );
	$wp_customize->add_setting( 'causepro_footer_link_color', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'causepro_footer_link_color_control', array(
		'label' => __( 'Link Color', 'causepro' ), 'section' => 'causepro_footer_colors_section', 'settings' => 'causepro_footer_link_color',
	) ) );
	$wp_customize->add_setting( 'causepro_footer_link_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'causepro_footer_link_hover_color_control', array(
		'label' => __( 'Link Hover Color', 'causepro' ), 'section' => 'causepro_footer_colors_section', 'settings' => 'causepro_footer_link_hover_color',
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
	$sections = ['hero', 'impact', 'causes', 'campaign', 'events', 'testimonials', 'blog'];
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
	$wp_customize->add_setting( 'causepro_hero_subtitle', array( 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'causepro_hero_subtitle_control', array(
		'label' => 'Sub-title / Description', 'section' => 'causepro_hero_section', 'settings' => 'causepro_hero_subtitle', 'type' => 'textarea'
	) );
	$wp_customize->add_setting( 'causepro_hero_secondary_button_text', array( 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'causepro_hero_secondary_button_text_control', array(
		'label' => 'Secondary Button Text', 'section' => 'causepro_hero_section', 'settings' => 'causepro_hero_secondary_button_text'
	) );
	$wp_customize->add_setting( 'causepro_hero_secondary_button_link', array( 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'causepro_hero_secondary_button_link_control', array(
		'label' => 'Secondary Button Link', 'section' => 'causepro_hero_section', 'settings' => 'causepro_hero_secondary_button_link', 'type' => 'url'
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
	$wp_customize->add_setting( 'causepro_impact_subtitle', array( 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'causepro_impact_subtitle_control', array(
		'label' => 'Sub-title / Description', 'section' => 'causepro_impact_section', 'settings' => 'causepro_impact_subtitle', 'type' => 'textarea'
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
	$wp_customize->add_setting( 'causepro_causes_subtitle', array( 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'causepro_causes_subtitle_control', array(
		'label' => 'Sub-title / Description', 'section' => 'causepro_causes_section', 'settings' => 'causepro_causes_subtitle', 'type' => 'textarea'
	) );

	// Section: Campaign Feature
	$wp_customize->add_section( 'causepro_campaign_section', array(
		'title' => __( 'Campaign Feature Section', 'causepro' ),
		'panel' => 'causepro_homepage_sections_panel',
	) );
	$wp_customize->add_setting( 'causepro_campaign_headline', array( 'default' => 'Major Campaign', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'causepro_campaign_headline_control', array( 'label' => 'Headline', 'section' => 'causepro_campaign_section', 'settings' => 'causepro_campaign_headline' ) );
	$wp_customize->add_setting( 'causepro_campaign_subtitle', array( 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'causepro_campaign_subtitle_control', array(
		'label' => 'Sub-title / Description', 'section' => 'causepro_campaign_section', 'settings' => 'causepro_campaign_subtitle', 'type' => 'textarea'
	) );
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
	$wp_customize->add_setting( 'causepro_events_subtitle', array( 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'causepro_events_subtitle_control', array(
		'label' => 'Sub-title / Description', 'section' => 'causepro_events_section', 'settings' => 'causepro_events_subtitle', 'type' => 'textarea'
	) );

	// Section: Testimonials
	$wp_customize->add_section( 'causepro_testimonials_section' , array(
		'title' => __( 'Testimonials Section', 'causepro' ),
		'panel' => 'causepro_homepage_sections_panel',
	));
	$wp_customize->add_setting( 'causepro_testimonials_headline', array(
		'default'           => __( 'What People Are Saying', 'causepro' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'causepro_testimonials_headline_control', array(
		'label'    => __( 'Headline', 'causepro' ),
		'section'  => 'causepro_testimonials_section',
		'settings' => 'causepro_testimonials_headline',
	) );
	$wp_customize->add_setting( 'causepro_testimonials_subtitle', array( 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'causepro_testimonials_subtitle_control', array(
		'label' => 'Sub-title / Description', 'section' => 'causepro_testimonials_section', 'settings' => 'causepro_testimonials_subtitle', 'type' => 'textarea'
	) );

	// Section: Blog (Recent Posts)
	$wp_customize->add_section( 'causepro_blog_section' , array(
		'title' => __( 'Blog Section', 'causepro' ),
		'panel' => 'causepro_homepage_sections_panel',
	));
	$wp_customize->add_setting( 'causepro_blog_headline', array(
		'default'           => __( 'From Our Blog', 'causepro' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'causepro_blog_headline_control', array(
		'label'    => __( 'Headline', 'causepro' ),
		'section'  => 'causepro_blog_section',
		'settings' => 'causepro_blog_headline',
	) );
	$wp_customize->add_setting( 'causepro_blog_post_count', array(
		'default'           => 3,
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'causepro_blog_post_count_control', array(
		'label'    => __( 'Number of posts to show', 'causepro' ),
		'section'  => 'causepro_blog_section',
		'settings' => 'causepro_blog_post_count',
		'type'     => 'number',
	) );
	$wp_customize->add_setting( 'causepro_blog_subtitle', array( 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'causepro_blog_subtitle_control', array(
		'label' => 'Sub-title / Description', 'section' => 'causepro_blog_section', 'settings' => 'causepro_blog_subtitle', 'type' => 'textarea'
	) );

	// Section: Contact Page
	$wp_customize->add_section( 'causepro_contact_page_section', array(
		'title' => __( 'Contact Page Settings', 'causepro' ),
		'priority' => 30,
	) );
	$wp_customize->add_setting( 'causepro_contact_page_content', array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'causepro_contact_page_content_control', array(
		'label'       => __( 'Contact Page Content', 'causepro' ),
		'description' => __( 'Enter custom HTML or a shortcode (e.g., from a contact form plugin) to be displayed on the Contact Page template.', 'causepro' ),
		'section'     => 'causepro_contact_page_section',
		'settings'    => 'causepro_contact_page_content',
		'type'        => 'textarea',
	) );

	// Section: Social Sharing
	$wp_customize->add_section( 'causepro_social_sharing_section', array(
		'title' => __( 'Social Sharing', 'causepro' ),
		'panel' => 'causepro_theme_options_panel',
	) );
	$wp_customize->add_setting( 'causepro_enable_social_sharing', array(
		'default'           => true,
		'sanitize_callback' => 'wp_validate_boolean',
	) );
	$wp_customize->add_control( 'causepro_enable_social_sharing_control', array(
		'label'    => __( 'Enable Social Sharing on Posts', 'causepro' ),
		'section'  => 'causepro_social_sharing_section',
		'settings' => 'causepro_enable_social_sharing',
		'type'     => 'checkbox',
	) );
	$social_networks = ['Facebook', 'Twitter', 'LinkedIn'];
	foreach( $social_networks as $network ) {
		$wp_customize->add_setting( "causepro_share_on_{$network}", array(
			'default'           => true,
			'sanitize_callback' => 'wp_validate_boolean',
		) );
		$wp_customize->add_control( "causepro_share_on_{$network}_control", array(
			'label'    => sprintf( __( 'Share on %s', 'causepro' ), $network ),
			'section'  => 'causepro_social_sharing_section',
			'settings' => "causepro_share_on_{$network}",
			'type'     => 'checkbox',
		) );
	}

	// Section: Typography
	$wp_customize->add_section( 'causepro_typography_section', array(
		'title' => __( 'Typography', 'causepro' ),
		'panel' => 'causepro_theme_options_panel',
		'description' => __( 'Set font sizes in pixels (px).', 'causepro' ),
	) );
	$font_sizes = [
		'p' => ['label' => 'Paragraph Font Size', 'default' => 16],
		'h1' => ['label' => 'H1 Font Size', 'default' => 40],
		'h2' => ['label' => 'H2 Font Size', 'default' => 32],
		'h3' => ['label' => 'H3 Font Size', 'default' => 28],
		'h4' => ['label' => 'H4 Font Size', 'default' => 24],
		'h5' => ['label' => 'H5 Font Size', 'default' => 20],
		'h6' => ['label' => 'H6 Font Size', 'default' => 18],
	];
	foreach( $font_sizes as $key => $values ) {
		$wp_customize->add_setting( "causepro_font_size_{$key}", array(
			'default' => $values['default'],
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( "causepro_font_size_{$key}_control", array(
			'label' => $values['label'],
			'section' => 'causepro_typography_section',
			'settings' => "causepro_font_size_{$key}",
			'type' => 'number',
			'input_attrs' => array( 'min' => 10, 'max' => 100 ),
		) );
	}

	// Section: Blog Archive Layout
	$wp_customize->add_section( 'causepro_blog_archive_layout_section', array(
		'title' => __( 'Blog Archive Layout', 'causepro' ),
		'panel' => 'causepro_theme_options_panel',
	) );
	$wp_customize->add_setting( 'causepro_blog_layout', array( 'default' => 'standard', 'sanitize_callback' => 'sanitize_key' ) );
	$wp_customize->add_control( 'causepro_blog_layout_control', array(
		'label'   => __( 'Layout Style', 'causepro' ),
		'section' => 'causepro_blog_archive_layout_section',
		'settings' => 'causepro_blog_layout',
		'type'    => 'radio',
		'choices' => array(
			'standard' => __( 'Standard List', 'causepro' ),
			'masonry'  => __( 'Masonry Grid', 'causepro' ),
		),
	) );
	$wp_customize->add_setting( 'causepro_blog_load_more', array( 'default' => false, 'sanitize_callback' => 'wp_validate_boolean' ) );
	$wp_customize->add_control( 'causepro_blog_load_more_control', array(
		'label'    => __( 'Enable "Load More" Button (requires Masonry)', 'causepro' ),
		'section'  => 'causepro_blog_archive_layout_section',
		'settings' => 'causepro_blog_load_more',
		'type'     => 'checkbox',
	) );


	// --- Homepage Section Design Panel ---------------------------------
	$wp_customize->add_panel( 'causepro_homepage_design_panel', array(
		'title'    => __( 'Homepage Section Design', 'causepro' ),
		'priority' => 25,
	) );

	$sections_for_design = ['hero', 'impact', 'causes', 'campaign', 'events', 'testimonials', 'blog'];

	foreach ( $sections_for_design as $section ) {
		$section_title = ucfirst( $section );

		$wp_customize->add_section( "causepro_{$section}_design_section", array(
			'title' => sprintf( __( '%s Section', 'causepro' ), $section_title ),
			'panel' => 'causepro_homepage_design_panel',
		) );

		// Background Type
		$wp_customize->add_setting( "causepro_{$section}_bg_type", array( 'default' => 'none', 'sanitize_callback' => 'sanitize_key' ) );
		$wp_customize->add_control( "causepro_{$section}_bg_type_control", array(
			'label'   => __( 'Background Type', 'causepro' ),
			'section' => "causepro_{$section}_design_section",
			'settings' => "causepro_{$section}_bg_type",
			'type'    => 'radio',
			'choices' => array(
				'none'     => __( 'None', 'causepro' ),
				'color'    => __( 'Color', 'causepro' ),
				'gradient' => __( 'Gradient', 'causepro' ),
				'image'    => __( 'Image', 'causepro' ),
			),
		) );

		// Background Controls (with active_callback)
		$wp_customize->add_setting( "causepro_{$section}_bg_color", array( 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, "causepro_{$section}_bg_color_control", array(
			'label' => __( 'Background Color', 'causepro' ), 'section' => "causepro_{$section}_design_section",
			'active_callback' => function() use ($section) { return get_theme_mod("causepro_{$section}_bg_type") === 'color'; }
		) ) );

		$wp_customize->add_setting( "causepro_{$section}_bg_gradient_1", array( 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, "causepro_{$section}_bg_gradient_1_control", array(
			'label' => __( 'Gradient Color 1', 'causepro' ), 'section' => "causepro_{$section}_design_section",
			'active_callback' => function() use ($section) { return get_theme_mod("causepro_{$section}_bg_type") === 'gradient'; }
		) ) );
		$wp_customize->add_setting( "causepro_{$section}_bg_gradient_2", array( 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, "causepro_{$section}_bg_gradient_2_control", array(
			'label' => __( 'Gradient Color 2', 'causepro' ), 'section' => "causepro_{$section}_design_section",
			'active_callback' => function() use ($section) { return get_theme_mod("causepro_{$section}_bg_type") === 'gradient'; }
		) ) );

		$wp_customize->add_setting( "causepro_{$section}_bg_image", array( 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "causepro_{$section}_bg_image_control", array(
			'label' => __( 'Background Image', 'causepro' ), 'section' => "causepro_{$section}_design_section",
			'active_callback' => function() use ($section) { return get_theme_mod("causepro_{$section}_bg_type") === 'image'; }
		) ) );

		// Text & Link Colors
		$wp_customize->add_setting( "causepro_{$section}_text_color", array( 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, "causepro_{$section}_text_color_control", array(
			'label' => __( 'Text Color', 'causepro' ), 'section' => "causepro_{$section}_design_section",
		) ) );
		$wp_customize->add_setting( "causepro_{$section}_heading_color", array( 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, "causepro_{$section}_heading_color_control", array(
			'label' => __( 'Heading Color', 'causepro' ), 'section' => "causepro_{$section}_design_section",
		) ) );
		$wp_customize->add_setting( "causepro_{$section}_link_color", array( 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, "causepro_{$section}_link_color_control", array(
			'label' => __( 'Link Color', 'causepro' ), 'section' => "causepro_{$section}_design_section",
		) ) );
		$wp_customize->add_setting( "causepro_{$section}_link_hover_color", array( 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, "causepro_{$section}_link_hover_color_control", array(
			'label' => __( 'Link Hover Color', 'causepro' ), 'section' => "causepro_{$section}_design_section",
		) ) );
	}
}
add_action( 'customize_register', 'causepro_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function causepro_customize_preview_init() {
	wp_enqueue_script( 'causepro-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'causepro_customize_preview_init' );
