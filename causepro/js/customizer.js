( function( $ ) {
	'use strict';

	// Site Title and Description (from default WordPress)
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Footer Copyright
	wp.customize( 'causepro_footer_copyright', function( value ) {
		value.bind( function( to ) {
			// This will require a target element in the footer, e.g., <div class="copyright-text"></div>
			$( '.site-info' ).html( to ); // Assuming .site-info will hold the copyright
		} );
	} );

	// Hero Headline
	wp.customize( 'causepro_hero_headline', function( value ) {
		value.bind( function( to ) {
			// This will require a target element in the hero section, e.g., <h1 class="hero-headline"></h1>
			$( '.hero-headline' ).text( to );
		} );
	} );

	// Impact Headline
	wp.customize( 'causepro_impact_headline', function( value ) {
		value.bind( function( to ) {
			$( '.impact-headline' ).text( to );
		} );
	} );

	// Causes Headline
	wp.customize( 'causepro_causes_headline', function( value ) {
		value.bind( function( to ) {
			$( '.causes-headline' ).text( to );
		} );
	} );

	// Campaign Headline
	wp.customize( 'causepro_campaign_headline', function( value ) {
		value.bind( function( to ) {
			$( '.campaign-headline' ).text( to );
		} );
	} );

	// Campaign Text
	wp.customize( 'causepro_campaign_text', function( value ) {
		value.bind( function( to ) {
			$( '.campaign-text' ).html( to );
		} );
	} );

	// Campaign CTA Text
	wp.customize( 'causepro_campaign_cta_text', function( value ) {
		value.bind( function( to ) {
			$( '.campaign-cta' ).text( to );
		} );
	} );

	// Events Headline
	wp.customize( 'causepro_events_headline', function( value ) {
		value.bind( function( to ) {
			$( '.events-headline' ).text( to );
		} );
	} );

} )( jQuery );
