<?php
/**
 * The header for our theme
 *
 * @package CausePro
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'causepro' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$causepro_description = get_bloginfo( 'description', 'display' );
			if ( $causepro_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $causepro_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<div class="header-navigation-area">
			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'causepro' ); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->

			<?php
			$donation_link = get_theme_mod( 'causepro_donation_link', '#' );
			if ( ! empty( $donation_link ) ) :
			?>
				<a class="button header-donate-button" href="<?php echo esc_url( $donation_link ); ?>"><?php esc_html_e( 'Donate Now', 'causepro' ); ?></a>
			<?php endif; ?>
		</div><!-- .header-navigation-area -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
