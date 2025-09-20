<?php
/**
 * CausePro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CausePro
 */

if ( ! function_exists( 'causepro_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function causepro_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'causepro', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'causepro-featured-image', 800, 600, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'causepro' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'causepro_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'causepro_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function causepro_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'causepro' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here to appear in the first footer column.', 'causepro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'causepro' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here to appear in the second footer column.', 'causepro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'causepro' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here to appear in the third footer column.', 'causepro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'causepro' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your blog sidebar.', 'causepro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'causepro_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function causepro_scripts() {
	wp_enqueue_style( 'causepro-style', get_stylesheet_uri(), array(), '1.0.0' );
	wp_enqueue_style( 'dashicons' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'causepro-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0.0', true );

	// Conditionally load blog layout scripts
	if ( ( is_archive() || is_home() ) && get_theme_mod( 'causepro_blog_layout', 'standard' ) === 'masonry' ) {
		wp_enqueue_script( 'masonry' ); // WordPress has a built-in handle for this
		wp_enqueue_script( 'causepro-blog-layout', get_template_directory_uri() . '/js/blog-layout.js', array('jquery', 'masonry'), '1.0.0', true );

		global $wp_query;
		wp_localize_script( 'causepro-blog-layout', 'causepro_blog_layout_data', array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'causepro_load_more_nonce' ),
			'layout' => 'masonry',
			'paged' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
			'max_pages' => $wp_query->max_num_pages,
		) );
	}
}
add_action( 'wp_enqueue_scripts', 'causepro_scripts' );

/**
 * AJAX handler for loading more posts.
 */
function causepro_load_more_posts() {
	check_ajax_referer( 'causepro_load_more_nonce', 'nonce' );

	$paged = isset( $_POST['paged'] ) ? intval( $_POST['paged'] ) + 1 : 2;

	$args = array(
		'post_type' => 'post',
		'paged' => $paged,
		'post_status' => 'publish',
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			get_template_part( 'template-parts/content', get_post_format() );
		}
	}
	wp_die();
}
add_action( 'wp_ajax_load_more_posts', 'causepro_load_more_posts' );
add_action( 'wp_ajax_nopriv_load_more_posts', 'causepro_load_more_posts' );


/**
 * Add dynamic CSS from Customizer settings.
 */
