<?php
/**
 * Template Name: Homepage
 *
 * @package CausePro
 */

get_header();
?>

<main id="main" class="site-main">

	<?php
	// We will fetch the sections and their order from the customizer.
	// Then we will include the corresponding template part for each section.

	// Default sections array
	$sections = [
		'hero'     => 'template-parts/homepage/section-hero.php',
		'impact'   => 'template-parts/homepage/section-impact.php',
		'causes'   => 'template-parts/homepage/section-causes.php',
		'campaign' => 'template-parts/homepage/section-campaign.php',
		'events'   => 'template-parts/homepage/section-events.php',
	];

	// Get priorities from Customizer
	$priorities = [];
	foreach ( array_keys( $sections ) as $section ) {
		$priority = get_theme_mod( "causepro_{$section}_section_priority", 10 );
		$priorities[ $section ] = $priority;
	}

	// Sort sections based on priority
	asort( $priorities );

	// Loop through the sorted sections and include the template part
	foreach ( $priorities as $section_slug => $priority ) {
		if ( isset( $sections[ $section_slug ] ) ) {
			// Check if the file exists before including
			$template_path = get_template_directory() . '/' . $sections[ $section_slug ];
			if ( file_exists( $template_path ) ) {
				get_template_part( 'template-parts/homepage/section', $section_slug );
			}
		}
	}
	?>

</main><!-- #main -->

<?php
get_footer();
