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
			'name'          => esc_html__( 'Footer', 'causepro' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'causepro' ),
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
}
add_action( 'wp_enqueue_scripts', 'causepro_scripts' );


/**
 * Add dynamic CSS from Customizer settings.
 */
function causepro_dynamic_css() {
	$accent_color = get_theme_mod( 'causepro_accent_color', '#3498db' );

	$custom_css = "
		a,
		.main-navigation .current-menu-item > a,
		.main-navigation .current-menu-ancestor > a {
			color: {$accent_color};
		}

		.button,
		button,
		input[type='button'],
		input[type='reset'],
		input[type='submit'],
		.header-donate-button,
		.progress-bar-fill {
			background-color: {$accent_color};
		}

		.button:hover,
		button:hover,
		input[type='button']:hover,
		input[type='reset']:hover,
		input[type='submit']:hover,
		.header-donate-button:hover {
			background-color: darken({$accent_color}, 10%);
		}

		/* A simple darken function in PHP */
	";

	// Basic darken function for hex colors
	$hex = ltrim($accent_color, '#');
	if (strlen($hex) == 3) {
		$hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
	}
	$r = hexdec(substr($hex, 0, 2));
	$g = hexdec(substr($hex, 2, 2));
	$b = hexdec(substr($hex, 4, 2));
	$darken_factor = 0.9; // 10% darker
	$r = max(0, min(255, $r * $darken_factor));
	$g = max(0, min(255, $g * $darken_factor));
	$b = max(0, min(255, $b * $darken_factor));
	$darker_hex = sprintf("#%02x%02x%02x", $r, $g, $b);

	$custom_css = str_replace("darken({$accent_color}, 10%)", $darker_hex, $custom_css);

	wp_add_inline_style( 'causepro-style', $custom_css );
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