function causepro_dynamic_css() {
	$custom_css = '';

	// Accent Color
	$accent_color = get_theme_mod( 'causepro_accent_color', '#3498db' );
	if ( ! empty( $accent_color ) ) {
		$custom_css .= "
			a { color: {$accent_color}; }
			.main-navigation .current-menu-item > a,
			.main-navigation .current-menu-ancestor > a { color: {$accent_color}; }
			.button, button, input[type='button'], input[type='reset'], input[type='submit'],
			.header-donate-button, .progress-bar-fill { background-color: {$accent_color}; }
		";

		// Darken for hover
		$hex = ltrim($accent_color, '#');
		if (strlen($hex) == 3) { $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2]; }
		$r = max(0, min(255, hexdec(substr($hex, 0, 2)) * 0.9));
		$g = max(0, min(255, hexdec(substr($hex, 2, 2)) * 0.9));
		$b = max(0, min(255, hexdec(substr($hex, 4, 2)) * 0.9));
		$darker_hex = sprintf("#%02x%02x%02x", $r, $g, $b);

		$custom_css .= "
			.button:hover, button:hover, input[type='button']:hover, input[type='reset']:hover, input[type='submit']:hover,
			.header-donate-button:hover { background-color: {$darker_hex}; }
		";
	}

	// Header Colors
	$header_bg_color = get_theme_mod( 'causepro_header_bg_color' );
	if ( ! empty( $header_bg_color ) ) { $custom_css .= ".site-header { background-color: {$header_bg_color}; }"; }
	$header_text_color = get_theme_mod( 'causepro_header_text_color' );
	if ( ! empty( $header_text_color ) ) { $custom_css .= ".site-header, .site-header .site-title a, .site-description, .menu-toggle { color: {$header_text_color}; }"; }
	$header_link_color = get_theme_mod( 'causepro_header_link_color' );
	if ( ! empty( $header_link_color ) ) { $custom_css .= ".main-navigation a { color: {$header_link_color}; }"; }
	$header_link_hover_color = get_theme_mod( 'causepro_header_link_hover_color' );
	if ( ! empty( $header_link_hover_color ) ) { $custom_css .= ".main-navigation a:hover { color: {$header_link_hover_color}; }"; }

	// Footer Colors
	$footer_bg_color = get_theme_mod( 'causepro_footer_bg_color' );
	if ( ! empty( $footer_bg_color ) ) { $custom_css .= ".site-footer { background-color: {$footer_bg_color}; }"; }
	$footer_text_color = get_theme_mod( 'causepro_footer_text_color' );
	if ( ! empty( $footer_text_color ) ) { $custom_css .= ".site-footer, .footer-widget-column .widget-title { color: {$footer_text_color}; }"; }
	$footer_link_color = get_theme_mod( 'causepro_footer_link_color' );
	if ( ! empty( $footer_link_color ) ) { $custom_css .= ".site-footer a { color: {$footer_link_color}; }"; }
	$footer_link_hover_color = get_theme_mod( 'causepro_footer_link_hover_color' );
	if ( ! empty( $footer_link_hover_color ) ) { $custom_css .= ".site-footer a:hover { color: {$footer_link_hover_color}; }"; }

	// Homepage Section Designs
	$sections_for_design = ['hero', 'impact', 'causes', 'campaign', 'events', 'testimonials', 'blog'];
	foreach( $sections_for_design as $section ) {
		$section_selector = ".homepage-{$section}";
		$section_css = '';

		// Background
		$bg_type = get_theme_mod( "causepro_{$section}_bg_type", 'none' );
		switch ($bg_type) {
			case 'color':
				$bg_color = get_theme_mod( "causepro_{$section}_bg_color" );
				if ( ! empty( $bg_color ) ) {
					$section_css .= "background-color: {$bg_color};";
				}
				break;
			case 'gradient':
				$grad_1 = get_theme_mod( "causepro_{$section}_bg_gradient_1" );
				$grad_2 = get_theme_mod( "causepro_{$section}_bg_gradient_2" );
				if ( ! empty( $grad_1 ) && ! empty( $grad_2 ) ) {
					$section_css .= "background-image: linear-gradient(to right, {$grad_1}, {$grad_2});";
				}
				break;
			case 'image':
				$bg_image = get_theme_mod( "causepro_{$section}_bg_image" );
				if ( ! empty( $bg_image ) ) {
					$section_css .= "background-image: url(" . esc_url($bg_image) . "); background-size: cover; background-position: center;";
				}
				break;
		}

		// Text & Link Colors
		$text_color = get_theme_mod( "causepro_{$section}_text_color" );
		if ( ! empty( $text_color ) ) { $section_css .= "color: {$text_color};"; }

		if ( ! empty( $section_css ) ) {
			$custom_css .= "{$section_selector} { {$section_css} }";
		}

		$heading_color = get_theme_mod( "causepro_{$section}_heading_color" );
		if ( ! empty( $heading_color ) ) { $custom_css .= "{$section_selector} h1, {$section_selector} h2, {$section_selector} h3, {$section_selector} h4, {$section_selector} h5, {$section_selector} h6 { color: {$heading_color}; }"; }
		$link_color = get_theme_mod( "causepro_{$section}_link_color" );
		if ( ! empty( $link_color ) ) { $custom_css .= "{$section_selector} a { color: {$link_color}; }"; }
		$link_hover_color = get_theme_mod( "causepro_{$section}_link_hover_color" );
		if ( ! empty( $link_hover_color ) ) { $custom_css .= "{$section_selector} a:hover { color: {$link_hover_color}; }"; }
	}


	// Typography
	$font_sizes = ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
	foreach( $font_sizes as $el ) {
		$font_size = get_theme_mod( "causepro_font_size_{$el}" );
		if ( ! empty( $font_size ) ) {
			$custom_css .= "{$el} { font-size: {$font_size}px; }";
		}
	}

	if ( ! empty( $custom_css ) ) {
		wp_add_inline_style( 'causepro-style', $custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'causepro_dynamic_css' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Custom Post Types.
 */
require get_template_directory() . '/inc/post-types.php';
